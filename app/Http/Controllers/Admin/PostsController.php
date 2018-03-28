<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_categories = Category::all();
        $categories = [];
        foreach ($all_categories as $category){
            $categories[$category->id] = $category->title;
        }
        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'description' => 'required|max:100',
            'text' => 'required',
            'img' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('img')){

            //get file extension
            $extension = $request->file('img')->getClientOriginalExtension();

            //filename to store
            $filenametostore = time().'.'.$extension;

            //Upload File
            $request->file('img')->storeAs('public/posts/', 'big_'.$filenametostore);
            $request->file('img')->storeAs('public/posts/', 'small_'. $filenametostore);

            //Resize image big
            $thumbnailpath = public_path('storage/posts/big_'.$filenametostore);
            Image::make($thumbnailpath)->resize(450, 300)->save($thumbnailpath);

            //Resize image small
            $thumbnailpath = public_path('storage/posts/small_'.$filenametostore);
            Image::make($thumbnailpath)->resize(150, 100)->save($thumbnailpath);

        } else{
            $filenametostore = 'default.jpg';
        }

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->text = $request->text;

        $post->img = 'big_'.$filenametostore;
        $post->img_small = 'small_'.$filenametostore;

        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Рецепт «'.$post->title.'» добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return redirect(route('single.post', $post->slug), 301);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $all_categories = Category::all();

        $categories = [];
        foreach ($all_categories as $category){
            $categories[$category->id] = $category->title;
        }

        $post = Post::whereSlug($slug)->firstOrFail();
        return view('admin.posts.edit')->with('post', $post)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'description' => 'required|max:100',
            'text' => 'required',
            'slug' => 'required|max:191',
            'img' => 'image|nullable|max:1999'
        ]);

        $post = Post::whereSlug($slug)->firstOrFail();

        if ($request->hasFile('img')) {

            //get file extension
            $extension = $request->file('img')->getClientOriginalExtension();

            //filename to store
            $filenametostore = time() . '.' . $extension;

            //Upload File
            $request->file('img')->storeAs('public/posts/', 'big_' . $filenametostore);
            $request->file('img')->storeAs('public/posts/', 'small_' . $filenametostore);

            //Resize image big
            $thumbnailpath = public_path('storage/posts/big_' . $filenametostore);
            Image::make($thumbnailpath)->resize(450, 300)->save($thumbnailpath);

            //Resize image small
            $thumbnailpath = public_path('storage/posts/small_' . $filenametostore);
            Image::make($thumbnailpath)->resize(150, 100)->save($thumbnailpath);

            //Del images
            $oldImg = $post->img;
            if ($post->img != 'big_default.jpg'){
                Storage::delete('public/posts/' . $oldImg);
            }
            $oldImgSmall = $post->img_small;
            if ($post->img_small != 'small_default.jpg'){
                Storage::delete('public/posts/' . $oldImgSmall);
            }

        } else {
            $filenametostore = 'default.jpg';
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $request->slug;
        $post->text = $request->text;
        $post->category_id = $request->category_id;
        $post->img = 'big_'.$filenametostore;
        $post->img_small = 'small_'.$filenametostore;

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Рецепт «'.$post->title.'» обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        $post_id = $post->id;

        //Del images
        $oldImg = $post->img;
        if ($post->img != 'big_default.jpg'){
            Storage::delete('public/posts/' . $oldImg);
        }
        $oldImgSmall = $post->img_small;
        if ($post->img_small != 'small_default.jpg'){
            Storage::delete('public/posts/' . $oldImgSmall);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Рецепт «'.$post->title.'» удален!');
    }
}