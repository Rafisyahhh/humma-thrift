<?php

namespace App\Notifications;

use App\Models\ProductAuction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellerLelang extends Notification
{
    use Queueable;

    public ProductAuction $productAuction;

    /**
     * Create a new notification instance.
     */
    public function __construct(ProductAuction $productAuction)
    {
        $this->productAuction = $productAuction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'data' => " mengikuti lelang .",
            // 'data' => "\"{$this->productAuction->user->username}\" mengikuti lelang \"{$this->productAuction->title}\".",
            // 'image' => $this->productAuction->thumbnail,
            // 'title' => "{$this->productAuction->user->username} Mengikuti Lelang",
            // Uncomment and adjust the URL if needed
            // 'url' => route('store.product.detail', [
            //     'store' => $this->productAuction->userStore->username,
            //     'product' => $this->productAuction->slug
            // ]),
        ];
    }
}

