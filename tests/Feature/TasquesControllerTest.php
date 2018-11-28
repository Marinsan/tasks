<?php

namespace Tests\Feature;

use App\Tag;
use App\User;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasquesControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function guest_user_cannot_index_tasques()
    {
        // $this->withoutExceptionHandling();

        $response = $this->get('/tasques');
        $response->assertRedirect('/login');

    }

    /**
     * @test
     */
    public function superadmin_can_index_tasques()
    {
        $this->withoutExceptionHandling();
        //1 Prepare
        initialize_roles();
        create_example_tasks();

        $this->loginAsSuperAdmin();
        // 2 execute
        $response = $this->get('/tasques');
//        dd($response->getContent());
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('comprar pa');
        $response->assertSee('comprar llet');
        $response->assertSee('Estudiar PHP');
    }

    /**
     * @test
     */
    public function TaskManager_can_index_tasques()
    {
        // $this->withoutExceptionHandling();
        //1 Prepare


        create_example_tasks();

        $this->loginAsTaskManager();

        // 2 execute
        $response = $this->get('/tasques');
//        dd($response->getContent());
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('comprar pa');
        $response->assertSee('comprar llet');
        $response->assertSee('Estudiar PHP');
        // Comprovar que es veuen les tasques que hi ha a la
        // base dades
    }

    /**
     * @test
     */
    public function tasks_user_can_index_tasques()
    {
        // $this->withoutExceptionHandling();
        //1 Prepare

        create_example_tasks();

        $user = $this->loginAsTaskManager();

        $response = $this->get('/tasques');

        $response = assertViewIs('tasques');
        $response = assertViewHas('tasks', function($tasks) {
            return count($tasks)===1 &&
                $tasks[0]['name']==='comprar pa' &&
                $tasks[1]['name']==='comprar llet' &&
                $tasks[2]['name']==='Estudiar PHP';
        });



    }

    /**
     * @test
     */
    public function TaskUser_can_index_tasques()
    {
        // $this->withoutExceptionHandling();
        //1 Prepare

        create_example_tasks();

        $this->loginAsTaskUser();

        // 2 execute
        $response = $this->get('/tasques');
//        dd($response->getContent());
        //3 Comprovar
        $response->assertSuccessful();

    }


    /**
     * @test
     */
    public function regular_users_can_index_tasks()
    {
        // $this->withoutExceptionHandling();


        $this->login();

        // 2 execute
        $response = $this->get('/tasques');

        //3 Comprovar
        $response->assertStatus(403);

    }

}