@extends('layouts.home')

@section('title', 'Reset Sandi')

@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form" style="height: 100%">
                    <h5 class="comment-title mb-3 mt-0">Reset Sandi</h5>
                    <p class="text-center mb-5 opacity-75">Silahkan gunakan fitur reset sandi dibawah ini untuk menyetel ulang kata sandi akun anda.</p>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="review-inner-form">
                            <div class="review-form-name">
                                <label for="email" class="form-label">Surat Elektronik</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Mis: email@domain.com" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn text-white">Kirimkan Tautan</button>
                            <span class="shop-account" style="gap: unset;">Masih ingat sandinya? <a href="{{ route('login') }}" class="m-0">Masuk disini</a>.</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
