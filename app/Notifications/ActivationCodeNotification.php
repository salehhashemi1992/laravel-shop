<?php

namespace App\Notifications;

use App\Notifications\Channels\BehtamediaChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActivationCodeNotification extends Notification
{
    use Queueable;

    public $token;
    public $phone_number;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $phone_number)
    {
        $this->token = $token;
        $this->phone_number = $phone_number;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [BehtamediaChannel::class];
    }

    public function toBehtamedia($notifiable)
    {
        return [
            'text' => "کد احراز هویت شما: " . $this->token,
            'phone_number' => $notifiable->phone_number
        ];
    }
}
