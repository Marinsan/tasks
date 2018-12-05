<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserTasksComplete;
use App\Http\Requests\UserTasksUncomplete;
use App\Task;

class LoggedUserTasksCompletedController extends Controller
{
    public function store(UserTasksComplete $request, Task $task)
    {
        $task->completed = true;
        $task->save();
    }
    public function destroy(UserTasksUncomplete $request, Task $task)
    {
        $task->completed = false;
        $task->save();
    }
}
