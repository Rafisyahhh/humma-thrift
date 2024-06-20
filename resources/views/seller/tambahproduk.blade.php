@extends('layouts.panel')
@section('tittle', 'Home')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <style>
    .card {
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }

    .card.selected {
      background-color: rgba(126, 163, 219, 0.40);
      /* Ubah sesuai warna yang diinginkan */
      color: #fff;
      /* Ubah warna teks jika diperlukan */
    }

    .wrapper-content {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .h1 {
      letter-spacing: -0.02em;
    }

    .dropzone {
      overflow-y: auto;
      border: 0;
      background: transparent;
    }

    .dz-preview {
      width: calc(33.333% - 10px);
      /* 3 items per row with spacing */
      margin: 5px;
      /* margin between items */
      padding: 0;
      /* remove padding */
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-sizing: border-box;
    }

    .dz-photo {
      width: 100%;
      padding-top: 100%;
      /* 1:1 aspect ratio */
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      background: #eae7e2;
    }

    .dz-thumbnail {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .dz-remove {
      display: none !important;
    }

    .dz-delete {
      width: 24px;
      height: 24px;
      background: rgba(0, 0, 0, 0.57);
      position: absolute;
      opacity: 0;
      transition: all 0.2s ease;
      top: 5px;
      right: 5px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .dz-delete>svg {
      transform: scale(0.75);
      cursor: pointer;
    }

    .dz-preview:hover .dz-delete {
      opacity: 1;
    }

    .dz-message {
      margin: auto !important;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .dropzone-drag-area {
      min-height: 300px;
      position: relative;
      padding: 0 !important;
      border-radius: 10px;
      border: 3px dashed #dbdeea;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: flex-start;
    }

    .was-validated .form-control:valid {
      border-color: transparent !important;
      background-image: none;
    }

    .form-control,
    .form-select,
    .form-group {
      border: 0;
      box-shadow: none;
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
@endsection

@section('content')
  <div class="col-lg-9 justify-content-center">
    <form action="{{ route('seller.produk.store') }}" id="formDropzone" method="post" enctype="multipart/form-data">
    @csrf
      <div class="review-form">
        <div class="account-inner-form">
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="review-form-name">
                <label for="title" class="form-label">Nama Produk</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Nama Produk">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="review-form-name">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select @error('brand_id') is-invalid @enderror" id="brand"
                name="brand_id">
                <option value="" selected>Select Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->title }}
                    </option>
                @endforeach
            </select>
              </div>
            </div>
          </div>
        </div>
        <div class="account-inner-form">
          <div class="row">
            <div class="col-md-6 mb-3">
                  <div class="review-form-name">
                    <label for="Size" class="form-label">Size</label>
                    <input type="text" id="Size" name="size" class="form-control" placeholder="Masukkan Ukuran">
                  </div>

            </div>
            <div class="col-md-6 mb-3">
              <div class="review-form-name">
                <label for="kategori" class="form-label">Kategori</label>

                <select class="form-select @error('category_ids') is-invalid @enderror" id="kategori" name="category_ids[]" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ in_array($category->id, old('category_ids', [])) ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="account-inner-form">
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="review-form-name">
                <label for="gambar" class="form-label">Gambar Produk</label>
                <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror" id="gambar">
              </div>
              <div class="review-form-name mt-4">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="description" class="form-control" placeholder="Masukkan Deskripsi" rows="7"></textarea>
              </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Galleri Produk</label>
                    <div class="dropzone-drag-area form-control" id="previews">
                        <div class="dz-message text-muted opacity-50" data-dz-message>
                            <span>Drag file ke sini untuk diunggah (max 4 Foto)</span>
                        </div>
                    </div>
                    <div class="d-none" id="dzPreviewContainer">
                        <div class="dz-preview dz-file-preview">
                            <div class="dz-photo">
                                <img class="dz-thumbnail" data-dz-thumbnail>
                            </div>
                            <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times">
                                    <path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="account-inner-form">
          <div class="contact-section">
            <div class="row">
              <div class="col-lg-6">
                <div class="contact-info-section">
                  <div class="contact-information">
                    <div class="contact-wrapper">
                      <div class="row gy-5">
                        <div class="col-sm-6">
                            <div class="card phone" onclick="selectCard('phone')" style="height: 80px">
                              <input type="radio" id="phone" name="open_bid" class="radio-input" style="display: none" value="0">
                              <div class="wrapper-content">
                                <p>Harga tetap</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="card email" onclick="selectCard('email')" style="height: 80px">
                              <input type="radio" id="email" name="open_bid" class="radio-input" style="display: none" value="1">
                              <div class="wrapper-content">
                                <p>Lelang</p>
                              </div>
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mt-4" id="input-a" style="align-items: center; display: none;">
                <div class="input-section">
                  <div class="form-group">
                    <label for="inputA">Harga</label>
                    <input type="number" id="inputA" class="form-control" name="price" placeholder="Masukkan harga">
                  </div>
                </div>
              </div>
              <div class="col-lg-6" id="input-b" style="align-items: center; display: none;">
                <div class="row mt-4" style="align-items: center; display: flex;">
                  <div class="col-lg-6">
                    <div class="input-section">
                      <div class="form-group">
                        <label for="inputB">Harga mulai dari</label>
                        <input type="number" id="inputB" name="bid_price_start" class="form-control" placeholder="Harga awal">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6" id="input-c" style="display: none;">
                    <div class="input-section">
                      <div class="form-group">
                        <label for="inputC">Sampai dari</label>
                        <input type="number" id="inputC" name="bid_price_end" class="form-control" placeholder="harga akhir">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="submit-btn">
            <a href="#" class="shop-btn cancel-btn">Batal</a>
            <button type="submit" id="formSubmit" class="shop-btn update-btn">Tambah Produk</button>
          </div>
        </div>
      </div>
    </form>

  </div>
@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
  <script>
    // Dropzone.autoDiscover = false;

    // /**
    //  * Setup dropzone
    //  */
    // $('#previews').dropzone({
    //   previewTemplate: $('#dzPreviewContainer').html(),
    //   url: '/form-submit',
    //   addRemoveLinks: true,
    //   autoProcessQueue: false,
    //   uploadMultiple: true,
    //   parallelUploads: 1,
    //   maxFiles: 4,
    //   acceptedFiles: '.jpeg, .jpg, .png, .gif',
    //   thumbnailWidth: 200,
    //   thumbnailHeight: 200,
    //   previewsContainer: "#previews",
    //   timeout: 0,
    //   init: function() {
    //     var myDropzone = this;

    //     // when file is dragged in
    //     this.on('addedfile', function(file) {
    //       $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
    //       // Hide the dz-message if there are files
    //       if (myDropzone.files.length > 0) {
    //         $('.dz-message').hide();
    //       }
    //     });

    //     // When a file is removed
    //     this.on('removedfile', function(file) {
    //       // Show the dz-message if there are no files
    //       if (myDropzone.files.length === 0) {
    //         $('.dz-message').show();
    //       }
    //     });
    //   },
    //   success: function(file, response) {
    //     // hide form and show success message
    //     $('#previews').fadeOut(600);
    //     setTimeout(function() {
    //       $('#successMessage').removeClass('d-none');
    //     }, 600);
    //   }
    // });

    // /**
    //  * Form on submit
    //  */
    // $('#formSubmit').on('click', function(event) {
    //   event.preventDefault();
    //   var $this = $(this);

    //   // show submit button spinner
    //   $this.children('.spinner-border').removeClass('d-none');

    //   // validate form & submit if valid
    //   if ($('#previews')[0].checkValidity() === false) {
    //     event.stopPropagation();

    //     // show error messages & hide button spinner
    //     $('#previews').addClass('was-validated');
    //     $this.children('.spinner-border').addClass('d-none');

    //     // if dropzone is empty show error message
    //     if (!myDropzone.getQueuedFiles().length > 0) {
    //       $('.dropzone-drag-area').addClass('is-invalid').next('.invalid-feedback').show();
    //     }
    //   } else {
    //     // if everything is ok, submit the form
    //     myDropzone.processQueue();
    //   }
    // });
    Dropzone.autoDiscover = false;

$(document).ready(function () {
    var myDropzone = new Dropzone("#previews", {
        url: "{{ route('seller.produk.store') }}",
        previewTemplate: $('#dzPreviewContainer').html(),
        addRemoveLinks: true,
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 1,
        maxFiles: 4,
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        thumbnailWidth: 200,
        thumbnailHeight: 200,
        previewsContainer: "#previews",
        timeout: 0,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        init: function () {
            var submitButton = document.querySelector("#formSubmit");
            var myDropzone = this;

            submitButton.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();

                if (myDropzone.files.length > 0) {
                    myDropzone.processQueue();
                } else {
                    alert("Please add at least one image.");
                }
            });

            this.on("sendingmultiple", function (data, xhr, formData) {
                var data = $('#formDropzone').serializeArray();
                $.each(data, function (key, el) {
                    formData.append(el.name, el.value);
                });
            });

            this.on("successmultiple", function (files, response) {
                window.location.href = response.redirect_url;
            });

            this.on("errormultiple", function (files, response) {
                alert("An error occurred while uploading the images.");
            });
        },
    });
});




const form = $("#formDropzone");

function selectCard(id) {
  // Deselect all cards
  var cards = document.querySelectorAll('.card');
  cards.forEach(function(card) {
    card.classList.remove('selected');
    card.querySelector('input[type="radio"]').checked = false;
  });

  // Select the clicked card
  var selectedCard = document.querySelector('.' + id);
  selectedCard.classList.add('selected');
  selectedCard.querySelector('input[type="radio"]').checked = true;

  // Hide all input sections
  document.getElementById('input-a').style.display = 'none';
  document.getElementById('input-b').style.display = 'none';
  document.getElementById('input-c').style.display = 'none';

  // Show the input section(s) based on the selected card
  if (id === 'phone') {
    document.getElementById('input-a').style.display = 'block';
  } else if (id === 'email') {
    document.getElementById('input-b').style.display = 'block';
    document.getElementById('input-c').style.display = 'block';
  }
}

document.addEventListener('DOMContentLoaded', function() {
  selectCard('phone');
});


    // Automatically select the first card on page load
    document.addEventListener('DOMContentLoaded', function() {
      selectCard('phone');
    });






  </script>
@endsection
