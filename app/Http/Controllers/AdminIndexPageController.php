<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminIndexPageController extends Controller
{
    public function show()
    {
        return view('admin.index_page');
    }
}
