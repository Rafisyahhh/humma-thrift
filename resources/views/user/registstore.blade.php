@extends('user.layouts.app')
@section('tittle', 'Regist Store')
@section('style')
    <style>
        .card {
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .card.selected {
            background-color: rgb(234, 216, 192);
            color: #fff;
        }

        .wrapper-content {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form" style="height: 100%">
                    <h5 class="text-center mb-4">Daftar Sebagai Penjual</h5>
                    <form method="POST" action="">
                        @csrf

                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="storename" class="form-label">Nama Toko</label>
                                <input id="storename" type="text"
                                    class="form-control @error('storename') is-invalid @enderror" name="storename"
                                    value="{{ old('storename') }}" placeholder="Mis: Akbar Rafsyah" required
                                    autocomplete="storename" autofocus />
                                @error('storename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="photostore" class="form-label">Profil Toko</label>
                                        <input id="photostore" type="file" placeholder="user@gmail.com"
                                            class="form-control @error('photostore') is-invalid @enderror" name="photostore"
                                            value="{{ old('photostore') }}">
                                        @error('photostore')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="profilbanner" class="form-label">Sampul Toko</label>
                                        <input id="profilbanner" type="file"
                                            class="form-control @error('profilbanner') is-invalid @enderror"
                                            name="profilbanner" required autocomplete="new-profilbanner">
                                        @error('profilbanner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-inner-form">
                            <div class="review-form-name">
                                <label for="nic" class="form-label">Nomer Identitas</label>
                                <input id="nic" type="text" class="form-control @error('nic') is-invalid @enderror"
                                    name="nic" value="{{ old('nic') }}" placeholder="Mis: 0077845356" required
                                    autocomplete="nic" autofocus />
                                @error('nic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="nic_photo" class="form-label">Foto Kartu Identitas</label>
                                <input id="nic_photo" type="file"
                                    class="form-control @error('nic_photo') is-invalid @enderror" name="nic_photo" required
                                    autocomplete="new-nic_photo">
                                @error('nic_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <a href="{{ route('seller.home') }}" type="submit" class="shop-btn">Daftar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
