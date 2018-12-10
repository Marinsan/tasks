<?php

namespace Tests\Feature\Api;

use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class TasksVueControllerTest extends TestCase{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */

    public function can_show_vue_tasks()
    {
        $this->loginAsTaskManager();

        $response = $this->get('/tasks_vue');

        $response->assertSuccessful();
        $response->assertViewIs('tasks_vue');
        $response->assertViewHas('tasks',Task::all());

    }
}