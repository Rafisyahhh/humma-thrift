@extends('layouts.home')

@section('title', 'Reset Password')

@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form" style="height: 100%">
                    <h5 class="comment-title mt-0">Reset Password</h5>
                    <form method="POST" action="{{ route('password.update') }}" id="reset-password-form">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="review-inner-form">
                            <div class="review-form-name">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name">
                                <label for="password" class="form-label">Kata Sandi Baru</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                <div class="progress mt-2" style="min-height: 2rem;">
                                    <div id="password-strength-meter" class="progress-bar" role="progressbar"
                                        style="width: 0%; padding: .5rem 0; font-size: 1rem; min-height: 2rem;"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name">
                                <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi Baru</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn text-white">Reset Password</button>
                            <span class="shop-account" style="gap: unset;">Masih ingat sandinya? <a href="{{ route('login') }}" class="m-0">Masuk disini</a>.</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        const passwordField = document.getElementById('password');
        const meter = document.getElementById('password-strength-meter');

        passwordField.addEventListener('input', function() {
            const password = passwordField.value;
            const strength = calculatePasswordStrength(password);

            meter.style.width = `${strength}%`;
            meter.textContent = `${strength}%`;

            // Ubah warna progress bar berdasarkan kekuatan password
            if (strength >= 0 && strength < 40) {
                meter.classList.remove('bg-warning', 'bg-success');
                meter.classList.add('bg-danger');
            } else if (strength >= 40 && strength < 80) {
                meter.classList.remove('bg-danger', 'bg-success');
                meter.classList.add('bg-warning');
            } else {
                meter.classList.remove('bg-danger', 'bg-warning');
                meter.classList.add('bg-success');
            }
        });

        function calculatePasswordStrength(password) {
            const hasUpperCase = /[A-Z]/.test(password);
            const hasLowerCase = /[a-z]/.test(password);
            const hasNumbers = /[0-9]/.test(password);
            const hasNonalphas = /\W/.test(password);
            let strength = 0;

            if (password.length >= 8) {
                strength += 20;
            }

            if (password.length >= 12) {
                strength += 20;
            }

            if (hasUpperCase && hasLowerCase) {
                strength += 20;
            }

            if (hasNumbers) {
                strength += 20;
            }

            if (hasNonalphas) {
                strength += 20;
            }

            return strength;
        }
    </script>
@endpush
