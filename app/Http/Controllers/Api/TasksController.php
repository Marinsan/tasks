<?php

namespace App\Http\Controllers\Api;

use App\Events\TaskDelete;
use App\Events\TaskStored;
use App\Events\TaskUpdate;
use App\Http\Requests\TaskDestroy;
use App\Http\Requests\StoreTask;
use App\Http\Requests\TaskIndex;
use App\Http\Requests\TaskShow;
use App\Http\Requests\UpdateTask;
use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
        // event(new TaskDelete($task, Auth::user()));
    }
    public function store(StoreTask $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->completed = $request->completed;
        $task->description = $request->description;
        $task->user_id = $request->user_id;
        $task->save();
        event(new TaskStored($task, Auth::user()));
        return $task->map();
    }

    public function update(UpdateTask $request, Task $task)
    {
        $task_old = $task;
        $task->name = $request->name;
        $task->completed = $request->completed;
        $task->user_id = $request->user_id;
        $task->description = $request->description;
        $task->save();
        event(new TaskUpdate($task_old, $task, Auth::user()));
        return $task->map();
    }
}
