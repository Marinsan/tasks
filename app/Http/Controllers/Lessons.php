<?php

namespace App\Http\Controllers;


use App\Lesson;

class Lessons
{
    public function index(){
        $lessons = Lesson::all();
        return view('lessons.index', ['lessons' => $lessons]);
    }
}