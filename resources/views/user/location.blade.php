
@extends('layouts.panel')

@section('content')
@push('style')
    <style>
        .custom-button {
            background-color: #1c3879;
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
            background-color: #1c3879;
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

    <style>
        /* The switch - the box around the slider */
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* The slider */
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #1c3879;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #1c3879;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
    </style>
@endpush
    @include('components.show-errors')
    <section>
        <div class="checkout-wrapper">
            <div class="account-section billing-section">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="wrapper-heading">Alamat Saya</h5>
                    <button class="shop-btn openModalAddress fs-5 mt-4" type="button" style="width: 20rem;">
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
                                    <label for="option1" class="radio-label"
                                        style="display: flex; flex-direction: column; width: 77.5rem;">
                                        <div
                                            style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                                            <p class="mb-1" style="font-size: 17px; margin: 0;">
                                                <b style="font-size: 17px;">{{ $users->username }}</b> |
                                                +{{ $users->phone }}
                                            </p>

                                            <div style="display: flex; align-items: center;">
                                                <button type="button" class="openModalUpdate"
                                                    data-modal-id="updateModal{{ $address->id }}"
                                                    style="color: blue; background: none; border: none; padding: 0; cursor: pointer; margin-right: 110px;">
                                                    Ubah
                                                </button>
                                                <form method="POST" action="{{route('user.address.edit', ['user' => auth()->user()->id, 'address' => $address->id]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <label class="switch">
                                                        <input type="checkbox" name="status" value="1" onchange="this.form.submit()" {{ $address->status?"checked disabled":"" }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>
                                        <p style="font-size: 15px; margin: 5px 0;">
                                            {{ $address->address }}
                                        </p>
                                        @if ( $address->status )
                                            <span class="mark" style="width: 6rem;">Utama</span>
                                        @endif
                                    </label>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
@endsection

@push('script')
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
@endpush
