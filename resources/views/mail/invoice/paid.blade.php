<x-mail::message>
# Halo {{ $notifiable->name }}, tagihanmu sudah dibayar!

Hai, {{ $notifiable->name }}!

Terima kasih telah berbelanja di toko kami. Kamu baru saja membayar tagihan yang sebelumnya sudah kamu bayar.

## Berikut adalah detail pesananmu:

<x-mail::table>
| Detail | Nilai |
|:-------|:------|
| Nomor Tagihan | {{ $transaction->reference_id }} |
| Tanggal Terbit | {{ $transaction->created_at->locale('id')->isoFormat('D MMMM YYYY') }} |
| Total Harga | @currency($transaction->total) |
</x-mail::table>

## Dan berikut adalah detail barang yang dipesan:

<x-mail::table>
| Nama Produk  | Jumlah Barang |
|:-------------|:--------------|
@foreach ($orders as $order)
@if($order->product)
| {{ $order->product->title }} | x1 |
@else
| {{ $order->product_auction->title }} | x1 |
@endif
@endforeach
</x-mail::table>

<x-mail::button :url="$urlTransaction">
Lihat Detail Pesanan
</x-mail::button>

Terima kasih telah menggunakan aplikasi kami!

Salam hangat,<br>
Tim Kami
</x-mail::message>
