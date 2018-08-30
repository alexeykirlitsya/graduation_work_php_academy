<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $pages = Page::count();
        $categories = Category::count();
        $posts = Post::count();
        $comments = Comment::count();
        $users = User::count();

        return view('admin.index_page', compact('pages', 'categories', 'posts', 'comments', 'users'));
    }
}