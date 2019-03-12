<?php
namespace Tests\Feature\Web\Newsletters;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;
/**
 * Class NewslettersControllerTest.
 *
 * @package Tests\Feature
 */
class NewslettersControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;
    /**
     * @test
     */
    public function newsletters_manager_can_show_newsletter_module()
    {
        $this->withoutExceptionHandling();
        $this->loginAsTasksUser('web');
        $response = $this->get('/newsletters');
        $response->assertSuccessful();
        $response->assertViewIs('newsletters.index');
        $response->assertViewHas('newsletter',function($newsletter) {
            return $newsletter instanceof \Illuminate\Support\Collection;
        });
    }
}