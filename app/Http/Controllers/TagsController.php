<?php

namespace App\Http\Controllers;


use App\Tag;

class TagsController
{
    public function index()
    {
        $tags = map_collection(Tag::orderBy('created_at','desc')->get());
        return view('tags',
        compact('tags'));
    }
}