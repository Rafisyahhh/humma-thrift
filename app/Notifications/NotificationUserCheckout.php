<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationUserCheckout extends Notification
{
    use Queueable;

    private Model $data;

    /**
     * Create a new notification instance.
     */
    public function __construct(Model $data)
    {
        $this->data = $data;
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
                    ->subject("Halo " . $notifiable->name . ", Segera Selesaikan Pembayaranmu!")
                    ->greeting("Hai, " . $notifiable->name . "!")
                    ->line('Terima kasih telah berbelanja di toko kami. Kamu baru saja melakukan checkout beberapa barang.')
                    ->line('Jangan lupa untuk segera melakukan pembayaran agar pesananmu bisa segera kami proses dan kirim ke alamatmu.')
                    ->line('Berikut adalah detail pesananmu:')
                    ->line($this->buildOrderDetailsTable())
                    ->action('Lihat Detail Pesanan', url('/orders/' . $this->data->id))
                    ->line('Terima kasih telah menggunakan aplikasi kami!')
                    ->salutation('Salam hangat, Tim Kami');
    }

    /**
     * Build the order details table as an HTML string.
     *
     * @return string
     */
    protected function buildOrderDetailsTable(): string
    {
        return "
            <table style='width: 100%; border-collapse: collapse;'>
                <tr>
                    <th style='border: 1px solid #ddd; padding: 8px;'>ID Tagihan</th>
                    <td style='border: 1px solid #ddd; padding: 8px;'>" . $this->data->reference_id . "</td>
                </tr>
                <tr>
                    <th style='border: 1px solid #ddd; padding: 8px;'>Nama Produk</th>
                    <td style='border: 1px solid #ddd; padding: 8px;'>" . $this->data->product->name . "</td>
                </tr>
                <tr>
                    <th style='border: 1px solid #ddd; padding: 8px;'>Jumlah Barang</th>
                    <td style='border: 1px solid #ddd; padding: 8px;'>" . $this->data->quantity . "</td>
                </tr>
                <tr>
                    <th style='border: 1px solid #ddd; padding: 8px;'>Total Harga</th>
                    <td style='border: 1px solid #ddd; padding: 8px;'>Rp" . number_format($this->data->total, 0, ',', '.') . "</td>
                </tr>
            </table>
        ";
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->data->id,
            'reference_id' => $this->data->reference_id,
            'product_name' => $this->data->product->name,
            'quantity' => $this->data->quantity,
            'total_price' => $this->data->total,
            'message' => 'Kamu baru saja checkout beberapa barang. Yuk segera lakukan pembayaran biar segera diantar ke alamatmu.',
        ];
    }
}
