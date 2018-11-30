<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompleteTask;
use App\Http\Requests\UncompleteTask;
use App\Task;
use Illuminate\Http\Request;

class TasksCompletedController extends Controller
{
    public function store(CompleteTask $request, Task $task)
    {
        $task->completed = true;
        $task->save();
    }
    public function destroy(UncompleteTask $request, Task $task)
    {
        $task->completed = false;
        $task->save();
    }
}
