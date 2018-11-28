<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTag;
use App\Http\Requests\UpdateTag;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function index(Request $request)
    {
        return Tag::orderBy('created_at','desc')->get();
    }
    public function show(Request $request, Tag $tag) // Route Model Binding
    {
        return $tag->map();
//        return Task::findOrFail($request->task);
    }
    public function destroy(Request $request, Tag $tag)
    {
        $tag->delete();
    }
    public function store(StoreTag $request)
    {

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->color = $request->color;
        $tag->save();
        return $tag->map();
    }
    public function update(UpdateTag $request, Tag $tag)
    {

        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->color = $request->color;
        $tag->save();
        return $tag->map;
    }
}
