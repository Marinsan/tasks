<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedUserTagsController extends Controller
{
    public function index()
    {
        $tags = optional(Auth::user())->tags;
        return view('tags.user.index', compact('tags'));
    }
}
