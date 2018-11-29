<?php

namespace Tests\Feature\Api;

use App\Tag;
use App\Task;
use App\User;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagsControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    // name
    // description
    // color #111111
    /**
     * @test
     */
    public function can_show_a_tag()
    {
        $this->login('api');
        // 1
        $tag = factory(Tag::class)->create();
        // 2
        $response = $this->json('GET','/api/v1/tags/' . $tag->id);
        // 3
        $result = json_decode($response->getContent());
        $response->assertSuccessful();
        $this->assertEquals($tag->name, $result->name);
        $this->assertEquals($tag->description, $result->description);
        $this->assertEquals($tag->color, $result->color);
    }
    /**
     * @test
     */
    public function can_delete_tag()
    {
        $this->login('api');
        // 1
        $tag = factory(Tag::class)->create();
        // 2
        $response = $this->delete('/api/v1/tags/' . $tag->id);
        // 3
        $result = json_decode($response->getContent());
        $response->assertSuccessful();
        $this->assertEquals('', $result);
//        $this->assertDatabaseMissing('tags', $tag);
        $this->assertNull(Tag::find($tag->id));
    }
    /**
     * @test
     */
    public function cannot_create_tag_without_a_name()
    {
        $this->login('api');
//        Petició HTTP normal, no és XHR (Ajax)
//        $response = $this->post('/api/v1/tags/',[
//            'name' => ''
//        ]);
        $response = $this->json('POST','/api/v1/tags/',[
            'name' => ''
        ]);
        $result = json_decode($response->getContent());
        $response->assertStatus(422);
    }
    /**
     * @test
     */
    public function cannot_edit_tag_without_name()
    {
        $this->login('api');
        // 1
        $oldTag = factory(Tag::class)->create();
        // 2
        $response = $this->json('PUT', '/api/v1/tags/' . $oldTag->id, [
            'name' => ''
        ]);
        // 3
        $response->assertStatus(422);
    }
    /**
     * @test
     */
    public function can_create_tag()
    {
        $this->withoutExceptionHandling();
        $this->login('api');
        $response = $this->post('/api/v1/tags/',[
            'name' => 'Tag435',
            'description' => 'aquest es el tag435',
            'color' => '#04B404'
        ]);
        $result = json_decode($response->getContent());
        $response->assertSuccessful();

        $this->assertNotNull($tag = Tag::find($result->id));
        $this->assertEquals('Tag435',$result->name);
        $this->assertEquals('aquest es el tag435',$result->description);
        $this->assertEquals('#04B404',$result->color);
    }
    /**
     * @test
     */
    public function can_list_tags()
    {
        $this->login('api');
        //1
        create_example_tags();
        $response = $this->json('GET', '/api/v1/tags/', [
            'name' => 'Tag1'
        ]);
        $response->assertSuccessful();
        $result = json_decode($response->getContent());
        $this->assertCount(3, $result);
        $this->assertEquals('Tag1', $result[0]->name);
        $this->assertEquals('Aquest es el tag1', $result[0]->description);
        $this->assertEquals('Tag2', $result[1]->name);
        $this->assertEquals('Aquest es el tag2', $result[1]->description);
        $this->assertEquals('Tag3', $result[2]->name);
        $this->assertEquals('Aquest es el tag3', $result[2]->description);
    }
    /**
     * @test
     */
    public function can_edit_tag()
    {
        $this->login('api');
        // 1
        $oldTag = factory(Tag::class)->create([
            'name' => 'Ta1',
            'description' => "Aquest es el tag1",
            'color' => '#04B404'
        ]);
        // 2
        $response = $this->json('PUT', '/api/v1/tags/' . $oldTag->id, [
            'name' => 'Etiqueta 15',
            'description' => 'Descripció 2',
            'color' => '#4286f4'
        ]);
        // 3
        $result = json_decode($response->getContent());
        $response->assertSuccessful();
        $newTag = $oldTag->refresh();
        $this->assertNotNull($newTag);
        $this->assertEquals('Etiqueta 15', $result->name);
        $this->assertEquals('Descripció 2', $result->description);
        $this->assertEquals('#4286f4', $result->color);
    }

}