<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\TransactionOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;

class SellerInvoiceProductPaidNotification extends Notification
{
    use Queueable;

    private Order|Collection|null $order;
    private TransactionOrder $transaction;

    /**
     * Create a new notification instance.
     */
    public function __construct(TransactionOrder $transaction)
    {
        $this->transaction = $transaction;
        $this->order = $transaction->order;
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
        $urlTransaction = route('seller.transaction.detail', $this->transaction->getAttribute('reference_id'));
        $orders = $this->order;
        $transaction = $this->transaction;

        return (new MailMessage)
            ->subject("Pesanan Dengan ID #{$this->transaction->getAttribute('transaction_id')}")
            ->markdown('mail.seller.paid', compact('transaction', 'orders', 'notifiable', 'urlTransaction'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => "Pesanan Dengan ID #{$this->transaction->getAttribute('transaction_id')}",
            'url' => route('seller.transaction.detail', $this->transaction->id),
            'data' => "Yuk segera antar pesanan dengan ID #{$this->transaction->id} ke pelanggan.",
        ];
    }
}
