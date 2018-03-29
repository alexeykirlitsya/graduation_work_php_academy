<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'description' => 'required|max:2000'
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Новая категория «'.$request->title.'» добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        return redirect(route('category.page', $category->slug), 301);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        return view('admin.categories.edit')->with('category', $category);
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
            'slug' => 'required|max:191',
            'description' => 'required|max:2000'
        ]);

        $category = Category::whereSlug($slug)->firstOrFail();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Категория «'.$request->title.'» обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $category_id = $category->id;

        //change post category, when category destroy
        Post::whereCategoryId($category_id)->update(['category_id' => null]);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Категория «'.$category->title.'» удалена!');
    }
}