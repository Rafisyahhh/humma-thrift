@extends('layouts.panel')

@section('content')
  <div class="container">
    <form action="{{ route('user.update-password.update', auth()->id()) }}" method="POST">
      @csrf
      @method('PUT')
      <h5 class="comment-title">Update Password</h5>
      <p class="paragraph">Silahkan update password anda.</p>
      <div class="review-form">
        <div class="account-inner-form">
          @foreach ([
          'old-password' => 'Password Lama*',
          'password' => 'Password Baru*',
          'password_confirmation' => 'Ulangi Password*',
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
        <button type="submit" class="shop-btn update-btn">Update Password</button>
      </div>
    </form>
  </div>
@endsection
