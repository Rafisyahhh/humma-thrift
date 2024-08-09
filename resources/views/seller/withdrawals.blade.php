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
            display: flex;
            align-items: center;
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

        .withdrawal-btn {
            padding: 0.5rem 1rem;
            font-size: 12px !important;
            border-radius: .25rem !important;
            border: none;
            background-color: #1c3879;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }

        .no-data .table-item {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .reason-failed {
            margin-top: 1rem;
            padding: 1rem;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: .5rem;
        }

        .reason-failed h6 {
            margin-bottom: .5rem;
            color: #721c24;
            font-size: 20px;
            font-weight: bold;
        }

        .reason-failed p {
            margin: 0;
            color: #721c24;
            font-size: 16px;
            line-height: 1.5;
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
            <div class="table-item">Aksi</div>
        </div>

        @forelse ($withdrawals as $withdrawal)
            <div class="table-body">
                <a href="{{ route('seller.withdraw.detail', $withdrawal->transaction_id) }}">
                    <div class="table-item flex-column d-flex">
                        <strong>{{ $withdrawal->transaction_id }}</strong>
                        <span class="text-muted">@currency($withdrawal->amount)</span>
                    </div>
                </a>
                    <div class="table-item">{{ $withdrawal->created_at->locale('id')->isoFormat('D MMMM YYYY') }}</div>
                    <div class="table-item">@currency($withdrawal->amount)</div>
                    <div class="table-item">
                        <span class="badge bg-{{ $withdrawal->status->color() }}">{{ $withdrawal->status->label() }}</span>
                    </div>
                <div class="table-item">
                    @if ($withdrawal->status->value == 'complete')
                        <a role="button" class="btn btn-primary withdrawal-btn" data-bs-toggle="modal"
                            data-bs-target="#detailAlasan{{ $withdrawal->id }}">Lihat Bukti</a>
                    @elseif ($withdrawal->status->value == 'failed')
                        <a role="button" class="btn btn-primary withdrawal-btn" data-bs-toggle="modal"
                            data-bs-target="#detailAlasan{{ $withdrawal->id }}">Lihat Alasan</a>
                    @else
                        <strong> - </strong>
                    @endif
                </div>
            </div>
        @empty
            <div class="table-item d-flex flex-column justify-content-center align-items-center w-100" style="text-align: center;font-size: 14px;">
                <img src="{{ asset('asset-thrift/datakosong.png') }}"
                alt="kosong" style="width: 200px; height: 200px;">
                <p>Tidak ada data</p>
            </div>
        @endforelse

        {{ $withdrawals->links() }}
    </div>
    @foreach ($withdrawals as $item)
        <div class="modal fade" id="detailAlasan{{ $item->id }}" tabindex="-1"
            aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true" style="height: 99%;">
            <div class="modal-dialog" style="margin-left: auto;">
                <div class="login-section account-section p-0">
                    <div class="review-form m-0" style="height: 80%; width: 60rem;">
                        <div class="text-end mb-4">
                            <div class="close-btn">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        @if ($item->reason != null && $item->status->value == 'complete')
                            <div class="reason-complete">
                                <h6 class="text-dark" style="font-size: 20px">Bukti Pembayaran:</h6>
                                <img src="{{ asset('storage/' . $item->reason) }}" alt="">
                            </div>
                        @elseif ($item->reason != null && $item->status->value == 'failed')
                            <div class="reason-failed">
                                <h6>Alasan Gagal:</h6>
                                <p>{{ $item->reason }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection
