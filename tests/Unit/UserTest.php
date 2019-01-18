<?php


namespace Tests\Unit;


use App\Avatar;
use App\Photo;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function assignPhoto()
    {
        $user = factory(User::class)->create();
        $this->assertNull($user->photo);
        $photo = Photo::create([
            'url' => '/photo1.png',
        ]);
        $user->assignPhoto($photo);
        $user = $user->fresh();
        $this->assertNotNull($user->photo);
        $this->assertEquals('/photo1.png',$user->photo->url);
        $this->assertEquals($user->id,$user->photo->user_id);
    }

    /**
     * @test
     */
    public function addAvatar()
    {
        $user = factory(User::class)->create();
        $this->assertCount(0,$user->avatars);
        $avatar = Avatar::create([
            'url' => '/avatar.png',
        ]);
        $user->addTask($avatar);
        $user = $user->fresh();
        $this->assertCount(1,$user->avatars);
        $this->assertEquals('/avatar.png',$user->avatars[0]->url);
        $this->assertEquals($user->id,$user->avatars[0]->id);
    }




    /**
     * @test
     */

    public function user_can_have_tasks()
    {
        // 1 Prepare
        $user = factory(User::class)->create();
        $task1 = factory(Task::class)->create();
        $task2 = factory(Task::class)->create();
        $task3 = factory(Task::class)->create();

        $user->addTask($task1);
        $user->addTask($task2);
        $user->addTask($task3);

        // 2 Executar
        $tasks = $user->tasks;

        // 3 Comprovar
        $this->assertTrue($tasks[0]->is($task1));
        $this->assertTrue($tasks[1]->is($task2));
        $this->assertTrue($tasks[2]->is($task3));
    }

    /**
     * @test
     */

    public function user_tasks_returns_null_when_no_tasks()
    {
        // 1 Prepare
        $user = factory(User::class)->create();

        // 2 Executar
        $tasks = $user->tasks;

        // 3 Comprovar
        $this->assertEmpty($tasks);
    }

    /**
     * @test
     */
    public function can_add_task_to_user()
    {
        $user = factory(User::class)->create();
        $task = factory(Task::class)->create();

        $user->addTask($task);

        // 2 Executar
        $tasks = $user->tasks;

        // 3 Comprovar
        $this->assertTrue($tasks[0]->is($task));

    }

    /**
     * @test
     */
    public function can_add_tasks_to_user()
    {
        $user = factory(User::class)->create();
        $task = factory(Task::class)->create();
        $user->addTask($task);
        //2
        $tasks = $user->tasks;
        // 3
        $this->assertTrue($tasks[0]->is($task));
    }

    /*
     * @test
     */

    public function haveTask()
    {
        //$user->haveTask();

    }

    /*
     * @test
     */
    public function removeTask()
    {

        //$user->removeTask();

    }

    /**
     * @test
     */
    public function isSuperAdmin()
    {

        $user = factory(User::class)->create();


        $this->assertFalse($user->isSuperAdmin());
        $user->admin = true;
        $user->save();
        $this->assertTrue($user->isSuperAdmin());

    }

    /**
     * @test
     */

    public function map()
    {
        $user = factory(User::class)->create([
            'name' => 'Pepe Pardo Jeans',
            'email' => 'pepepardo@jeans.com',
//           Accessors i mutators
        ]);
        $mappedUser = $user->map();
        $this->assertEquals($mappedUser['id'],1);
        $this->assertEquals($mappedUser['name'],'Pepe Pardo Jeans');
        $this->assertEquals($mappedUser['email'],'pepepardo@jeans.com');
        $this->assertEquals($mappedUser['gravatar'],'https://www.gravatar.com/avatar/6849ef9c40c2540dc23ad9699a79a2f8');
        $this->assertEquals($mappedUser['admin'],0);
        $this->assertCount(0,$mappedUser['permissions']);
        $user->admin = true;
        $user->save();
        $rol1 = Role::create([
            'name' => 'Rol1'
        ]);
        $rol2 = Role::create([
            'name' => 'Rol2'
        ]);
        $permission1 = Permission::create([
            'name' => 'Permission1'
        ]);
        $permission2 = Permission::create([
            'name' => 'Permission2'
        ]);
        $user->givePermissionTo($permission1);
        $user->givePermissionTo($permission2);
        $user->assignRole($rol1);
        $user->assignRole($rol2);
        $user = $user->fresh();
        $mappedUser = $user->map();
        $this->assertCount(2,$mappedUser['roles']);
        $this->assertCount(2,$mappedUser['permissions']);
        $this->assertEquals($mappedUser['admin'],true);
        $this->assertEquals($mappedUser['roles'][0],'Rol1');
        $this->assertEquals($mappedUser['roles'][1],'Rol2');
        $this->assertEquals($mappedUser['permissions'][0],'Permission1');
        $this->assertEquals($mappedUser['permissions'][1],'Permission2');
    }

    /**
     * @test
     */

    public function regulars()
    {

        $this->assertCount(0,User::regular()->get());

        $user1 = factory(User::class)->create([
            'name' => 'Pepe Pardo Jeans',
            'email' => 'pepepardo@jeans.com'
        ]);
        $user2 = factory(User::class)->create([
            'name' => 'Pepa Parda Jeans',
            'email' => 'pepaparda@jeans.com'
        ]);
        $user3 = factory(User::class)->create([
            'name' => 'Pepa Pig',
            'email' => 'pepapig@dibus.com'
        ]);
        $user3->admin = true;
        $user3->save();
        $this->assertCount(2,$regularusers=User::regular()->get());
        $this->assertEquals($regularusers[0]->name,'Pepe Pardo Jeans');
        $this->assertEquals($regularusers[1]->name,'Pepa Parda Jeans');


    }
}