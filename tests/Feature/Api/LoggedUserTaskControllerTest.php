<?php

namespace Tests\Feature\Api;


use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoggedUserTaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_list_logged_user_tasks()
    {
        // 1 Prepare

        $user = factory(User::class)->create();
        $this->actingAs($user,'api');

        $task1 = factory(Task::class)->create();
        $task2 = factory(Task::class)->create();
        $task3 = factory(Task::class)->create();
        $tasks = [$task1,$task2,$task3];
        $user->addTasks($tasks);

        // 2 Execute
        $response = $this->json('GET','/user/tasks');
        $response-> assertSuccessful();

        $result = json_decode($response->getContent());

        $this->assertEquals($result[0]->is($task1));
        $this->assertEquals($result[1]->is($task2));
        $this->assertEquals($result[2]->is($task3));


    }
    /**
     * @test
     */
    public function cannot_list_loggerd_user_tasks_if_user_is_not_logged()
    {
        // 1 Prepare

        // 2 Execute
        $response = $this->json('GET','/user/tasks');
        $response->assertStatus(401);
    }
}