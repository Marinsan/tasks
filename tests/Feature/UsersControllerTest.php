<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 31/03/19
 * Time: 13:08
 */

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase,CanLogin;
    /**
     * @test
     */
    public function superadmin_can_see_users_list()
    {
        $this->withoutExceptionHandling();
        $user = $this->loginAsSuperAdmin('web');
        $response = $this->get('/users');
        $response->assertSuccessful();
        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
    }

}