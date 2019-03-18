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
        // 2 execute
        $response = $this->get('/tags');
        //3 Comprovar
        $response->assertRedirect('/login?back=tags');
    }


    /**
     * @test
     */
    public function superadmin_can_show_tags()
    {
        $this->loginAsSuperAdmin();
        create_example_tags();
        // 2 execute
        $response = $this->get('/tags');
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertViewIs('tags');
        $response->assertViewHas('tags', function ($tags) {
            return count($tags) === 3 &&
                $tags[0]['name'] === 'Tag1' &&
                $tags[1]['name'] === 'Tag2' &&
                $tags[2]['name'] === 'Tag3';
        });
    }

    /**
     * @test
     */
    public function tags_manager_can_show_tags()
    {
        //1 Prepare
        create_example_tags();
        $this->loginAsTagsManager();
        // 2 execute
        $response = $this->get('/tags');
        //3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('Tag1');
        $response->assertSee('Tag2');
        $response->assertSee('Tag3');
    }
}