<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class GamesController extends Controller

{
    public function index(Request $request)
    {
        return view('games.index');
    }
}