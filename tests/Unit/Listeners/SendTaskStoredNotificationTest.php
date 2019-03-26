<?php

use App\Listeners\SendTaskStoredNotification;
use App\Mail\TaskCompleted;
use App\Notifications\TaskStored;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class SendTaskStoredNotificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function send_task_stored_notification()
    {
        // 1 Preparar
        $listener = new SendTaskStoredNotification();
        $user = factory(User::class)->create();
        $task = Task::create([
            'name' => 'Comprar pa',
            'description' => 'jaskdhfkasebdlfa'
        ]);
        $event = new TaskStored($task);

        Notification::fake();
        $listener->handle();
        // 3 ASSERT

        Notification::assertSentTo(
            $user,
            TaskStored::class,
            function ($notification, $channels) use ($task) {
                return $notification->task->id === $task->id;
            }
        );
    }
}