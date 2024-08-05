<?php

namespace App\Notifications;

use App\Models\UserStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewStoreNotifyToAdmin extends Notification
{
    use Queueable;

    public UserStore $userStore;
    public string $storeLink;

    /**
     * Create a new notification instance.
     */
    public function __construct(UserStore $userStore)
    {
        $this->userStore = $userStore;
        $this->storeLink = route('store.profile', $userStore->username);
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
            ->subject('Toko Baru Telah Dibuat')
            ->greeting("Halo Admin!")
            ->line("Ada toko baru bernama \"{$this->userStore->name}\" yang mana telah dibuat oleh {$notifiable->name}.")
            ->action('Lihat Toko', $this->storeLink)
            ->line('Terima kasih');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => "Ada toko baru bernama \"{$this->userStore->name}\" yang mana telah dibuat oleh {$notifiable->name}.",
            'action' => $this->storeLink,
            'title' => 'Ada Toko Baru',
        ];
    }
}