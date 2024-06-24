@extends('layouts.panel')

@section('style')
  <style>
    .invalid-feedback {
      font-size: 1.275em;
    }
  </style>
@endsection

@section('content')
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
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
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

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: #f5b301;
}

</style>
<div class="wishlist">
    <div class="cart-content">
        <h5 class="cart-heading mb-3">Riwayat Transaksi</h5>
    </div>
    <div class="cart-section wishlist-section">

        @forelse ($transaction as $item)
        <div class="card mb-5">
            <table>
                <tbody>
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    <img src="{{ asset($item['order']['product']['cover_image']) }}" alt="img">
                                </div>
                                <div class="wrapper-content">
                                    <h5 class="heading">{{ $item['order']['product']['title'] }}</h5>
                                    <p class="paragraph">Rp{{ number_format($item['order']['product']['price'], 0, '', '.') }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="wrapper-content me-5" style="float: right; text-align: end;">
                                <h5 class="heading">{{ App\Http\Controllers\HistoryController::formatTanggal($item['created_at']) }}</h5>
                                <p class="paragraph opacity-75 pt-1">
                                    {{ Carbon\Carbon::parse($item['created_at'])->format('d F Y') }}
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                            </div>
                        </td>
                        <td>
                            <div class="wrapper-content me-5" style="float: right; text-align: end;">
                                <button class="shop-btn openModal" data-id="{{ $item['id'] }}">Beri Nilai</button>
                            </div>
                        </td>
                    </tr>
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
                            <img src="{{ asset($item['order']['product']['cover_image']) }}" alt="img" style="height: 15rem; border: 1px solid rgba(126, 163, 219, 0.40); border-radius: 8px;">
                        </div>
                        <div class="wrapper-content mx-5">
                            <h5 class="heading">{{ $item['order']['product']['title'] }}</h5>
                            <p class="paragraph">Rp{{ number_format($item['order']['product']['price'], 0, '', '.') }}</p>
                        </div>
                    </div>
                </td>

                <form class="mt-5">
                    <hr>
                    <div class="row-rating">
                        <label for="produk-rating" class="form-label mb-2" style="font-size: 19px;">Nilai Produk </label>
                        <div class="rating" style="margin-left: 100px;">
                            <input type="radio" id="produk-star1" name="produk-rating" value="1" /><label for="produk-star1" title="Buruk">&#9733;</label>
                            <input type="radio" id="produk-star2" name="produk-rating" value="2" /><label for="produk-star2" title="Cukup">&#9733;</label>
                            <input type="radio" id="produk-star3" name="produk-rating" value="3" /><label for="produk-star3" title="Baik">&#9733;</label>
                            <input type="radio" id="produk-star4" name="produk-rating" value="4" /><label for="produk-star4" title="Sangat Baik">&#9733;</label>
                            <input type="radio" id="produk-star5" name="produk-rating" value="5" /><label for="produk-star5" title="Luar Biasa">&#9733;</label>
                        </div>
                    </div>

                    <div class="row-rating">
                        <label for="toko-rating" class="form-label mb-2" style="font-size: 19px; ">Nilai Toko </label>
                        <div class="rating" style="margin-left: 121px;">
                            <input type="radio" id="toko-star1" name="toko-rating" value="1" /><label for="toko-star1" title="Buruk">&#9733;</label>
                            <input type="radio" id="toko-star2" name="toko-rating" value="2" /><label for="toko-star2" title="Cukup">&#9733;</label>
                            <input type="radio" id="toko-star3" name="toko-rating" value="3" /><label for="toko-star3" title="Baik">&#9733;</label>
                            <input type="radio" id="toko-star4" name="toko-rating" value="4" /><label for="toko-star4" title="Sangat Baik">&#9733;</label>
                            <input type="radio" id="toko-star5" name="toko-rating" value="5" /><label for="toko-star5" title="Luar Biasa">&#9733;</label>
                        </div>
                    </div>
                    <hr>
                    <label for="ulasan" class="form-label" style="font-size: 18px;">Beri Ulasan :</label> <br>
                    <textarea id="deskripsi" name="ulasan" class="form-control" placeholder="Masukkan ulasan" rows="7" style="font-size: 17px;"></textarea>

                    <button type="submit" class="shop-btn" style="margin-left: 22rem;">Kirim Ulasan</button>
                </form>

            </div>
        </div>
        @empty
        @endforelse

    </div>
</div>


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

@endsection
