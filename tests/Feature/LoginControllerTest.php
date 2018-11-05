<?php


namespace Tests\Feature\Api;


use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{

    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function can_login_a_user()
    {
       // $this->withExceptionHandling();
        // 1
        $this->login('api');
        $user = factory(User::class)->create([
            'email' => 'cmarin@iesebre.com'
        ]);

        $this->assertNull(Auth::user());

        // 2
        $response = $this->post('/login',[
            'email' => 'cmarin@iesebre.com', //$user->email
            'password' => 'secret'
        ]);

        $response->assertSuccessful();
        $response->assertRedirect('/home');
        $this->assertNotNull(Auth::user());
        $response->assertEquals('cmarin@gmail.com', Auth::user()->email());
    }
    /**
     * @test
     */
    public function cannot_login_a_user()
    {
        // $this->withExceptionHandling();
        // 1
        $this->login('api');
        $user = factory(User::class)->create([
            'email' => 'cmarin@gmail.com'
        ]);

        $this->assertNull(Auth::user());

        // 2
        $response = $this->post('/login',[
            'email' => 'cmarin@gmail.com', //$user->email
            'password' => 'secret'
        ]);

//        dump(Session::get('errors')->email);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertNull(Auth::user());

    }

    /**
     * @test
     */
    public function cannot_login_a_user_with_different_username()
    {
        // $this->withExceptionHandling();
        // 1
        $user = factory(User::class)->create([
            'email' => 'cmarin@gmail.com'
        ]);

        $this->assertNull(Auth::user());

        // 2
        $response = $this->post('/login',[
            'email' => 'cmarisdfsdfn@gmail.com', //$user->email
            'password' => 'secret'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertNull(Auth::user());

    }

    public function login(): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

}