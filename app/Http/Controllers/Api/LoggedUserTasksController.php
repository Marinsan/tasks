<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserTasksDestroy;
use App\Http\Requests\UserTasksIndex;
use App\Http\Requests\UserTasksStore;
use App\Http\Requests\UserTasksUpdate;
use App\Task;
use Illuminate\Support\Facades\Auth;

class LoggedUserTasksController extends Controller
{
    public function index(UserTasksIndex $request)
    {
        return map_collection($request->user()->tasks);
    }

    public function store(UserTasksStore $request, Task $task)
    {
        $task = Task::create($request->only(['name','completed','description','user_id']));
        Auth::user()->addTask($task);
       // $task->refresh();
        return $task;

    }

    public function destroy(UserTasksDestroy $request, Task $task)
    {
        Auth::user()->tasks()->findOrFail($task->id);
        $task->delete();

    }

    public function update(UserTasksUpdate $request, Task $task)
    {

        Auth::user()->tasks()->whereOrFail($task->id);

        $task->name = $request->name;
        $task->description = $request->description;
        $task->completed = $request->completed;
        $task->save();
        return $task;

    }
}
