<?php

namespace Tests\Feature;

use App\Tag;
use App\User;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagsControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function guest_user_cannot_show_tags()
    {
        // $this->withoutExceptionHandling();

        $response = $this->get('/tags');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function superadmin_can_show_tags()
    {
         $this->withoutExceptionHandling();
        //1 Prepare
        $this->loginAsSuperAdmin();
        create_example_tags();
        // 2 execute
        $response = $this->get('/tags');
//        dd($response->getContent());
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertViewHas('tags',function ($tags){
            return count($tags) === 3 &&
                $tags[0]['name'] === 'Tag1' &&
                $tags[1]['name'] === 'Tag2' &&
                $tags[2]['name'] === 'Tag3';
        });
    }

    /**
     * @test
     */
    public function tagsManager_can_show_tags()
    {
        // $this->withoutExceptionHandling();
        //1 Prepare

        create_example_tags();

        $this->login();

        // 2 execute
        $response = $this->get('/tags');
//        dd($response->getContent());
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('Tasques');
        $response->assertSee('comprar pa');
        $response->assertSee('comprar llet');
        $response->assertSee('Estudiar PHP');
        // Comprovar que es veuen les tasques que hi ha a la
        // base dades
    }


    /**
     * @test
     */
    public function cangtf_show_tags()
    {
        // $this->withoutExceptionHandling();
        //1 Prepare
        create_example_tags();

        $this->login();

        // 2 execute
        $response = $this->get('/tags');
//        dd($response->getContent());
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('Tasques');
        $response->assertSee('comprar pa');
        $response->assertSee('comprar llet');
        $response->assertSee('Estudiar PHP');
        // Comprovar que es veuen les tasques que hi ha a la
        // base dades
    }





    /**
     * @test
     */
    public function csan_show_tags()
    {
        // $this->withoutExceptionHandling();
        //1 Prepare
        create_example_tags();

        $this->login();

//        dd(Tag::find(1));
        // 2 execute
        $response = $this->get('/tags');
//        dd($response->getContent());
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('Tasques');
        $response->assertSee('comprar pa');
        $response->assertSee('comprar llet');
        $response->assertSee('Estudiar PHP');
        // Comprovar que es veuen les tasques que hi ha a la
        // base dades
    }

    /**
     * @test
     */
    public function cean_show_tags()
    {
        // $this->withoutExceptionHandling();
        //1 Prepare
        create_example_tags();

        $this->login();

//        dd(Tag::find(1));
        // 2 execute
        $response = $this->get('/tags');
//        dd($response->getContent());
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('Tasques');
        $response->assertSee('comprar pa');
        $response->assertSee('comprar llet');
        $response->assertSee('Estudiar PHP');
        // Comprovar que es veuen les tasques que hi ha a la
        // base dades
    }

    /**
     * @test
     */
    public function can_store_task()
    {
        $this->login();
        $response = $this->post('/tags', [
            'name' => 'Comprar llet'
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('tags', ['name' => 'Comprar llet']);
    }

    /**
     * @test
     */
    public function cannnot_delete_an_unexisting_task()
    {
        $this->login();
        $response = $this->delete('/tags/1');
        $response->assertStatus(404);
    }
    /**
     * @test
     */
//    public function user_without_permissions_cannnot_delete_tags()
//    {
//        $response = $this->delete('/tags/1');
//        $response->assertStatus(403);
//    }
    /**
     * @test
     */
    public function can_delete_task()
    {
        $this->withoutExceptionHandling();
        // 1
        $this->login();
        $tag = Tag::create([
            'name' => 'Comprar llet'
        ]);
        // 2
        $response = $this->delete('/tags/' . $tag->id);
        // 3
        $response->assertStatus(302);
        $this->assertDatabaseMissing('tags', ['name' => 'Comprar llet']);
    }

    /**
     * @test
     */
    public function can_edit_a_task()
    {
        $this->login();
        // 1
        $tag = Tag::create([
            'name' => 'skdjnfsdf',
            'completed' => '0'
        ]);
        //2
        $response = $this->put('/tags/edit/' . $tag->id, $newTag = [
            'name' => 'Comprar pa',
            'completed' => '1'
        ]);
        $response->assertStatus(302);
//            $response->assertStatus(200);
        // 2 opcions
//        $this->assertDatabaseHas('tags',$newTag);
//        $this->assertDatabaseMissing('tags',$tag);
        $tag = $tag->fresh();
        $this->assertEquals($tag->name, $newTag['name']);
        $this->assertEquals($tag->completed, $newTag['completed']);
    }

    /**
     * @test
     */
    public function can_edit_a_task_todo_validation()
    {
        $this->markTestSkipped();
        $this->withoutExceptionHandling();
        $this->login();
        // 1
        $tag = Tag::create([
            'name' => 'asdasdasd',
            'completed' => false
        ]);
        //2
        $response = $this->put('/tags/edit/' . $tag->id, $newTag = [
            'completed' => true
        ]);
        $response->assertSuccessful();
//            $response->assertStatus(200);
        // 2 opcions
//        $this->assertDatabaseHas('tags',$newTag);
//        $this->assertDatabaseMissing('tags',$tag);
        $tag = $tag->fresh();
        $this->assertEquals($tag->name, 'Comprar pa');
        $this->assertEquals($tag->completed, true);
    }

    /**
     * @test
     */
    public function cannot_edit_an_unexisting_task()
    {
        $this->login();
       //$this->withoutExceptionHandling();
        // TDD Test Driven Development ->
        // 2 execute HTTP REQUEST -> HTTP RESPONSE (resposta)
        $response = $this->put('/tags/edit/1', []);
//        dd($response->getContent());
        // 3 assert
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function can_show_edit_form()
    {
        $this->login();
        // 1
        $tag = Tag::create([
            'name' => 'Comprar pa',
            'completed' => false
        ]);
        $response = $this->get('/tags/edit/' . $tag->id);
        $response->assertSuccessful();
        $response->assertSee('Comprar pa');
    }

    /**
     * @test
     */
    public function cannot_show_edit_form_unexisting_task()
    {
//        $this->withoutExceptionHandling();
        $this->login();
        $response = $this->get('/tags/edit/1');
        $response->assertStatus(404);
    }

    public function login(): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    public function login_api(): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');
    }
}