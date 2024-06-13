@extends('penjualan.layouts.app')
@section('tittle', 'Profil')
@section('content')
        <section class="seller-application product footer-padding">
            <div class="container">
                <div class="seller-application-section">
                    <div class="row ">
                        <div class="col-lg-7">
                            <div class="row gy-5">
                                <div class="col-lg-12">
                                    <div class="seller-information" data-aos="fade-right">
                                        <h5 class="comment-title">Informasi Penjual</h5>
                                        <div class="review-form">
                                            <div class="review-inner-form ">
                                                <div class="review-form-name">
                                                    <label for="name" class="form-label">Nama Lengkap</label>
                                                    <input type="text" id="name" class="form-control"
                                                        placeholder="mis.Hilma Schaefer" value="Hilma Schaefer">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="name" class="form-label">Email</label>
                                                    <input type="text" id="name" class="form-control"
                                                        placeholder="mis.hilmaschaefer@gmail.com" value="hilmaschaefer@gmail.com">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="phone" class="form-label">Telepon</label>
                                                    <input type="number" id="phone" class="form-control"
                                                        placeholder="+88013**977957" value="08213888977957">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="seller-information" data-aos="fade-right">
                                        <h5 class="comment-title">Informasi Toko</h5>
                                        <p class="paragraph">Isi formulir untuk melengkapi profil Toko Anda!</p>
                                        <div class="review-form">
                                            <div class="review-inner-form ">
                                                <div class="review-form-name">
                                                    <label for="name" class="form-label">Nama
                                                        Toko</label>
                                                    <input type="text" id="name" class="form-control"
                                                        placeholder="mis.Hilma Store" value="Hilma Store">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="nic" class="form-label">Nic</label>
                                                    <input type="number" id="nic" class="form-control"
                                                        placeholder="masukkan nic" value="002781623916">
                                                </div>

                                                <div class="form-btn">
                                                    <a href="create-account.html" class="shop-btn">Simpan</a>

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
                                            <h5 class="comment-title">Perbarui Logo</h5>
                                            <p class="paragraph">Profil minimal Ukuran300x300.</p>
                                            <div class="logo-upload">
                                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/sallers-cover.png') }}" alt="upload"
                                                    class="upload-img" id="upload-img">
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
                                                    <input type="file"
                                                        accept="image/jpeg, image/jpg, image/png, image/webp"
                                                        id="input-file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="logo-wrapper cover">
                                            <h5 class="comment-title">Perbarui Sampul</h5>
                                            <p class="paragraph">Sampul minimal Ukuran
                                                1170x920.</p>
                                            <div class="cover-upload logo-upload">
                                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/sallers-cover.png') }}" alt="upload"
                                                    class="cover-img" id="cover-img">
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
                                                    <input type="file"
                                                        accept="image/jpeg, image/jpg, image/png, image/webp"
                                                        id="cover-file">
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
