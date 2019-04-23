<?php

namespace App\Http\Controllers\Api;

use App\Events\TaskCompleted;
use App\Events\TaskUncompleted;
use App\Http\Requests\UserTagsDestroy;
use App\Http\Requests\UserTasksComplete;
use App\Http\Requests\UserTasksUncomplete;
use App\Http\Requests\UserTasksUpdate;
use App\Task;
use Illuminate\Http\Request;

class CompletedTasksController
{
    public function destroy(UserTagsDestroy $request, Task $task)
    {
        $task->completed=false;
        $task->save();
        // HOOK -> EVENT
        event(new TaskUncompleted($task));
    }

    public function store(UserTasksUncomplete $request, Task $task)
    {
        $task->completed=true;
        $task->save();
        event(new TaskCompleted($task));
    }
}
