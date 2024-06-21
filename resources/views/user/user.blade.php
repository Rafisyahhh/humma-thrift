@extends('layouts.panel')

@section('title', 'Beranda Panel')

@push('style')
    <style>
        .card-summary {
            flex-direction: row;
            gap: 1.75rem;
            align-items: center;
            border-radius: 1.5rem;
            padding: 1.25rem;
            border-color: #f0f0f0;
            transition: all .2s;
        }

        .card-summary:hover {
            border-color: #1c3879;
        }

        .card-summary .icon-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 5rem;
            height: 5rem;
            border-radius: 0.5rem;
            background-color: #f0f0f0;
            transition: all .2s;
        }

        .card-summary .icon-wrapper i {
            font-size: 2rem !important;
        }

        .card-summary:hover .icon-wrapper {
            background-color: #1c3879;
            color: white;
        }
    </style>
@endpush

@section('content')
    <div class="row mb-4">
        <div class="col-md-4">
            <a href="javascript:void(0)" class="card card-summary card-body">
                <div class="icon-wrapper">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <h5>30</h5>
                    <p class="mb-0">Pesanan Saya</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="javascript:void(0)" class="card card-summary card-body">
                <div class="icon-wrapper">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <h5>30</h5>
                    <p class="mb-0">Pesanan Saya</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="javascript:void(0)" class="card card-summary card-body">
                <div class="icon-wrapper">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <h5>30</h5>
                    <p class="mb-0">Pesanan Saya</p>
                </div>
            </a>
        </div>
    </div>

    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 0.9rem;">
        <p>Akun anda belum terverifikasi. Silahkan verifikasikan akun anda dari tautan yang sudah kami kirim ke
            surel anda.</p> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsection
