<?php

namespace App\Notifications;


use App\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;


class TaskStored extends Notification implements ShouldQueue
{
    use Queueable;

    public $task;

    public function via($notifiable)
    {
        return ['database'];
    }

    public function _construct(Task $task)
    {
        $this->task = $task;
    }

    public function toDatabase($notifiable)
    {
        return $this->task->map();
    }
}