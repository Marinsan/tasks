<?php


namespace App\Http\Controllers;


use App\Task;
use Illuminate\Http\Request;

class TasksCompletedController
{

    public function destroy(Request $request, Task $task)
    {
        $task->completed =  false;
        $task->save();
        return redirect('/tasks');
    }

    public function store(Request $request, Task $task)
    {
        $task->completed = true;
        $task->save();
        return redirect('/tasks');
    }
}