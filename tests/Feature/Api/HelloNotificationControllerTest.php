<?php

namespace Tests\Feature\Api\Notifications;


use App\Notifications\HelloNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Notification;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

/**
 * Class HelloNotificationControllerTest.
 *
 * @package Tests\Feature
 */
class HelloNotificationControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     * @group notifications
     */
    public function user_can_send_hello_notification_to_himself()
    {

        $user = $this->loginAsNotificationsManager('api');

        Notification::fake();

        $response = $this->json('POST','/api/v1/notifications/hello');
        $response->assertSuccessful();

        Notification::assertSentTo($user,HelloNotification::class);
    }

    /**
     * @test
     * @group notifications
     */
    public function guest_user_can_send_hello_notification_to_himself()
    {
        Notification::fake();
        $response = $this->json('POST','/api/v1/notifications/hello');
        $response->assertStatus(401);
        Notification::assertNothingSent();
    }

}