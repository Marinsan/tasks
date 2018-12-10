<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTask;
use App\Http\Requests\TaskDestroy;
use App\Http\Requests\TaskIndex;
use App\Http\Requests\TaskShow;
use App\Http\Requests\UpdateTask;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{

    public function index(TaskIndex $request)
    {
        return map_collection(Task::orderBy('created_at','desc')->get());
    }
    public function show(TaskShow $request, Task $task) // Route Model Binding
    {
        return $task->map();
//        return Task::findOrFail($request->task);
    }
    public function destroy(TaskDestroy $request, Task $task)
    {

        $task->delete();
    }
    public function store(StoreTask $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->completed = $request->completed;
        $task->description = $request->description;
        $task->user_id = $request->user_id;
        $task->save();
        return $task->map();
    }
    public function update(UpdateTask $request, Task $task)
    {
        $task->name = $request->name;
        $task->completed = $request->completed;
        $task->description = $request->description;
        $task->user_id = $request->user_id;
        $task->save();
        return $task->map();
    }
}
