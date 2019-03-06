<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyTag;
use App\Http\Requests\StoreTag;
use App\Http\Requests\TasksTagsUpdate;
use App\Tag;
use App\Task;
use Illuminate\Http\Request;

class TasksTagsController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param TasksTagsUpdate $request
     * @param $Task
     * @return void
     */
    public function update(TasksTagsUpdate $request, Task $task)
    {
        $mappedTags = collect($request->tags)->map(function ($tag) {
            if (is_int($tag)) return $tag;
            else {
                return Tag::create([
                    'color' => 'grey',
                    'name' => $tag,
                    'description' => ''
                ])->id;
            }
        });
        $task->addTags(Tag::find($mappedTags));
    }

    public function store(StoreTag $request, Task $task)
    {
        $tag = Tag::findOrFail($request->tag['id']);
        $task->addTag($tag);
        return $tag->map();
    }
    public function destroy(DestroyTag $request, Task $task)
    {
        $tag = Tag::findOrFail($request->tag['id']);
        $task->destroyTag($tag);
        return $tag->map();
    }

}
