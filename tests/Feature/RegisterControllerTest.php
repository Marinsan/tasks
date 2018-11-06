<?php


namespace Tests\Feature;


use App\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{

    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function cannot_register_a_user_when_not_passing_any_values()
    {
        //1
        //2
        $response = $this->post('/register', []);
        //3
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
    /**
     * @test
     */
    public function can_login_a_user()
    {
//        $this->withoutExceptionHandling();
        $this->assertNull(Auth::user());
        //1
        //2
        $response = $this->post('/register', [
            'name' => 'Sergi',
            'email' => 'sergibaucells@iesebre.com',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);
        //3
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertEquals('sergibaucells@iesebre.com', Auth::user()->email);
        $this->assertEquals('Sergi', Auth::user()->name);
        $this->assertTrue(Hash::check('secret', Auth::user()->password));
        $this->assertNotNull(Auth::user());
//        $this->assertDatabaseHas('users',['email' => 'sergibaucells@iesebre.com']);
    }
    /**
     * @test
     */
    public function cannot_register_a_user_when__passing_error_values()
    {
        //1
        //2
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'aa',
            'password' => 'e',
            'password_confirmation' => 'i'
        ]);
        //3
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

}