<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTasksIndex;
use App\Tag;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TasquesController extends Controller
{
    public function index(UserTasksIndex $request)
    {

        if (Auth::user()->can('tasks.manage')) {
            $tasks = map_collection(Task::with('user', 'tags')->orderBy('created_at', 'desc')->get());
            $uri = '/api/v1/tasks';
        } else {
            $tasks = map_collection($request->user()->tasks);
            $uri = '/api/v1/user/tasks';
        }
        $users = map_simple_collection(User::with('roles','permissions')->get());
        $tags = map_collection(Tag::all());
        Cache::rememberForever(Task::TASKS_CACHE_KEY, function () {
            if (Auth::user()->can('tasks.manage')) {
                return $tasks = map_collection(Task::with('user', 'tags')->orderBy('created_at', 'desc')->get());
            } else {
                return $tasks = map_collection(Auth::user()->tasks);
            }
        });
        return view('tasques', compact('tasks', 'users', 'uri', 'tags'));

    }

    public function show(UserTasksIndex $request, Task $task)
    {
        $tags = Tag::all();
        $users = [Auth::user()];
        $task = $task->map();
        if(Auth::user()->can('tasks.manage')) {
            $users = map_collection(User::all());
        }
        return view('tasques_show', compact('task', 'tags', 'users'));
    }
}
