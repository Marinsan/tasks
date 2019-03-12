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
    public function show_user_photo()
    {
        $this->login();

        $response = $this->get('/clock');
        $response->assertViewHas();
    }

}