<?php


use App\Tag;
use App\Task;
use App\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

if (!function_exists('create_primary_user')) {
    function create_primary_user() {
        $user = User::where('email', 'cristianmarin@iesebre.com')->first();
        if (!$user) {
            $user = User::firstOrCreate([
                'name' => 'Cristian Marin Tejeda',
                'email' => 'cristianmarin@iesebre.com',
                'password' => bcrypt(env('PRIMARY_USER_PASSWORD','123456'))
            ]);
            $user->admin = true;
            $user->save();
        }
    }
}

    if (!function_exists('create_example_tasks')) {
        function create_example_tasks()
        {
            Task::create([
                'name' => 'comprar pa',
                'description' => ' tasca comprar pa',
                'completed' => false,
                'user_id' => 1
            ]);
            Task::create([
                'name' => 'comprar llet',
                'description' => ' tasca comprar llet',
                'completed' => false,
                'user_id' => 1
            ]);
            Task::create([
                'name' => 'Estudiar PHP',
                'description' => ' tasca comprar estudiar php',
                'completed' => true,
                'user_id' => 1
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

if (!function_exists('create_mysql_database')) {

    function create_mysql_database($name) {

        $statement = "CREATE DATABASE IF NOT EXISTS $name";
        DB::connection('mysqlroot')->getPdo()->exec($statement);

    }
}

if (!function_exists('drop_mysql_database')) {

    function drop_mysql_database($name) {

        $statement = "DROP DATABASE IF NOT EXISTS $name";
        DB::connection('mysqlroot')->getPdo()->exec($statement);

    }
}

if (!function_exists('create_mysql_user')) {

    function create_mysql_user($name,$password = null,$host = 'localhost') {

        if(!$password) $password = str_random();
        $statement = "CREATE USER IF NOT EXISTS {$name}@{$host}";
        DB::connection('mysqlroot')->getPdo()->exec($statement);

        $statement = "ALTER USER '{$name}'@'{$host}' IDENTIFIED BY '{$password}'";
        DB::connection('mysqlroot')->getPdo()->exec($statement);
        return $password;
    }
}

if (!function_exists('grant_mysql_privileges')) {

    function grant_mysql_privileges($user,$database,$host = 'localhost') {

        $statement = "GRANT ALL PRIVILEGES ON {$database}.* TO '{$user}'@'{$host}' WITH GRANT OPTION";
        DB::connection('mysqlroot')->getPdo()->exec($statement);

        $statement = "FLUSH PRIVILEGES";
        DB::connection('mysqlroot')->getPdo()->exec($statement);
    }
}

if (!function_exists('create_database')) {

    function create_database() {
        create_mysql_database(env('DB_DATABASE'));
        create_mysql_user(env('DB_USERNAME'),env('DB_PASSWORD'));
        grant_mysql_privileges(env('DB_USERNAME'),env('DB_DATABASE'));
    }
}

if (!function_exists('initialize_roles')) {

    function initialize_roles() {
        //crear rols

        try {
            $taskManager = Role::create([
                'name' => 'TasksManager'
            ]);

        }catch (Exception $e){

        }

        try {
            $task = Role::create([
                'name' => 'Tasks'
            ]);
        } catch (Exception $e){

        }



        // crear permisios

        // crud tasques
        try {
            Permission::create([
                'name' => 'tasks.index'
            ]);
            Permission::create([
                'name' => 'tasks.show'
            ]);
            Permission::create([
                'name' => 'tasks.store'
            ]);
            Permission::create([
                'name' => 'tasks.update'
            ]);
            Permission::create([
                'name' => 'tasks.complete'
            ]);
            Permission::create([
                'name' => 'tasks.uncomplete'
            ]);
            Permission::create([
                'name' => 'tasks.destroy'
            ]);


            // crud tasques dun usuari
            Permission::create([
                'name' => 'user.tasks.index'
            ]);
            Permission::create([
                'name' => 'user.tasks.show'
            ]);
            Permission::create([
                'name' => 'user.tasks.store'
            ]);
            Permission::create([
                'name' => 'user.tasks.update'
            ]);
            Permission::create([
                'name' => 'user.tasks.destroy'
            ]);

        } catch (Exception $e){

        }

        try {

            $taskManager -> givePermissionTo('task.index');
            $taskManager -> givePermissionTo('task.show');
            $taskManager -> givePermissionTo('task.store');
            $taskManager -> givePermissionTo('task.update');
            $taskManager -> givePermissionTo('task.complete');
            $taskManager -> givePermissionTo('task.uncomplete');
            $taskManager -> givePermissionTo('task.destroy');


            $task -> givePermissionTo('user.task.index');
            $task -> givePermissionTo('user.task.show');
            $task -> givePermissionTo('user.task.store');
            $task -> givePermissionTo('user.task.update');
            $task -> givePermissionTo('user.task.complete');
            $task -> givePermissionTo('user.task.uncomplete');
            $task -> givePermissionTo('user.task.destroy');

        } catch (Exception $e) {

        }

    }
}


if (!function_exists('sample_users')) {

    function sample_users()
    {

        try {
            $pepepringao = factory(User::class)->create([
                'name' => 'Pepe Pringao',
                'email' => 'pringao@iesebre.com'
            ]);
        } catch (Exception $e) {

        }

        try {
            $bartsimpson = factory(User::class)->create([
                'name' => 'Bart Simpson',
                'email' => 'bart@iesebre.com'
            ]);

        } catch (Exception $e) {

        }

        try {
            $bartsimpson->assingRole('Tasks');
        } catch (Exception $e) {

        }

        try {

            $homersimpson = factory(User::class)->create([
                'name' => 'Homer Simpson',
                'email' => 'homer@iesebre.com'
            ]);

        } catch (Exception $e) {

        }

        try {
            $homersimpson->assingRole('TasksManager');
        } catch (Exception $e) {

        }

        try {

            $sergitur = factory(User::class)->create([
                'name' => 'Sergi Tur Badenas',
                'email' => 'sergiturbadenas@gmail.com',
                'password' => bcrypt(env('PRIMARY_USER_PASSWORD','secret'))
            ]);

        } catch (Exception $e) {

        }

        try {
            $sergitur->assingRole('TasksManager');
        } catch (Exception $e) {

        }
    }
}


// todo crear multiples usuaris amb diferents rols
// todo com gestionar el superadmin

