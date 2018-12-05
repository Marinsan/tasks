<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyTag;
use App\Http\Requests\IndexTag;
use App\Http\Requests\ShowTag;
use App\Http\Requests\StoreTag;
use App\Http\Requests\UpdateTag;
use App\Http\Requests\UserTagsDestroy;
use App\Http\Requests\UserTagsIndex;
use App\Http\Requests\UserTagsShow;
use App\Http\Requests\UserTagsStore;
use App\Http\Requests\UserTasksUpdate;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function index(UserTagsIndex $request)
    {
        $tags = map_collection(Tag::orderBy('created_at','desc')->get());
        return $tags;
    }
    public function show(UserTagsShow $request, Tag $tag) // Route Model Binding
    {
        return $tag->map();

    }
    public function destroy(UserTagsDestroy $request, Tag $tag)
    {
        $tag->delete();
    }
    public function store(UserTagsStore $request)
    {

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->color = $request->color;
        $tag->description = $request->description;
        $tag->save();
        return $tag->map();
    }
    public function update(UserTasksUpdate $request, Tag $tag)
    {

        $tag->name = $request->name;
        $tag->color = $request->color;
        $tag->description = $request->description;
        $tag->save();
        return $tag->map();
    }
}
