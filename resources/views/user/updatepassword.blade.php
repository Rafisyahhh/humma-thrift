@php($password = "password")
@extends('layouts.panel')

@section('content')
    <div class="seller-application-section">
        <form class="row" method="POST">
            @csrf
            @method("put")
            <div class="col-lg-7">
                <h5 class="comment-title">Update Password</h5>
                <p class="paragraph">Silahkan update password anda.</p>

                <div class="">
                    <div class="review-form">
                        <div class="account-inner-form">
                            <div class="review-form-name mb-4">
                                <label for="username" class="form-label">Password Sekarang*</label>
                                <input type="password" id="old_password" name="old_password" class="form-control" placeholder="******" />
                            </div>
                            <div class="review-form-name mb-4">
                                <label for="fullname" class="form-label">Password Baru*</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="******" />
                            </div>
                            <div class="review-form-name mb-4">
                                <label for="fullname" class="form-label">Ulangi Password*</label>
                                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="******" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="submit-btn">
                    <button type="submit" class="shop-btn update-btn">Perbarui Profil</button>
                </div>
            </div>
        </form>
    </div>
@endsection
