<?php

namespace App\Notifications;

use App\Models\UserStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellerWelcomeNotification extends Notification
{
    use Queueable;

    private UserStore $userStore;
    private string $verifyLink;

    /**
     * Create a new notification instance.
     */
    public function __construct(UserStore $userStore)
    {
        $this->userStore = $userStore;
        $this->verifyLink = route('user.verify.store', $userStore->verification_code);
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
            ->subject('Verifikasikan Toko Anda.')
            ->greeting("Halo {$notifiable->name}")
            ->line('Anda baru saja mendaftarkan toko baru. Silahkan klik tautan ini untuk memverifikasi toko anda.')
            ->action('Verifikasi Toko', $this->verifyLink)
            ->line('Apabila yang mendaftarkan toko ini bukanlah anda, silahkan abaikan saja pesan ini.')
            ->line('Terima kasih.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => "Anda baru saja mendaftarkan toko baru. Silahkan klik tautan ini untuk memverifikasi toko anda.",
            'action' => $this->verifyLink,
            'title' => 'Verifikasikan Toko Anda',
        ];
    }
}
