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
    'admin_user_mobile' => env('NEXMO_MOBILE'),
    'admin_user_name' => env('ADMIN_USER_NAME','Cristian Marin Tejeda'),
    'admin_user_password' => env('ADMIN_USER_PASSWORD','7c4a8d09ca3762af61e59520943dc26494f8941b'),
    'admin_user_name_on_tasks' => env('ADMIN_USER_NAME_ON_TASKS','Cristian Marin Tejeda'),
    'admin_user_email_on_tasks' => env('ADMIN_USER_EMAIL_ON_TASKS','cristianmarin@iesebre.com'),
    'admin_username_password_on_tasks' => env('ADMIN_USER_PASSWORD_ON_TASKS','7c4a8d09ca3762af61e59520943dc26494f8941b'),

    'salt' => env('TASKS_SALT','Your random salt here'),
];