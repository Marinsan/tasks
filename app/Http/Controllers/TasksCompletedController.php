<?php


namespace App\Http\Controllers;


use App\Task;
use Illuminate\Http\Request;
class TasksCompletedController
{
    public function destroy(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->completed = "0";
        $task->save();
        return redirect('/tasks');
    }

    public function store(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->completed = "1";
        $task->save();
        return redirect('/tasks');
    }
}