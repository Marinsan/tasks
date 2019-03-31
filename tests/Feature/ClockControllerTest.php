<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

/**
 * Class ChangelogControllerTest.
 *
 * @package Tests\Feature
 */
class ClockControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function can_login_a_user()
    {
        $this->withoutExceptionHandling();
        $this->login();

        $response = $this->get('/clock');
        $response->assertSuccessful();
        $response->assertViewHas('clock.index');
    }

}