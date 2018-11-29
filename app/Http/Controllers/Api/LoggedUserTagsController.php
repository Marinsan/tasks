<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedUserTagsController extends Controller
{
    public function index(Request $request)
    {
        return map_collection($request->user()->tags);
    }

    public function store(Request $request, Tag $tag)
    {
        $tag = Tag::create($request->only(['name','color','description','user_id']));
        Auth::user()->addTag($tag);
        $tag->refresh();
        return $tag;

    }

    public function destroy(Request $request, Tag $tag)
    {
        Auth::user()->tags()->findOrFail($tag->id);
        $tag->delete();

    }

    public function update(Request $request, Tag $tag)
    {

        Auth::user()->tags()->whereOrFail($tag->id);

        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->color = $request->color;
        $tag->save();
        return $tag;

    }
}
