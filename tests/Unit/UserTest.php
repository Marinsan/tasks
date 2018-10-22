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
        $tasks = $user->$tasks;

        // 3 Comprovar
        $this->assertTrue($tasks[0]->is($task1));
        $this->assertTrue($tasks[2]->is($task2));
        $this->assertTrue($tasks[3]->is($task3));
    }

    /**
     * @test
     */

    public function user_tasks_returns_null_when_no_tasks()
    {
        // 1 Prepare
        $user = factory(User::class)->create();

        // 2 Executar
        $user->$tasks;

        // 3 Comprovar
        $this->assertEmpty($tasks);
    }

    /**
     * @test
     */
    public function can_add_tasks_to_user()
    {
        $user = factory(User::class)->create();
        $task1 = factory(Task::class)->create();


        $user->addTask($task1);


        // 2 Executar
        $tasks = $user->$tasks;

        // 3 Comprovar
        $this->assertTrue($tasks[0]->is($task1));

    }
}