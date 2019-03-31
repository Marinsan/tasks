<?php
namespace App\Notifications;
use App\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
/**
 * Class TaskStored.
 *
 * @package App\Notifications
 */
class TaskStored extends Notification implements ShouldQueue
{
    use Queueable;
    public $task;
    /**
     * SimpleNotification constructor.
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            "title" => "S'ha creat una nova tasca:" . $this->task->nae,
            "url" => "/tasques/" . $this->task->id,
            "icon" => "assignment",
            "iconColor" => "primary",
            "task" => $this->task->map()
        ];
    }
}