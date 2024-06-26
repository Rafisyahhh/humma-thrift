@extends('layouts.auth')

@section('title', 'Jadi Penjual')

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
                    <form method="POST" action="{{ route('user.register-seller.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="storename" class="form-label">Nama Toko</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="Mis: Akbar Rafsyah" required
                                    autocomplete="name" autofocus />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="store_logo" class="form-label">Profil Toko</label>
                                        <input id="store_logo" type="file" placeholder="user@gmail.com"
                                            class="form-control @error('store_logo') is-invalid @enderror" name="store_logo"
                                            value="{{ old('store_logo') }}" accept="image/*" />
                                        @error('store_logo')
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
                                <label for="nic_owner" class="form-label">Nomor Identitas (NIK/KITAS)</label>
                                <input id="nic_owner" type="number" class="form-control @error('nic_owner') is-invalid @enderror"
                                    name="nic_owner" value="{{ old('nic_owner') }}" placeholder="Mis: 0077845356" required
                                    autocomplete="nic_owner" autofocus />
                                @error('nic_owner')
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
                                    autocomplete="new-nic_photo" accept="image/*" />
                                @error('nic_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn text-white">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
