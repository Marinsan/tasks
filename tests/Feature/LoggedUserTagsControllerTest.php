<?php

namespace Tests\Feature;


use App\Tag;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class LoggedUserTagsControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function can_list_logged_user_tags()
    {
        $user=$this->loginAsTagsUser('api');

        $tag1 = factory(Tag::class)->create();
        $tag2 = factory(Tag::class)->create();
        $tag3 = factory(Tag::class)->create();
        $tags = collect([$tag1,$tag2,$tag3]);
        $user->addTag($tags);

        // 2 execute
        $response = $this->get('/user/tags');
        $response->assertSuccessful();

        $response->assertViewIs('tags.user.index');
        $response->assertViewHas('tags',$user->tags);
    }
    /**
     * @test
     */
    public function can_not_list_logged_user_tags_if_user_is_not_logged()
    {
        // 2
        $response = $this->json('GET', '/user/tags');
        $response->assertStatus(401);
    }
}