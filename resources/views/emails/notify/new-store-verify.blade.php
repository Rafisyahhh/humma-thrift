@component('mail::message')
# Verifikasi Toko Baru Anda

Halo {{ $userStore->user->fullname }},

Toko baru Anda memerlukan verifikasi. Silakan klik tombol di bawah ini untuk memverifikasi toko Anda:

@component('mail::button', ['url' => route('user.verify.store', $userStore->verification_code)])
Verifikasikan
@endcomponent

Jika Anda tidak membuat toko ini, silakan abaikan email ini.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
