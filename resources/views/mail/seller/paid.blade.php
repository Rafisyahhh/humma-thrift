<x-mail::message>
# Halo {{ $notifiable->name }}, Ada barang yang harus dianter nih. Yuk segera anter ke pelanggan biar cepet dapet bintang 5 nya.

Hai, {{ $notifiable->name }}!

Ada pesanan yang udah dibayar sama user, tapi statusnya belum dikirim. Yuk segera kirim ke pelanggan biar cepet dapet cuan dan bintang 5 nya.

## Berikut adalah detail pesanannya:

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
