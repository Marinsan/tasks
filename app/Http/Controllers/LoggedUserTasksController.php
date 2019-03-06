<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedUserTasksController extends Controller
{
    public function index()
    {
        $tasks = optional(Auth::user())->tasks;
        $tags = map_collection(Tag::all());
        return view('tasks.user.index',compact('tasks','tags'));

    }
}
