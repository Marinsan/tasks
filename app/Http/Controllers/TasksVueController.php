<?php

namespace App\Http\Controllers;


use App\Task;

class TasksVueController
{
    public function index()
    {
        $tasks = Task::orderBy('created_at','desc')->get();
        return view('tasks_vue',
        compact('tasks'));
    }
}