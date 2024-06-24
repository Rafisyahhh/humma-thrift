@extends('layouts.panel')

@section('content')
    <div class="container">
        <form action="{{ route('user.update-password.update', auth()->id()) }}" method="POST">
            @csrf
            @method('PUT')
            <h5 class="comment-title">Perbaharui Sandi</h5>
            <p class="paragraph">Silahkan perbaharui sandi anda.</p>
            <div class="review-form">
                <div class="account-inner-form">
                    @foreach ([
                        'old-password' => 'Sandi Lama*',
                        'password' => 'Sandi Baru*',
                        'password_confirmation' => 'Ulangi Sandi*',
                    ] as $field => $label)
                        <div class="review-form-name mb-4">
                            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                            <input type="password" id="{{ $field }}" name="{{ $field }}"
                                class="form-control @error($field) is-invalid @enderror" placeholder="******" required />
                            @error($field)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="submit-btn">
                <button type="submit" class="shop-btn update-btn">Ganti Sandinya</button>
            </div>
        </form>
    </div>
@endsection
