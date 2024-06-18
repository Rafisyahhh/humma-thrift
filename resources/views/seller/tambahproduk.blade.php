@extends('layouts.panel')
@section('tittle', 'Home')
@section('style')
    <style>
        .card {
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .card.selected {
            background-color: rgb(234, 216, 192);
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
    </style>
@endsection
@section('content')

    <div class="col-lg-9 justify-content-center">
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
                            <label for="brand" class="form-label">Brand</label>
                            <select id="brand" class="form-select">
                                <option>Pilih Brand</option>
                                <option>Brand 1</option>
                                <option>Brand 2</option>
                                <option>Brand 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-inner-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="review-form-name">
                                    <label for="Stok" class="form-label">Stok</label>
                                    <input type="number" id="Stok" class="form-control" placeholder="Masukkan stok">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="review-form-name">
                                    <label for="Size" class="form-label">Size</label>
                                    <input type="number" id="Size" class="form-control" placeholder="Masukkan Ukuran">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="review-form-name">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select id="kategori" class="form-select">
                                <option>Pilih Kategori</option>
                                <option>Kategori 1</option>
                                <option>Kategori 2</option>
                                <option>Kategori 3</option>
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
                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                id="gambar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-inner-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="review-form-name">
                            <label for="gambar" class="form-label">Galeri Produk</label>
                            <input type="file" class="form-control @error('galeri') is-invalid @enderror"
                                id="gambar" multiple>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="review-form-name">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi"></textarea>
                </div>
            </div>





            <div class="contact-section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-info-section">
                            <div class="contact-information">
                                <div class="contact-wrapper">
                                    <div class="row gy-5">
                                        <div class="col-sm-6">
                                            <div class="card phone" onclick="selectCard('phone')" style="height: 80px">
                                                <input type="radio" id="phone" name="contact" class="radio-input"
                                                    style="display: none">
                                                <div class="wrapper-content">
                                                    <p>Harga tetap</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card email" onclick="selectCard('email')" style="height: 80px">
                                                <input type="radio" id="email" name="contact" class="radio-input"
                                                    style="display: none">
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
                    <div class="col-lg-6" style="align-items: center; display: flex;">
                        <div id="input-a" class="input-section" style="display: none;">
                            <div class="form-group">
                                <label for="inputA">Harga</label>
                                <input type="number" id="inputA" class="form-control" placeholder="Masukkan harga">
                            </div>
                        </div>
                        <div class="row mt-4" style="align-items: center; display: flex;">
                            <div class="col-lg-5">
                                <div id="input-b" class="input-section" style="display: none;">
                                    <div class="form-group">
                                        <label for="inputB">Harga mulai dari</label>
                                        <input type="number" id="inputB" class="form-control" placeholder="Harga awal">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div id="input-c" class="input-section" style="display: none;">
                                    <div class="form-group">
                                        <label for="inputC">Sampai dari</label>
                                        <input type="number" id="inputC" class="form-control"
                                            placeholder="harga akhir">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="submit-btn">
                <a href="#" class="shop-btn cancel-btn">Batal</a>
                <a href="#" class="shop-btn update-btn">Perbarui Profil</a>
            </div>
        </div>
    </div>



@endsection

@section('script')
    <script>
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

          // Automatically select the first card on page load
          document.addEventListener('DOMContentLoaded', function() {
            selectCard('phone');
        });
    </script>
@endsection
