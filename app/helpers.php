<?php


use App\Tag;
use App\Task;
use App\User;

if (!function_exists('create_primary_user')) {
    function create_primary_user() {
        $user = User::where('email', 'cmarin@iesebre.com')->first();
        if (!$user) {
            User::firstOrCreate([
                'name' => 'Cristian Marin Tejeda',
                'email' => 'cmarin@iesebre.com',
                'password' => bcrypt(env('PRIMARY_USER_PASSWORD','123456'))
            ]);
        }
    }
}

    if (!function_exists('create_example_tasks')) {
        function create_example_tasks()
        {
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

if (!function_exists('create_example_tags')) {
    function create_example_tags()
    {
        Tag::create([
            'name' => 'Tag1',
            'description' => 'Aquest es el tag1',
            'color' => '#111113'
        ]);
        Tag::create([
            'name' => 'Tag2',
            'description' => 'Aquest es el tag2',
            'color' => '#111111'
        ]);
        Tag::create([
            'name' => 'Tag3',
            'description' => 'Aquest es el tag3',
            'color' => '#111112'
        ]);
    }
}
