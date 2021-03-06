<?php


namespace Tests\Feature\Api;


use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class aLoginApiControllerTest extends TestCase
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

        $this->assertNull(Auth::user());
             // 2
        $response = $this->post('/login_alt',[
            'email' => 'cmarin@gmail.com', //$user->email
            'password' => 'secret'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertNotNull(Auth::user());
        $this->assertEquals('cmarin@gmail.com', Auth::user()->email);
    }
    /**
     * @test
     */
    public function cannot_login_a_user()
    {
        // $this->withExceptionHandling();
        //1
        $user = factory(User::class)->create([
            'email' => 'prova@gmail.com'
        ]);
        $this->assertNull(Auth::user());
        //2
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);
        //3
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertNotNull(Auth::user());
        $this->assertEquals($user->email, Auth::user()->email);

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
    public function login(): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}