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
        //1
        $user = factory(User::class)->create([
            'email'=>'cm@gmail.com'
        ]);
        $this->assertNull(Auth::user());
        //2
        $response = $this->post('/login',[
            'email' => 'cm@gmail.com',
            'password' => 'secret'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertNotNull(Auth::user());
        $this->assertEquals('cm@gmail.com',Auth::user()->email);
        //3
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

        // 2
        $response = $this->post('/login',[
            'email' => 'cmarin@gmail.com', //$user->email
            'password' => 'fsdfsdfsdfsdfsdf'
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