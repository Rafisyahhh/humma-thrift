<?php

namespace App\Notifications;

use App\Models\auctions;
use App\Models\User;
use App\Models\UserStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class KalahLelang extends Notification {
    use Queueable;

    public auctions $auctions;
    public User $user;


    /**
     * Create a new notification instance.
     */
    public function __construct($auctions, $user) {
        $this->auctions = $auctions;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage {
        return (new MailMessage)
            ->subject('Anda kalah lelang')
            ->greeting("Halo {$this->user->email}, produk {$this->auctions->productAuction->title}.")
            ->line("Produk yang anda coba lelang telah dimenangkan oleh {$this->auctions->user->email}.")
            ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array {
        return [
            'data' => "Anda Kalah Lelang untuk produk \"{$this->auctions->productAuction->title}\".",
            'image' => $this->auctions->productAuction->thumbnail,
            'title' => 'Anda Kalah Lelang',
            'url' => route('store.product.detail', [
                'store' => $this->auctions->productAuction->userStore->username,
                'product' => $this->auctions->productAuction->slug
            ])
        ];
    }
}