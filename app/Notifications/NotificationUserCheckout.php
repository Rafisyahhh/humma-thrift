<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;

class NotificationUserCheckout extends Notification
{
    use Queueable;

    private Model $transaction;
    private Collection $orders;

    /**
     * Create a new notification instance.
     */
    public function __construct(Model $transaction, Collection $orders)
    {
        $this->transaction = $transaction;
        $this->orders = $orders;
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
        $urlTransaction = route('user.transaction.show', $this->transaction->reference_id);
        $orders = $this->orders;
        $transaction = $this->transaction;

        return (new MailMessage)->markdown('mail.invoice.unpaid', compact('notifiable', 'urlTransaction', 'orders', 'transaction'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Segera Bayar Yuk!',
            'url' => route('user.transaction.show', $this->transaction->id),
            'data' => 'Kamu baru saja checkout beberapa barang. Yuk segera lakukan pembayaran biar segera diantar ke alamatmu.',
        ];
    }
}
