@extends('layouts.panel')

@section('style')

    <head>
        <style>
            .table-row.ticket-row:hover {
                background-color: rgba(28, 56, 121, 0.1) !important;
            }

            .filter {
                margin-left: auto;
                padding: 10px;
            }

            .form-select {
                font-size: 1.25rem;
                padding: 0.75rem;
                border-radius: 0.5rem;
            }

            .section {
                margin-bottom: 20px;
            }

            .section-title {
                margin-bottom: 10px;
                font-size: 18px;
                border-bottom: 1px solid #ddd;
                padding-bottom: 5px;
            }

            .details-table {
                width: 100%;
                border-collapse: collapse;
            }

            .details-table th,
            .details-table td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }

            .details-table th {
                background-color: #f0f0f0;
            }

            .total {
                font-size: 18px;
                font-weight: bold;
                text-align: right;
            }

            button {
                font-size: 15px;
            }

            .product-details table {
                width: 100%;
                border-collapse: collapse;
                /* Menghilangkan jarak antar sel */
            }

            .product-details th,
            .product-details td {
                text-align: left;
                padding: 10px;
                color: rgba(0, 0, 0, 0.4);
                /* Warna teks abu-abu */
            }

            .product-details th {
                font-weight: normal;
                font-size: 17px;
            }

            .product-details .inner-text {
                font-size: 17px;
                color: rgba(0, 0, 0, 0.7);
                /* Warna teks sedikit lebih gelap untuk kontras */
            }

            .table-wrapper-center .table-heading {
                color: white;
                /* Sets text color to white */
            }
        </style>
    </head>
@endsection
@section('content')
    <section class="product-description">
        <div class="container">
            <div class="product-detail-section">
                <nav class="d-flex justify-content-between align-items-center">
                    <div class="nav nav-tabs" id="nav-tab" style="border:none;" role="tablist">
                        <button class="nav-link active me-2" id="nav-produk-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-produk" type="button" role="tab" aria-controls="nav-produk"
                            aria-selected="true" style="border-radius:1rem;">
                            Produk
                        </button>
                        <button class="nav-link" id="nav-lelang-tab" data-bs-toggle="tab" data-bs-target="#nav-lelang"
                            type="button" role="tab" aria-controls="nav-lelang" aria-selected="false"
                            style="border-radius:1rem;">
                            Lelang
                        </button>
                    </div>

                    <div class="filter">
                        <select id="deliveryStatus" name="delivery_status" class="form-select form-select-lg" aria-label="Default select example" style="width: 200px; border-color: #1c3879">
                            <option value="" {{ request('delivery_status') == '' ? 'selected' : '' }}>Semua</option>
                            <option value="selesaikan pesanan" {{ request('delivery_status') == 'selesaikan pesanan' ? 'selected' : '' }}>Selesaikan Pesanan</option>
                            <option value="dikemas" {{ request('delivery_status') == 'dikemas' ? 'selected' : '' }}>Dikemas</option>
                            <option value="diantar" {{ request('delivery_status') == 'diantar' ? 'selected' : '' }}>Diantar</option>
                            <option value="diterima" {{ request('delivery_status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="selesai" {{ request('delivery_status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>


                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-produk" role="tabpanel" aria-labelledby="nav-produk-tab"
                        tabindex="0" data-aos="fade-up">
                        <div  id="orderproduk" class="cart-section">
                            {{-- @include('user.filter', ['transactions' => $transaction]) --}}
                            @include('user.filter', ['orders' => $orders])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-lelang" role="tabpanel" aria-labelledby="nav-lelang-tab"
                        tabindex="0">
                        <div id="auctionproduk" class="cart-section">
                            @include('user.filterauctions', ['auctions' => $auctions])
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


@section('script')

{{-- <script>
    function applyFilter(value, e = null) {
        if (e !== null) {
            e.preventDefault();
        }
        $.ajax({
            url: '{{ route('user.order') }}',
            type: 'GET',
            data: { delivery_status: value },

            success: function(data) {
                $('#orderproduk').html(data.orderHTML);
                $('#auctionproduk').html(data.auctionHTML);
            },
            error: function() {
                alert('Terjadi kesalahan saat memfilter konten.');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.querySelector('select[name="delivery_status"]');
        selectElement.addEventListener('change', function() {
            applyFilter(this.value);
        });
    });
</script> --}}
<script>
    async function applyFilter(value, e = null) {
        if (e !== null) {
            e.preventDefault();
        }

        try {
            const response = await fetch('{{ route('user.order') }}?delivery_status=' + encodeURIComponent(value), {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            const data = await response.json();

            if (!data.orderHTML.trim()) {
                $('#orderproduk').html('<tr><td colspan="4" class="text-center no-data-message"><img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;"><p>Tidak ada data</p></td></tr>');
            } else {
                $('#orderproduk').html(data.orderHTML);
            }

            if (!data.auctionHTML.trim()) {
                $('#auctionproduk').html('<tr><td colspan="4" class="text-center no-data-message"><img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;"><p>Tidak ada data</p></td></tr>');
            } else {
                $('#auctionproduk').html(data.auctionHTML);
            }
        } catch (error) {
            alert('Terjadi kesalahan saat memfilter konten.');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.querySelector('select[name="delivery_status"]');

        // Fetch initial data based on the default or currently selected value
        const initialValue = selectElement ? selectElement.value : '';
        applyFilter(initialValue);

        selectElement.addEventListener('change', function() {
            applyFilter(this.value);
        });
    });
</script>

@endsection
