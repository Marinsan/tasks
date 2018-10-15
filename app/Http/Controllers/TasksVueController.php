<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 9/10/18
 * Time: 20:48
 */

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