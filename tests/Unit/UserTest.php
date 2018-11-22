<?php


namespace Tests\Unit;


use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
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
            'id' => '1',
            'name' => 'Pepe pardo jans',
            'email' => 'pepepardojeans@gmail.com'
        ]);

        $mappedUser = $user->map();

        $this->assertEquals($mappedUser['name'],'1');
        $this->assertEquals($mappedUser['id'],'Pepe pardo jans');
        $this->assertEquals($mappedUser['email'],'pepepardojeans@gmail.com');
        $this->assertEquals($mappedUser['avatar'],'https://www.gravatar.com/avatar/0f72a51b9a89e57307e843c1b388b824');

    }

    /**
     * @test
     */

    public function regulars()
    {

        $this->assertCount(0,User::regular());

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