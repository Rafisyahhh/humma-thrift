@extends('layouts.auth')
@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">Masuk</h5>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="review-inner-form ">
                            <div class="review-form-name">
                                <label for="email" class="form-label">Surat Elektronik</label>
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Surat elektronik"
                                    value="{{ old('email') }}" name="email" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata sandimu"
                                    required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name checkbox">
                                <div class="checkbox-item d-flex align-items-center">
                                    <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="m-0">
                                        Remember Me</label>
                                </div>
                                <div class="forget-pass">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            <p>Lupa Password</p>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Masuk</button>
                            <span class="shop-account">Belum punya akun?<a href="{{ route('register') }}">Daftar
                                    disini</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
