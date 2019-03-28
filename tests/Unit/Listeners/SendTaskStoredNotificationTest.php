<?php

use App\Listeners\SendTaskStoredNotification;
use App\Mail\TaskCompleted;
use App\Notifications\TaskStored;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\TaskStored as TaskStoredEvent;
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
        $listener = new SendTaskStoredNotification();
        $user = factory(User::class)->create();
        $task = Task::create([
            'name' => 'Pepito',
            'user_id' => $user->id
        ]);
        $event  = new TaskStoredEvent($task, $user);
        Notification::fake();
        $listener->handle($event);
        Notification::assertSentTo(
            $user,
            TaskStored::class,
            function ($notification, $channels) use ($task) {
                return $notification->task->id === $task->id;
            }
        );
    }
}