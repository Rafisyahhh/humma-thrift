@extends('layouts.panel')

@section('title', 'Tarik Dana')

@push('style')
    <style>
        .table-view {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            gap: .5rem;
            display: flex;
            flex-direction: column;
        }

        .table-header,
        .table-body {
            display: flex;
            width: 100%;
            background-color: #f8f9fa;
        }

        .table-header {
            background-color: #343a40;
            color: #fff;
            font-weight: bold;
            border-radius: .5rem;
        }

        .table-header .table-item,
        .table-body .table-item {
            flex: 1;
            padding: 1rem 1.5rem;
            font-size: 14px !important;
        }

        .table-body {
            background-color: #fff;
            transition: all .2s;
            border: 1px solid #eee;
            border-radius: .5rem;
        }

        .table-body .table-item {
            color: #212529;
        }

        .table-body .table-item a {
            font-size: 14px;
        }

        .table-body:hover {
            background-color: #f8f9fa;
        }
    </style>

    <style>
        /* Wrapper untuk informasi akun */
        .account-info-wrapper {
            display: flex;
            align-items: center;
            padding: 1rem;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        /* Avatar akun */
        .account-avatar {
            flex-shrink: 0;
            margin-right: 14px;
        }

        .account-avatar img {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        /* Detail akun */
        .account-detail {
            display: flex;
            flex-direction: column;
        }

        .account-detail h5 {
            font-size: 18px;
            margin: 0;
            color: #333;
        }

        .account-detail h5 span {
            font-size: 16px;
            color: #777;
        }

        .account-detail p {
            margin: 0.5rem 0 0;
            font-size: 14px;
            color: #444;
        }
    </style>
@endpush

@section('content')
    <section id="withdrawals">
        <div class="d-flex flex-column mb-4 justify-content-between">
            <h5 class="mb-3">Detail #{{ $withdrawal->transaction_id }}</h5>
            <a href="{{ route('seller.withdraw.index') }}"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
        </div>
    </section>
@endsection
