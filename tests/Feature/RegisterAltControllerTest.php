<?php


namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        $response = $this->post('/register_alt', $user = [
            'name' => 'Cristian Marin',
            'email' => 'cristianmarin@iesebre.com',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);
        //3
        $this->assertNotNull(Auth::user());
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertEquals($user['email'],Auth::user()->email);
        $this->assertEquals($user['name'],Auth::user()->name);
        $this->assertEquals($user['password'],Auth::user()->password);

    }

    /**
     * @test
     */
    public function cannot_register_a_user_with_invalid_data()
    {
        $response = $this->post('/register',[
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => ''
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}