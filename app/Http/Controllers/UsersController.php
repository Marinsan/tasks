<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsersIndex;
use App\User;
use Illuminate\Http\Request;
class UsersController extends Controller

{
    public function index(UsersIndex $request)
    {
        $users = User::all();
        return view('users.index', compact(['users']));
    }
}