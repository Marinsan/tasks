<?php
namespace App\Notifications\SMS;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
class SMSMessage extends Notification
{
    use Queueable;
    public $message;

    /**
     * SMSMessage constructor.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }

    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param  mixed $notifiable
     * @return NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content($this->message)
            ->unicode();
    }
}
