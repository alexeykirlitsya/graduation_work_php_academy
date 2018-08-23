<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\User;
use App\Mail\Contact;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Comment;
use Purifier;

class IndexPageController extends Controller
{
    //1. Home page - index
    public function showHomePage()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        $comments = Comment::OrderBy('id', 'desc')->limit(5)->get();
        return view('pages.index', compact('posts','comments'));
    }

    //2. Contact page show
    public function showContactPage()
    {
        return view('pages.contact');
    }

    //3. Contact page post
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

    //4. Category single page
    public function showCategoryPage($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();

        //get the category id, because in the beginning, get the slug
        $category_id = $category->id;

        //choose all posts of category
        $posts = Post::with('category')->where('category_id','=', $category_id)->paginate(10);
        return view('category.index', compact('category', 'posts'));
    }

    //5. Page single
    public  function showSinglePage($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        return view('page.show', compact('page'));
    }

    //6. Post single page
    public  function showPostPage($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $last_posts = Post::orderBy('id', 'desc')->limit(5)->get();

        return view('post.show',compact('post','last_posts'));
    }

    //7. Comment request in the single post page
    public function postCommentsPost(Request $request)
    {
        $this->validate($request,[
            'title' => 'max:100',
            'email' => 'email|max:191',
            'comment' => 'required|min:5|max:2000',
        ]);

        $post_id = $request->post_id;
        $post = Post::find($post_id);
        $comment = new Comment();
        $comment->title = Purifier::clean($request->title);
        $comment->title = substr($comment->title, 3); // teg '<p>' author name
        $comment->title = substr($comment->title, 0,-4); // teg '</p>' author name
        $comment->email = $request->email;

        //name and email auth users
        if(!Auth::guest()){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $comment->title = $user->name;
            $comment->email = $user->email;
        }

        $comment->comment = Purifier::clean($request->comment);
        $comment->post()->associate($post);

        $comment->save();

        return redirect()->route('post.page',$post->slug)->with('success', 'Комментарий успешно добавлен');
    }

    //8. Search
    public function search(Request $searchKey)
    {
        $searchKey = $searchKey->search;
        $posts = Post::search($searchKey)->paginate(5);
        return view('search.index', compact('posts'));
    }
}