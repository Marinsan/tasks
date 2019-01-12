<?php

namespace Tests\Feature;

use App\Avatar;
use App\User;
use Illuminate\Support\Facades\Storage;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use File;

class LoggedUserAvatarControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function show_logged_user_default_avatar()
    {
        $this->withoutExceptionHandling();
        $this->login();
        $response = $this->get('/user/avatar');
        $response->assertSuccessful();
        $this->assertEquals(storage_path(User::DEFAULT_AVATAR_PATH), $response->baseResponse->getFile()->getPathName());
        $response->assertSuccessful();
    }

    /** @test */
    public function show_user_avatar()
    {
        $this->withoutExceptionHandling();
        Storage::fake('local');

        $user = factory(User::class)->create();

        Storage::disk('local')->put(
            '/avatars/' . $user->id . '.jpg',
            File::get(base_path('tests/__Fixtures__/avatars/sergi.jpg'))
        );
        $avatar = Avatar::create([
            'url' => 'avatars/' . $user->id . '.jpg',
        ]);
        $user->addAvatar($avatar);

        $this->actingAs($user,'web');
        $response = $this->get('/user/avatar');
        $response->assertSuccessful();
        $this->assertEquals(Storage::disk('local')->path('avatars/' . $user->id . '.jpg'), $response->baseResponse->getFile()->getPathName());
        $this->assertFileEquals(Storage::disk('local')->path('avatars/' . $user->id . '.jpg'), $response->baseResponse->getFile()->getPathName());

        $response->assertSuccessful();

    }



}
