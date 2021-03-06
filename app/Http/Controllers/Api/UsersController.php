<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{

    public function index(Request $request)
    {
        return map_collection(User::all());
    }

}
