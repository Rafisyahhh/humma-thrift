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

    <style>
        h3 {
            font-size: 17.5px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .items {
            display: flex;
            width: 100%;
            flex-direction: row;
            gap: 1rem;
        }

        .item {
            background-color: #ffffff;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            flex-basis: calc(33.333% - 1rem);
            box-sizing: border-box;
            margin-bottom: 8px;
        }

        .item h4 {
            font-size: 21px;
            font-weight: 500;
            color: #333333;
            margin-bottom: 0.5rem;
        }

        .item p.mb-0 {
            margin-bottom: 0;
            color: #666666;
        }
    </style>
@endpush

@section('content')
    <section id="withdrawals">
        <div class="d-flex flex-column mb-4 justify-content-between">
            <h5 class="mb-3">Detail #{{ $withdrawal->transaction_id }}</h5>
            <a href="{{ route('seller.withdraw.index') }}"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
        </div>

        <div class="mb-3">
            <h3>Data Penarikan</h3>
            <div class="items">
                <div class="item">
                    <h4>@currency($withdrawal->amount)</h4>
                    <p class="mb-0">Nominal Penarikan</p>
                </div>

                <div class="item">
                    <h4 class="bg-{{ $withdrawal->status->color() }} p-2 px-3 text-white rounded"
                        style="width: max-content">{{ $withdrawal->status->label() }}</h4>
                    <p class="mb-0">Status</p>
                </div>

                <div class="item">
                    <h4>{{ $withdrawal->created_at->locale('id')->isoFormat('D MMMM YYYY') }}</h4>
                    <p class="mb-0">Tanggal Diajukan</p>
                </div>
            </div>
            <div class="items">
                <div class="item">
                    <h4>{{ $withdrawal->bank->shortname }}</h4>
                    <p class="mb-0">Provider Bank</p>
                </div>

                <div class="item">
                    <h4>{{ $withdrawal->bank_number }}</h4>
                    <p class="mb-0">Nomor Rekening</p>
                </div>

                <div class="item">
                    @if ($withdrawal->status === WithdrawalStatusEnum::COMPLETED)
                        <h4>{{ $withdrawal->updated_at->locale('id')->isoFormat('D MMMM YYYY') }}</h4>
                        <p class="mb-0">Tanggal Transfer</p>
                    @else
                        <h4>-</h4>
                    @endif
                </div>
            </div>
            <div class="item">
                @if ($withdrawal->status === WithdrawalStatusEnum::COMPLETED)
                    <h4 class="mb-0 text-center">Bukti Pembayaran</h4>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/' . $withdrawal->reason) }}" alt="" width="50%">
                    </div>
                @elseif ($withdrawal->status === WithdrawalStatusEnum::FAILED)
                    <h4 class="mb-0">Alasan Gagal</h4>
                    <p>{{ $withdrawal->reason }}</p>
                @else
                    <h4> - </h4>
                @endif
            </div>
        </div>
    </section>
@endsection
