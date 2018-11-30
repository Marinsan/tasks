<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserTagsIndex;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    public function index(UserTagsIndex $request)
    {
        $tags = [];
        if(Auth::user()->isSuperAdmin() || Auth::user()->hasRole('TagsManager')) {
            $tags = map_collection(Tag::orderBy('created_at','desc')->get());
        } else {
            $tags = map_collection($request->user()->tags);
        }

        $users = User::all();
        return view('tags', compact('tags','users'));

    }
}