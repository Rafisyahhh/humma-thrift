<?php

namespace App\Notifications;

use App\Models\auctions;
use App\Models\UserStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomAdminMessageNotification extends Notification {
    use Queueable;

    public $normalMessage;
    public $mailMessage;


    /**
     * Create a new notification instance.
     */
    public function __construct(array $normalMessage, array $mailMessage) {
        $this->normalMessage = $normalMessage;
        $this->mailMessage = $mailMessage;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage {
        return (new MailMessage)
            ->subject($this->mailMessage['subject'])
            ->greeting($this->mailMessage['greeting'])
            ->line($this->mailMessage['line']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array {
        return [
            'title' => $this->normalMessage['title'],
            'message' => $this->normalMessage['message'],
            'action' => $this->normalMessage['action']
        ];
    }
}