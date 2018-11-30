<?php

use App\Tag;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;
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
    function create_example_tasks() {
        $user1=factory(User::class)->create();
        Task::create([
            'name' => 'comprar pa',
            'completed' => false,
            'description' => 'comprarla a la gasolinera',
            'user_id' => $user1->id
        ]);
        Task::create([
            'name' => 'comprar llet',
            'completed' => false,
            'description' => 'comprarla a la gasolinera',
            'user_id' => $user1->id
        ]);
        Task::create([
            'name' => 'Estudiar PHP',
            'completed' => true,
            'description' => 'a casa a full',
            'user_id' => $user1->id
        ]);
    }
}

if (!function_exists('create_example_tags')) {
    function create_example_tags() {
        Tag::create([
            'name' => 'Tag1',
            'description' => 'Aquest es el tag1',
            'color' => '#04B404',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Tag2',
            'description' => 'Aquest es el tag2',
            'color' => '#04B100',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Tag3',
            'description' => 'Aquest es el tag3',
            'color' => '#02C404',
            'user_id' => 1
        ]);
    }
}

if (!function_exists('create_mysql_database')) {
    function create_mysql_database($name){
        //PDO
        //MYSQL: CREATE DATABASE IF NOT EXISTS $name
        $statement = "CREATE DATABASE IF NOT EXISTS $name";
        DB::connection('mysqlroot')->getPdo()->exec($statement);
    }
}

if (!function_exists('drop_mysql_database')) {
    function drop_mysql_database($name){
        //PDO
        //MYSQL: CREATE DATABASE IF NOT EXISTS $name
        $statement = "DROP DATABASE IF NOT EXISTS $name";
        DB::connection('mysqlroot')->getPdo()->exec($statement);
    }
}

if (!function_exists('create_mysql_user')) {
    function create_mysql_user($name, $password = null, $host = 'localhost'){
        if(!$password) $password = str_random();
        $statement = "CREATE USER IF NOT EXISTS {$name}@{$host}";
        DB::connection('mysqlroot')->getPdo()->exec($statement);
        $statement = "ALTER USER '{$name}'@'{$host}' IDENTIFIED BY '{$password}'";
        DB::connection('mysqlroot')->getPdo()->exec($statement);
        return $password;
    }
}

if (!function_exists('grant_mysql_privileges')) {
    function grant_mysql_privileges($user,$database,$host = 'localhost')
    {
        $statement = "GRANT ALL PRIVILEGES ON {$database}.* TO '{$user}'@'{$host}' WITH GRANT OPTION";
        DB::connection('mysqlroot')->getPdo()->exec($statement);
        $statement = "FLUSH PRIVILEGES";
        DB::connection('mysqlroot')->getPdo()->exec($statement);
    }
}

if (!function_exists('create_database')) {
    function create_database()
    {
        create_mysql_database(env('DB_DATABASE'));
        create_mysql_user(env('DB_USERNAME'),env('DB_PASSWORD'));
        grant_mysql_privileges(env('DB_USERNAME'),env('DB_DATABASE'));
    }
}

if (!function_exists('create_role')) {
    function create_role($role)
    {
        try {
            return Role::create([
                'name' => $role
            ]);
        } catch(Exception $e) {
            return Role::findByName($role);
        }
    }
}

if (!function_exists('create_permission')) {
    function create_permission($permission)
    {
        try {
            return Permission::create([
                'name' => $permission
            ]);
        } catch(Exception $e) {
            return Permission::findByName($permission);
        }
    }
}

if (!function_exists('initialize_roles')) {
    function initialize_roles() {
        $roles = [
            'TaskManager',
            'Tasks',
            'TagsManager',
            'Tags'
        ];
        foreach ($roles as $role) {
            create_role($role);
        }
        $taskManagerPermissions = [
            'tasks.index',
            'tasks.show',
            'tasks.store',
            'tasks.update',
            'tasks.complete',
            'tasks.uncomplete',
            'tasks.destroy'
        ];
        $tagsManagerPermissions = [
            'tags.index',
            'tags.show',
            'tags.store',
            'tags.update',
            'tags.complete',
            'tags.uncomplete',
            'tags.destroy'
        ];
        $userTaskPermissions = [
            'user.tasks.index',
            'user.tasks.show',
            'user.tasks.store',
            'user.tasks.update',
            'user.tasks.complete',
            'user.tasks.uncomplete',
            'user.tasks.destroy'
        ];
        $userTagsPermissions = [
            'user.tags.index',
            'user.tags.show',
            'user.tags.store',
            'user.tags.update',
            'user.tags.complete',
            'user.tags.uncomplete',
            'user.tags.destroy'
        ];
        $permissions = array_merge($taskManagerPermissions, $userTaskPermissions, $tagsManagerPermissions, $userTagsPermissions);
        foreach ($permissions as $permission) {
            create_permission($permission);
        }
        $rolePermissions = [
            'TaskManager' => $taskManagerPermissions,
            'Tasks' => $userTaskPermissions,
            'TagsManager' => $tagsManagerPermissions,
            'Tags' => $userTagsPermissions,
        ];
        foreach ($rolePermissions as $role => $rolePermission) {
            $role = Role::findByName($role);
            foreach ($rolePermission as $permission) {
                $role->givePermissionTo($permission);
            }
        }
    }
}

if (!function_exists('sample_users')) {
    function sample_users()
    {
        //superadmin no cal -> jo mateix

        try {
            factory(User::class)->create([
                'name' => 'Pepe Pringao',
                'email' => 'pepepringao@hotmail.com'
            ]);
        } catch (exception $e) {

        }

        try {
            $bartsimpson = factory(User::class)->create([
                'name' => 'Bart Simpson',
                'email' => 'bartsimpson@hotmail.com'
            ]);
        } catch (exception $e) {

        }

        try {
            $bartsimpson->assignRole('Tasks');
        } catch (exception $e) {

        }

        try {
            $homersimpson = factory(User::class)->create([
                'name' => 'Homer Simpson',
                'email' => 'homersimpson@hotmail.com'
            ]);
        } catch (exception $e) {

        }

        try {
            $homersimpson->assignRole('TaskManager');
        } catch (exception $e) {

        }

        try {
            $homersimpson->assignRole('Tasks');
        } catch (exception $e) {

        }
        try {
            $sergitur = factory(User::class)->create([
                'name' => 'Sergi Tur',
                'email' => 'sergiturbadenas@gmail.com',
                'password' => 'secret'
            ]);
            $sergitur->admin = true;
            $sergitur->save();
        } catch (exception $e) {

        }

        try {
            $sergitur->assignRole('TaskManager');
        } catch (exception $e) {

        }
    }
};

// TODO: crear multiples usuaris amb diferents rols
// TODO: Com gestionar el superadmin

if (!function_exists('map_collection')) {
    function map_collection($collection)
    {
        return $collection->map(function ($item) {
            return $item->map();
        });
    }
}

if (!function_exists('logged_user')) {
    function logged_user()
    {
        return json_encode(optional(Auth::user())->map());
    }
}