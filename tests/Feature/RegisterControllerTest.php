<?php


namespace Tests\Feature;


use App\Mail\TestWelcomeEmail;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        initialize_roles();
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

    /**
     * @test
     */
    public function can_register_a_user()
    {
        $this->withoutExceptionHandling();
        initialize_roles();
        $this->assertNull(Auth::user());

        Mail::fake();

        // Execution
        $response = $this->post('/register', $user = [
            'name' => 'Cristian Marin Tejeda',
            'email' => 'cristianmarin@iesebre.com',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);

        Mail::assertSent(TestWelcomeEmail::class, function($mail) {
            return $mail->user->name == 'Cristian Marin Tejeda';
        });

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        // Comprovat s'ha creat el usuari
        $this->assertEquals($user['email'],Auth::user()->email);
        $this->assertEquals($user['name'],Auth::user()->name);
//        $this->assertEquals(bcrypt($user['password']),Auth::user()->password);
        $this->assertNotNull(Auth::user());
        $this->assertTrue(Hash::check($user['password'],Auth::user()->password));
        $this->assertTrue(Auth::user()->hasRole('Tasks'));
    }

}