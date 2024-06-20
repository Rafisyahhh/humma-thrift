<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\UserStore;
use Illuminate\Bus\Queueable;
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
    public function via(User $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Determine if the notification should be sent to the given user.
     *
     * @return bool
     */
    public function shouldSend(User $notifiable): bool
    {
        // Only send the notification to the user who owns the verified store
        return $notifiable->id === $this->token->user_id;
    }

    /**
     * Determine if the notification should be sent to the given user.
     *
     * @return bool
     */
    public function shouldBypassFilter(User $notifiable): bool
    {
        // Always send the notification to the user's inbox, even if they have disabled less important notifications
        return true;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Toko anda telah diverifikasi')
            ->greeting("Halo {$notifiable->name}")
            ->line("Toko anda yang bernama \"{$this->token->name}\" telah diverifikasi. Namun masih menunggu verifikasi dari admin untuk aktivasi toko anda.")
            ->line('Terimakasih.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(User $notifiable): array
    {
        return [
            'message' => "Toko anda yang bernama \"{$this->token->name}\" telah berhasil diverifikasi otomatis. Namun masih menunggu verifikasi dari admin untuk aktivasi toko anda.",
            'title' => 'Toko telah diverifikasi.',
            'action' => null,
        ];
    }
}
