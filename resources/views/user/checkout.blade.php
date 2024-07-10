@extends('layouts.home')
@section('title', 'Checkout')
@push('style')
    <style>
        .custom-button {
            background-color: #007bff;
            /* Warna latar belakang biru */
            color: white;
            /* Warna teks putih */
            border: none;
            /* Menghilangkan border default */
            padding: 10px 20px;
            /* Padding */
            font-size: 16px;
            /* Ukuran font */
            border-radius: 4px;
            /* Membuat sudut tombol melengkung */
            transition: background-color 0.3s;
            /* Animasi transisi */
        }

        .custom-button:hover {
            background-color: #0056b3;
            /* Warna latar belakang lebih gelap saat hover */
        }

        .modal {
            display: none;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .close-modal {
            display: flex;
            justify-content: flex-end;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
        }

        .close-modal:hover,
        .close-modal:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .d-flex {
            display: flex;
            align-items: center;
        }

        .m-0 {
            margin: 0;
        }

        /* Style the custom radio button */
        .radio-container {
            display: flex;
            align-items: flex-start;
            /* Mengatur agar radio button dan teks sejajar di bagian atas */
            margin-bottom: 10px;
            /* Jarak antara setiap radio button */
        }

        .custom-radio {
            transform: scale(1.5);
            /* Ubah skala tombol radio */
            margin-top: 3.8rem;
            /* Mengatur posisi radio button agar sejajar dengan teks */
            margin-right: 30px;
            /* Jarak antara radio button dan teks */
        }

        .radio-label {
            font-size: 16px;
            /* Ukuran teks label */
        }

        /* Style the checked state */
        input[type="radio"]:checked+label .custom-radio {
            background-color: #1c3879;
            /* Change color to indicate selection */
        }

        /* Hide the default label text */
        input[type="radio"]+label {
            cursor: pointer;
        }
    </style>
@endpush
    <section class="blog about-blog pb-5">
        <div class="container">
            <div class="blog-heading about-heading">
                <h1 class="heading">Checkout</h1>
            </div>
        </div>
    </section>
    <section class="checkout product footer-padding py-5">
        <div class="container">
            <div class="checkout-section">
                <form class="row gy-5">
                    <div class="col-lg-7">
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="wrapper-heading">Alamat Saya</h5>
                                    <button class="shop-btn openModalAddress fs-5" type="button" style="width: 20rem;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />
                                        </svg>
                                        Tambah Alamat Baru
                                    </button>
                                </div>
                                <p class="fs-5">*pilih alamat yang sesuai dengan alamat anda</p>
                                <hr>
                                <p style="font-size: 1.9rem">Alamat</p>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <div class="mx-5" style="width: 77.5rem;">
                                            @foreach ($addresses as $address)
                                                <div class="radio-container" style="margin-bottom: 10px; width: 77.5rem;">
                                                    <input type="radio" id="option1" name="option" value="option1"
                                                        class="custom-radio">
                                                    <label for="option1" class="radio-label"
                                                        style="display: flex; flex-direction: column; width: 77.5rem;">
                                                        <div
                                                            style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                                                            <p class="mb-1" style="font-size: 17px; margin: 0;">
                                                                <b style="font-size: 17px;">{{ $users->username }}</b> |
                                                                +{{ $users->phone }}
                                                            </p>
                                                            <button type="button" class="openModalUpdate"
                                                                data-modal-id="updateModal{{ $address->id }}"
                                                                style="color: blue; background: none; border: none; padding: 0; cursor: pointer; margin-right: 110px;">
                                                                Ubah
                                                            </button>
                                                        </div>
                                                        <p style="font-size: 15px; margin: 5px 0;">
                                                            {{ $address->address }}
                                                        </p>
                                                    </label>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($product)
                            <div class="checkout-wrapper">
                                <div class="account-section billing-section" style="margin-top: 2.5rem;">
                                    <h5 class="wrapper-heading">Daftar Order</h5>
                                    <div class="order-summery">
                                        <hr>
                                        <div class="subtotal product-total">
                                            <ul class="product-list">
                                                <li>
                                                    <div class="d-flex gap-3">
                                                        <img src="{{ asset("storage/$product->thumbnail") }}"
                                                            width="40" />
                                                        <div class="mt-1">
                                                            <h5 class="wrapper-heading">{{ $product->title }}</h5>
                                                            <p class="paragraph">{{ $product->brand->title }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="price mt-3">
                                                        <h5 class="wrapper-heading">
                                                            Rp{{ number_format($product->price, null, null, '.') }}</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- @elseif ($product_auction)
                            <div class="checkout-wrapper">
                                <div class="account-section billing-section" style="margin-top: 2.5rem;">
                                    <h5 class="wrapper-heading">Daftar Order</h5>
                                    <div class="order-summery">
                                        <hr>
                                        <div class="subtotal product-total">
                                            <ul class="product-list">
                                                <li>
                                                    <div class="d-flex gap-3">
                                                        <img src="{{ asset("storage/".$product_auction->productAuction->thumbnail)}}"
                                                            width="40" />
                                                        <div class="mt-1">
                                                            <h5 class="wrapper-heading">{{ $product_auction->productAuction->title }}</h5>
                                                            <p class="paragraph">{{ $product_auction->productAuction->brand->title }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="price mt-3">
                                                        <h5 class="wrapper-heading">
                                                            Rp{{ number_format($product_auction->auction_price, null, null, '.') }}</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endif
                    </div>

                    <div class="col-lg-5">
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading">Ringkasan Belanja
                                    <button type="button" class="shop-btn openModalPay float-end fs-5" style="width: 15rem"
                                        data-bs-toggle="modal" data-bs-target="#PayModal">Pilih Pembayaran</button>
                                </h5>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">Bayar Menggunakan</h5>
                                        <h5 class="wrapper-heading">
                                            <div class="d-flex gap-3" id="selected-payment-method">
                                                <p id="selected-payment-name"></p>
                                            </div>
                                        </h5>
                                    </div>
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">Total Harga</h5>
                                        <h5 class="wrapper-heading">
                                            {{-- @if ($product) --}}
                                                {{ number_format($product->price, null, null, '.') }}
                                            {{-- @elseif ($product_auction)
                                                {{ number_format($product_auction->auction_price, null, null, '.') }}
                                            @endif --}}
                                        </h5>
                                    </div>
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">Biaya Admin</h5>
                                        <h5 class="wrapper-heading" id="admin-fee">Rp0
                                        </h5>
                                    </div>
                                    <div class="subtotal total">
                                        <h5 class="wrapper-heading">Total Belanja</h5>
                                        <h5 class="wrapper-heading price" id="total-belanja">
                                            Rp0</h5>
                                    </div>
                                    <form action="{{ route('transaction.store') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="shop-btn">Bayar</button>
                                    </form>
                                    <p class="fs-5 mt-1">*Pilih Metode Pembayaran Terlebih Dahulu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Address Modal --}}
    <div id="addressModal" class="modal">
        <div class="modal-content">
            <button class="close-modal mx-5">&times;</button>
            <h5 class="fw-bold" style="text-align: center">Tambahkan Alamat</h5>
            <div class="mx-5">
                <form action="{{ route('user.address.store', auth()->user()->id) }}" method="POST">
                    @csrf
                    <div class="account-inner-form">
                        <div class="review-form-name mb-2">
                            <label for="address" class="form-label"
                                style="background-color: white; font-size: 18px">Alamat</label>
                            <textarea type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                                placeholder="Tambahkan Alamat" rows="5" style=" font-size: 15px"></textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div style="display: flex; justify-content: flex-end;">
                        <button class="shop-btn" type="submit" style="width: 20rem;">Simpan Alamat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- update address Modal --}}
    @foreach ($addresses as $key => $address)
        <div id="updateModal{{ $address->id }}" class="modal">
            <div class="modal-content">
                <button class="close-modal mx-5">&times;</button>
                <h5 class="mb-5" style="text-align: center">Ubah Alamat</h5>
                <div class="mx-5">
                    <form
                        action="{{ route('user.address.edit', ['user' => auth()->user()->id, 'address' => $address->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="account-inner-form">
                            <div class="review-form-name mb-2">
                                <label for="address_update" class="form-label"
                                    style="background-color: white; font-size: 18px">Alamat</label>
                                <textarea name="address_update" id="address_update"
                                    class="form-control @error('address_update') is-invalid @enderror" placeholder="Tambahkan Alamat" rows="5"
                                    style="font-size: 15px">{{ $address->address }}</textarea>
                                @error('address_update')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div style="display: flex; justify-content: flex-end;">
                            <button class="shop-btn" type="submit" style="width: 20rem;">Ubah Alamat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach



    {{-- Pay Modal --}}
    <div id="PayModal" class="modal">
        <div class="modal-content">
            <button class="close-modal mx-5">&times;</button>
            <h5 class="fw-bold" style="text-align: center">Pilih Pembayaran</h5>
            <div class="mx-5 mt-2 mb-5 p-6">
                <div class="radio-container">
                    <div class="row">
                        @foreach ($channels['data'] as $item)
                            <div class="col-md-6">
                                <input type="radio" id="option1" name="method" value="{{ $item['code'] }}"
                                    class="custom-radio">
                                <input type="hidden" name="adminfeeFlat" value="{{ $item['total_fee']['flat'] }}">
                                <input type="hidden" name="adminfeePercent"
                                    value="{{ $item['total_fee']['percent'] }}">
                                <input type="hidden" name="paymentName" value="{{ $item['name'] }}">
                                <label for="option1" class="radio-label">
                                    <div class="d-flex gap-3">
                                        <img src="{{ $item['icon_url'] }}" width="70" />
                                        <p class="fs-3 fw-bold">{{ $item['name'] }}</p>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- script modal tambah address --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the modal element
            var addressModal = document.getElementById("addressModal");

            // Get the button that opens the modal
            var openAddressModalBtn = document.querySelector(".openModalAddress");

            // Get the close button for address modal
            var addressCloseBtn = addressModal.querySelector(".close-modal");

            // When the user clicks the button, open the address modal
            openAddressModalBtn.onclick = function() {
                addressModal.style.display = "block";
            }

            // When the user clicks on close button in address modal, close the address modal
            addressCloseBtn.onclick = function() {
                addressModal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close the address modal
            window.onclick = function(event) {
                if (event.target == addressModal) {
                    addressModal.style.display = "none";
                }
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the modal element
            var payModal = document.getElementById("PayModal");

            // Get the button that opens the modal
            var openPayModalBtn = document.querySelector(".openModalPay");

            // Get the close button for address modal
            var payCloseBtn = payModal.querySelector(".close-modal");

            // When the user clicks the button, open the address modal
            openPayModalBtn.onclick = function() {
                payModal.style.display = "block";
            }

            // When the user clicks on close button in address modal, close the address modal
            payCloseBtn.onclick = function() {
                payModal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close the address modal
            window.onclick = function(event) {
                if (event.target == payModal) {
                    payModal.style.display = "none";
                }
            }
        });
    </script>


    {{-- script modal edit address --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get all buttons that open the modal
            var openUpdateModalBtns = document.querySelectorAll(".openModalUpdate");

            // Loop through each button and attach event listeners
            openUpdateModalBtns.forEach(function(btn) {
                btn.addEventListener("click", function() {
                    // Get the modal ID from data attribute
                    var modalId = btn.getAttribute("data-modal-id");
                    // Get the modal element
                    var updateModal = document.getElementById(modalId);

                    // Show the modal
                    updateModal.style.display = "block";

                    // Get the close button for the modal
                    var updateCloseBtn = updateModal.querySelector(".close-modal");

                    // When the user clicks on close button in the modal, close the modal
                    updateCloseBtn.addEventListener("click", function() {
                        updateModal.style.display = "none";
                    });

                    // When the user clicks anywhere outside of the modal, close the modal
                    window.addEventListener("click", function(event) {
                        if (event.target == updateModal) {
                            updateModal.style.display = "none";
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua input radio
            const paymentMethods = document.querySelectorAll('input[name="method"]');

            // Fungsi untuk menghitung total biaya
            function calculateTotal(productPrice, adminfeeFlat, adminfeePercent) {
                let adminFee = 0;

                // Jika adminfeeFlat null atau 0, gunakan adminfeePercent
                if (!adminfeeFlat) {
                    adminFee = productPrice * (adminfeePercent / 100);
                } else {
                    adminFee = adminfeeFlat;
                }

                const total = productPrice + adminFee;

                document.getElementById('total-belanja').textContent = 'Rp' + total.toLocaleString('id-ID');
            }

            // Event listener untuk setiap metode pembayaran
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    const productPrice = {{ $product->price }};

                    // Dapatkan elemen hidden input yang berisi biaya admin terkait
                    const adminFeeFlatInput = this.nextElementSibling;
                    const adminFeePercentInput = adminFeeFlatInput.nextElementSibling;
                    const paymentNameInput = adminFeePercentInput.nextElementSibling;

                    const adminfeeFlat = parseFloat(adminFeeFlatInput.value);
                    const adminfeePercent = parseFloat(adminFeePercentInput.value);
                    const paymentName = paymentNameInput.value;

                    // Tampilkan biaya admin
                    let adminFeeDisplay = '';
                    if (!adminfeeFlat) {
                        adminFeeDisplay = 'Rp' + (productPrice * (adminfeePercent / 100))
                            .toLocaleString('id-ID');
                    } else {
                        adminFeeDisplay = 'Rp' + adminfeeFlat.toLocaleString('id-ID');
                    }
                    document.getElementById('admin-fee').textContent = adminFeeDisplay;

                    // Tampilkan metode pembayaran yang dipilih
                    document.getElementById('selected-payment-name').textContent = paymentName;

                    // Hitung total belanja
                    calculateTotal(productPrice, adminfeeFlat, adminfeePercent);
                });
            });

            // Kalkulasi total awal tanpa biaya admin (asumsi default)
            calculateTotal({{ $product->price }}, 0, 0);
        });
    </script>
@endpush
