<?php

use App\Events\TaskUpdate;
use App\Listeners\SendMailTaskStored;
use App\Listeners\SendMailTaskUpdated;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendMailTaskUpdatedTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    use RefreshDatabase;
    /**
     * @test
     */
    public function email_has_been_sent_when_task_updated()
    {
        Mail::fake();
        $user = factory(User::class)->create();
        $task = factory(Task::class)->create();
        $task_old = $task;
        $task->name = 'Comprar pa';
        $task->save();
        $user->addTask($task);
        $listener = new SendMailTaskUpdated();
        $listener->handle(new TaskUpdate($task_old, $task, $user));
        Mail::assertSent(\App\Mail\TaskUpdated::class, function($mail) use ($task, $user) {
            return  $mail->task->is($task) &&
                $mail->hasTo($user->email) &&
                $mail->hasCc(config('tasks.manager_email'));
        });
    }
}