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
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            top: 14rem;
            margin:auto;
            background-color: #fefefe;
            border: 1px solid #888;
            width: 50%;
            /* Atur lebar modal */
            height: 50%;
            /* Atur tinggi modal */
            padding: 20px;
        }

        .close-modal {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            text-align: end;
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
@section('content')

    <section class="blog about-blog">
        <div class="container">
            <div class="blog-heading about-heading">
                <h1 class="heading">Checkout</h1>
            </div>
        </div>
    </section>
    <section class="checkout product footer-padding">
        <div class="container">
            <div class="checkout-section">
                <form class="row gy-5">
                    <div class="col-lg-8">
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="wrapper-heading">Alamat Saya</h5>
                                    <button class="shop-btn openModalAddress" type="button" style="width: 25rem;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z"/>
                                        </svg>
                                        Tambah Alamat Baru
                                    </button>
                                </div> <hr>
                                <p style="font-size: 1.9rem">Alamat</p>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <div class="mx-5" style="width: 77.5rem;">
                                            @foreach ($addresses as $address)
                                            <div class="radio-container" style="margin-bottom: 10px; width: 77.5rem;">
                                                <input type="radio" id="option1" name="option" value="option1" class="custom-radio">
                                                <label for="option1" class="radio-label" style="display: flex; flex-direction: column; width: 77.5rem;">
                                                    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                                                        <p class="mb-1" style="font-size: 17px; margin: 0;">
                                                            <b style="font-size: 17px;">{{$users->username}}</b> | +{{$users->phone}}
                                                        </p>
                                                        <button type="button" class="openModalUpdate" data-modal-id="updateModal{{$address->id}}" style="color: blue; background: none; border: none; padding: 0; cursor: pointer; margin-left: 10px;">
                                                            Ubah
                                                        </button>
                                                    </div>
                                                    <p style="font-size: 15px; margin: 5px 0;">
                                                        {{$address->address}}
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
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section" style="margin-top: 2.5rem;">
                                <h5 class="wrapper-heading">Daftar Order</h5>
                                <div class="order-summery">
                                    <hr>
                                    <div class="subtotal product-total">
                                        <ul class="product-list">
                                            <li>
                                                <div class="d-flex gap-3">
                                                    <img src="" width="40" />
                                                    <div class="mt-1">
                                                        <h5 class="wrapper-heading"></h5>
                                                        <p class="paragraph"></p>
                                                    </div>
                                                </div>
                                                <div class="price mt-3">
                                                    <h5 class="wrapper-heading"></h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading">Ringkasan Belanja</h5>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">Total Harga</h5>
                                        <h5 class="wrapper-heading"></h5>
                                    </div>
                                    <div class="subtotal total">
                                        <h5 class="wrapper-heading">Total Belanja</h5>
                                        <h5 class="wrapper-heading price"></h5>
                                    </div>
                                    <button type="button" class="shop-btn">Beli sekarang</button>
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
            <button class="close-modal">&times;</button>
            <h5 class="mb-5" style="text-align: center">Tambahkan Alamat</h5>
            <div class="mx-5">
                <form action="{{route('user.address.store', auth()->user()->id)}}" method="POST">
                    @csrf
                    <div class="account-inner-form">
                        <div class="review-form-name mb-2">
                            <label for="address" class="form-label"
                                style="background-color: white; font-size: 18px">Alamat</label>
                            <textarea type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Tambahkan Alamat"
                                rows="5" style=" font-size: 15px"></textarea>
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
<div id="updateModal{{$address->id}}" class="modal">
    <div class="modal-content">
        <button class="close-modal">&times;</button>
        <h5 class="mb-5" style="text-align: center">Ubah Alamat</h5>
        <div class="mx-5">
            <form action="{{route('user.address.edit', ['user' => auth()->user()->id, 'address' => $address->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="account-inner-form">
                    <div class="review-form-name mb-2">
                        <label for="address_update" class="form-label" style="background-color: white; font-size: 18px">Alamat</label>
                        <textarea name="address_update" id="address_update" class="form-control @error('address_update') is-invalid @enderror"
                        placeholder="Tambahkan Alamat" rows="5" style="font-size: 15px">{{ $address->address }}</textarea>
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

@endpush
