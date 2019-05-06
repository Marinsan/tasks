<?php
namespace App\Notifications;
use App\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;
class TaskUpdated extends Notification
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
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', WebPushChannel::class];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => "S'ha editat una tasca: " . $this->task->name,
            'url' => '/tasques/' . $this->task->id,
            'icon' => 'assignment',
            'iconColor' => 'primary',
            'task' => $this->task->map()
        ];
    }
    /**
     * Get the web push representation of the notification.
     *
     * @param mixed $notifiable
     * @param mixed $notification
     * @return \Illuminate\Notifications\Messages\DatabaseMessage
     */
    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('Tasca editada!')
            ->icon('/notification-icon.png')
            ->body('Has editat la tasca: ' . $this->task->name)
            ->action('View app', 'view_app')
            ->data(['id' => $notification->id]);
    }
}
