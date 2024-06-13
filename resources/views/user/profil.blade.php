@extends('user.layouts.app')
@section('tittle', 'Profil')
@section('content')
@section('css')
    <style>
        .table-row.ticket-row:hover {
            background: rgba(167, 146, 119, 0.40) !important;
        }
    </style>
@endsection

<section class="blog about-blog">
    <div class="container">
        <div class="blog-heading about-heading">
            <h1 class="heading">Profil</h1>
        </div>
    </div>
</section>
<section class="user-profile footer-padding">
    <div class="container">
        <div class="user-profile-section">
            <div class="dashboard-heading ">
                <h5 class="dashboard-title">Dashboard</h5>
            </div>
            <div class="user-dashboard">
                <div class="nav nav-item nav-profile  me-3" id="v-pills-profile-tab" role="tab"
                    aria-orientation="vertical">
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">
                        <span>
                            <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.96898 10.7061H3.78814C1.6967 10.7061 0.00346265 12.4028 0 14.4942V18.3481H13.7606V14.4942C13.7571 12.4028 12.0604 10.7061 9.96898 10.7061Z" />
                                <path
                                    d="M6.88098 9.17603C9.41488 9.17603 11.469 7.12191 11.469 4.58802C11.469 2.05412 9.41488 0 6.88098 0C4.34709 0 2.29297 2.05412 2.29297 4.58802C2.29297 7.12191 4.34709 9.17603 6.88098 9.17603Z" />
                            </svg>
                        </span>
                        <span class="text">
                            Profil
                        </span>
                    </button>


                    <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order"
                        aria-selected="false">
                        <span>
                            <svg width="15" height="18" viewBox="0 0 15 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.9643 15.8454C10.8728 15.8399 10.8054 15.8331 10.7381 15.8331C9.37517 15.8324 8.01229 15.8324 6.60539 15.8324C6.85294 16.5145 6.77799 17.099 6.11648 17.4676C5.68672 17.7076 5.24457 17.6615 4.86018 17.3562C4.36027 16.9594 4.3087 16.4409 4.56175 15.8317C3.82667 15.8317 3.13285 15.8406 2.43903 15.8296C1.53136 15.8152 0.910425 14.8958 1.25974 14.0638C1.34845 13.852 1.51898 13.6581 1.69295 13.502C2.43628 12.8384 3.19199 12.1872 3.95182 11.5429C4.11204 11.4075 4.16499 11.2816 4.11479 11.074C3.36389 7.96037 2.61506 4.8454 1.87999 1.72768C1.82085 1.476 1.71564 1.42512 1.48597 1.432C0.997754 1.44712 0.507472 1.43681 0 1.43681C0 1.06824 0 0.741614 0 0.390921C0.782525 0.390921 1.54786 0.377856 2.31182 0.397798C2.58825 0.405362 2.70308 0.630905 2.76772 0.885329C3.01389 1.86177 3.27725 2.83339 3.5138 3.81189C3.57775 4.07732 3.68846 4.22034 3.96901 4.19971C3.98001 4.19903 3.9917 4.20315 4.00339 4.20315C4.60369 4.21003 4.95026 4.4507 5.25488 5.03863C6.60195 7.64613 10.1907 7.96587 12.0686 5.68981C12.2206 5.50622 12.3512 5.44639 12.585 5.4904C13.0911 5.58529 13.6027 5.64855 14.1136 5.71801C14.333 5.74826 14.4306 5.85416 14.4251 6.08314C14.3839 7.93906 14.3461 9.79498 14.3144 11.6509C14.3089 11.9816 14.0937 11.9665 13.8661 11.9665C11.0819 11.9651 8.29697 11.9693 5.51274 11.9596C5.2425 11.959 5.03897 12.0291 4.8368 12.2072C4.05428 12.8962 3.25525 13.5659 2.47135 14.2536C2.37095 14.3416 2.32488 14.4908 2.25337 14.6111C2.38264 14.6552 2.51192 14.737 2.64119 14.737C6.60608 14.7439 10.571 14.7425 14.5358 14.7425C14.6823 14.7425 14.8288 14.7425 15 14.7425C15 15.1152 15 15.4514 15 15.8193C14.3426 15.8193 13.6935 15.8193 13.0127 15.8193C13.25 16.4568 13.2156 17.0055 12.6442 17.4064C12.2536 17.68 11.7406 17.6814 11.3521 17.4091C10.78 17.011 10.7339 16.4636 10.9643 15.8454Z" />
                                <path
                                    d="M8.8449 6.1337C7.15883 6.12476 5.787 4.74744 5.78906 3.06549C5.79113 1.37254 7.18564 -0.00685072 8.88753 2.55979e-05C10.5702 0.00690192 11.9413 1.38835 11.9392 3.07374C11.9372 4.77563 10.555 6.14264 8.8449 6.1337ZM9.94924 1.61802C9.38194 2.22039 8.85178 2.78287 8.31199 3.35636C8.11326 3.12806 7.94342 2.93278 7.76394 2.72786C7.48201 2.96853 7.22553 3.1872 6.95735 3.41618C7.28191 3.80125 7.57484 4.16708 7.8884 4.51502C8.10157 4.75225 8.43232 4.77082 8.65236 4.54458C9.33656 3.83907 10.0042 3.11775 10.6382 2.44593C10.4031 2.16332 10.1858 1.9027 9.94924 1.61802Z" />
                            </svg>
                        </span>
                        <span class="text">
                            Order
                        </span>
                    </button>


                    <button class="nav-link" id="v-pills-keranjang-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-keranjang" type="button" role="tab"
                        aria-controls="v-pills-keranjang" aria-selected="false">
                        <span>
                            <svg width="15" height="18" viewBox="0 0 15 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.9643 15.8454C10.8728 15.8399 10.8054 15.8331 10.7381 15.8331C9.37517 15.8324 8.01229 15.8324 6.60539 15.8324C6.85294 16.5145 6.77799 17.099 6.11648 17.4676C5.68672 17.7076 5.24457 17.6615 4.86018 17.3562C4.36027 16.9594 4.3087 16.4409 4.56175 15.8317C3.82667 15.8317 3.13285 15.8406 2.43903 15.8296C1.53136 15.8152 0.910425 14.8958 1.25974 14.0638C1.34845 13.852 1.51898 13.6581 1.69295 13.502C2.43628 12.8384 3.19199 12.1872 3.95182 11.5429C4.11204 11.4075 4.16499 11.2816 4.11479 11.074C3.36389 7.96037 2.61506 4.8454 1.87999 1.72768C1.82085 1.476 1.71564 1.42512 1.48597 1.432C0.997754 1.44712 0.507472 1.43681 0 1.43681C0 1.06824 0 0.741614 0 0.390921C0.782525 0.390921 1.54786 0.377856 2.31182 0.397798C2.58825 0.405362 2.70308 0.630905 2.76772 0.885329C3.01389 1.86177 3.27725 2.83339 3.5138 3.81189C3.57775 4.07732 3.68846 4.22034 3.96901 4.19971C3.98001 4.19903 3.9917 4.20315 4.00339 4.20315C4.60369 4.21003 4.95026 4.4507 5.25488 5.03863C6.60195 7.64613 10.1907 7.96587 12.0686 5.68981C12.2206 5.50622 12.3512 5.44639 12.585 5.4904C13.0911 5.58529 13.6027 5.64855 14.1136 5.71801C14.333 5.74826 14.4306 5.85416 14.4251 6.08314C14.3839 7.93906 14.3461 9.79498 14.3144 11.6509C14.3089 11.9816 14.0937 11.9665 13.8661 11.9665C11.0819 11.9651 8.29697 11.9693 5.51274 11.9596C5.2425 11.959 5.03897 12.0291 4.8368 12.2072C4.05428 12.8962 3.25525 13.5659 2.47135 14.2536C2.37095 14.3416 2.32488 14.4908 2.25337 14.6111C2.38264 14.6552 2.51192 14.737 2.64119 14.737C6.60608 14.7439 10.571 14.7425 14.5358 14.7425C14.6823 14.7425 14.8288 14.7425 15 14.7425C15 15.1152 15 15.4514 15 15.8193C14.3426 15.8193 13.6935 15.8193 13.0127 15.8193C13.25 16.4568 13.2156 17.0055 12.6442 17.4064C12.2536 17.68 11.7406 17.6814 11.3521 17.4091C10.78 17.011 10.7339 16.4636 10.9643 15.8454Z" />
                            </svg>
                        </span>
                        <span class="text">
                            Keranjang
                        </span>
                    </button>


                    <button class="nav-link" id="v-pills-wishlist-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-wishlist" type="button" role="tab"
                        aria-controls="v-pills-wishlist" aria-selected="false">
                        <span>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_113_3017)">
                                    <path
                                        d="M8.00893 1.94252C8.25673 1.67321 8.45526 1.43486 8.67664 1.22099C10.387 -0.427293 13.0628 -0.40281 14.7246 1.2714C16.3985 2.95785 16.4356 5.687 14.7674 7.39721C12.6907 9.52652 10.5848 11.6263 8.48882 13.7369C8.13819 14.0897 7.85825 14.0876 7.50619 13.7326C5.4188 11.6306 3.32426 9.53588 1.25187 7.41953C-0.424185 5.70788 -0.410617 2.98738 1.25258 1.293C2.92721 -0.413611 5.62304 -0.434494 7.35265 1.24836C7.56475 1.4543 7.76042 1.67825 8.00893 1.94252Z" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_113_3017">
                                        <rect width="16" height="14" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <span class="text">
                            Daftar Keinginan
                        </span>
                    </button>


                    <div class="nav-link">
                        <a href="login.html">
                            <span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_113_3043)">
                                        <path
                                            d="M7.50224 15.7537C7.50224 16.0247 7.50895 16.2465 7.5 16.4683C7.4597 17.5682 6.52164 18.2515 5.4806 17.9155C4.00075 17.4383 2.52761 16.9387 1.05448 16.4392C0.380597 16.2107 0 15.6641 0 14.9405C0 10.4892 0 6.03569 0.00223881 1.58218C0.00223881 0.627852 0.629104 0.00955666 1.59403 0.00731646C4.28731 0.00283606 6.98284 -0.00164434 9.67612 0.000595862C11.0104 0.00283606 11.9798 0.961641 12 2.29904C12.0112 2.99126 12.0067 3.68124 12 4.37347C11.9955 4.90439 11.6933 5.25162 11.2478 5.25162C10.8022 5.25386 10.4955 4.90663 10.491 4.37571C10.4843 3.69693 10.4933 3.0159 10.4888 2.33712C10.4843 1.79276 10.209 1.50153 9.67388 1.49705C8.72463 1.48585 7.77761 1.49481 6.82836 1.49481C6.72313 1.49481 6.61791 1.49481 6.46791 1.49481C6.51492 1.55081 6.53284 1.59114 6.56418 1.60682C7.24254 1.91597 7.51119 2.46481 7.51119 3.1884C7.50672 6.72791 7.50895 10.2674 7.50895 13.8069C7.50895 13.9436 7.50895 14.0802 7.50895 14.2415C8.32164 14.2415 9.09179 14.2662 9.8597 14.2303C10.2649 14.2124 10.4888 13.8898 10.491 13.4396C10.4978 12.5031 10.4955 11.5645 10.4933 10.6259C10.4933 10.2854 10.594 10.0008 10.9119 9.83507C11.3888 9.58865 11.9754 9.89332 11.9888 10.4511C12.0179 11.5511 12.0493 12.6577 11.9664 13.7532C11.8746 14.9494 10.9052 15.7447 9.69403 15.7514C8.97537 15.7559 8.26343 15.7537 7.50224 15.7537Z" />
                                        <path
                                            d="M13.4942 6.75005C13.4942 6.02423 13.5009 5.33425 13.492 4.64651C13.4875 4.27463 13.5927 3.96997 13.9532 3.81539C14.3136 3.66082 14.6046 3.79523 14.8688 4.06181C15.8002 5.0027 16.7405 5.93462 17.674 6.87326C18.1061 7.30786 18.1129 7.69094 17.6897 8.11882C16.7494 9.06642 15.8024 10.0073 14.8599 10.9549C14.6091 11.2058 14.327 11.3402 13.9755 11.1946C13.6129 11.0445 13.492 10.7533 13.4964 10.3769C13.5032 9.68695 13.4987 8.99473 13.4987 8.24875C13.3576 8.24875 13.2345 8.24875 13.1114 8.24875C12.2808 8.24875 11.4479 8.25099 10.6173 8.24651C10.0711 8.24427 9.75315 7.962 9.75987 7.4938C9.76435 7.03456 10.0912 6.75453 10.6352 6.75229C11.5666 6.75005 12.5024 6.75005 13.4942 6.75005Z" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_113_3043">
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <span class="text">
                                Logout
                            </span>
                        </a>
                    </div>
                </div>


                <div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <div class="seller-application-section">
                            <div class="row ">
                                <div class="col-lg-7">
                                    <div class=" account-section">
                                        <div class="review-form">
                                            <div class=" account-inner-form">
                                                <div class="review-form-name">
                                                    <label for="firname" class="form-label">Nama Depan*</label>
                                                    <input type="text" id="firname" class="form-control"
                                                        placeholder="Nama Depan">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="latname" class="form-label">Nama Lengkap*</label>
                                                    <input type="text" id="latname" class="form-control"
                                                        placeholder="Nama Lengkap">
                                                </div>
                                            </div>
                                            <div class=" account-inner-form">
                                                <div class="review-form-name">
                                                    <label for="gmail" class="form-label">Email*</label>
                                                    <input type="email" id="gmail" class="form-control"
                                                        placeholder="example@gmail.com">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="telephone" class="form-label">Nomor Telepon*</label>
                                                    <input type="tel" id="telephone" class="form-control"
                                                        placeholder="+880388**0899">
                                                </div>
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="addres" class="form-label">Alamat*</label>
                                                <input type="text" id="addres" class="form-control"
                                                    placeholder="Masukkan Alamat Anda">
                                            </div>
                                            <div class="submit-btn">
                                                <a href="#" class="shop-btn cancel-btn">Batal</a>
                                                <a href="#" class="shop-btn update-btn">Perbarui Profil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="img-upload-section">
                                        <div class="logo-wrapper">
                                            <h5 class="comment-title">Perbarui Foto Profil</h5>
                                            <p class="paragraph">Ukuran 300x300. Gif berfungsi
                                                juga. Maks 5mb.</p>
                                            <div class="logo-upload">
                                                <img src="assets/images/homepage-one/sallers-cover.png" alt="upload"
                                                    class="upload-img" id="upload-img">
                                                <div class="upload-input">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                        aria-labelledby="v-pills-order-tab" tabindex="0">
                        <div class="payment-section">
                            <div class="wrapper">
                                <div class="wrapper-item">
                                    <div class="wrapper-img">
                                        <img src="./assets/images/homepage-one/payment-img-1.png" alt="payment">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading">Dutch Bangl Bank Lmtd</h5>
                                        <p class="paragraph">Bank **********5535</p>
                                        <p class="verified">Verified</p>
                                    </div>
                                </div>
                                <a href="#" class="shop-btn">Manage</a>
                            </div>
                            <hr>
                            <div class="wrapper">
                                <div class="wrapper-item">
                                    <div class="wrapper-img">
                                        <img src="./assets/images/homepage-one/payment-img-2.png" alt="payment">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading">Master Card</h5>
                                        <p class="paragraph">Bank **********5535</p>
                                        <p class="verified">Verified</p>
                                    </div>
                                </div>
                                <a href="#" class="shop-btn">Manage</a>
                            </div>
                            <hr>
                            <div class="wrapper">
                                <div class="wrapper-item">
                                    <div class="wrapper-img">
                                        <img src="./assets/images/homepage-one/payment-img-3.png" alt="payment">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading">Paypal Account</h5>
                                        <p class="paragraph">Bank **********5535</p>
                                        <p class="verified">Verified</p>
                                    </div>
                                </div>
                                <a href="#" class="shop-btn">Manage</a>
                            </div>
                            <hr>
                            <div class="wrapper">
                                <div class="wrapper-item">
                                    <div class="wrapper-img">
                                        <img src="./assets/images/homepage-one/payment-img-4.png" alt="payment">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading">Visa Card</h5>
                                        <p class="paragraph">Bank **********5535</p>
                                        <p class="verified">Verified</p>
                                    </div>
                                </div>
                                <a href="#" class="shop-btn">Manage</a>
                            </div>
                            <hr>
                            <div class="wrapper-btn">
                                <a href="#" class="shop-btn" onclick="modalAction('.cart')">Masukkan
                                    Keranjang</a>

                                <div class="modal-wrapper cart">
                                    <div onclick="modalAction('.cart')" class="anywhere-away"></div>

                                    <div class="login-section account-section modal-main">
                                        <div class="review-form">
                                            <div class="review-content">
                                                <h5 class="comment-title">Add New Card</h5>
                                                <div class="close-btn">
                                                    <img src="./assets/images/homepage-one/close-btn.png"
                                                        onclick="modalAction('.cart')" alt="close-btn">
                                                </div>
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="cnumber" class="form-label">Card Number*</label>
                                                <input type="number" id="cnumber" class="form-control"
                                                    placeholder="*** *** ***">
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="holdername" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="text" id="holdername" class="form-control"
                                                    placeholder="Demo Name">
                                            </div>
                                            <div class=" account-inner-form">
                                                <div class="review-form-name">
                                                    <label for="expirydate" class="form-label">Expiry
                                                        Date*</label>
                                                    <input type="date" id="expirydate" class="form-control">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="cvv" class="form-label">CVV*</label>
                                                    <input type="number" id="cvv" class="form-control"
                                                        placeholder="21232">
                                                </div>
                                            </div>
                                            <div class="login-btn text-center">
                                                <a href="#" onclick="modalAction('.cart')" class="shop-btn">Add
                                                    Card</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <a href="#" class="shop-btn bank-btn" onclick="modalAction('.bank')">Add
                                    Bank</a>

                                <div class="modal-wrapper bank">
                                    <div onclick="modalAction('.bank')" class="anywhere-away"></div>

                                    <div class="login-section account-section modal-main">
                                        <div class="review-form">
                                            <div class="review-content">
                                                <h5 class="comment-title">Add Bank Account</h5>
                                                <div class="close-btn">
                                                    <img src="./assets/images/homepage-one/close-btn.png"
                                                        onclick="modalAction('.bank')" alt="close-btn">
                                                </div>
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="accountnumber" class="form-label">Account
                                                    Number*</label>
                                                <input type="number" id="accountnumber" class="form-control"
                                                    placeholder="*** *** ***">
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="accountholdername" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="text" id="accountholdername" class="form-control"
                                                    placeholder="Demo Name">
                                            </div>
                                            <div class=" account-inner-form">
                                                <div class="review-form-name">
                                                    <label for="branchname" class="form-label">Branch*</label>
                                                    <input type="text" id="branchname" class="form-control"
                                                        placeholder="Demo Branch">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="ipscode" class="form-label">IPSC Code</label>
                                                    <input type="number" id="ipscode" class="form-control"
                                                        placeholder="21232">
                                                </div>
                                            </div>
                                            <div class="login-btn text-center">
                                                <a href="#" onclick="modalAction('.bank')" class="shop-btn">Add
                                                    Bank
                                                    Account</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="tab-pane fade" id="v-pills-order" role="tabpanel"
                        aria-labelledby="v-pills-order-tab" tabindex="0">
                        <div class="cart-section">
                            <table>
                                <tbody>
                                    <tr class="table-row table-top-row">
                                        <td class="table-wrapper wrapper-product">
                                            <h5 class="table-heading">PRODUK</h5>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">STOK</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">JUMLAH</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper wrapper-total">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">TOTAL</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">AKSI</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper wrapper-product">
                                            <div class="wrapper">
                                                <div class="wrapper-img">
                                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-2.webp') }}"
                                                        alt="img">
                                                </div>
                                                <div class="wrapper-content">
                                                    <h5 class="heading">Classic Black Suit</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">$20.00</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <div class="quantity">
                                                    <span class="minus">
                                                        -
                                                    </span>
                                                    <span class="number">1</span>
                                                    <span class="plus">
                                                        +
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-wrapper wrapper-total">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">$40.00</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper ">
                                            <div class="table-wrapper-center">
                                                <span>
                                                    <svg width="10" height="10" viewBox="0 0 10 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                            fill="#AAAAAA"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-keranjang" role="tabpanel"
                        aria-labelledby="v-pills-keranjang-tab" tabindex="0">
                        <div class="cart-section">
                            <table>
                                <tbody>
                                    <tr class="table-row table-top-row">
                                        <td class="table-wrapper wrapper-product">
                                            <h5 class="table-heading">PRODUK</h5>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">STOK</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">JUMLAH</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper wrapper-total">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">TOTAL</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">AKSI</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper wrapper-product">
                                            <div class="wrapper">
                                                <div class="wrapper-img">
                                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-2.webp') }}"
                                                        alt="img">
                                                </div>
                                                <div class="wrapper-content">
                                                    <h5 class="heading">Classic Black Suit</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">$20.00</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <div class="quantity">
                                                    <span class="minus">
                                                        -
                                                    </span>
                                                    <span class="number">1</span>
                                                    <span class="plus">
                                                        +
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-wrapper wrapper-total">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">$40.00</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper ">
                                            <div class="table-wrapper-center">
                                                <span>
                                                    <svg width="10" height="10" viewBox="0 0 10 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                            fill="#AAAAAA"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel"
                        aria-labelledby="v-pills-wishlist-tab" tabindex="0">
                        <div class="wishlist">
                            <div class="cart-content">
                                <h5 class="cart-heading">SpaceRace</h5>
                                <p>Order ID: <span class="inner-text">#4345</span></p>
                            </div>
                            <div class="cart-section wishlist-section">
                                <table>
                                    <tbody>
                                        <tr class="table-row table-top-row">
                                            <td class="table-wrapper wrapper-product">
                                                <h5 class="table-heading">PRODUK</h5>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <h5 class="table-heading">STOK</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <h5 class="table-heading">AKSI</h5>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-row ticket-row">
                                            <td class="table-wrapper wrapper-product">
                                                <div class="wrapper">
                                                    <div class="wrapper-img">
                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                            alt="img">
                                                    </div>
                                                    <div class="wrapper-content">
                                                        <h5 class="heading">Classic Design Skart</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">$20.00</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <span>
                                                        <svg width="10" height="10" viewBox="0 0 10 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                                fill="#AAAAAA"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="wishlist-btn">
                                <a href="#" class="clean-btn">Clean Wishlist</a>
                                <a href="#" class="shop-btn">View Cards</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
