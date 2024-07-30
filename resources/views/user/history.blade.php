@extends('layouts.panel')

@push('link')
    <link rel="stylesheet" href="{{ asset('additional-assets/star-rating/dist/star-rating.css') }}" />
@endpush

@push('script')
    <script src="{{ asset('additional-assets/star-rating/dist/star-rating.js') }}"></script>

    <script>
        var stars = new StarRating('.star-rating');
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modals = document.querySelectorAll('.modal');
            var btns = document.querySelectorAll('.openModal');
            var spans = document.querySelectorAll('.close');

            btns.forEach(function(btn, index) {
                btn.onclick = function() {
                    modals[index].style.display = 'flex';
                }
            });

            spans.forEach(function(span, index) {
                span.onclick = function() {
                    modals[index].style.display = 'none';
                }
            });

            window.onclick = function(event) {
                modals.forEach(function(modal) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endpush

@section('style')
    <style>
        .invalid-feedback {
            font-size: 1.275em;
        }
    </style>

    <style>
        #reviewModal {
            z-index: 1030 !important;
        }
    </style>

    <style>
        .row-rating {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            max-width: 60rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .review-form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .review-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .rating {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
            padding: 0 5px;
            transition: color 0.2s;
        }

        .rating input:checked~label,
        .rating input:checked~label~label {
            color: #f5b301;
        }

        .rating label:hover,
        .rating label:hover~label {
            color: #f5b301;
        }

        .row-rating span {
            width: unset;
            height: unset;
            background: unset;
            border-radius: unset;
            background-size: unset;
        }

        .row-rating span:hover {
            background: unset;
        }

        .row-rating .gl-star-rating--stars[class*=" s"]>span {
            background-size: unset;
        }
    </style>
@endsection

@section('content')
    <div class="wishlist">
        @include('components.show-errors')

        <div class="cart-content">
            <h5 class="cart-heading mb-3">Riwayat Transaksi</h5>
        </div>
        <div class="cart-section wishlist-section">

            @forelse ($transactions as $transaction)
                <div class="card mb-5">
                    <table>
                        <tbody>
                            <tr class="table-row ticket-row">
                                <td class="table-wrapper wrapper-product">
                                    <div class="wrapper">
                                        <div class="wrapper-img">
                                            <img src="{{ asset("storage/{$transaction->order->first()->product->thumbnail}") }}"
                                                alt="img">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">{{ $transaction->order->first()->product->title }}</h5>
                                            <p class="paragraph">
                                                @currency($transaction->order->first()->product->price)
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="table-wrapper">
                                    <div class="wrapper-content me-5" style="float: right; text-align: end;">
                                        <h5 class="heading">
                                            {{ App\Http\Controllers\HistoryController::formatTanggal($transaction->created_at) }}
                                        </h5>
                                        <p class="paragraph opacity-75 pt-1">
                                            {{ Carbon\Carbon::parse($transaction->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            {{-- @if(!$item->order->first()->product->ulasan) --}}
                            <tr class="table-row ticket-row">
                                <td class="table-wrapper wrapper-product">
                                    <div class="wrapper">
                                    </div>
                                </td>
                                @foreach($transaction->order as $order)

            <td>
                <div class="wrapper-content me-5" style="float: right; text-align: end;">
                    {{-- Debug output --}}

                    @if(!isset($reviewedProducts[$order->product_id]) || !$reviewedProducts[$order->product_id])
                        <button class="shop-btn openModal" data-id="{{ $order->product_id }}">Beri Nilai</button>
                    @endif
                </div>
            </td>
                                @endforeach

                                {{-- <td>
                                    <div class="wrapper-content me-5" style="float: right; text-align: end;">
                                        @if(!in_array($item->product_id, $ratedProductIds))
                                            <button class="shop-btn openModal" data-id="{{ $item->product_id }}">Beri Nilai</button>
                                        @endif
                                    </div>
                                </td> --}}
                            </tr>
                            {{-- @endif --}}
                        </tbody>
                    </table>
                </div>

                <div id="reviewModal" class="modal">
                    <div class="modal-content">
                        <button class="close" style="float: right; text-align: end;">&times;</button>
                        <h4 style="text-align: center;">Nilai Produk dan Toko</h4>
                        <hr>
                        <td class="table-wrapper wrapper-product">
                            <div class="row-rating mt-4">
                                <div class="wrapper-img">
                                    <img src="{{ asset("storage/{$transaction->order->first()->product->thumbnail}") }}"
                                        alt="img"
                                        style="height: 15rem; width: 15rem; border: 1px solid rgba(126, 163, 219, 0.40); border-radius: 8px;">
                                </div>
                                <div class="wrapper-content mx-5">
                                    <h5 class="heading">{{ $transaction->order->first()->product->title }}</h5>
                                    <p class="paragraph">
                                        @currency($transaction->order->first()->product->price)
                                    </p>
                                </div>
                            </div>
                        </td>
                        <form action="{{ route('user.ulasan') }}" method="post" class="mt-5">
                            @csrf
                            <hr>

                            <div class="mb-3">
                                <div class="row-rating mb-0 align-items-center gap-3">
                                    <label for="produk-rating" class="form-label mb-0" style="font-size: 19px;">Penilaian
                                        Produk </label>
                                    {{-- <label for="star">Pilih penilaian:</label> --}}
                                    <select class="star-rating form-control @error('star') is-invalid @enderror"
                                        name="star"
                                        data-options="{&quot;clearable&quot;:false, &quot;tooltip&quot;:false}"
                                        id="star">
                                        <option value="">Pilih penilaian</option>
                                        <option value="5">Luar Biasa</option>
                                        <option value="4">Sangat Baik</option>
                                        <option value="3">Baik</option>
                                        <option value="2">Cukup</option>
                                        <option value="1">Buruk</option>
                                    </select>
                                </div>

                                @error('star')
                                    <p class="text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>

                            <div>
                                <label for="comment" class="form-label" style="font-size: 18px;">Beri Ulasan :</label>
                                <br>
                                <textarea id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror"
                                    placeholder="Masukkan ulasan" rows="7" style="font-size: 17px;"></textarea>
                                @error('comment')
                                    <p class="text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>

                            <input type="hidden" name="product_id" value="{{ $transaction->order->first()->product->id }}">

                            <button type="submit" class="shop-btn" style="margin-left: 22rem;">Kirim Ulasan</button>
                        </form>
                    </div>
                </div>
                @empty
            {{-- <tr class="table-row ticket-row" style="height:12px;">
                <td colspan="6" class="text-center no-data-message" > --}}
                        <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                            <div class="text-center">
                                <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
                                <p>Tidak ada data</p>
                            </div>
                        </div>
                {{-- </td>
            </tr> --}}
            @endforelse

        </div>
    </div>
@endsection
