<?php

namespace App\Notifications;

use App\Models\auctions;
use App\Models\Product;
use App\Models\ProductAuction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class UserFavorite extends Notification
{
    use Queueable;

    protected $item;
    protected $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($item)
    {
        $this->item = $item;
        $this->type = get_class($item);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    
    public function toArray($notifiable): array
    {
        $username = $this->item->user->username ?? 'Unknown User';
        $title = $this->item->title;

        if ($this->type == Product::class) {
            return [
                'title' => "{$title} ditambahkan ke Favorite",
                'data' => "\"{$username}\" Menambahkan produk \"{$title}\" Ke Favorite.",
                // 'url' => route('product.show', $this->item->id),
            ];
        } elseif ($this->type == ProductAuction::class) {
            return [
                'title' => "{$title} ditambahkan ke Favorite",
                'data' => "\"{$username}\" Menambahkan produk lelang \"{$title}\" Ke Favorite.",
                // 'url' => route('auction.show', $this->item->id),
            ];
        }

        return [];
    }
}
