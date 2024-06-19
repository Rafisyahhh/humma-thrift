@extends('layouts.panel')

@section('content')
  <div class="container">
    <form action="{{ route('user.update-password.update', auth()->id()) }}" method="POST">
      @csrf
      @method('put')
      <h5 class="comment-title">Update Password</h5>
      <p class="paragraph">Silahkan update password anda.</p>
      <div class="review-form">
        <div class="account-inner-form">
          <div class="review-form-name mb-4">
            <label for="old-password" class="form-label">Password Lama*</label>
            <input type="password" id="old-password" name="old-password" @class(['form-control', 'is-invalid' => $errors->has('old-password')]) placeholder="******"
              autofocus required />
            @error('old-password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="review-form-name mb-4">
            <label for="password" class="form-label">Password Baru*</label>
            <input type="password" id="password" name="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) placeholder="******"
              required />
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="review-form-name mb-4">
            <label for="password-confirm" class="form-label">Ulangi Password*</label>
            <input type="password" id="password-confirm" name="password_confirmation" @class([
                'form-control',
                'is-invalid' => $errors->has('password_confirmation'),
            ])
              placeholder="******" required />
            @error('password_confirmation')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
      </div>
      <div class="submit-btn">
        <button type="submit" class="shop-btn update-btn">Update Password</button>
      </div>
    </form>
  </div>
@endsection
