<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Log;
class DatabaseNotificationStore extends Notification
{
    use Queueable;
    public $notification;
    /**
     * DatabaseNotificationStore constructor.
     * @param $notification
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'notification' => 'TODO'
        ];
    }
    public function toBroadcast($notifiable)
    {
        Log::debug('Notification: ');
        Log::debug(json_encode($this->notification));
        return new BroadcastMessage([
            'key1' => 'value1',
            'key2' => 'value2'
        ]);
    }
}