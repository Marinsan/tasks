<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedUserTasksController extends Controller
{
    public function index()
    {
        return Auth::user()->tasks;
    }

    public function store(Request $request, Task $task)
    {
        return Auth::user()->tasks;
        $task = Request::create($request->only(['name','completed']));
        return Auth::user()->addTasks($task);

    }

    public function destroy(Request $request, Task $task)
    {
        $task->delete();
        return Auth::user()->removeTasks($task);

    }

    public function update(Request $request, Task $task)
    {
        Auth::user()->tasks()->whereOrFail($task->id);

        $task->name = $request->name;
        $task->completed = $request->completed;
        $task->save();

    }
}