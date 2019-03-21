<?php

return [

    /*
    |--------------------------------------------------------------------------
    | MANAGER EMAIL
    |--------------------------------------------------------------------------
    |
    | Bla bla bla
    |
    */
    'manager_email' => env('TASKS_MANAGER_EMAIL', 'tasksmanager@miempresa.com'),

    /*
    |--------------------------------------------------------------------------
    | SALT
    |--------------------------------------------------------------------------
    |
    | Used with hashids.
    |
    */

    'admin_user_email' => env('ADMIN_USER_EMAIL','cristianmarin@iesebre.com'),
    'admin_user_name' => env('ADMIN_USER_NAME','Cristian Marin Tejeda'),
    'admin_user_password' => env('ADMIN_USER_PASSWORD','7c4a8d09ca3762af61e59520943dc26494f8941b'),

    'salt' => env('TASKS_SALT','Your random salt here'),
];