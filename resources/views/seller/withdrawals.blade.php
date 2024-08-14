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
            background-color: #1c3879;
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
    <style>
        #trx-section {
            margin-top: 2rem;
        }

        #trx-section .heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        #trx-section .form-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        #trx-section .form-group .form-control {
            font-size: 14px !important;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
        }

        #trx-section .form-group .form-select {
            font-size: 14px !important;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
        }

        #trx-section .form-group .btn {
            padding: 0.5rem 1rem;
            font-size: 14px !important;
            border-radius: .25rem !important;
            border: none;
        }

        #trx-section .form-group .btn-primary {
            background-color: #1c3879;
            color: #fff;
            cursor: pointer;
        }

        #trx-section .form-group .btn-primary:hover {
            background-color: #1c3879;
        }
    </style>
@endpush

@section('content')
    <section id="withdrawals">
        <div class="d-flex mb-4 justify-content-between align-items-center">
            <h5 class="mb-0">Penarikan Dana</h5>
            <a href="{{ route('seller.withdraw.create') }}" class="shop-btn float-left mb-4" style="color: white;">Ajukan</a>
        </div>
        <div id="trx-section">
            <form action="{{ url()->current() }}" class="form-group">
                <div class="filter">
                    <select id="status" name="status" class="form-select form-select-lg"
                        aria-label="Default select example" style="width: 200px;">
                        <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu Antrean
                        </option>
                        <option value="processed" {{ request('status') == 'processed' ? 'selected' : '' }}>Diproses</option>
                        <option value="complete" {{ request('status') == 'complete' ? 'selected' : '' }}>Selesai</option>
                        <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Gagal
                        </option>
                    </select>
                </div>
                <input type="date" id="date-range" class="form-control" name="date"
                    value="{{ old('date', request()->get('date')) }}" style="font-size: 1rem" />
                <input type="text" id="trx-id" name="trx" class="form-control"
                    value="{{ old('trx', request()->get('trx')) }}" placeholder="Misal: WTH-00001"
                    style="font-size: 1rem" />
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
    </section>
    <div id="withdrawal">
        @include('seller.filterwithdrawal', ['withdrawals' => $withdrawals])
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
@push('script')
    <script>
        async function applyFilter(status, search = '', date = '', e = null) {
            if (e !== null) e.preventDefault();

            try {
                const url = new URL('{{ route('seller.withdraw.index') }}');
                url.searchParams.append('status', status);
                url.searchParams.append('trx', search);
                url.searchParams.append('date', date);

                const response = await fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) throw new Error('Network response was not ok');

                const data = await response.json();

                $('#withdrawal').html(data.withdrawalHTML ||
                    '<tr><td colspan="5" class="text-center no-data-message"><img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;"><p>Tidak ada data</p></td></tr>'
                    );
            } catch (error) {
                alert('Terjadi kesalahan saat memfilter konten.');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const statusElement = document.querySelector('select[name="status"]');
            const searchElement = document.querySelector('input[name="trx"]');
            const dateElement = document.querySelector('input[name="date"]');

            // Fetch initial data based on current parameters
            const initialStatus = statusElement ? statusElement.value : '';
            const initialSearch = searchElement ? searchElement.value : '';
            const initialDate = dateElement ? dateElement.value : '';
            applyFilter(initialStatus, initialSearch, initialDate);

            // Add event listeners
            statusElement.addEventListener('change', function() {
                applyFilter(this.value, searchElement.value, dateElement.value);
            });

            searchElement.addEventListener('input', function() {
                applyFilter(statusElement.value, this.value, dateElement.value);
            });

            dateElement.addEventListener('input', function() {
                applyFilter(statusElement.value, searchElement.value, this.value);
            });
        });
    </script>
@endpush
