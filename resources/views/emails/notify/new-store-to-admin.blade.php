@component('mail::message')
# Toko Pengguna Baru Telah Dibuat

Halo Admin,

Sebuah toko pengguna baru telah dibuat. Berikut adalah detailnya:

<table>
    <tr>
        <td><strong>Nama:</strong></td>
        <td>{{ $userStore->name }}</td>
    </tr>
    <tr>
        <td><strong>Nama Pengguna:</strong></td>
        <td>{{ $userStore->username }}</td>
    </tr>
    <!-- Tambahkan baris lain jika diperlukan -->
</table>

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
