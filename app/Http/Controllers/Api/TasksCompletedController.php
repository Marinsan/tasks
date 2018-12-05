<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompleteTask;
use App\Http\Requests\UncompleteTask;
use App\Task;
use Illuminate\Http\Request;

class TasksCompletedController extends Controller
{
    public function store(CompleteTask $request)
    {
        $request->completed = true;
        $request->save();
    }
    public function destroy(UncompleteTask $request)
    {
        $request->completed = false;
        $request->save();
    }
}
