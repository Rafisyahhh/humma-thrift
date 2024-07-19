<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\TransactionOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;

class UserInvoiceProductPaidNotification extends Notification
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
        $transaction = $this->transaction;
        $orders = $this->order;
        $urlTransaction = route('user.transaction.show', $this->transaction->reference_id);

        return (new MailMessage)
            ->subject("Tagihan Anda Sudah Dibayarkan")
            ->markdown('mail.invoice.paid', compact('transaction', 'orders', 'notifiable', 'urlTransaction'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Tagihanmu Udah Dibayar!',
            'url' => route('user.transaction.show', $this->transaction->id),
            'data' => "Kamu baru saja membayarkan tagihan dengan #{$this->transaction->id}.",
        ];
    }
}
