@extends('layouts.home')
@section('title','register')
@section('content')

    <section style="padding-bottom:5rem; align-items: center; justify-content: center; margin: 0; text-align: center; margin-top:50px;">
            <video autoplay muted playsinline loop src="{{asset('storage/video/1.mp4')}}" style="width: 100%; max-width: 200px;"></video>
            <h3>Registrasi Berhasil</h3>
            <p>Silahkan buka email anda untuk mendapatkan notifikasi login</p>
            <a href="{{ url('/') }}" class="shop-btn" >Kembali ke halaman utama</a>
    </section>
@endsection
