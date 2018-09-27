<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function todo()
    {
        // Executar /Tasks
        $this->withoutExceptionHandling();
        $response = $this->get('/tasks');
//        dd($response);
        $response->assertSuccessful();
        $response->assertSee('Tasques');
    }
}
