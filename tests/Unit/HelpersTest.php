<?php
namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HelpersTest extends TestCase {

    use RefreshDatabase;
    /**
     * @test
     */
    public function create_primary_user()
    {
        create_primary_user();

        $user = User::where('email','cristianmarin@iesebre.com')->first();
        $this->assertEquals($user->name, 'Cristian Marin Tejeda');
        $this->assertEquals($user->email, 'cristianmarin@iesebre.com');
        $this->assertTrue(Hash::check(env('PRIMARY_USER_PASSWORD', '123456'),$user->password));

    }

}