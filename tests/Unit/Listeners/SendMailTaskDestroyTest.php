<?php


use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendMailTaskDestroyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_task_completed_mail_has_been_send()
    {
        Mail::fake();
        $user = factory(User::class)->create();
        $task = factory(Task::class)->create();
        $user->addTask($task);
        $listener = new \App\Listeners\SendMailTaskDestroy();
        $listener->handle(new \App\Events\TaskDelete($task, $user));
        Mail::assertSent(\App\Mail\TaskDeleted::class, function($mail) use ($task, $user) {
            return  $mail->task->is($task) &&
                $mail->hasTo($user->email) &&
                $mail->hasCc(config('tasks.manager_email'));
        });

    }
}