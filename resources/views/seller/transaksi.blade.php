@extends('layouts.panel')

@section('title', 'Transaksi')

@section('style')
    <style>
        .table-row.ticket-row:hover {
            background: rgba(167, 146, 119, 0.40) !important;
        }

        .table-row .table-wrapper .table-heading {
            font-size: 1.5rem;
            font-weight: 500;
            color: #fff;
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
@endsection

@section('content')
    <section class="product-description">
        <div class="container">
            <div class="product-detail-section">
                <h5 class="mb-4">Data Transaksi</h5>

                <nav>
                    <div class="row d-flex flex-wrap">
                        <div class="col-4" style="margin-top: 20px">
                            <div class="nav nav-tabs" id="nav-tab" style="border:none;" role="tablist">
                                <button class="nav-link active me-2" id="nav-produk-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-produk" type="button" role="tab" aria-controls="nav-produk"
                                    aria-selected="true">
                                    Produk
                                </button>
                                <button class="nav-link" id="nav-lelang-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-lelang" type="button" role="tab" aria-controls="nav-lelang"
                                    aria-selected="false">
                                    Lelang
                                </button>
                            </div>
                        </div>
                        <div class="col-8">
                            <div id="trx-section">
                                <form id="filter-form" action="{{ url()->current() }}" class="form-group">
                                    <div class="filter">
                                        <select id="status" name="status" class="form-select form-select-lg"
                                            aria-label="Default select example" style="width: 180px;">
                                            <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua
                                            </option>
                                            <option value="selesaikan pesanan"
                                                {{ request('status') == 'selesaikan pesanan' ? 'selected' : '' }}>
                                                Selesaikan Pesanan
                                            </option>
                                            <option value="dikemas" {{ request('status') == 'dikemas' ? 'selected' : '' }}>
                                                Dikemas</option>
                                            <option value="diantar" {{ request('status') == 'diantar' ? 'selected' : '' }}>
                                                Diantar</option>
                                            <option value="diterima"
                                                {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>
                                                Selesai</option>
                                        </select>
                                    </div>
                                    <input type="date" id="date" class="form-control" name="date"
                                        value="{{ old('date', request()->get('date')) }}" style="font-size: 1rem" />
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-produk" role="tabpanel" aria-labelledby="nav-produk-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="produk">
                            <div class="cart-section wishlist-section">
                                <div class="profile-section">
                                    <div id="transactionproduk">
                                        {{-- @include('seller.filtertransaksiproduk', [
                                            'transaction' => $transaction,
                                        ]) --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-lelang" role="tabpanel" aria-labelledby="nav-lelang-tab"
                        tabindex="0">
                        <div class="wishlist">
                            <div class="cart-section wishlist-section">
                                <div id="transactionlelang">
                                    {{-- @include('seller.filtertransaksilelang', [
                                        'transaction' => $transactionLelang,
                                    ]) --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        async function applyFilter(value, e = null) {
            try {
                const response = await fetch(`{{ route('seller.transaction') }}?status=${value.status ?? ""}&date=${value.date ?? ""}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                const data = await response.json();


                if (!data.transactionprodukHTML) {
                    $('#transactionproduk').html(
                        '<tr><td colspan="4" class="text-center no-data-message"><img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;"><p>Tidak ada data</p></td></tr>'
                    );
                } else {
                    $('#transactionproduk').html(data.transactionprodukHTML);
                }

                if (!data.transactionlelangHTML) {
                    $('#transactionlelang').html(
                        '<tr><td colspan="4" class="text-center no-data-message"><img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;"><p>Tidak ada data</p></td></tr>'
                    );
                } else {
                    $('#transactionlelang').html(data.transactionlelangHTML);
                }
            } catch (error) {
                alert('Terjadi kesalahan saat memfilter konten.', error);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.querySelector('select[name="status"]');
            const dateElement = document.querySelector('input[name="date"]');

            // Fetch initial data based on the default or currently selected value
            const initialValue = selectElement ? selectElement.value : '';
            const initialDate = dateElement ? dateElement.value : '';
            applyFilter(initialValue, initialDate);

            selectElement.addEventListener('change', function() {
                applyFilter({status: this.value});
            });
            dateElement.addEventListener('input', function() {
                applyFilter({date: this.value}, this.value);
            });
        });
    </script>
@endpush
