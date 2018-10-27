<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

class TasksCompletedController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $task->completed = true;
        $task->save();
    }
    public function destroy(Request $request, Task $task)
    {
        $task->completed = false;
        $task->save();
    }
}
