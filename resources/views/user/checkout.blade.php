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
    .address-container {
      max-height: 28rem;
      overflow-y: auto;
    }

    .address-container::-webkit-scrollbar {
      width: 5px;
    }

    .address-container::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    .address-container::-webkit-scrollbar-thumb {
      background: #888;
    }

    .address-container::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    .address-item {
      position: relative;
      display: flex;
      border: 2.5008px solid #d5d5d7;
      padding: 1rem;
      margin-top: .25rem !important;
      margin-bottom: .25rem !important;
    }

    .address-container input[type="radio"]:checked+.address-item {
      border-color: #007bff;
    }

    .address-container input[type="radio"]:checked+label .selected-label {
      display: block;
    }

    .address-label {
      border-radius: .5rem;
      font-size: 17px;
      margin: 0;
    }

    .address-label b {
      font-size: 17px;
    }

    .address-label p {
      font-size: 15px;
      margin: 5px 0;
    }

    .selected-label {
      display: none;
    }

    .selected-label p {
      position: absolute;
      right: 0;
      top: -0.5rem;
      background-color: #007bff;
      opacity: 8;
      border-radius: .5rem;
      padding: 2px 10px;
      color: #f1f1f1;
      font-size: 1.2rem;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 500;
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
          <h5 class="wrapper-heading">Daftar Order</h5>
          <div class="order-summery">
            <hr />
            <div class="subtotal product-total">
              <ul class="product-list">
                @foreach ($product as $item)
                  <li>
                    <div class="d-flex gap-3">
                      <img src="{{ asset("storage/$item->thumbnail") }}" class="mb-4" width="60" />
                      <div class="mt-1">
                        <h5 class="wrapper-heading" style="font-size: 20px; color: #1c3879;">{{ $item->title }}
                        </h5>
                        <p class="paragraph">{{ $item->brand->title }}</p>
                      </div>
                    </div>
                    <div class="price mt-3" data-price="{{ $item->price }}">
                      <h5 class="wrapper-heading" style="font-size: 20px; color: #1c3879;">
                        Rp{{ number_format($item->price, null, null, '.') }}
                      </h5>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <hr />
            <div class="address-placeholder">
              <div class="address-item address-label" style="border: unset;">
                <div id="address-wrapper-head" class="address-wrapper w-100 placeholder-glow position-relative">
                  <p class="mb-1">
                    <b class="placeholder bg-secondary" style="width: 15%;"></b>
                    <b class="placeholder bg-secondary" style="width: 10%;"></b>
                  </p>
                  <span class="placeholder bg-secondary" style="width: 13%;"></span>
                  <span class="placeholder bg-secondary" style="width: 17%;"></span>
                  <span class="placeholder bg-secondary" style="width: 6%;"></span>
                  <span class="placeholder bg-secondary" style="width: 16%;"></span>
                  <span id="noAddress" class="position-absolute top-50" style="left: 25%; display: none;">Kelihatanya kamu
                    belum memilih alamat utama nih.</span>
                </div>
                <button class="shop-btn p-1 rounded-1 position-absolute"
                  style="right: 0; display: none; width: 10rem; font-size: 1.25rem;" id="changeAddressButton"
                  onclick="changeTab(0)">Ganti
                  Alamat</button>
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
          <p class="fs-5" style="color: red;">*Pilih alamat yang sesuai dengan alamat anda</p>
          <hr />
          <p style="font-size: 1.9rem">Alamat</p>
          <div class="order-summary">
            <div class="subtotal product-total ms-0">
              <div class="address-container">
                @foreach ($addresses as $address)
                  <input type="radio" name="addressOption" id="option{{ $address->id }}" value="{{ $address->id }}"
                    class="d-none" hidden @checked($address->status)>
                  <label class="address-item address-label" for="option{{ $address->id }}">
                    <div class="address-wrapper">
                      <p class="mb-1">
                        <b>{{ $users->name }}</b> | +{{ $users->phone }}
                      </p>
                      <p>{{ $address->address }}</p>
                    </div>
                    <div class="selected-label">
                      <p>Dipilih</p>
                    </div>
                  </label>
                  {{-- <div class="radio-container" style="margin-bottom: 10px; width: 77.5rem">
                  <input type="radio" id="option{{ $address->id }}" name="addressOption" value="{{ $address->id }}"
                    class="custom-radio p-0" />
                  <label for="option{{ $address->id }}" class="radio-label"
                    style="display: flex; flex-direction: column; width: 77.5rem">
                    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                      <p class="mb-1" style="font-size: 17px; margin: 0">
                        <b style="font-size: 17px">{{ $users->name }}</b> |
                        +{{ $users->phone }}
                      </p>
                      <button type="button" class="openModalUpdate" data-modal-id="updateModal{{ $address->id }}"
                        style="color: blue; background: none; border: none; padding: 0; cursor: pointer;">
                        Ubah
                      </button>
                    </div>
                    <p style="font-size: 15px; margin: 5px 0">
                      {{ $address->address }}
                    </p>
                  </label>
                </div> --}}
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
                      <div class="d-flex flex-column  mt-3">
                        <img src="{{ $item->icon_url }}" height="45" />
                        <div class="text-center mt-2">
                          <p class="fs-3 fw-bold">{{ $item->name }}</p>
                          <p class="fs-5">
                            {{-- @dd($product->sum('price')) --}}
                            @if ($item->flat == null)
                              Rp{{ number_format($product->sum('price') * ($item->percent / 100), null, null, '.') }}
                            @else
                              Rp{{ number_format($item->flat, null, null, '.') }}
                            @endif
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
                      <b style="font-size: 17px">{{ $product->first()->userstore->name }}</b> |
                      {{ $product->first()->userstore->user->phone }}
                    </p>
                    <p style="font-size: 17px; margin: 0">
                      {{ $product->first()->userstore->address }}</p>
                  </div>
                @endif
                <div class="col-md-6">
                  <p class="fw-bold" style="font-size: 17px; margin: 0" id="selected-username">
                    <b style="font-size: 17px">username</b> | +nohp
                  </p>
                  <p style="font-size: 17px; margin: 0" id="selected-address">alamat
                  </p>
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
                {{ number_format($product->sum('price'), null, null, '.') }}
              </h5>
            </div>
            <div class="subtotal product-total">
              <h5 class="wrapper-heading" style="font-size: 17px;">Biaya Admin</h5>
              <h5 class="wrapper-heading" style="font-size: 17px;" id="admin-fee">Rp0</h5>
            </div>
            <div class="subtotal total">
              <h5 class="wrapper-heading">Total Belanja</h5>
              <h5 class="wrapper-heading price" id="total-belanja">Rp0</h5>
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
              <label for="address" class="form-label" style="background-color: white; font-size: 18px">Alamat</label>
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
          <form action="{{ route('user.address.edit', ['user' => auth()->user()->id, 'address' => $address->id]) }}"
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
    document.addEventListener('DOMContentLoaded', (event) => {
      const radioButtons = document.querySelectorAll('input[name="addressOption"]');
      const selectedUsername = document.getElementById('selected-username');
      const selectedAddress = document.getElementById('selected-address');

      radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
          const selectedUser = radio.nextElementSibling.querySelector('p b').innerText;
          const selectedPhone = radio.nextElementSibling.querySelector('p').innerText
            .split('|')[1].trim();
          const address = radio.nextElementSibling.querySelector('p:nth-child(2)')
            .innerText;

          selectedUsername.innerHTML =
            `<b style="font-size: 17px">${selectedUser}</b> | ${selectedPhone}`;
          selectedAddress.innerText = address;
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      updateAddressPlaceholder();
    //   setTimeout(() => {
    //     $('#address-wrapper-head').attr("style", "background-color: rgba(210, 208, 208, 0.4);");
    //     $('#address-wrapper-head #noAddress').show();
    //   }, 3000);
    });

    function updateAddressPlaceholder() {
      const element = $('input:radio[name=addressOption]:checked+label');
      const address = element.find('.address-wrapper').html()
      $('.address-placeholder').find('.address-wrapper').html(address);
    }
    $('input:radio[name=addressOption]').change(function(e) {
      updateAddressPlaceholder()
    });
  </script>
@endpush
