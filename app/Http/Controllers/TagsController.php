<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserTagsIndex;
use App\Tag;


class TagsController extends Controller
{
    public function index(UserTagsIndex $request)
    {
        $tags = map_collection(Tag::orderBy('created_at','desc')->get());
        $uri = '/api/v1/tags';
        return view('tags', compact('tags', 'uri'));

    }
}