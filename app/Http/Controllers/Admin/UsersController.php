<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function getAllUsers()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with('users', $users);
    }
}