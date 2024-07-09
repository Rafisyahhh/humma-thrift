<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Auctions;

class SellerLelang extends Notification implements ShouldQueue
{
    use Queueable;

    public auctions $auction;

    /**
     * Create a new notification instance.
     */
    public function __construct(Auctions $auction)
    {
        $this->auction = $auction;
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
                    ->line('A new bid has been placed on your auction.')
                    ->line('Product: ' . $this->auction->productAuction->title)
                    ->line('Bid Amount: Rp' . number_format($this->auction->auction_price, 0, ',', '.'))
                    ->action('View Auction', url('/auctions/' . $this->auction->id))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'auction_id' => $this->auction->id,
            'product_title' => $this->auction->productAuction->title,
            'auction_price' => $this->auction->auction_price,
            'user_id' => $this->auction->user_id,
        ];
    }
}
