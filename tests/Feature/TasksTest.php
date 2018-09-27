<?php

namespace Tests\Feature;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @test
     */
    public function todo()
    {
        $this->withoutExceptionHandling();
        // 1 Prepare
        Task::create([
            'name' => 'comprar pa',
            'completed' => false
        ]);

        dd(Task::find(1));

        // 2 Executar
        $response = $this->get('/tasks');
        //dd($response);
        // 3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('Tasques');

        // comprovar que es veuen les tasques que ehi ha a la bd
    }
}
