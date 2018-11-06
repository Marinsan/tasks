<?php


namespace Tests\Feature;


use App\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class RegisterAltControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function can_register_a_user()
    {
        $this->assertNull(Auth::user());
        //1
        //2
        $response = $this->post('/register_alt', $user = [
            'name' => 'Cristian',
            'email' => 'cmarin@iesebre.com',
            'password' => 'secret',
        ]);
        //3
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertEquals($user['email'],Auth::user()->email);
        $this->assertEquals($user['name'],Auth::user()->name);
        $this->assertTrue(Hash::check($user['password'], Auth::user()->password));
        $this->assertNotNull(Auth::user());
    }
}