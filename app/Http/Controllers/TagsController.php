<?php

namespace App\Http\Controllers;


use App\Http\Requests\TagsIndex;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    public function index(TagsIndex $request)
    {
        $tags = map_collection(Tag::orderBy('created_at','desc')->get());
        $uri = '/api/v1/tags';
        return view('tags', compact('tags', 'uri'));

    }
}