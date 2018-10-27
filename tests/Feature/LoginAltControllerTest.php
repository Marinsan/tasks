<?php


namespace Tests\Feature\Api;


use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginApiControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function can_login_a_user()
    {
       // $this->withExceptionHandling();
        // 1
        $user = factory(User::class)->create([
            'email' => 'cmarin@gmail.com'
        ]);

             // 2
        $response = $this->post('/login_alt',[
            'email' => 'cmarin@gmail.com', //$user->email
            'password' => 'secret'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertNull(Auth::user());
        $this->assertEquals('cmarin@gmail.com', Auth::user()->email);
    }
    /**
     * @test
     */
    public function cannot_login_a_user()
    {
        // $this->withExceptionHandling();
        // 1
        $user = factory(User::class)->create([
            'email' => 'cmarin@gmail.com'
        ]);

        $this->assertNull(Auth::user());

        // 2
        $response = $this->post('/login_alt',[
            'email' => 'cmarin@gmail.com', //$user->email
            'password' => 'secret'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertNull(Auth::user());

    }

    /**
     * @test
     */
    public function cannot_login_a_user_with_incorrect_username()
    {
        // $this->withExceptionHandling();
        // 1
        $user = factory(User::class)->create([
            'email' => 'cmarin@gmail.com'
        ]);

        $this->assertNull(Auth::user());

        // 2
        $response = $this->post('/login_alt',[
            'email' => 'cmarisdfsdfn@gmail.com', //$user->email
            'password' => 'secret'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertNull(Auth::user());

    }

}