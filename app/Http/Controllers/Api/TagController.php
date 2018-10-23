<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        return Tag::orderBy('created_at','desc')->get();
    }

    public function store(Request $request, Tag $tag)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        return $tag;
    }


    public function show(Tag $tag)
    {
        return $tag;
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        $tag->save();
        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
    }
}
