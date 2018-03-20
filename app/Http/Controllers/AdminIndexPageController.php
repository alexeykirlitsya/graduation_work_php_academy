<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminIndexPageController extends Controller
{
    public function showAdminPage()
    {
        return view('admin.index_page');
    }
}
