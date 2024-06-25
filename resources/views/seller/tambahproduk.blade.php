@extends('layouts.panel')

@push('link')
  <link href="{{ asset('additional-assets/select2-4.1.0/css/select2.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="{{ asset('template-assets/front/css/image-uploader.css') }}">
@endpush

@push('style')
  <style>
    .card {
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }

    .card.selected {
      background-color: rgba(126, 163, 219, 0.40);
      color: #fff;
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

    .invalid-feedback {
      font-size: 1.275em;
    }

    .select2-container {
      width: 100%;
      font-size: 1.275em;
      font-weight: 400;
      line-height: 1.5;
    }

    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--multiple {
      border-color: #7ea3db66;
      border-radius: 1rem;
      min-height: 50px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      border-color: #7ea3db66;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 15px;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      top: 50%;
      right: 5px;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }
  </style>
@endpush

@section('content')
  {{-- @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
  @endif --}}
  <div class="justify-content-center">
    <form action="{{ isset($is_edit) ? route('seller.product.update', $product->id) : route('seller.product.store') }}"
      id="formDropzone" method="post" enctype="multipart/form-data">
      @csrf
      @isset($is_edit)
        @method('PUT')
      @endisset

      <div class="review-form">
        <!-- Product Name and Brand -->
        <div class="account-inner-form">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="title" class="form-label">Nama Produk</label>
              <input type="text" id="title" name="title"
                class="form-control @error('title') is-invalid @enderror" placeholder="Nama Produk"
                value="{{ isset($is_edit) ? $product->title : old('title') }}">
              @error('title')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="brand" class="form-label">Brand</label>
              <select class="form-select select2 @error('brand_id') is-invalid @enderror" id="brand" name="brand_id"
                data-placeholder="Pilih brand">
                <option></option>
                @foreach ($brands as $brand)
                  <option value="{{ $brand->id }}"
                    {{ (isset($is_edit) ? $product->brand_id : old('brand_id')) == $brand->id ? 'selected' : '' }}>
                    {{ $brand->title }}
                  </option>
                @endforeach
              </select>
              @error('brand_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>
        </div>

        <!-- Size and Category -->
        <div class="account-inner-form">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="Size" class="form-label">Size</label>
              <input type="text" id="Size" name="size" class="form-control @error('size') is-invalid @enderror"
                placeholder="Masukkan Ukuran" value="{{ isset($is_edit) ? $product->size : old('size') }}">
              @error('size')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="kategori" class="form-label">Kategori</label>
              <select class="form-select select2 @error('category_id') is-invalid @enderror" id="kategori"
                name="category_id[]" multiple>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}"
                    {{ in_array($category->id, isset($is_edit) ? $product->categories->pluck('id')->toArray() : old('category_id', [])) ? 'selected' : '' }}>
                    {{ $category->title }}
                  </option>
                @endforeach
              </select>
              @error('category_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>
        </div>

        <!-- Product Image, Description, and Color -->
        <div class="account-inner-form">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="gambar" class="form-label">Gambar Produk</label>
              <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror"
                id="gambar">
              @error('thumbnail')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror

              <div class="mt-4">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="description" class="form-control @error('description') is-invalid @enderror"
                  placeholder="Masukkan Deskripsi" rows="11">{{ isset($is_edit) ? $product->description : old('description') }}</textarea>
                @error('description')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="warna" class="form-label">Warna</label>
              <input type="text" id="warna" name="color"
                class="form-control @error('color') is-invalid @enderror" placeholder="Masukkan Warna"
                value="{{ isset($is_edit) ? $product->color : old('color') }}">
              @error('color')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror

              <div class="form-group mt-4">
                <label class="form-label" for="image-input">Galeri Produk</label>
                <label class="ms-1 mt-1 row gy-4 pb-4 row-cols-1 row-cols-md-2 w-100" for="image-input" role="button"
                  style="border: 1px solid #7ea3db66; border-radius: 1rem; min-height: 105px;" id="image-area">
                  <div class="col w-100 h-100 text-center my-auto">
                    <span class="text-center text-nowrap">Pilih gambar (max 4)</span>
                  </div>
                </label>
                <input type="file" accept=".jpeg, .png, .jpg" name="image_galery[]"
                  class="d-none @error('image_galery') is-invalid @enderror" id="image-input" multiple hidden>
                @error('image_galery')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
          </div>
        </div>

        <!-- Product Type and Pricing -->
        <div class="account-inner-form">
          <div class="contact-section">
            <div class="row">
              <div class="col-lg-6">
                <div class="contact-info-section">
                  <div class="contact-information">
                    <div class="contact-wrapper">
                      <div class="row gy-5">
                        <div class="col-sm-6">
                          <label class="card phone" onclick="selectCard('phone')" style="height: 80px" for="phone">
                            <input type="radio" id="phone" name="product_type" class="radio-input d-none"
                              value="products" {{ isset($product->bid_price_start) ? '' : 'checked' }}>
                            <div class="wrapper-content">
                              <p>Harga tetap</p>
                            </div>
                          </label>
                        </div>
                        <div class="col-sm-6">
                          <label class="card email" onclick="selectCard('email')" style="height: 80px" for="email">
                            <input type="radio" id="email" name="product_type" class="radio-input d-none"
                              value="product_auctions" {{ isset($product->bid_price_start) ? 'checked' : '' }}>
                            <div class="wrapper-content">
                              <p>Lelang</p>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mt-4" id="input-a" style="align-items: center; display: none;">
                <div class="form-group">
                  <label for="inputA">Harga</label>
                  <input type="number" id="inputA" class="form-control @error('price') is-invalid @enderror"
                    name="price" placeholder="Masukkan harga"
                    value="{{ isset($is_edit) ? $product->price : old('price') }}">
                  @error('price')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6" id="input-b" style="align-items: center; display: none;">
                <div class="row mt-4">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="inputB">Harga mulai dari</label>
                      <input type="number" id="inputB" name="bid_price_start"
                        class="form-control @error('bid_price_start') is-invalid @enderror" placeholder="Harga awal"
                        value="{{ isset($is_edit) ? $product->bid_price_start : old('bid_price_start') }}">
                      @error('bid_price_start')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6" id="input-c" style="display: none;">
                    <div class="form-group">
                      <label for="inputC">Sampai dari</label>
                      <input type="number" id="inputC" name="bid_price_end"
                        class="form-control @error('bid_price_end') is-invalid @enderror" placeholder="Harga akhir"
                        value="{{ isset($is_edit) ? $product->bid_price_end : old('bid_price_end') }}">
                      @error('bid_price_end')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Submit Buttons -->
        <div class="submit-btn">
          <button type="button" class="shop-btn cancel-btn" id="backButton">Batal</button>
          <button type="submit" id="formSubmit"
            class="shop-btn update-btn">{{ isset($is_edit) ? 'Update Produk' : 'Tambah Produk' }}</button>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="{{ asset('js/imageUploader.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#brand').select2({
        width: function() {
          return $(this).data('width') || ($(this).hasClass('w-100') ? '100%' : 'style');
        },
        placeholder: function() {
          return $(this).data('placeholder');
        },
        selectionCssClass: 'custom-select-selection',
        dropdownCssClass: 'custom-select-dropdown',
      });

      $("#kategori").select2({
        width: function() {
          return $(this).data('width') || ($(this).hasClass('w-100') ? '100%' : 'style');
        },
        placeholder: function() {
          return $(this).data('placeholder');
        },
        selectionCssClass: 'custom-select-selection',
        dropdownCssClass: 'custom-select-dropdown',
      });

      $("#image-input").imageUploader({
        @isset($is_edit)
          preloadedImages: [
            @foreach ($product->gallery as $item)
              '{{ asset("storage/$item->image") }}',
            @endforeach
          ],
        @endisset
        imageArea: $("#image-area"),
        maxImages: 4,
        template: `
          <div class="col">
            <img class="card-img w-100 d-block" src=":image:" loading="lazy"/>
          </div>`
      });

    });

    function selectCard(id) {
      $('.card').removeClass('selected');
      const selectedCard = $('.' + id);
      selectedCard.addClass('selected');
      $('#input-a, #input-b, #input-c').hide();
      if (id === 'phone') {
        $('#input-a').show();
      } else if (id === 'email') {
        $('#input-b, #input-c').show();
      }
    }

    selectCard("{{ isset($product->bid_price_start) ? 'email' : 'phone' }}");
  </script>
@endsection
