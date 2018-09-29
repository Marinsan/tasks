<?php
namespace App\Http\Controllers;


class People extends Controller
{
    public function index(){
        $people = People::all();
        return view('people.index', ['people' => $people]);
    }
}