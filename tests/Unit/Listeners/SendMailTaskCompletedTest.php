<?php

use App\Listeners\SendMailTaskCompleted;
use App\Mail\TaskCompleted;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendMailTaskCompletedTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_task_completed_mail_has_been_send()
    {
        $user = factory(User::class)->create();
        $task = Task::create([
            'name' => 'Comprar pa',
            'user_id' => $user->id
        ]);
        // Executar
//        event(new TaskCompleted($task));
        Mail::fake();
        $listener = new \App\Listeners\SendMailTaskCompleted();
        $listener->handle(new \App\Events\TaskCompleted($task));
        // 3 ASSERT
        Mail::assertSent(TaskCompleted::class, function ($mail) use ($task, $user) {
            return $mail->task->is($task) &&
                $mail->hasTo($user->email) &&
                $mail->hasCc(config('tasks.manager_email'));
        });
    }
}