<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;

class IndexPageController extends Controller
{
    public function showHomePage()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        return view('pages.index')->with('posts', $posts);
    }

    public function showContactPage()
    {
        return view('pages.contact');
    }

    public function postContactPage(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'topic' => 'required|min:5|max:100',
            'message' => 'required|min:10'
        ]);

        $email = $request->email;
        $topic = $request->topic;
        $message = $request->message;

        Mail::to('alexeykirlitsya@gmail.com')->send(new Contact($topic, $message, $email));
        return redirect()->route('contact.page')->with('success', 'Ваше письмо было успешно отправлено!');
    }

    public function showCategoryPage($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();

        //get the category id, because in the beginning, get the slug
        $category_id = $category->id;

        //choose all posts of category
        $posts = Post::with('category')->where('category_id','=', $category_id)->paginate(10);
        return view('category.index')->with('category', $category)->with('posts', $posts);
    }

    public  function showSinglePage($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        return view('page.show')->with('page', $page);
    }

    public  function showPostPage($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $last_posts = Post::orderBy('id', 'desc')->limit(5)->get();
        //$last_posts = Post::take(3)->get();
//        dd($last_posts);
        return view('post.show')->with('post', $post)->with('last_posts', $last_posts);
    }
}