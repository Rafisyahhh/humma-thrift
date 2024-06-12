@extends('layouts.auth')

@section('content')
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form" style="height: 100%">
                    @include('components.show-errors')

                    <h5 class="comment-title">Daftar</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input id="fullname" type="text"
                                    class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                    value="{{ old('fullname') }}" placeholder="Mis: Akbar Rafsyah" required
                                    autocomplete="fullname" autofocus />
                                @error('fullname')
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
                                    value="{{ old('username') }}" placeholder="Mis: akbarrafsyah" required
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
                                    value="{{ old('email') }}" required autocomplete="email">
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
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
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
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Daftar</button>
                            <span class="shop-account">Sudah punya akun?<a href="{{ route('login') }}">Masuk
                                    disini</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
