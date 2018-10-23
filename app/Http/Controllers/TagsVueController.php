<?php

namespace App\Http\Controllers;


use App\Tag;

class TagsVueController
{
    public function index()
    {
        $tags = Tag::orderBy('created_at','desc')->get();
        return view('tags_vue',
        compact('tags'));
    }
}