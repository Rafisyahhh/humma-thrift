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

        .radio-container {
            display: flex;
            justify-content: center;
            /* Centers horizontally */
            align-items: center;
            /* Centers vertically */
            height: 100%;
            /* Ensure the container takes the full height */
        }

        .radio-button-labels {
            position: relative;
            /* Position relative to enable pseudo-element */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Centers elements inside the label horizontally */
            justify-content: center;
            /* Centers elements inside the label vertically */
            text-align: center;
            padding: 20px;
            /* Add padding for better spacing */
            border: 2px solid transparent;
            /* Default border */
            border-radius: 10px;
            /* Rounded corners */
            transition: border-color 0.3s ease, background-color 0.3s ease;
            /* Smooth transition for hover effect */
            cursor: pointer;
            /* Change cursor to pointer for better UX */
        }

        .radio-button-labels:hover {
            border-color: #007bff;
            /* Change border color on hover */
            background-color: #f0f8ff;
            /* Light background color on hover */
        }

        .radio-button-labels:checked~label {
            border-color: #007bff;
            background-color: #f0f8ff;
            color: white;
        }

        .custom-radio:checked+.radio-button-labels {
            border-color: #007bff;
            background-color: #f0f8ff;
        }

        .custom-radio:checked~.radio-button-labels::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background-color: rgba(0, 123, 255, 0.2);
            border: 2px solid #007bff;
            border-radius: 10px;
        }
    </style>
    <style>
        /* Style the form */
        #coForm {
            background-color: #ffffff;
            margin: 50px auto;
            width: 70%;
            min-width: 300px;
        }

        /* Style the input fields */
        input {
            padding: 10px;
            width: 4%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #1c3879;
        }
    </style>

    <style>
        .address-item-wrap {
            margin-bottom: 12px;
        }

        .address-item-wrap input[type="radio"] {
            display: none;
        }

        .address-item-wrap .address-item-listlabel {
            display: flex;
            flex-direction: row-reverse;
            gap: 8px;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all .2s;
        }

        .address-item-wrap .address-item-listlabel:hover {
            background-color: #f5f5f5;
        }

        .address-item-wrap .address-item-listlabel .title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .address-item-wrap .address-item-listlabel p {
            font-size: 14px;
            color: #666;
        }

        .address-item-wrap .address-item-listlabel::before {
            content: "";
            transition: all .2s;
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 1px solid #ccc;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }

        .address-item-wrap input[type="radio"]:checked+.address-item-listlabel::before {
            background-color: white;
            border-color: white;
            box-shadow: inset 0 0 0 4px #1c3879;
        }

        .address-item-wrap input[type="radio"]:checked+.address-item-listlabel {
            background-color: #1c3879;
            border-color: #1c3879;
        }

        .address-item-wrap input[type="radio"]:checked+.address-item-listlabel {
            color: white;
        }

        .address-item-wrap input[type="radio"]:checked+.address-item-listlabel p {
            color: white;
            opacity: .75;
        }

        .address-item-wrap .address-item-listlabel .title {
            font-size: 16px;
            margin-bottom: 0.25rem;
        }
    </style>

    <style>
        .address-placeholder {
            display: flex;
            align-items: center;
            padding-top: 2rem;
            border-top: 1px solid #eee;
            margin-top: 2rem;
        }

        .address-placeholder i {
            font-size: 24px;
            margin-right: 10px;
            width: 5rem;
            height: 5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background:rgba(0, 92, 190, 0.1);
            border-radius: .5rem;
            color:rgba(0, 92, 190)
        }
    </style>
@endpush

@section('content')
    <form id="coForm" action="{{ route('user.transaction.store') }}" method="POST">
        @csrf
        <section class="blog about-blog pb-4 pt-0">
            <div class="container">
                <div class="blog-heading about-heading">
                    <h1 class="heading">Checkout</h1>
                </div>
            </div>
        </section>
        @if ($product)
            <div class="checkout-wrapper">
                <div class="account-section billing-section" style="margin-top: 2.5rem">
                    <h5 class="wrapper-heading">Daftar Pesanan</h5>
                    <div class="order-summery">
                        <hr />

                        <div class="subtotal product-total mb-0">
                            <ul class="product-list">
                                @foreach ($product as $item)
                                    <li>
                                        <div class="d-flex gap-3">
                                            <img src="{{ asset("storage/$item->thumbnail") }}" class="mb-0"
                                                width="60" />
                                            <div class="mt-1">
                                                <h5 class="wrapper-heading" style="font-size: 20px; color: #1c3879;">
                                                    {{ $item->title }}
                                                </h5>
                                                <p class="paragraph">{{ $item->brand->title }}</p>
                                            </div>
                                        </div>
                                        <div class="price mt-3" data-price="{{ $item->price }}">
                                            <h5 class="wrapper-heading" style="font-size: 20px; color: #1c3879;">
                                                @currency($item->price)
                                            </h5>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="address-placeholder">
                            <i class="fas fa-map"></i>
                            <div class="address-placeholder-content">
                                <p class="text-muted">Pilih Alamat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- One "tab" for each step in the form: -->
        <div class="tab mt-3">
            <div class="checkout-wrapper">
                <div class="account-section billing-section">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="wrapper-heading">Alamat Saya</h5>
                        <button class="shop-btn openModalAddress fs-5" type="button" style="width: 20rem">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />
                            </svg>
                            Tambah Alamat Baru
                        </button>
                    </div>
                    <p class="fs-5 text-muted mb-4">Pilih alamat yang sesuai dengan alamat anda</p>

                    <div class="address-list">
                        @foreach ($addresses as $address)
                            <div class="address-item-wrap">
                                <input type="radio" name="addressOption" id="option{{ $address->id }}"
                                    value="{{ $address->id }}" class="d-none" @checked($address->status) />
                                <label class="address-item-listlabel" for="option{{ $address->id }}">
                                    <div class="address-item-list-content">
                                        <div class="title">
                                            {{ $users->name }}
                                            @if ($users->phone)
                                                | {{ $users->phone }}
                                            @endif
                                        </div>
                                        <p>{{ $address->address }}</p>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="tab mt-3">
            <div class="checkout-wrapper">
                <div class="account-section billing-section">
                    <h5 class="fw-bold mb-4" style="text-align: center">Pilih Pembayaran</h5>
                    <div class="mx-5 mt-2 mb-5 p-6">
                        <div class="radio-container">
                            <div class="row">
                                @foreach ($channel_pembayaran as $item)
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <input type="radio" id="payment-method-{{ $loop->index }}" name="method"
                                            value="{{ $item->channel_code }}" class="custom-radio d-none" />
                                        <input type="hidden" name="adminfeeFlat" value="{{ $item->flat }}" />
                                        <input type="hidden" name="adminfeePercent" value="{{ $item->percent }}" />
                                        <input type="hidden" name="paymentName" value="{{ $item->name }}" />

                                        <label for="payment-method-{{ $loop->index }}" class="radio-button-labels">
                                            <div class="d-flex flex-column align-items-center mt-3">
                                                <img src="{{ $item->icon_url }}" height="45" />
                                                <div class="text-center">
                                                    <p class="fs-3 fw-bold">{{ $item->name }}</p>
                                                    <p class="fs-5">
                                                        @currency($item->flat == null ? $product->sum('price') : $item->flat)
                                                    </p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab mt-3">
            <div class="checkout-wrapper">
                <div class="account-section billing-section">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="wrapper-heading fs-1" style="color: #1c3879">
                                <i class="fa-solid fa-location-dot"></i> Alamat Pengirim
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <h5 class="wrapper-heading fs-1" style="color: #1c3879">
                                <i class="fa-solid fa-location-arrow"></i> Alamat Tujuan
                            </h5>
                        </div>
                    </div>
                    <div class="order-summary mt-4">
                        <div class="subtotal product-total">
                            <div class="row">
                                @if ($product)
                                    <div class="col-md-6">
                                        <p class="fw-bold" style="font-size: 17px; margin: 0">
                                            <b style="font-size: 17px">
                                                {{ $product->first()->userstore->name }}

                                                @if ($product->first()->userstore->user->phone)
                                                    | {{ $product->first()->userstore->user->phone }}
                                                @endif
                                            </b>
                                        </p>
                                        <p style="font-size: 17px; margin: 0">
                                            {{ $product->first()->userstore->address }}</p>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <p class="fw-bold" style="font-size: 17px; margin: 0" id="selected-username">
                                        <b style="font-size: 17px">username</b> | +nohp
                                    </p>
                                    <p style="font-size: 17px; margin: 0" id="selected-address">Alamat lengkapnya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout-wrapper mt-3">
                <div class="account-section billing-section">
                    <h5 class="wrapper-heading fs-1" style="color:#1c3879">
                        <i class="fa-brands fa-shopify"></i> Ringkasan Belanja
                    </h5>
                    <div class="order-summery">
                        <div class="subtotal product-total">
                            <h5 class="wrapper-heading" style="font-size: 17px;">Bayar Menggunakan</h5>
                            <h5 class="wrapper-heading" style="font-size: 17px;">
                                <div class="d-flex gap-3" id="selected-payment-method">
                                    <p id="selected-payment-name"></p>
                                </div>
                            </h5>
                        </div>
                        <div class="subtotal product-total">
                            <h5 class="wrapper-heading" style="font-size: 17px;">Total Harga</h5>
                            <h5 class="wrapper-heading" style="font-size: 17px;">
                                @currency($product->sum('price'))
                            </h5>
                        </div>
                        <div class="subtotal product-total">
                            <h5 class="wrapper-heading" style="font-size: 17px;">Biaya Admin</h5>
                            <h5 class="wrapper-heading" style="font-size: 17px;" id="admin-fee">Rp0</h5>
                        </div>
                        <div class="subtotal total">
                            <h5 class="wrapper-heading">Total Belanja</h5>
                            <h5 class="wrapper-heading price" id="total-belanja">@currency(0)</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="overflow: auto">
            <div style="float: right">
                <button type="button" id="prevBtn" class="shop-btn" onclick="nextPrev(-1)">
                    Kembali
                </button>
                <button type="button" id="nextBtn" class="shop-btn" onclick="nextPrev(1)">
                    Lanjut
                </button>
            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align: center; margin-top: 40px">
            <span class="step" onclick="changeTab(0)"></span>
            <span class="step" onclick="changeTab(1)"></span>
            <span class="step" onclick="changeTab(2)"></span>
        </div>
        {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
    </form>
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
                                placeholder="Tambahkan Alamat" rows="5" style="font-size: 15px"></textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div style="display: flex; justify-content: flex-end">
                        <button class="shop-btn" type="submit" style="width: 20rem">
                            Simpan Alamat
                        </button>
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
                        @csrf @method('PUT')
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
                        <div style="display: flex; justify-content: flex-end">
                            <button class="shop-btn" type="submit" style="width: 20rem">
                                Ubah Alamat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
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
            };

            // When the user clicks on close button in address modal, close the address modal
            addressCloseBtn.onclick = function() {
                addressModal.style.display = "none";
            };

            // When the user clicks anywhere outside of the modal, close the address modal
            window.onclick = function(event) {
                if (event.target == addressModal) {
                    addressModal.style.display = "none";
                }
            };
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
                const adminFee = (adminfeeFlat === null || adminfeeFlat === 0) ?
                    productPrice * (adminfeePercent / 100) :
                    adminfeeFlat;

                const total = productPrice + adminFee;
                document.getElementById('total-belanja').textContent = 'Rp' + total.toLocaleString('id-ID');
            }

            // Event listener untuk setiap metode pembayaran
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    const productPrice = {{ $product->sum('price') }};

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
            calculateTotal({{ $product->sum('price') }}, 0, 0);
        });
    </script>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
                $('#changeAddressButton').hide();
            } else {
                document.getElementById("prevBtn").style.display = "inline";
                $('#changeAddressButton').show();
            }
            if (n == x.length - 1) {
                document.getElementById("nextBtn").innerHTML = "Bayar Sekarang";
                $('.address-placeholder').hide();
            } else {
                document.getElementById("nextBtn").innerHTML = "Lanjutkan";
                $('.address-placeholder').show();
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("coForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function changeTab(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = n;
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x,
                y,
                i,
                valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className +=
                    " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i,
                x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>

    <script>
        $(document).ready(function() {
            const radioButtons = $('input[name="addressOption"]');
            const selectedUsername = $('#selected-username');
            const selectedAddress = $('#selected-address');

            radioButtons.on('change', function() {
                const selectedTitleAddress = $(this).parent('.address-item-wrap').find('.title').text().trim();
                const selectedDescAddress = $(this).parent('.address-item-wrap').find('p').text().trim();

                selectedUsername.text(selectedTitleAddress);
                selectedAddress.text(selectedDescAddress);

                $('.address-placeholder-content').html(`
                    <p class="title fw-bold fs-4">${selectedTitleAddress}</p>
                    <p>${selectedDescAddress}</p>
                `);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            updateAddressPlaceholder();
            setTimeout(() => {
                $('#address-wrapper-head').attr("style", "background-color: rgba(210, 208, 208, 0.4);");
                $('#address-wrapper-head #noAddress').show();
            }, 3000);
        });

        function updateAddressPlaceholder() {
            const element = $('input[type=radio][name=addressOption]:checked+label');
            const address = element.find('.address-wrapper').html()
            $('.address-placeholder').find('.address-wrapper').html(address);
        }
        $('input[type=radio][name=addressOption]').change(function(e) {
            updateAddressPlaceholder()
        });
    </script>
@endpush
