<?php

namespace App\Notifications;

use App\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TaskStored extends Notification implements ShouldQueue
{
    use Queueable;

    public $task;

    /**
     * TaskUncompleted constructor.
     * @param $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification. Task: ' . $this->task->name)
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            // La eliipsis millor a javascript
//            'title' => "S'ha creat una nova incidència " . ellipsis($this->incident->subject, 25),
            'title' => "S'ha creat una nova tasca: " . $this->task->name,
            'url' => '/tasques/' . $this->task->id,
            'icon' => 'assignment',
            'iconColor' => 'accent',
            'task' => $this->task->map()
        ];
    }
}