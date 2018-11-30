<?php

namespace Tests\Feature;


use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class LoggedUserTasksControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function can_list_logged_user_tasks()
{
    // 1
    $user = $this->login();

    $task1 = factory(Task::class)->create();
    $task2 = factory(Task::class)->create();
    $task3 = factory(Task::class)->create();
    $tasks = collect([$task1,$task2,$task3]);
    $user->addTasks($tasks);

    // 2 execute
    $response = $this->get('/user/tasks');
    $response->assertSuccessful();

    $response->assertViewIs('tasks.user.index');
    $response->assertViewHas('tasks',$user->tasks);
}
    /**
     * @test
     */
    public function can_not_list_logged_user_tasks_if_user_is_not_logged()
{

    $response = $this->json('GET','/user/tasks');
    $response->assertStatus(401);
}
}