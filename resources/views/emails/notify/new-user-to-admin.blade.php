@component('mail::message')
# New User Store Created

Hello Admin,

A new user store has been created. Here are the details:
- Name: {{ $userStore->name }}
- Username: {{ $userStore->username }}
- ...

Thank you,<br>
{{ config('app.name') }}
@endcomponent
