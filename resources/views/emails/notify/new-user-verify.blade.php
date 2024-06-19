@component('mail::message')
# Verify Your New User Store

Hello {{ $userStore->user->fullname }},

Your new user store needs verification. Please click the button below to verify your store:

@component('mail::button', ['url' => route('user.verify.store', $userStore->verification_code)])
Verify Store
@endcomponent

If you did not create this store, please ignore this email.

Thank you,<br>
{{ config('app.name') }}
@endcomponent
