<?php

namespace App\Notifications;

use App\Models\UserStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationIfStoreIsVerified extends Notification
{
    use Queueable;

    public UserStore $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(UserStore $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Toko anda telah diverifikasi')
            ->line("Toko anda yang bernama \"{$this->token->name}\" telah diverifikasi. Namun masih menunggu verifikasi dari admin untuk aktivasi toko anda.")
            ->line('Terimakasih.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => "Toko anda yang bernama \"{$this->token->name}\" telah berhasil diverifikasi otomatis. Namun masih menunggu verifikasi dari admin untuk aktivasi toko anda.",
            'title' => 'Toko telah diverifikasi.',
            'action' => null,
        ];
    }
}
