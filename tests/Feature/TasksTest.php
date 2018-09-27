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
        $this->withoutExceptionHandling();
        // 1 Prepare
        Task::create([
            'name' => 'comprar pa',
            'completed' => false;
        ]);

        // 2 Executar
        $response = $this->get('/tasks');
        //dd($response);
        // 3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('Tasques');

        // comprovar que es veuen les tasques que ehi ha a la bd
    }
}
