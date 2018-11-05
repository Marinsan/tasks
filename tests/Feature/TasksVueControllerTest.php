<?php

namespace Tests\Feature\Api;

use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksVueControllerTest extends TestCase{
    use RefreshDatabase;

    /**
     * @test
     */

    public function can_show_vue_tasks()
    {
        $this->withoutExceptionHandling();
        // 1 prepare
        create_example_tasks();

        $this->login();
        // 2 execute
        $response = $this->get('/tasks_vue');
        // 3 assert
        $response->assertSuccessful();
    $response->assertViewIs('tasks_vue');
    $response->assertViewHas('tasks',Task::all());


    }
    public function login(): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}