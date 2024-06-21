@extends('layouts.panel')

@section('style')
    <link href="{{ asset('additional-assets/select2-4.1.0/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('template-assets/front/css/image-uploader.css') }}">
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
    <div class="justify-content-center">
        <form action="{{ route('seller.produk.store') }}" id="formDropzone" method="post" enctype="multipart/form-data">
            @csrf
            <div class="review-form">
                <div class="account-inner-form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="review-form-name">
                                <label for="title" class="form-label">Nama Produk</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Nama Produk">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="review-form-name">
                                <label for="gambar" class="form-label">Gambar Produk</label>
                                <input type="file" name="cover_image"
                                    class="form-control @error('cover_image') is-invalid @enderror" id="gambar">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="review-form-name">
                                <label for="Size" class="form-label">Size</label>
                                <input type="text" id="Size" name="size" class="form-control"
                                    placeholder="Masukkan Ukuran">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Galeri
                                    Produk</label>
                                <div class="input-images"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-md-6 mb-3">
                            <div class="review-form-name">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select @error('category_ids') is-invalid @enderror" id="kategori"
                                    name="category_ids[]" multiple>
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
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="review-form-name mt-4">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" name="description" class="form-control" placeholder="Masukkan Deskripsi" rows="7"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                                            <input type="radio" id="phone" name="open_bid" class="radio-input"
                                                style="display: none" value="0">
                                            <div class="wrapper-content">
                                                <p>Harga tetap</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card email" onclick="selectCard('email')" style="height: 80px">
                                            <input type="radio" id="email" name="open_bid" class="radio-input"
                                                style="display: none" value="1">
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
                <div class="col-lg-6 mt-5" id="input-a" style="align-items: center; display: none;">
                    <div class="input-section">
                        <div class="form-group">
                            <label for="inputA">Harga</label>
                            <input type="number" id="inputA" class="form-control" name="price"
                                placeholder="Masukkan harga">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" id="input-b" style="align-items: center; display: none;">
                    <div class="row mt-4" style="align-items: center; display: flex;">
                        <div class="col-lg-6">
                            <div class="input-section">
                                <div class="form-group">
                                    <label for="inputB">Harga mulai dari</label>
                                    <input type="number" id="inputB" name="bid_price_start" class="form-control"
                                        placeholder="Harga awal">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="input-c" style="display: none;">
                            <div class="input-section">
                                <div class="form-group">
                                    <label for="inputC">Sampai dari</label>
                                    <input type="number" id="inputC" name="bid_price_end" class="form-control"
                                        placeholder="harga akhir">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="submit-btn">
        <button type="button" class="shop-btn cancel-btn">Batal</button>
        <button type="submit" id="formSubmit" class="shop-btn update-btn">Tambah Produk</button>
    </div>
    </div>
    </form>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script src="{{ asset('additional-assets/select2-4.1.0/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('template-assets/front/assets/js/image-uploader.js') }}"></script>
    <script>
        $(function() {
            const inputImages = $('.input-images');
            const kategori = $('#kategori');
            inputImages.imageUploader({
                extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
                maxFiles: 4,
                imagesInputName: 'cover_image',
                label: 'Drag file kesini untuk mengunggah (max 4)'
            });
            kategori.select2({
                containerCssClass: "form-control",
                width: 'resolve'
            });
        });

        function selectCard(id) {
            $('.card').removeClass('selected').find('input[type="radio"]').prop('checked', false);

            const selectedCard = $('.' + id);
            selectedCard.addClass('selected').find('input[type="radio"]').prop('checked', true);

            $('#input-a, #input-b, #input-c').hide();

            if (id === 'phone') {
                $('#input-a').show();
            } else if (id === 'email') {
                $('#input-b, #input-c').show();
            }
        }

        selectCard('phone');
    </script>
@endsection
