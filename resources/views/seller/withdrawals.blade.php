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
            background-color: #1c3879 ;
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
@endpush

@section('content')
    <section id="withdrawals">
        <div class="d-flex mb-4 justify-content-between align-items-center">
            <h5 class="mb-0">Penarikan Dana</h5>
            <a href="{{ route('seller.withdraw.create') }}" class="shop-btn float-left mb-4" style="color: white;">Ajukan</a>
        </div>
    </section>

    <div class="table-view">
        <div class="table-header">
            <div class="table-item">#</div>
            <div class="table-item">Tanggal Diajukan</div>
            <div class="table-item">Nominal</div>
            <div class="table-item">Status</div>
        </div>

        @forelse ($withdrawals as $withdrawal)
            <a href="{{ route('seller.withdraw.detail', $withdrawal->transaction_id) }}" class="table-body">
                <div class="table-item flex-column d-flex">
                    <strong>{{ $withdrawal->transaction_id }}</strong>
                    <span class="text-muted">@currency($withdrawal->amount)</span>
                </div>
                <div class="table-item">{{ $withdrawal->created_at->locale('id')->isoFormat('D MMMM YYYY') }}</div>
                <div class="table-item">@currency($withdrawal->amount)</div>
                <div class="table-item">
                    <span
                        class="badge bg-{{ $withdrawal->status->color() }}">{{ $withdrawal->status->label() }}</span>
                </div>
            </a>
        @empty
            <div class="table-item d-flex justify-content-center w-100" style="text-align: center;font-size: 14px;">
                Tidak ada data</div>
        @endforelse

        {{ $withdrawals->links() }}
    </div>
@endsection
