<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    public function show()
    {
        return view('pages.page');
    }

    public function about()
    {
        return view('pages.all.about');
    }

    public function contact()
    {
        return view('pages.all.contact');
    }
}
