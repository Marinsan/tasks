<?php


use App\Task;

if (!function_exists('create_exemple_tasks')){
    function create_exemple_tasks() {
        Task::create([
            'name' => 'comprar pa',
            'completed' => false
        ]);
        Task::create([
            'name' => 'comprar llet',
            'completed' => false
        ]);
        Task::create([
            'name' => 'Estudiar PHP',
            'completed' => true
        ]);
    }
}