<?php

use App\Avatar;
use App\Photo;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvatarTest extends TestCase
{

    /**
     * @test
     */
    public function addAvatar()
    {
        $user = factory(User::class)->create();
        $this->assertCount(0,$user->avatars);
        $avatar = Avatar::create([
            'url' => '/avatar.png',
        ]);
        $user->addTask($avatar);
        $user = $user->fresh();
        $this->assertCount(1,$user->avatars);
        $this->assertEquals('/avatar.png',$user->avatars[0]->url);
        $this->assertEquals($user->id,$user->avatars[0]->id);
    }

    use RefreshDatabase;

    /**
     * @test
     */
    public function assignPhoto()
    {
        $user = factory(User::class)->create();
        $this->assertNull($user->photo);
        $photo = Photo::create([
            'url' => '/photo1.png',
        ]);
        $user->assignPhoto($photo);
        $user = $user->fresh();
        $this->assertNotNull(1,$user->photo);
        $this->assertEquals('/photo1.png',$user->photo->url);
        $this->assertEquals($user->id,$user->photo->user_id);
    }


    /**
     * @test
     */
    public function setUser()
    {
        $avatar = Avatar::create([
            'url' => '/photo1.png',
        ]);
        $this->assertNull($avatar->user);
        $avatar->setUser($user = factory(User::class)->create());
        $avatar = $avatar->fresh();
        $this->assertNotNull($avatar->user);
        $this->assertEquals($avatar->user->name, $user->name);
    }

    /**
     * @test
     */
    public function map()
    {
        $avatar = Avatar::create([
            'url' => '/avatar.png',
        ]);
        $mappedAvatar = $avatar->map();
        $this->assertEquals($mappedAvatar['id'],1);
        $this->assertEquals($mappedAvatar['url'],'/avatar.png');
    }
}
