<?php
namespace App\Notifications;
use App\CodeGenerator\MobileCodeGenerator;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class VerifyMobile extends Notification
{
    use Queueable;
    public $code;
    /**
     * VerifyMobile constructor.
     */
    public function __construct($code)
    {
        $this->code =  $code;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }
    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param mixed $notifiable
     * @return NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content($this->code)
            ->unicode();
    }
}
