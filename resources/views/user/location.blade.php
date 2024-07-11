
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
                <p class="fs-5" style="color: red;">*Silahkan Sesuaikan dengan alamat dan informasi pribadi Anda.</p>
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

                                                <div class="row align-items-center">
                                                    <!-- Update Button -->
                                                    <div class="col-auto">
                                                        <button type="button" class="openModalUpdate me-4"
                                                                data-modal-id="updateModal{{ $address->id }}"
                                                                style="color: rgb(138, 138, 138); background: none; border: none; padding: 0; cursor: pointer;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h8.925l-2 2H5v14h14v-6.95l2-2V19q0 .825-.587 1.413T19 21zm4-6v-4.25l9.175-9.175q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4t-.137.738t-.438.662L13.25 15zM21.025 4.4l-1.4-1.4zM11 13h1.4l5.8-5.8l-.7-.7l-.725-.7L11 11.575zm6.5-6.5l-.725-.7zl.7.7z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <!-- Delete Button -->
                                                    <div class="col-auto">
                                                        <form action="{{ route('user.address.destroy', $address->id) }}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    style="color: rgb(138, 138, 138); background: none; border: none; padding: 0; cursor: pointer; margin-right: 110px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

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
                                            <span class="mark position-relative" style="width: 11rem; height: 4.60rem;"><span class="position-relative" style="left: 45%; top: 10%;">Utama</span></span>
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
                                placeholder="Tambahkan Alamat Anda" rows="5" style=" font-size: 15px"></textarea>
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
