<?php

namespace Tests\Feature;

use App\Avatar;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AvatarControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function upload_avatar()
    {
        $this->withoutExceptionHandling();
        Storage::fake('local');
        Storage::fake('google');
        $user = $this->login();
        $response = $this->post('/avatar', [
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);
        $response->assertRedirect();
        Storage::disk('local')->assertExists($avatarUrl = 'avatars/' . $user->id . '.jpg');
        Storage::disk('google')->assertExists('/' . $user->id . '.jpg');
        $avatar = Avatar::first();
        $this->assertEquals($avatarUrl, $avatar->url);
        $this->assertNotNull($avatar->user);
        $this->assertEquals($user->id, $avatar->user->id);
        $user = $user->fresh();
//        dd($user->avatar);
        $this->assertNotNull($user->avatars);
        $this->assertCount(1, $user->avatars);
        $this->assertEquals($avatarUrl, $user->avatars[0]->url);
    }

    /**
     * @test
     */
    public function upload_avatar_update()
    {
        $user = $this->login();
        $avatarUrl = 'avatars/' . $user->id . '.jpg';
        Avatar::create([
            'url' => $avatarUrl,
            'user_id' => $user->id
        ]);
        Storage::fake('local');
        $response = $this->post('/avatar', [
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);
        $response->assertRedirect();
        Storage::disk('local')->assertExists($avatarUrl);
        $avatar = Avatar::first();
        $this->assertEquals($avatarUrl, $avatar->url);
        $this->assertNotNull($avatar->user);
        $this->assertEquals($user->id, $avatar->user->id);
        $user = $user->fresh();
        $this->assertNotNull($user->avatars);
        $this->assertCount(1, $user->avatars);
        $this->assertEquals($avatarUrl, $user->avatars[0]->url);
    }

}
