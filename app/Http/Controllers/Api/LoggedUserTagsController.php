<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserTagsDestroy;
use App\Http\Requests\UserTagsIndex;
use App\Http\Requests\UserTagsStore;
use App\Http\Requests\UserTagsUpdate;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedUserTagsController extends Controller
{
    public function index(UserTagsIndex $request)
    {
        return map_collection($request->user()->tags);
    }

    public function store(UserTagsStore $request, Tag $tag)
    {
        $tag = Tag::create($request->only(['name','color','description','user_id']));
        Auth::user()->addTag($tag);
        $tag->refresh();
        return $tag;

    }

    public function destroy(UserTagsDestroy $request, Tag $tag)
    {
        Auth::user()->tags()->findOrFail($tag->id);
        $tag->delete();

    }

    public function update(UserTagsUpdate $request, Tag $tag)
    {

        Auth::user()->tags()->whereOrFail($tag->id);

        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->color = $request->color;
        $tag->save();
        return $tag;

    }
}
