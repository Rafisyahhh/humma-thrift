@extends('layouts.panel')

@section('tittle', 'Profil')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet" />
    <link href="summernote-bs5.css" rel="stylesheet">
    <script src="summernote-bs5.js"></script>
@endsection

@section('content')

    <section class="seller-application ">
        <div class="container">
            <div class="seller-application-section-profil">
                <div class="row ">
                    <div class="col-lg-7">
                        <div class="row gy-5">
                            <div class="col-lg-12">
                                <div class="seller-information" data-aos="fade-right">
                                    <h5 class="comment-title">Informasi Toko</h5>
                                    <p class="paragraph">Isi formulir untuk melengkapi profil Toko Anda!</p>
                                    <div class="review-form">
                                        <div class="review-inner-form ">
                                            <div class="review-form-name">
                                                <label for="name" class="form-label">Nama
                                                    Toko</label>
                                                  <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="mis.Hilma Store" value="Hilma Store">
                                            </div>

                                            <div class="review-form-name">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" id="email" name="email" class="form-control"
                                                    placeholder="mis.hilmaschaefer@gmail.com"
                                                    value="hilmaschaefer@gmail.com">
                                            </div>

                                            <div class="review-form-name">
                                                <label for="phone" class="form-label">Telepon</label>
                                                <input type="number" id="phone" name="phone" class="form-control"
                                                    placeholder="+88013**977957" value="082138977957">
                                            </div>

                                            <div class="review-form-name">
                                                <label for="nic" class="form-label">NIK</label>
                                                <input type="number" id="nic" name="nic" class="form-control"
                                                    placeholder="masukkan nic" value="002781623916">
                                            </div>

                                            <div class="review-form-name">
                                                <label for="address" class="form-label">Alamat</label>
                                                <textarea id="address" name="address" class="form-control"
                                                 placeholder="Masukkan Alamat Anda">Jln. Keramat, Perum. Permata Regency, Blk. 1o, No 11 B</textarea>
                                            </div>

                                            <div class="review-form-name mt-4">
                                                <label for="address" class="form-label">Deskripsi</label>
                                                <textarea id="custom-summernote" name="address" class="custom-summernote"
                                                 placeholder="Tambahkan Deskripsi Toko Anda" rows="7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta repellat dolorem maxime ducimus commodi quae aut quam earum. Voluptas nam, sed et assumenda ipsum accusantium rem ad alias fugiat modi molestiae voluptate.</textarea>
                                            </div>

                                            <div class="form-btn">
                                                <a href="create-account.html" class="shop-btn" style="width: 51rem">Simpan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="img-upload-section" data-aos="fade-left">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="logo-wrapper">
                                        <h5 class="comment-title" style="margin-left: 80px;">Perbarui Logo</h5>
                                        <p class="paragraph" style="margin-left: 80px;">Profil minimal Ukuran 300x300.</p>
                                        <div class="logo-upload">
                                            <img src="{{ asset('template-assets/front/assets/images/homepage-one/sallers-cover.png') }}"
                                                alt="upload" class="upload-img" id="upload-img">
                                            <div class="input-item upload-input">
                                                <label for="input-file">
                                                    <span>
                                                        <svg width="32" height="32" viewBox="0 0 32 32"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16.5147 11.5C17.7284 12.7137 18.9234 13.9087 20.1296 15.115C19.9798 15.2611 19.8187 15.4109 19.6651 15.5683C17.4699 17.7635 15.271 19.9587 13.0758 22.1539C12.9334 22.2962 12.7948 22.4386 12.6524 22.5735C12.6187 22.6034 12.5663 22.6296 12.5213 22.6296C11.3788 22.6334 10.2362 22.6297 9.09365 22.6334C9.01498 22.6334 9 22.6034 9 22.536C9 21.4009 9 20.2621 9.00375 19.1271C9.00375 19.0746 9.02997 19.0109 9.06368 18.9772C10.4123 17.6249 11.7609 16.2763 13.1095 14.9277C14.2295 13.8076 15.3459 12.6913 16.466 11.5712C16.4884 11.5487 16.4997 11.5187 16.5147 11.5Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M20.9499 14.2904C19.7436 13.0842 18.5449 11.8854 17.3499 10.6904C17.5634 10.4694 17.7844 10.2446 18.0054 10.0199C18.2639 9.76139 18.5261 9.50291 18.7884 9.24443C19.118 8.91852 19.5713 8.91852 19.8972 9.24443C20.7251 10.0611 21.5492 10.8815 22.3771 11.6981C22.6993 12.0165 22.7105 12.4698 22.3996 12.792C21.9238 13.2865 21.4443 13.7772 20.9686 14.2717C20.9648 14.2792 20.9536 14.2867 20.9499 14.2904Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </span>
                                                </label>
                                                <input type="file" accept="image/jpeg, image/jpg, image/png, image/webp" id="input-file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="logo-wrapper cover">
                                        <h5 class="comment-title" style="margin-left: 80px;">Perbarui Sampul</h5>
                                        <p class="paragraph" style="margin-left: 80px;">Sampul minimal Ukuran
                                            1170x920.</p>
                                        <div class="cover-upload logo-upload">
                                            <img src="{{ asset('template-assets/front/assets/images/homepage-one/sallers-cover.png') }}"
                                                alt="upload" class="cover-img" id="cover-img" style="margin-left: 80px;">
                                            <div class="input-item cover-input">
                                                <label for="cover-file">
                                                    <span>
                                                        <svg width="32" height="32" viewBox="0 0 32 32"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16.5147 11.5C17.7284 12.7137 18.9234 13.9087 20.1296 15.115C19.9798 15.2611 19.8187 15.4109 19.6651 15.5683C17.4699 17.7635 15.271 19.9587 13.0758 22.1539C12.9334 22.2962 12.7948 22.4386 12.6524 22.5735C12.6187 22.6034 12.5663 22.6296 12.5213 22.6296C11.3788 22.6334 10.2362 22.6297 9.09365 22.6334C9.01498 22.6334 9 22.6034 9 22.536C9 21.4009 9 20.2621 9.00375 19.1271C9.00375 19.0746 9.02997 19.0109 9.06368 18.9772C10.4123 17.6249 11.7609 16.2763 13.1095 14.9277C14.2295 13.8076 15.3459 12.6913 16.466 11.5712C16.4884 11.5487 16.4997 11.5187 16.5147 11.5Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M20.9499 14.2904C19.7436 13.0842 18.5449 11.8854 17.3499 10.6904C17.5634 10.4694 17.7844 10.2446 18.0054 10.0199C18.2639 9.76139 18.5261 9.50291 18.7884 9.24443C19.118 8.91852 19.5713 8.91852 19.8972 9.24443C20.7251 10.0611 21.5492 10.8815 22.3771 11.6981C22.6993 12.0165 22.7105 12.4698 22.3996 12.792C21.9238 13.2865 21.4443 13.7772 20.9686 14.2717C20.9648 14.2792 20.9536 14.2867 20.9499 14.2904Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </span>
                                                </label>
                                                <input type="file" accept="image/jpeg, image/jpg, image/png, image/webp" id="cover-file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('.custom-summernote').summernote({
            placeholder: 'Tambahkan Deskripsi Toko Anda',
            tabsize: 2,
            height: 130,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['insert', ['link', 'picture']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ],
            callbacks: {
                onInit: function() {
                    // Set background color to white
                    $('.custom-summernote .note-editor').css('background-color', 'white');
                    // Set text color to white
                    $('.custom-summernote .note-editable').css('color', 'white');
                },
                onChange: function(contents, $editable) {
                    // Set text color to white
                    $('.custom-summernote .note-editable').css('color', 'white');
                }
            }
        });
    });
</script>
@endsection
