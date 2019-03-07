<?php

namespace Tests\Feature\Tenants\Api\Users;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Newsletter;
use Tests\TestCase;

/**
 * Class NewsletterControllerTest.
 *
 * @package Tests\Feature\Tenants
 */
class NewsletterControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Refresh the in-memory database.
     *
     * @return void
     */
    protected function refreshInMemoryDatabase()
    {
        $this->artisan('migrate',[
            '--path' => 'database/migrations/tenant'
        ]);

        $this->app[Kernel::class]->setArtisan(null);
    }

    /**
     * @test
     * @group users
     */
    public function guest_user_can_subscribe_to_newsletter()
    {
        Newsletter::shouldReceive('subscribePending')
            ->once()
            ->with('prova@gmail.com')
            ->andReturn('value'); // Return some value to avoid 422 errors

        $response = $this->json('POST','/api/v1/newsletter', [ 'email' => 'prova@gmail.com' ]);

        $response->assertSuccessful();
    }

    /**
     * @test
     * @group newsletter
     */
    public function email_is_required()
    {
        $response = $this->json('POST','/api/v1/newsletter', [ 'email' => null ]);
        $response->assertStatus(422);

        $response = $this->json('POST','/api/v1/newsletter', [ 'email' => 'invalidemail' ]);
        $response->assertStatus(422);
    }
}