<x-mail::message>
# Halo {{ $notifiable->name }}, Segera Selesaikan Pembayaranmu!

Hai, {{ $notifiable->name }}!

Terima kasih telah berbelanja di toko kami. Kamu baru saja melakukan checkout beberapa barang. Jangan lupa untuk
segera melakukan pembayaran agar pesananmu bisa segera kami proses dan kirim ke alamatmu.

## Berikut adalah detail pesananmu:

<x-mail::table>
| Detail | Nilai |
|:-------|:------|
| Nomor Tagihan | {{ $transaction->reference_id }} |
| Tanggal Terbit | {{ now()->locale('id')->isoFormat('D MMMM YYYY') }} |
| Total Harga | @currency($transaction->total) |
</x-mail::table>

## Dan berikut adalah detail barang yang dipesan:

<x-mail::table>
| Nama Produk  | Jumlah Barang |
|:-------------|:--------------|
@foreach ($orders as $order)
| {{ $order->product->title }} | x1 |
@endforeach
</x-mail::table>

<x-mail::button :url="$urlTransaction">
Lihat Detail Pesanan
</x-mail::button>

Terima kasih telah menggunakan aplikasi kami!

Salam hangat,<br>
Tim Kami
</x-mail::message>
