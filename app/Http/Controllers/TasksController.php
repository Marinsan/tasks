<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index',['tasks' => $tasks]);
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

    public function destroy(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->destroy($request->id);
        return redirect()->back();
    }

    public function update($id, Request $request){
        $task = Task::findOrFail($id);
        $input = $request->all();
        $task->completed = false;
        $task->fill($input)->save();
        return redirect()->route('tasks.index');
        // Models -< Equals -> ORM hibernate de java object relational model
    }


    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', ['tasks' => $task]);
    }

    public function complete(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->completed = true;
        $task->save();
        return redirect('/tasks');
    }
}