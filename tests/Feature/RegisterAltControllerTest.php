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
        $this->withExceptionHandling();
        $this->assertNull(Auth::user());

        $response = $this->post('/register_alt',$user=[
            'name' => 'Usuari de prova',
            'email' => 'prova@iesebre.com', //$user->email
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertNotNull(Auth::user());
        $response->assertEquals($user['email'],Auth::user()->email);
        $response->assertEquals($user['name'],Auth::user()->name);
        $response->assertTrue(Hash::check($user['password'],Auth::user()->password));
    }
}