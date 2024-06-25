@extends('layouts.home')

@section('title', 'Daftar')

@section('content')
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section row">
                <div class="review-form col-md-6 mx-auto" style="height: 100%">
                    @include('components.show-errors')

                    <h5 class="comment-title">Daftar</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="Mis: Akbar Rafsyah"
                                    autocomplete="name" autofocus />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="account-inner-form">
                            <div class="review-form-name">
                                <label for="username" class="form-label">Nama Pengguna (Tanpa tanda "@")</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" placeholder="Mis: akbarrafsyah"
                                    autocomplete="username" autofocus />
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="email" class="form-label">Surel</label>
                                <input id="email" type="email" placeholder="user@gmail.com"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}"  autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="password-confirm" class="form-label">Ketik Ulang Kata Sandi</label>
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation"  autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Daftar</button>
                            <span class="shop-account">Sudah punya akun?<a href="{{ route('login') }}">Masuk disini</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
