<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks',['tasks' => $tasks]);
    }

    public function store(Request $request)
    {

        // Request::
        Task::create([
            'name' => $request->name,
            'completed' => false
        ]);

        // Retornar a tasks
        return redirect()->back();
    }

    public function destroy(Rerquest $request)
    {
        dd($request->id);
        $task = Task::findOrFail($request->id);
        $task->delete();

        return redirect()->back();
    }
}
