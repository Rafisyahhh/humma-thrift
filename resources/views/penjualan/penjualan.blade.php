@extends('penjualan.layouts.app')
@section('tittle', 'Home')
@section('content')

   

   
                    <div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="user-profile">
                                <div class="user-title">
                                    <h5 class="heading">Selamat datang di profil anda </h5>
                                </div>
                                <div class="profile-section">
                                    <div class="row g-5">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-wrapper">
                                                <div class="wrapper-img">
                                                    <span>
                                                        <svg width="62" height="62" viewBox="0 0 62 62"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="62" height="62" rx="4" />
                                                            <path
                                                                d="M45.4473 20.0309C45.482 20.3788 45.5 20.7314 45.5 21.0883C45.5 26.919 40.7564 31.6625 34.9258 31.6625C29.0951 31.6625 24.3516 26.919 24.3516 21.0883C24.3516 20.7314 24.3695 20.3788 24.4042 20.0309H21.9805L21.0554 12.6289H13.7773V14.7438H19.1884L21.5676 33.7774H47.1868L48.8039 20.0309H45.4473Z" />
                                                            <path
                                                                d="M22.0967 38.0074H19.0648C17.3157 38.0074 15.8926 39.4305 15.8926 41.1797C15.8926 42.9289 17.3157 44.352 19.0648 44.352H19.2467C19.1293 44.6829 19.0648 45.0386 19.0648 45.4094C19.0648 47.1586 20.4879 48.5816 22.2371 48.5816C24.4247 48.5816 25.9571 46.4091 25.2274 44.352H35.1081C34.377 46.413 35.9157 48.5816 38.0985 48.5816C39.8476 48.5816 41.2707 47.1586 41.2707 45.4094C41.2707 45.0386 41.2061 44.6829 41.0888 44.352H43.3856V42.2371H19.0648C18.4818 42.2371 18.0074 41.7628 18.0074 41.1797C18.0074 40.5966 18.4818 40.1223 19.0648 40.1223H46.4407L46.9384 35.8926H21.8323L22.0967 38.0074Z" />
                                                            <path
                                                                d="M34.9262 29.5477C39.5907 29.5477 43.3856 25.7528 43.3856 21.0883C43.3856 16.4238 39.5907 12.6289 34.9262 12.6289C30.2616 12.6289 26.4668 16.4238 26.4668 21.0883C26.4668 25.7528 30.2617 29.5477 34.9262 29.5477ZM33.8688 17.916H35.9836V20.6503L37.7886 22.4554L36.2932 23.9508L33.8687 21.5262V17.916H33.8688Z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="wrapper-content">
                                                    <p class="paragraph">Pesanan baru</p>
                                                    <h3 class="heading">656</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-wrapper">
                                                <div class="wrapper-img">
                                                    <span>
                                                        <svg width="62" height="62" viewBox="0 0 62 62"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="62" height="62" rx="4"
                                                                fill="white" />
                                                            <path
                                                                d="M45.2253 29.8816H44.4827L43.6701 26.3651C43.376 25.1043 42.2552 24.2217 40.9662 24.2217H36.8474V20.8453C36.8474 19.038 35.3764 17.5811 33.5831 17.5811H18.1724C16.4631 17.5811 15.0762 18.968 15.0762 20.6772V37.0967C15.0762 38.8058 16.4631 40.1928 18.1724 40.1928H19.2931C19.8955 42.1962 21.7448 43.6533 23.9304 43.6533C26.1159 43.6533 27.9792 42.1962 28.5816 40.1928C28.8455 40.1928 35.3459 40.1928 35.1942 40.1928C35.7966 42.1962 37.6459 43.6533 39.8315 43.6533C42.031 43.6533 43.8803 42.1962 44.4827 40.1928H45.2253C46.7663 40.1928 47.9992 38.9599 47.9992 37.4189V32.6555C47.9992 31.1145 46.7663 29.8816 45.2253 29.8816ZM23.9304 40.8513C22.7897 40.8513 21.8849 39.8969 21.8849 38.7918C21.8849 37.657 22.7956 36.7324 23.9304 36.7324C25.0652 36.7324 25.9898 37.657 25.9898 38.7918C25.9898 39.9151 25.0692 40.8513 23.9304 40.8513ZM28.9739 25.0622L24.799 28.3125C24.2023 28.7767 23.3035 28.6903 22.8236 28.0604L21.2125 25.9449C20.7361 25.3284 20.8622 24.4458 21.4787 23.9835C22.0811 23.5072 22.9637 23.6332 23.4401 24.2496L24.1966 25.2303L27.2507 22.8487C27.8531 22.3864 28.7357 22.4845 29.2121 23.1009C29.6884 23.7173 29.5763 24.586 28.9739 25.0622ZM39.8315 40.8513C38.6906 40.8513 37.7861 39.8969 37.7861 38.7918C37.7861 37.657 38.7107 36.7324 39.8315 36.7324C40.9662 36.7324 41.8909 37.657 41.8909 38.7918C41.8909 39.9166 40.9683 40.8513 39.8315 40.8513ZM37.618 27.0236H40.2798C40.6021 27.0236 40.8962 27.2337 41.0083 27.542L41.8629 30.0497C42.031 30.5541 41.6667 31.0724 41.1344 31.0724H37.618C37.1976 31.0724 36.8474 30.7222 36.8474 30.3019V27.7942C36.8474 27.3739 37.1976 27.0236 37.618 27.0236Z"
                                                                fill="#FFBB38" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="wrapper-content">
                                                    <p class="paragraph">Pengiriman Selesai</p>
                                                    <h3 class="heading">99793</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-wrapper">
                                                <div class="wrapper-img">
                                                    <span>
                                                        <svg width="62" height="62" viewBox="0 0 62 62"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="62" height="62" rx="4"
                                                                fill="white" />
                                                            <path
                                                                d="M26.7975 34.4331C23.7162 36.0289 22.9563 36.8019 21.6486 39.6816C20.7665 38.8387 19.9011 38.0123 19.0095 37.1599C19.5288 36.3146 20.0327 35.4942 20.5353 34.6726C20.8803 34.1071 20.4607 33.0579 19.8228 32.899C18.8862 32.6666 17.9484 32.4426 17 32.2114C17 30.4034 17 28.6274 17 26.7827C17.9212 26.561 18.8542 26.3405 19.7849 26.1117C20.4678 25.9433 20.8922 24.9048 20.527 24.306C20.0339 23.4987 19.5371 22.6925 19.0605 21.916C20.3551 20.6201 21.6225 19.354 22.9243 18.0534C23.7067 18.5335 24.5283 19.0398 25.3535 19.5425C25.887 19.8673 26.9433 19.4452 27.0927 18.8442C27.3262 17.9064 27.5491 16.965 27.7839 16C29.5883 16 31.3785 16 33.2197 16C33.4366 16.907 33.6548 17.8234 33.8777 18.7386C34.0555 19.4678 35.0763 19.8969 35.7082 19.5093C36.5144 19.0149 37.3182 18.5205 38.0829 18.051C39.3763 19.3445 40.6318 20.6 41.943 21.9124C41.4783 22.6723 40.9756 23.4904 40.4753 24.3108C40.1114 24.9071 40.5405 25.9398 41.2258 26.1081C42.1434 26.3334 43.0646 26.5503 44 26.7756C44 28.5954 44 30.3892 44 32.2197C43.1298 32.426 42.2667 32.6287 41.4048 32.8338C40.4658 33.0579 40.0651 34.0122 40.5654 34.8267C41.029 35.5819 41.4914 36.3383 41.9727 37.122C41.1487 38.004 40.3473 38.8612 39.4901 39.7776C38.5393 37.1741 36.8297 35.4243 34.3163 34.4592C37.5565 31.5332 36.8558 27.4668 34.659 25.411C32.2973 23.1999 28.5995 23.2616 26.3138 25.5639C24.1537 27.7406 23.7186 31.6885 26.7975 34.4331Z"
                                                                fill="#FFBB38" />
                                                            <path
                                                                d="M38.0695 46.3142C33.0415 46.3142 28.0847 46.3142 23.0389 46.3142C23.0389 45.9763 23.0342 45.6491 23.0401 45.3219C23.0626 44.0391 22.9796 42.7421 23.1361 41.4747C23.5357 38.2571 26.1261 35.9239 29.3722 35.8208C30.5886 35.7817 31.8417 35.7757 33.0249 36.0164C35.8643 36.595 37.8916 39.0254 38.0552 41.9359C38.1359 43.3704 38.0695 44.8133 38.0695 46.3142Z"
                                                                fill="#FFBB38" />
                                                            <path
                                                                d="M30.5375 33.9233C28.2244 33.9091 26.3501 32.011 26.3832 29.7193C26.4176 27.4122 28.3169 25.5568 30.6157 25.584C32.8849 25.6101 34.7486 27.5011 34.7403 29.7691C34.7332 32.075 32.8481 33.9375 30.5375 33.9233Z"
                                                                fill="#FFBB38" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="wrapper-content">
                                                    <p class="paragraph">Tiket Dukungan</p>
                                                    <h3 class="heading">09</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="info-section">
                                                <div class="seller-info">
                                                    <h5 class="heading">Informasi pribadi</h5>
                                                    <div class="info-list">
                                                        <div class="info-title">
                                                            <p>Nama:</p>
                                                            <p>Email:</p>
                                                            <p>No Telepon:</p>
                                                            <p>Kota/Kabupaten:</p>
                                                            <p>Zip:</p>
                                                        </div>
                                                        <div class="info-details">
                                                            <p>Sajjad</p>
                                                            <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                                    data-cfemail="82e6e7efede7efe3ebeec2e5efe3ebeeace1edef">[email&#160;protected]</a>
                                                            </p>
                                                            <p>023 434 54354</p>
                                                            <p>Haydarabad, Rord 34</p>
                                                            <p>3454</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="devider"></div>
                                                <div class="shop-info">
                                                    <h5 class="heading">Informasi Toko</h5>
                                                    <div class="info-list">
                                                        <div class="info-title">
                                                            <p>Nama:</p>
                                                            <p>Email:</p>
                                                            <p>No Telepon:</p>
                                                            <p>Kota/Kabupaten:</p>
                                                            <p>Zip:</p>
                                                        </div>
                                                        <div class="info-details">
                                                            <p>ShopUs Super-Shop</p>
                                                            <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                                    data-cfemail="1276777f7d777f737b7e52757f737b7e3c717d7f">[email&#160;protected]</a>
                                                            </p>
                                                            <p>023 434 54354</p>
                                                            <p>Haydarabad, Rord 34</p>
                                                            <p>3454</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <div class="seller-application-section">
                                <div class="row ">
                                    <div class="col-lg-7">
                                        <div class=" account-section">
                                            <div class="review-form">
                                                <div class=" account-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="firname" class="form-label">Nama depan*</label>
                                                        <input type="text" id="firname" class="form-control"
                                                            placeholder="First Name">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="latname" class="form-label">Nama lengkap*</label>
                                                        <input type="text" id="latname" class="form-control"
                                                            placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class=" account-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="gmail" class="form-label">Email*</label>
                                                        <input type="email" id="gmail" class="form-control"
                                                            placeholder="user@gmail.com">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="telephone" class="form-label">No Telepon*</label>
                                                        <input type="tel" id="telephone" class="form-control"
                                                            placeholder="+880388**0899">
                                                    </div>
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="region" class="form-label">Negara*</label>
                                                    <select id="region" class="form-select">
                                                        <option>Choose...</option>
                                                        <option>Bangladesh</option>
                                                        <option>United States</option>
                                                        <option>United Kingdom</option>
                                                    </select>
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="addres" class="form-label">Alamat*</label>
                                                    <input type="text" id="addres" class="form-control"
                                                        placeholder="Enter your Address">
                                                </div>
                                                <div class=" account-inner-form city-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="teritory" class="form-label">Town /
                                                            City*</label>
                                                        <select id="teritory" class="form-select">
                                                            <option>Choose...</option>
                                                            <option>Newyork</option>
                                                            <option>Dhaka</option>
                                                            <option selected>London</option>
                                                        </select>
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="post" class="form-label">Postcode /
                                                            ZIP*</label>
                                                        <input type="number" id="post" class="form-control"
                                                            placeholder="0000">
                                                    </div>
                                                </div>
                                                <div class="submit-btn">
                                                    <a href="#" class="shop-btn cancel-btn">Cancel</a>
                                                    <a href="#" class="shop-btn update-btn">Update Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="img-upload-section">
                                            <div class="logo-wrapper">
                                                <h5 class="comment-title">Update Logo</h5>
                                                <p class="paragraph">Size300x300. Gifs work
                                                    too.Max 5mb.</p>
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
                        <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
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
                                    <a href="#" class="shop-btn" onclick="modalAction('.cart')">Add Cart</a>

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
                        </div>
                        <div class="tab-pane fade" id="v-pills-order" role="tabpanel"
                            aria-labelledby="v-pills-order-tab" tabindex="0">
                            <div class="cart-section">
                                <table>
                                    <tbody>
                                        
                                        <div class="col-lg-6">
                                            <a href="tambahproduk" class="shop-btn" onclick="modalAction('.submit')">Tambah Produk</a>

                                            {{-- <div class="modal-wrapper submit">
                                                <div onclick="modalAction('.submit')" class="anywhere-away"></div>
                                                <div class="login-section account-section modal-main">
                                                    <div class="review-form">
                                                        <div class="review-content">
                                                            <h5 class="comment-title">Add Your Address</h5>
                                                            <div class="close-btn">
                                                                <img src="./assets/images/homepage-one/close-btn.png"
                                                                    onclick="modalAction('.submit')" alt="close-btn">
                                                            </div>
                                                        </div>
                                                        <div class=" account-inner-form">
                                                            <div class="review-form-name">
                                                                <label for="firstname" class="form-label">First
                                                                    Name*</label>
                                                                <input type="text" id="firstname"
                                                                    class="form-control" placeholder="First Name">
                                                            </div>
                                                            <div class="review-form-name">
                                                                <label for="lastname" class="form-label">Last
                                                                    Name*</label>
                                                                <input type="text" id="lastname"
                                                                    class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class=" account-inner-form">
                                                            <div class="review-form-name">
                                                                <label for="useremail" class="form-label">Email*</label>
                                                                <input type="email" id="useremail"
                                                                    class="form-control" placeholder="user@gmail.com">
                                                            </div>
                                                            <div class="review-form-name">
                                                                <label for="userphone" class="form-label">Phone*</label>
                                                                <input type="tel" id="userphone"
                                                                    class="form-control" placeholder="+880388**0899">
                                                            </div>
                                                        </div>
                                                        <div class="review-form-name address-form">
                                                            <label for="useraddress" class="form-label">Address*</label>
                                                            <input type="text" id="useraddress"
                                                                class="form-control" placeholder="Enter your Address">
                                                        </div>
                                                        <div class=" account-inner-form city-inner-form">
                                                            <div class="review-form-name">
                                                                <label for="usercity" class="form-label">Town /
                                                                    City*</label>
                                                                <select id="usercity" class="form-select">
                                                                    <option>Choose...</option>
                                                                    <option>Newyork</option>
                                                                    <option>Dhaka</option>
                                                                    <option selected>London</option>
                                                                </select>
                                                            </div>
                                                            <div class="review-form-name">
                                                                <label for="usernumber" class="form-label">Postcode /
                                                                    ZIP*</label>
                                                                <input type="number" id="usernumber"
                                                                    class="form-control" placeholder="0000">
                                                            </div>
                                                        </div>
                                                        <div class="login-btn text-center">
                                                            <a href="#" onclick="modalAction('.submit')"
                                                                class="shop-btn">Add Address</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div>

                                        <tr class="table-row table-top-row">
                                            <td class="table-wrapper wrapper-product">
                                                <h5 class="table-heading">PRODUK</h5>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <h5 class="table-heading">HARGA</h5>
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
                                                    <h5 class="table-heading">ACTION</h5>
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
                        </div>
                        <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel"
                            aria-labelledby="v-pills-wishlist-tab" tabindex="0">
                            <div class="wishlist">
                                <div class="cart-content">
                                    <h5 class="cart-heading">Data Transaksi</h5>
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
                                                        <h5 class="table-heading">HARGA</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="table-heading">STATUS</h5>
                                                    </div>
                                                </td>
                                                {{-- <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="table-heading">SALDO</h5>
                                                    </div>
                                                </td> --}}
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
                        <div class="tab-pane fade" id="v-pills-review" role="tabpanel"
                            aria-labelledby="v-pills-wishlist-tab" tabindex="0">
                            <div class="wishlist">
                                <div class="cart-content">
                                    <h5 class="cart-heading">Data Transaksi</h5>
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
                                                        <h5 class="table-heading">HARGA</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="table-heading">SALDO</h5>
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
                        <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                            aria-labelledby="v-pills-address-tab" tabindex="0">
                            <div class="profile-section address-section addresses ">
                                <div class="row gy-md-0 g-5">
                                    <div class="col-md-6">
                                        <div class="seller-info">
                                            <h5 class="heading">Address-01</h5>
                                            <div class="info-list">
                                                <div class="info-title">
                                                    <p>Name:</p>
                                                    <p>Email:</p>
                                                    <p>Phone:</p>
                                                    <p>City:</p>
                                                    <p>Zip:</p>
                                                </div>
                                                <div class="info-details">
                                                    <p>Sajjad</p>
                                                    <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                            data-cfemail="1f7b7a72707a727e76735f78727e7673317c7072">[email&#160;protected]</a>
                                                    </p>
                                                    <p>023 434 54354</p>
                                                    <p>Haydarabad, Rord 34</p>
                                                    <p>3454</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="seller-info">
                                            <h5 class="heading">Address-02</h5>
                                            <div class="info-list">
                                                <div class="info-title">
                                                    <p>Name:</p>
                                                    <p>Email:</p>
                                                    <p>Phone:</p>
                                                    <p>City:</p>
                                                    <p>Zip:</p>
                                                </div>
                                                <div class="info-details">
                                                    <p>Sajjad</p>
                                                    <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                            data-cfemail="a4c0c1c9cbc1c9c5cdc8e4c3c9c5cdc88ac7cbc9">[email&#160;protected]</a>
                                                    </p>
                                                    <p>023 434 54354</p>
                                                    <p>Haydarabad, Rord 34</p>
                                                    <p>3454</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="#" class="shop-btn" onclick="modalAction('.submit')">Add
                                            New
                                            Address</a>

                                        <div class="modal-wrapper submit">
                                            <div onclick="modalAction('.submit')" class="anywhere-away"></div>

                                            <div class="login-section account-section modal-main">
                                                <div class="review-form">
                                                    <div class="review-content">
                                                        <h5 class="comment-title">Add Your Address</h5>
                                                        <div class="close-btn">
                                                            <img src="./assets/images/homepage-one/close-btn.png"
                                                                onclick="modalAction('.submit')" alt="close-btn">
                                                        </div>
                                                    </div>
                                                    <div class=" account-inner-form">
                                                        <div class="review-form-name">
                                                            <label for="firstname" class="form-label">First
                                                                Name*</label>
                                                            <input type="text" id="firstname" class="form-control"
                                                                placeholder="First Name">
                                                        </div>
                                                        <div class="review-form-name">
                                                            <label for="lastname" class="form-label">Last
                                                                Name*</label>
                                                            <input type="text" id="lastname" class="form-control"
                                                                placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class=" account-inner-form">
                                                        <div class="review-form-name">
                                                            <label for="useremail" class="form-label">Email*</label>
                                                            <input type="email" id="useremail" class="form-control"
                                                                placeholder="user@gmail.com">
                                                        </div>
                                                        <div class="review-form-name">
                                                            <label for="userphone" class="form-label">Phone*</label>
                                                            <input type="tel" id="userphone" class="form-control"
                                                                placeholder="+880388**0899">
                                                        </div>
                                                    </div>
                                                    <div class="review-form-name address-form">
                                                        <label for="useraddress" class="form-label">Address*</label>
                                                        <input type="text" id="useraddress" class="form-control"
                                                            placeholder="Enter your Address">
                                                    </div>
                                                    <div class=" account-inner-form city-inner-form">
                                                        <div class="review-form-name">
                                                            <label for="usercity" class="form-label">Town /
                                                                City*</label>
                                                            <select id="usercity" class="form-select">
                                                                <option>Choose...</option>
                                                                <option>Newyork</option>
                                                                <option>Dhaka</option>
                                                                <option selected>London</option>
                                                            </select>
                                                        </div>
                                                        <div class="review-form-name">
                                                            <label for="usernumber" class="form-label">Postcode /
                                                                ZIP*</label>
                                                            <input type="number" id="usernumber" class="form-control"
                                                                placeholder="0000">
                                                        </div>
                                                    </div>
                                                    <div class="login-btn text-center">
                                                        <a href="#" onclick="modalAction('.submit')"
                                                            class="shop-btn">Add Address</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-review" role="tabpanel"
                            aria-labelledby="v-pills-review-tab" tabindex="0">
                            <div class="top-selling-section">
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <img src="./assets/images/homepage-one/product-img/product-img-5.webp"
                                                    alt="product-img">
                                            </div>
                                            <div class="product-info">
                                                <div class="review-date">
                                                    <p>July 22, 2022</p>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                                        <svg width="75" height="15" viewBox="0 0 75 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="product-description">
                                                    <a href="product-sidebar.html" class="product-details">Rainbow
                                                        Sequin Dress
                                                    </a>
                                                    <p>Didn't I tell you not put your phone on charge because weekend?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Edit Review</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <img src="./assets/images/homepage-one/product-img/product-img-6.webp"
                                                    alt="product-img">
                                            </div>
                                            <div class="product-info">
                                                <div class="review-date">
                                                    <p>July 22, 2022</p>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                                        <svg width="75" height="15" viewBox="0 0 75 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="product-description">
                                                    <a href="product-sidebar.html" class="product-details">Rainbow
                                                        Sequin Dress
                                                    </a>
                                                    <p>Didn't I tell you not put your phone on charge because weekend?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Edit Review</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <img src="./assets/images/homepage-one/product-img/product-img-7.webp"
                                                    alt="product-img">
                                            </div>
                                            <div class="product-info">
                                                <div class="review-date">
                                                    <p>July 22, 2022</p>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                                        <svg width="75" height="15" viewBox="0 0 75 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="product-description">
                                                    <a href="product-sidebar.html" class="product-details">Rainbow
                                                        Sequin Dress
                                                    </a>
                                                    <p>Didn't I tell you not put your phone on charge because weekend?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Edit Review</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <img src="./assets/images/homepage-one/product-img/product-img-8.webp"
                                                    alt="product-img">
                                            </div>
                                            <div class="product-info">
                                                <div class="review-date">
                                                    <p>July 22, 2022</p>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                                        <svg width="75" height="15" viewBox="0 0 75 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="product-description">
                                                    <a href="product-sidebar.html" class="product-details">Rainbow
                                                        Sequin Dress
                                                    </a>
                                                    <p>Didn't I tell you not put your phone on charge because weekend?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Edit Review</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                            aria-labelledby="v-pills-password-tab" tabindex="0">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="form-section">
                                        <form action="#">
                                            <div class="currentpass form-item">
                                                <label for="currentpass" class="form-label">Current
                                                    Password*</label>
                                                <input type="password" class="form-control" id="currentpass"
                                                    placeholder="******">
                                            </div>
                                            <div class="password form-item">
                                                <label for="pass" class="form-label">Password*</label>
                                                <input type="password" class="form-control" id="pass"
                                                    placeholder="******">
                                            </div>
                                            <div class="re-password form-item">
                                                <label for="repass" class="form-label">Re-enter Password*</label>
                                                <input type="password" class="form-control" id="repass"
                                                    placeholder="******">
                                            </div>
                                        </form>
                                        <div class="form-btn">
                                            <a href="#" class="shop-btn">Upldate Password</a>
                                            <a href="#" class="shop-btn cancel-btn">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="reset-img text-end">
                                        <img src="./assets/images/homepage-one/reset.webp" alt="reset">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-ticket" role="tabpanel"
                            aria-labelledby="v-pills-ticket-tab" tabindex="0">
                            <div class="support-ticket">
                                <a href="#" class="shop-btn" onclick="modalAction('.ticket')">Tambah
                                    profile</a>
                                <section class="blog about-blog">
                                    <div class="container">
                                        <div class="blog-bradcrum">
                                            {{-- <span><a href="index.html">Home</a></span>
                                                <span class="devider">/</span>
                                                <span><a href="#">Seller Application</a></span> --}}
                                        </div>
                                        <div class="blog-heading about-heading">
                                            <h1 class="heading">Menjadi Pengguna!</h1>
                                        </div>
                                    </div>
                                </section>


                                <section class="seller-application product footer-padding">
                                    <div class="container">
                                        <div class="seller-application-section">
                                            <div class="row ">
                                                <div class="col-lg-7">
                                                    <div class="row gy-5">
                                                        <div class="col-lg-12">
                                                            <div class="seller-information" data-aos="fade-right">
                                                                <h5 class="comment-title">Informasi Penjual</h5>
                                                                <p class="paragraph">Isi formulir di bawah ini atau
                                                                    kirimkan pesan kepada kami. Kami akan membantu Anda
                                                                    sesegera mungkin</p>
                                                                <div class="review-form">
                                                                    <div class="review-inner-form ">
                                                                        <div class="review-form-name">
                                                                            <label for="email"
                                                                                class="form-label">Alamat
                                                                                Email*</label>
                                                                            <input type="email" id="email"
                                                                                class="form-control"
                                                                                placeholder="Masukkan alamat email anda">
                                                                        </div>
                                                                        <div class="review-form-name">
                                                                            <label for="phone" class="form-label">No
                                                                                Telepon*</label>
                                                                            <input type="number" id="phone"
                                                                                class="form-control"
                                                                                placeholder="+88013**977957">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="seller-information" data-aos="fade-right">
                                                                <h5 class="comment-title">Informasi Toko</h5>
                                                                <p class="paragraph">Isi formulir di bawah ini atau
                                                                    kirimkan pesan kepada kami. Kami akan membantu Anda
                                                                    sesegera mungkin</p>
                                                                <div class="review-form">
                                                                    <div class="review-inner-form ">
                                                                        <div class="review-form-name">
                                                                            <label for="name" class="form-label">Nama
                                                                                Toko*</label>
                                                                            <input type="text" id="name"
                                                                                class="form-control" placeholder="Nama">
                                                                        </div>
                                                                        <div class="review-form-name">
                                                                            <label for="address"
                                                                                class="form-label">Alamat*</label>
                                                                            <input type="text" id="address"
                                                                                class="form-control" placeholder="Alamat">
                                                                        </div>
                                                                        <div class="review-form-name checkbox">
                                                                            <input type="checkbox">
                                                                            <label for="address" class="form-label">
                                                                                Saya menyetujui semua syarat dan
                                                                                ketentuan di ShopUs</label>
                                                                        </div>
                                                                        <div class="form-btn">
                                                                            <a href="create-account.html"
                                                                                class="shop-btn">Buat Akun Penjual</a>
                                                                            <span class="shop-account">Sudah memiliki
                                                                                akun?<a href="login.html">Log
                                                                                    in</a></span>
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
                                                                    <p class="paragraph">Profil minimal Ukuran300x300.
                                                                        Gif juga berfungsi. Maks 5mb.
                                                                    </p>
                                                                    <div class="logo-upload">
                                                                        <img src="assets/images/homepage-one/sallers-cover.png"
                                                                            alt="upload" class="upload-img"
                                                                            id="upload-img">
                                                                        <div class="input-item upload-input">
                                                                            <label for="input-file">
                                                                                <span>
                                                                                    <svg width="32" height="32"
                                                                                        viewBox="0 0 32 32" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
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
                                                                        <img src="assets/images/homepage-one/sallers-cover.png"
                                                                            alt="upload" class="cover-img"
                                                                            id="cover-img">
                                                                        <div class="input-item cover-input">
                                                                            <label for="cover-file">
                                                                                <span>
                                                                                    <svg width="32" height="32"
                                                                                        viewBox="0 0 32 32" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
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
                            </div>
                        </div>
                    </div>
                </div>
         
@endsection
