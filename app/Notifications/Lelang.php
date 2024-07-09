<?php

namespace App\Notifications;

use App\Models\auctions;
use App\Models\UserStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Lelang extends Notification
{
    use Queueable;

    public auctions $auctions;


    /**
     * Create a new notification instance.
     */
    public function __construct($auctions)
    {
        $this->auctions = $auctions;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->subject('Bid Lelang Anda Terpilih')
                ->greeting("Halo {$this->auctions->user->email}, produk {$this->auctions->productAuction->title}.")
                ->line('Checkout sekarang!!.')
                ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'data' => "Anda Menang Lelang untuk produk \"{$this->auctions->productAuction->title}\" Checkout sekarang!! .",
            'image' => $this->auctions->productAuction->thumbnail,
            'title' => 'Anda Menang Lelang',
            'url' => route('store.product.detail', [
                'store' => $this->auctions->productAuction->userStore->username,
                'product' => $this->auctions->productAuction->slug
            ])
        ];
    }
}
