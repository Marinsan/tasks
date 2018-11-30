<?php

namespace Tests\Feature\Api;


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
    initialize_roles();
    $user=$this->loginAsTagsUser('api');

    $tag1 = factory(Tag::class)->create();
    $tag2 = factory(Tag::class)->create();
    $tag3 = factory(Tag::class)->create();

    $tags = [$tag1,$tag2,$tag3];
    $user->addTags($tags);

    // 2 execute
    $response = $this->json('GET','/api/v1/user/tags');
    $response->assertSuccessful();

    $result = json_decode($response->getContent());
    $this->assertCount(3,$result);

    $this->assertEquals($result[0]->id,$tag1->id);
    $this->assertEquals($result[1]->id,$tag2->id);
    $this->assertEquals($result[2]->id,$tag3->id);
}
    /**
     * @test
     */
    public function can_not_list_logged_user_tags_if_user_is_not_logged()
{
    // 2
    $response = $this->json('GET','/user/tags');
    $response->assertStatus(404);
}
    /**
     * @test
     */
    public function can_edit_a_tag()
    {

        $user = $this->loginAsTagsUser('api');
        // 1
        $oldTag = factory(Tag::class)->create([
            'name' => 'Tag1',
            'description'=>'Aquest es el tag1'
        ]);
        // 2
        $user->addTag($oldTag);
        $response = $this->json('PUT','/api/v1/user/tags/' . $oldTag->id, [
            'name' => 'Comprar pa',
            'description'=>'asdasdad'
        ]);
        // 3
        $result = json_decode($response->getContent());
        $response->assertSuccessful();
        $newTag = $oldTag->refresh();
        $this->assertNotNull($newTag);
        $this->assertEquals($oldTag->id,$result->id);
        $this->assertEquals('Comprar pa',$result->name);
        $this->assertEquals('asdasdad',$result->description);
        $this->assertFalse((boolean) $newTag->completed);
    }

    /**
     * @test
     */
    public function cannot_edit_a_tag_not_associated_to_user()
    {
        $this->loginAsTagsUser('api');
        // 1
        $oldTag = factory(Tag::class)->create([
            'name' => 'Tag1'
        ]);
        // 2
        $response = $this->json('PUT','/api/v1/user/tags/' . $oldTag->id, [
            'name' => 'Comprar pa'
        ]);
        // 3
        $response->assertStatus(404);

    }

    /**
     * @test
     */

    public function can_delete_tag()
    {
        $this->withoutExceptionHandling();
        $user=$this->loginAsTagsUser('api');
        $tag = factory(Tag::class)->create([
            'name' => 'Tag1',
            'description'=>'Aquest es el tag1'
        ]);
        $user->addTag($tag);
        $response = $this->json('DELETE','/api/v1/user/tags/' . $tag->id);
        $response->assertSuccessful();
        $this->assertCount(0,$user->tags);
        $tag = $tag->fresh();
        $this->assertNull($tag);
    }

    /**
     * @test
     */

    public function cannot_delete_not_owned_tag()
    {
        $user = $this->login('api');

        $tag = factory(Tag::class)->create([
            'name' => 'Tag1',
            'description'=>'Aquest es el tag1'
        ]);

        $response = $this->json('DELETE','/api/v1/user/tags' . $tag->id);
        $response->assertStatus(404);
    }
}