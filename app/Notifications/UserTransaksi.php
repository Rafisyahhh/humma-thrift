<?php

namespace App\Notifications;

use App\Models\TransactionOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserTransaksi extends Notification
{
    use Queueable;

    public TransactionOrder $transactions;

    /**
     * Create a new notification instance.
     */
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $Product = $this->transactions->Product ?? null;
        $userStore = $Product ? $Product->userStore : null;

        $url = $userStore ? route('store.product.detail', [
            'store' => $userStore->username,
            'product' => $Product->slug
        ]): route('user.userhome');


        return [
            'title' => "Pesanan diterima",
            'data' => "Pesanan Anda Telah Diterima oleh seller.",
            'url' => $url
                // 'store' => $this->TransactionOrder->Product->title,
                // 'product' => $this->TransactionOrder->Product->slug
        ];
    }
}
