<?php
namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class HelpersTest extends TestCase {

    /**
     * @test
     */
    public function create_primary_user()
    {
        create_primary_user();


        $user = User::where('email','cmarin@gmail.com')->first();
        $this->assertEquals($user->name, 'Cristian Marin Tejeda');
        $this->assertEquals($user->email, 'cmarin@gmail.com');
        $this->assertEquals($user->password, env('PRIMARY_USER_PASSWORD', '123456'));

    }

}