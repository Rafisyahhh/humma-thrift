@extends('user.layouts.app')
@section('tittle','Tentang')
@section('content')

    <section class="about">
        <div class="container">
            <div class="about-section">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-6">
                        <div class="about-img" data-aos="fade-right">
                            <img src="{{asset('template-assets/front/assets/images/homepage-one/about/about-img-1.webp')}}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content" data-aos="fade-up">
                            <h3 class="about-title">Ingin Tahu tentang kami?</h3>
                            <p class="about-info">
                                Thrifting artinya membeli barang bekas, seperti pakaian, mainan, buku, dan sebagainya. Sekarang, aktivitas tersebut sering dilakukan melalui platform e-commerce dan media sosial. Tapi kalau mau melihat barangnya secara langsung, ada juga beberapa thrift shop atau toko thrift dalam bentuk fisik.</p>
                            <div class="about-list">
                                <ul>
                                    <li>
                                        <span>
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12.5" cy="12.5" r="12.5" fill="rgb(167, 146, 119)" />
                                                <path
                                                    d="M10.1691 13.2566C10.5172 12.8649 10.8498 12.4803 11.198 12.1029C12.7761 10.3864 14.4973 8.80535 16.4699 7.47353C16.6749 7.33465 16.8876 7.20289 17.1042 7.0747C17.1739 7.03552 17.2628 7.00347 17.344 7.00347C17.7888 6.99635 18.2337 6.99991 18.6746 6.99991C18.8138 6.99991 18.926 7.04265 18.9763 7.16728C19.0266 7.28836 18.9879 7.39163 18.8835 7.48065C17.0772 8.99765 15.588 10.7639 14.1724 12.5872C12.8689 14.2644 11.6621 16.0022 10.5288 17.7863C10.4901 17.8504 10.4398 17.918 10.3741 17.9572C10.2348 18.0462 10.0763 17.9964 9.97183 17.8432C9.79777 17.5868 9.63532 17.3233 9.44966 17.074C8.36278 15.6318 7.26817 14.1896 6.17742 12.751C6.13488 12.6976 6.08846 12.6441 6.04978 12.5872C5.97243 12.4732 5.97629 12.3486 6.07686 12.256C6.36695 11.9853 6.66478 11.7147 6.96261 11.4476C7.07864 11.3444 7.20242 11.3515 7.35713 11.4476C7.83675 11.7539 8.31637 12.0637 8.79212 12.3699C9.24853 12.6655 9.70495 12.9575 10.1691 13.2566Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <p>Produk dengan kualitas terjamin</p>
                                    </li>

                                </ul>
                            </div>
                            <a href="contact-us.html" class="shop-btn">
                                Hubungi kami
                                <span>
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                            transform="rotate(45 1.45312 0.914062)" fill="white" />
                                        <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                            transform="rotate(135 8 7.45703)" fill="white" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-service product ">
        <div class="container">
            <div class="about-service-section">
                <div class="about-wrapper">
                    <div class="wrapper-img">
                        <span>
                            <svg width="104" height="104" viewBox="0 0 104 104" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="52" cy="52" r="52" fill="rgb(167, 146, 119)" />
                                <path
                                    d="M33.2764 39.0627C33.2764 39.3893 33.2764 39.6479 33.2764 39.9064C33.2764 47.772 33.2764 55.6376 33.2764 63.5033C33.2764 64.7008 33.3443 64.7688 34.5392 64.7824C37.4858 64.7824 40.446 64.7824 43.3926 64.7824C43.6778 64.7824 43.9901 64.8097 44.2345 64.9321C44.3703 65.0002 44.4789 65.3132 44.4518 65.4765C44.411 65.667 44.2209 65.9119 44.0308 65.98C43.8 66.0752 43.5148 66.048 43.2432 66.0616C40.2966 66.0616 37.3365 66.0616 34.3899 66.0616C32.6925 66.0616 32 65.3812 32 63.7074C32 53.923 32 44.1386 32 34.3542C32 32.6532 32.6654 32 34.3763 32C46.4207 32 58.4787 32 70.5231 32C72.2068 32 72.8722 32.6668 72.8722 34.3815C72.8722 44.1386 72.8722 53.8958 72.8722 63.6529C72.8722 65.3812 72.2068 66.048 70.4416 66.048C68.8936 66.048 67.3592 66.0616 65.8112 66.048C65.1594 66.0344 64.7521 65.6262 65.0236 65.2043C65.173 64.973 65.5668 64.796 65.852 64.796C67.4407 64.7552 69.043 64.7688 70.6453 64.7824C71.3106 64.7824 71.6094 64.5239 71.5958 63.8299C71.5822 55.6921 71.5822 47.5679 71.5822 39.4301C71.5822 39.3213 71.5686 39.226 71.5551 39.0491C58.8181 39.0627 46.0948 39.0627 33.2764 39.0627ZM33.2764 37.6475C46.1084 37.6475 58.8181 37.6475 71.5822 37.6475C71.5822 36.5724 71.5822 35.5654 71.5822 34.5448C71.5822 33.32 71.5415 33.2792 70.3194 33.2792C58.3836 33.2792 46.4478 33.2792 34.5121 33.2792C34.3491 33.2792 34.1998 33.2792 34.0368 33.2792C33.5616 33.2792 33.2764 33.4969 33.2764 34.0004C33.2764 35.198 33.2764 36.3955 33.2764 37.6475Z"
                                    fill="white" />
                                <path
                                    d="M51.3634 65.7895C51.1869 65.4085 51.0647 65.1227 50.9425 64.8505C49.4081 61.5982 47.8601 58.3594 46.3393 55.107C46.122 54.6307 45.9591 54.1136 45.9048 53.5965C45.8097 52.6847 46.2171 51.9771 47.0454 51.5688C47.8873 51.147 48.7292 51.2286 49.4217 51.8682C49.8019 52.222 50.1142 52.6847 50.345 53.1474C51.119 54.6987 51.8659 56.2501 52.572 57.8287C52.8028 58.3594 53.0608 58.441 53.6039 58.3186C54.7446 58.06 55.8988 57.8831 57.053 57.7334C58.5602 57.5429 59.7687 58.2505 60.4205 59.6113C61.5475 61.9656 62.661 64.3198 63.7745 66.6877C64.4806 68.1982 64.0596 69.3957 62.566 70.1306C60.8958 70.9471 59.1984 71.7227 57.5282 72.5392C56.3469 73.1244 55.1655 73.1244 53.9977 72.5665C51.7844 71.5322 49.571 70.4844 47.3713 69.4229C47.0182 69.2596 46.6923 68.9875 46.4208 68.7017C45.7011 67.9532 45.5381 67.0415 45.9319 66.2114C46.3257 65.3813 47.2491 64.8778 48.2675 65.0547C49.0958 65.1908 49.9105 65.4629 50.7388 65.667C50.9018 65.6943 51.0783 65.7215 51.3634 65.7895ZM55.7901 71.75C56.1703 71.6275 56.5098 71.5458 56.8221 71.4098C58.5602 70.5933 60.2847 69.7768 62.0092 68.9467C62.8375 68.5384 63.0005 68.0485 62.5931 67.1912C61.4932 64.8505 60.3798 62.5235 59.2663 60.1965C58.8046 59.2439 58.1393 58.8493 57.0801 58.999C55.8716 59.1623 54.6767 59.3936 53.4682 59.625C52.3954 59.8291 52.0424 59.6658 51.5671 58.686C50.7795 57.053 50.0191 55.42 49.2316 53.787C49.0822 53.474 48.9328 53.1066 48.6748 52.9297C48.3761 52.7391 47.9008 52.6167 47.6157 52.7255C47.3848 52.8208 47.1812 53.3107 47.1812 53.6237C47.1812 53.9911 47.3848 54.3858 47.5614 54.7396C49.3809 58.5907 51.2141 62.4283 53.0201 66.2794C53.1423 66.5516 53.183 67.0143 53.0336 67.2048C52.8843 67.3817 52.409 67.4089 52.1239 67.3409C51.0375 67.0823 49.9784 66.7421 48.8921 66.4563C48.2403 66.2794 47.5071 65.9664 47.0454 66.7829C46.7466 67.3 47.1947 67.8988 48.1588 68.3615C50.1413 69.3141 52.1374 70.2667 54.1335 71.192C54.6767 71.4642 55.247 71.5867 55.7901 71.75Z"
                                    fill="white" />
                                <path
                                    d="M40.1065 50.7658C39.156 50.7658 38.1919 50.7794 37.2414 50.7658C36.1822 50.7522 35.707 50.3031 35.707 49.2689C35.6934 47.3229 35.6934 45.3905 35.707 43.4445C35.7205 42.3967 36.1958 41.934 37.2278 41.9204C39.1967 41.9068 41.1521 41.9068 43.121 41.9204C44.0715 41.9204 44.5603 42.3967 44.5739 43.3356C44.6011 45.336 44.6011 47.3229 44.5739 49.3233C44.5603 50.2895 44.0987 50.7386 43.1481 50.7522C42.1297 50.7794 41.1113 50.7658 40.1065 50.7658ZM37.0377 43.2404C37.0377 45.3088 37.0377 47.3501 37.0377 49.4185C39.1288 49.4185 41.1792 49.4185 43.2432 49.4185C43.2432 47.3229 43.2432 45.2952 43.2432 43.2404C41.1385 43.2404 39.1152 43.2404 37.0377 43.2404Z"
                                    fill="white" />
                                <path
                                    d="M40.188 62.7416C39.156 62.7416 38.124 62.7552 37.0785 62.7416C36.223 62.728 35.7206 62.2653 35.707 61.408C35.6799 59.3531 35.6799 57.3119 35.707 55.257C35.7206 54.3725 36.2366 53.9098 37.1328 53.8962C39.156 53.8826 41.1657 53.8826 43.1889 53.8962C44.0308 53.8962 44.5468 54.3725 44.5604 55.2162C44.5875 57.2711 44.5875 59.3123 44.5604 61.3672C44.5468 62.2653 44.0444 62.7144 43.1346 62.728C42.1569 62.7552 41.1793 62.7416 40.188 62.7416ZM37.0513 55.2298C37.0513 57.3391 37.0513 59.3667 37.0513 61.408C39.1424 61.408 41.1793 61.408 43.2568 61.408C43.2568 59.3395 43.2568 57.2983 43.2568 55.2298C41.1657 55.2298 39.1424 55.2298 37.0513 55.2298Z"
                                    fill="white" />
                                <path
                                    d="M58.4107 50.7658C57.4602 50.7658 56.4961 50.7794 55.5456 50.7658C54.5136 50.7522 54.0519 50.2895 54.0519 49.2417C54.0384 47.2957 54.0384 45.3633 54.0519 43.4173C54.0655 42.4239 54.5408 41.934 55.5184 41.934C57.5145 41.9204 59.497 41.9204 61.4931 41.934C62.3893 41.934 62.8917 42.3967 62.9053 43.3085C62.9325 45.3361 62.9325 47.3501 62.9053 49.3778C62.8917 50.3304 62.4029 50.7658 61.4388 50.7794C60.434 50.7794 59.4156 50.7658 58.4107 50.7658ZM55.3827 43.2268C55.3827 45.2953 55.3827 47.3501 55.3827 49.4458C57.4466 49.4458 59.4835 49.4458 61.561 49.4458C61.561 47.3638 61.561 45.3089 61.561 43.2268C59.4835 43.2268 57.4738 43.2268 55.3827 43.2268Z"
                                    fill="white" />
                                <path
                                    d="M61.629 55.2296C59.4835 55.2296 57.4467 55.2296 55.3556 55.2296C55.342 55.4065 55.3827 55.5971 55.3013 55.6923C55.1383 55.9237 54.9075 56.1142 54.7038 56.3183C54.4865 56.1006 54.1199 55.91 54.0656 55.6515C53.8483 54.6445 54.4594 53.9096 55.4778 53.9096C57.4739 53.896 59.47 53.896 61.466 53.9096C62.3894 53.9096 62.8511 54.3587 62.9054 55.2568C62.9326 55.9781 62.9733 56.6993 62.8782 57.407C62.8375 57.6655 62.4437 57.8832 62.2129 58.1146C62.0228 57.8696 61.6833 57.6519 61.6561 57.3933C61.5882 56.6857 61.629 55.9781 61.629 55.2296Z"
                                    fill="white" />
                                <path
                                    d="M48.4032 43.1995C47.8193 43.1995 47.2219 43.2675 46.6651 43.1723C46.3935 43.1178 46.1763 42.7504 45.9454 42.5191C46.1899 42.3149 46.4071 41.9611 46.6651 41.9475C47.8057 41.8795 48.9464 41.8795 50.087 41.9475C50.345 41.9611 50.5758 42.3149 50.8202 42.5055C50.5758 42.7368 50.3721 43.1042 50.1006 43.1587C49.5302 43.2675 48.9599 43.1995 48.4032 43.1995Z"
                                    fill="white" />
                                <path
                                    d="M66.7074 41.9209C67.2641 41.9209 67.8344 41.8528 68.3776 41.9481C68.6491 42.0025 68.88 42.3563 69.1244 42.5605C68.8664 42.7782 68.622 43.1456 68.3504 43.1592C67.2369 43.2273 66.1235 43.2273 65.01 43.1592C64.752 43.1456 64.5076 42.751 64.2632 42.5332C64.5212 42.3291 64.752 41.9889 65.0372 41.9345C65.5803 41.8528 66.1506 41.9209 66.7074 41.9209Z"
                                    fill="white" />
                                <path
                                    d="M66.7618 53.9094C67.3185 53.9094 67.8888 53.8414 68.432 53.9366C68.69 53.9774 68.8936 54.3176 69.1245 54.5218C68.9072 54.7395 68.69 55.1341 68.4591 55.1477C67.2914 55.2158 66.1236 55.2158 64.9694 55.1477C64.725 55.1341 64.5077 54.7531 64.2769 54.5354C64.5213 54.3176 64.7521 53.9774 65.0373 53.923C65.594 53.8413 66.1779 53.9094 66.7618 53.9094Z"
                                    fill="white" />
                                <path
                                    d="M47.6156 46.1654C47.2762 46.1654 46.896 46.2471 46.5972 46.1382C46.3392 46.043 46.1491 45.7164 45.9454 45.4986C46.1627 45.3081 46.3528 44.9679 46.5972 44.9407C47.3033 44.8726 48.023 44.8726 48.7291 44.9407C48.9464 44.9679 49.2994 45.3217 49.2994 45.5258C49.2994 45.7436 48.9735 46.0566 48.7291 46.1246C48.376 46.2335 47.9823 46.1518 47.6156 46.1654C47.6156 46.1654 47.6156 46.1518 47.6156 46.1654Z"
                                    fill="white" />
                                <path
                                    d="M65.9742 46.1667C65.6347 46.1667 65.2545 46.2484 64.9558 46.1395C64.6842 46.0443 64.4941 45.7313 64.2769 45.5135C64.4941 45.3094 64.6842 44.9692 64.9151 44.942C65.6212 44.8603 66.3544 44.874 67.0605 44.942C67.2914 44.9692 67.6308 45.3094 67.6444 45.5135C67.6444 45.7313 67.3321 46.0579 67.0877 46.1259C66.7346 46.2348 66.3408 46.1531 65.9742 46.1667C65.9742 46.1667 65.9742 46.1531 65.9742 46.1667Z"
                                    fill="white" />
                                <path
                                    d="M65.9741 58.1278C65.6347 58.1278 65.2545 58.2094 64.9422 58.1006C64.6706 58.0053 64.4805 57.7059 64.2496 57.4882C64.4533 57.2841 64.6434 56.9303 64.8743 56.903C65.5804 56.8214 66.3136 56.8214 67.0197 56.903C67.2506 56.9303 67.4407 57.3249 67.6443 57.5562C67.4271 57.7468 67.237 58.0325 66.9925 58.1006C66.6938 58.2094 66.3272 58.1278 65.9741 58.1278Z"
                                    fill="white" />
                                <path
                                    d="M57.4603 34.8585C60.8414 34.8585 64.209 34.8585 67.5901 34.8585C67.8073 34.8585 68.0518 34.7905 68.2147 34.8857C68.4591 35.0218 68.6492 35.2531 68.8665 35.4437C68.6628 35.675 68.4727 35.9472 68.2283 36.1105C68.0789 36.2057 67.8209 36.1377 67.6037 36.1377C60.8007 36.1377 53.9841 36.1377 47.1811 36.1377C47.0725 36.1377 46.9639 36.1377 46.8688 36.1377C46.38 36.1513 45.8912 36.056 45.9183 35.4573C45.9319 34.8857 46.4072 34.8585 46.8553 34.8585C50.3857 34.8585 53.9162 34.8585 57.4603 34.8585Z"
                                    fill="white" />
                                <path
                                    d="M36.6711 35.4429C36.2637 35.7559 36.0329 36.0689 35.8156 36.0553C35.5984 36.0417 35.2453 35.7151 35.2317 35.511C35.2182 35.3068 35.544 34.953 35.7613 34.9122C35.9786 34.885 36.2502 35.1708 36.6711 35.4429Z"
                                    fill="white" />
                                <path
                                    d="M41.1521 36.3816C40.8806 35.9325 40.609 35.674 40.6362 35.4563C40.6769 35.2385 41.0164 35.0616 41.22 34.8711C41.4102 35.0752 41.736 35.2793 41.7496 35.5107C41.7496 35.7284 41.4509 35.9734 41.1521 36.3816Z"
                                    fill="white" />
                                <path
                                    d="M38.5042 36.3827C38.2191 35.9608 37.9203 35.7158 37.9339 35.4981C37.9611 35.2804 38.287 35.0899 38.4906 34.8857C38.6943 35.0899 39.0338 35.2668 39.061 35.4845C39.0745 35.7022 38.7758 35.9608 38.5042 36.3827Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </div>
                    <div class="wrapper-info">
                        <h5 class="wrapper-details about-details">Pilih Produk</h5>
                        <p>Jika Anda akan menggunakan bagian dari Anda
                            perlu memastikan tidak ada apa-apa emc
                            barrassing tersembunyi di tengah</p>
                    </div>
                </div>
                <div class="seperator">
                </div>
                <div class="about-wrapper">
                    <div class="wrapper-img">
                        <span>
                            <svg width="104" height="104" viewBox="0 0 104 104" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="52" cy="52" r="52" fill="rgb(167, 146, 119)" />
                                <path
                                    d="M62.9706 54.2125C64.9571 52.371 66.8939 50.6291 68.7645 48.8208C70.4862 47.1783 73.1183 47.3111 74.4592 49.1857C75.32 50.3968 75.3365 52.4042 74.3764 53.5821C71.5953 56.9831 68.8308 60.3841 65.9503 63.6855C64.3942 65.4606 62.2422 66.1076 59.9081 66.1242C56.051 66.1408 52.1939 66.174 48.3202 66.1076C47.0124 66.0911 46.1019 66.6717 45.3073 67.5676C45.1584 67.7335 45.1252 68.0653 45.1418 68.2975C45.2411 69.2432 44.9763 70.0561 44.3141 70.7363C42.9235 72.1299 41.5164 73.4902 40.1425 74.8838C39.5465 75.4811 39.0168 75.4976 38.4208 74.8838C35.1265 71.5326 31.8157 68.2146 28.5215 64.8634C27.8262 64.1666 27.8262 63.785 28.5215 63.0717C29.8789 61.6947 31.2032 60.2845 32.6269 58.9739C33.1069 58.526 33.8188 58.2108 34.4809 58.0946C34.9941 57.9951 35.259 57.8458 35.5404 57.431C38.007 53.6817 41.5827 52.1056 45.9364 52.2715C47.1945 52.3213 48.4361 52.736 49.6776 52.9683C50.0915 53.0512 50.5219 53.1176 50.9523 53.1176C53.8327 53.1342 56.7131 53.1176 59.5935 53.1176C61.4311 53.1508 61.8118 53.2835 62.9706 54.2125ZM44.0327 66.2735C45.4232 64.3823 47.3766 64.1998 49.479 64.2496C52.9388 64.3159 56.3986 64.2827 59.8584 64.2661C61.8118 64.2661 63.55 63.6855 64.8412 62.1592C67.4733 59.0403 70.0723 55.9047 72.6713 52.7692C73.499 51.7738 73.499 50.712 72.7044 49.9821C71.9264 49.2853 70.8172 49.4014 69.9399 50.2807C68.1686 52.1056 66.3807 53.9139 64.6426 55.772C64.328 56.1038 64.0963 56.6513 64.0632 57.1158C63.8811 58.8578 62.7223 60.3343 60.951 60.4338C58.3023 60.5997 55.6371 60.55 52.9719 60.55C52.3925 60.55 51.9455 60.2347 51.9952 59.5711C52.0283 58.9241 52.4918 58.7085 53.0712 58.7085C53.8989 58.7085 54.7266 58.7085 55.5543 58.7085C57.1104 58.7085 58.6831 58.7416 60.2392 58.6919C61.6628 58.6421 62.5071 57.5472 62.1429 56.3029C61.8946 55.4568 61.1662 55.0089 59.9577 55.0089C56.8621 54.9923 53.7665 55.0089 50.6874 54.9923C50.2074 54.9923 49.6942 54.9425 49.2472 54.7766C47.1614 53.9637 45.0094 53.8807 42.8573 54.3784C40.1424 55.0089 38.0732 56.5352 36.7654 59.0071C39.1989 61.4458 41.5661 63.8016 44.0327 66.2735ZM30.1603 63.9841C33.3056 67.0533 36.335 70.0063 39.4803 73.0589C40.5894 71.9142 41.8144 70.6699 43.0063 69.4091C43.4367 68.9611 43.4533 68.4634 43.0063 68.0155C40.4404 65.4275 37.8745 62.8394 35.2921 60.2679C34.8451 59.82 34.3651 59.82 33.9181 60.2513C32.7097 61.4624 31.5012 62.6735 30.1603 63.9841Z"
                                    fill="white" />
                                <path
                                    d="M55.5048 48.3063C49.893 48.3395 45.3406 43.8104 45.324 38.1864C45.3075 32.6121 49.8598 28.0166 55.4055 28C61.0008 27.9835 65.6028 32.5623 65.5863 38.1864C65.5697 43.7772 61.0835 48.2732 55.5048 48.3063ZM55.4055 46.4648C59.991 46.4814 63.6825 42.8316 63.7322 38.2195C63.7819 33.6573 60.0241 29.8581 55.4882 29.8415C50.9359 29.825 47.1946 33.5577 47.1615 38.1366C47.1284 42.7321 50.82 46.4482 55.4055 46.4648Z"
                                    fill="white" />
                                <path
                                    d="M50.075 59.6536C49.7274 59.9025 49.3466 60.3836 49.0321 60.3504C48.701 60.3172 48.2706 59.8195 48.1878 59.4545C48.1382 59.2389 48.6679 58.6748 48.9824 58.6582C49.3301 58.625 49.7108 59.0232 50.075 59.2389C50.075 59.3716 50.075 59.5043 50.075 59.6536Z"
                                    fill="white" />
                                <path
                                    d="M54.9749 44.6409C54.8259 44.4087 54.3789 44.0603 54.3955 43.7119C54.412 42.9156 54.1141 42.4842 53.4353 42.1524C53.1208 42.0031 52.7732 41.7045 52.6739 41.3893C52.558 41.0409 52.5414 40.4271 52.7401 40.2777C53.0215 40.0621 53.5512 40.1284 53.9485 40.1948C54.1472 40.228 54.2796 40.593 54.4948 40.6427C54.9087 40.7423 55.3887 40.8418 55.7529 40.7257C55.9516 40.6593 56.1668 40.0289 56.0675 39.8132C55.9019 39.498 55.5046 39.1828 55.1404 39.0998C53.6505 38.8012 52.7897 38.1044 52.558 36.8768C52.3428 35.7155 52.6904 34.7367 53.6837 34.073C54.1472 33.7578 54.3789 33.4592 54.3293 32.8952C54.2796 32.2315 54.5445 31.6841 55.2894 31.7173C55.9681 31.7338 56.2164 32.2647 56.1668 32.8952C56.1171 33.4592 56.3158 33.8076 56.8455 34.0399C57.1104 34.156 57.4414 34.3717 57.5408 34.6039C57.6732 34.9523 57.756 35.5164 57.5573 35.7486C57.3752 35.9809 56.8124 36.0141 56.4482 35.9809C56.1833 35.9477 55.9516 35.6491 55.6701 35.5164C55.0908 35.2509 54.6272 35.45 54.4286 36.0473C54.2465 36.6279 54.4783 37.0759 55.1073 37.2086C55.3556 37.2583 55.6039 37.2915 55.8357 37.3413C56.9945 37.6067 57.7229 38.3201 57.9546 39.498C58.1864 40.6593 57.8056 41.6547 56.8124 42.3017C56.3489 42.6004 56.1337 42.899 56.1833 43.463C56.2164 44.0603 56.0178 44.558 54.9749 44.6409Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </div>
                    <div class="wrapper-info">
                        <h5 class="wrapper-details about-details">Lakukan Pembayaran </h5>
                        <p>Nikmati belanja online tanpa repot dengan layanan kami! Cukup pilih produk yang Anda inginkan
                        </p>
                    </div>
                </div>
                <div class="seperator">
                </div>
                <div class="about-wrapper">
                    <div class="wrapper-img">
                        <span>
                            <svg width="104" height="104" viewBox="0 0 104 104" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="52" cy="52" r="52" fill="rgb(167, 146, 119)" />
                                <path
                                    d="M74.5284 66.3763C73.9211 68.1456 72.7912 69.4195 70.8563 69.7733C68.6954 70.1696 66.7181 69.1081 65.8425 67.0274C65.6024 66.4471 65.3058 66.2914 64.7126 66.3056C59.9671 66.3197 55.2075 66.3197 50.4621 66.3056C49.9112 66.3056 49.6288 66.4613 49.4169 66.985C48.6684 68.8392 47.2137 69.8441 45.2505 69.8582C43.2309 69.8724 41.7479 68.8675 40.9852 66.9708C40.7593 66.4329 40.4768 66.2914 39.9401 66.3056C37.9063 66.3339 35.8726 66.2914 33.8388 66.3339C32.8925 66.348 32.5818 65.9376 32.5818 65.0458C32.5818 63.3898 33.1609 62.0735 34.5591 61.1393C34.785 60.9978 35.0534 60.7005 35.0534 60.4741C35.1099 59.4267 35.0816 58.3792 35.0816 57.2186C33.2456 57.2186 31.5225 57.2186 29.7995 57.2186C28.9238 57.2186 28.034 57.2186 27.1584 57.2186C26.5793 57.1903 26.0003 57.0771 26.0003 56.3552C26.0003 55.6333 26.5652 55.506 27.1443 55.506C29.3899 55.506 31.6214 55.506 33.867 55.506C34.2342 55.506 34.6014 55.506 35.0251 55.506C35.0251 54.9398 35.0251 54.4727 35.0251 53.8499C34.0506 53.8499 33.0902 53.8358 32.1157 53.8499C31.5225 53.8641 30.9576 53.7508 30.9717 53.029C30.9717 52.3213 31.5225 52.1797 32.1157 52.1939C33.062 52.208 34.0083 52.1939 35.011 52.1939C35.011 51.656 35.011 51.1889 35.011 50.5945C34.6862 50.5803 34.3331 50.552 33.98 50.552C31.7061 50.552 29.4323 50.5379 27.1584 50.552C26.5652 50.552 26.0003 50.4529 26.0003 49.7311C25.9861 49.0092 26.5228 48.8818 27.1301 48.896C29.1639 48.9101 31.1977 48.896 33.2315 48.896C33.3303 48.7827 33.4292 48.6695 33.5422 48.5563C33.3021 48.4572 33.0196 48.4289 32.836 48.259C30.1667 45.9095 29.3052 42.3143 30.6045 39.0872C31.9039 35.8459 34.9969 33.8784 38.556 34.0058C41.8326 34.1191 44.8551 36.4262 45.8578 39.7099C46.0697 40.4177 46.3663 40.5875 47.0442 40.5875C50.7445 40.5592 54.4449 40.5734 58.1452 40.5734C61.5207 40.5734 63.2296 42.2718 63.2438 45.6264C63.2438 46.6738 63.2438 47.7212 63.2438 48.8818C65.3199 48.8818 67.3113 48.9384 69.3027 48.8677C72.198 48.7544 74.1612 50.0425 75.856 52.3637C77.5932 54.7699 78.4971 57.2186 78.1722 60.191C78.0028 61.7338 78.144 63.319 78.144 64.876C78.144 66.1216 78.0028 66.2631 76.7175 66.2631C76.0679 66.2631 75.4323 66.2773 74.7826 66.2773C74.6979 66.3056 74.6273 66.348 74.5284 66.3763ZM36.7906 60.4458C45.081 60.4458 53.2867 60.4458 61.4783 60.4458C61.5207 60.2901 61.5631 60.191 61.5772 60.0919C61.5772 55.053 61.6055 50.0283 61.5772 44.9894C61.5631 43.3051 60.4191 42.2577 58.6678 42.2435C54.798 42.2152 50.9281 42.2435 47.0583 42.2152C46.3663 42.2152 46.2815 42.5125 46.1403 43.1069C45.9002 44.1543 45.6318 45.2301 45.1093 46.1642C44.5585 47.1409 43.7252 47.9477 42.9625 48.8818C44.3607 48.8818 45.7307 48.896 47.1148 48.8818C47.708 48.8818 48.2871 48.9526 48.3012 49.6745C48.3294 50.4529 47.7362 50.552 47.0866 50.552C44.6432 50.5379 42.1999 50.552 39.7565 50.552C38.782 50.552 37.8075 50.552 36.8329 50.552C36.8329 51.1606 36.8329 51.6419 36.8329 52.1939C37.2425 52.1939 37.5815 52.1939 37.9063 52.1939C39.361 52.1939 40.8299 52.1939 42.2846 52.1939C42.8637 52.1939 43.3156 52.3779 43.3156 53.0431C43.3156 53.7225 42.8213 53.8499 42.2563 53.8499C41.7761 53.8499 41.3101 53.8499 40.8299 53.8499C39.4882 53.8499 38.1464 53.8499 36.8047 53.8499C36.8047 54.4869 36.8047 54.9398 36.8047 55.4493C37.1154 55.4635 37.3838 55.4918 37.6521 55.506C38.3159 55.5343 39.1916 55.3786 39.1774 56.3694C39.1492 57.3601 38.2594 57.1478 37.6097 57.1903C37.3555 57.2045 37.0872 57.2328 36.8047 57.2611C36.7906 58.3509 36.7906 59.3559 36.7906 60.4458ZM44.5585 42.1445C44.5726 38.5635 41.6914 35.6477 38.1182 35.6477C34.6014 35.6477 31.7061 38.521 31.6779 42.0454C31.6496 45.6405 34.5026 48.5421 38.0758 48.5704C41.6632 48.6129 44.5585 45.7396 44.5585 42.1445ZM65.4612 64.5929C65.5741 64.2391 65.673 63.9135 65.8001 63.6021C66.478 61.8612 68.1164 60.7288 69.9665 60.7147C71.8449 60.6864 73.6386 61.6913 74.1894 63.4606C74.599 64.8052 75.3476 64.7628 76.4774 64.5363C76.4774 63.2624 76.3362 61.9602 76.5057 60.7005C76.9294 57.6291 75.9549 55.053 74.0341 52.7601C73.9493 52.661 73.8787 52.5336 73.794 52.4345C73.0172 51.4154 71.9862 50.6936 70.7292 50.6369C68.2717 50.5379 65.8001 50.6086 63.3003 50.6086C63.3003 55.3078 63.3003 59.9362 63.3003 64.6071C64.0206 64.5929 64.6985 64.5929 65.4612 64.5929ZM48.7814 62.215C49.0638 62.8095 49.4311 63.3332 49.5582 63.8994C49.6994 64.5788 50.0666 64.6354 50.6315 64.6354C53.1738 64.6212 55.716 64.6212 58.2441 64.6212C59.3175 64.6212 60.3908 64.6212 61.5066 64.6212C61.5066 63.7578 61.5066 62.9935 61.5066 62.2009C57.2413 62.215 53.0325 62.215 48.7814 62.215ZM48.1458 65.2723C48.1458 63.6729 46.8323 62.3707 45.2223 62.3566C43.6122 62.3566 42.2987 63.6587 42.2846 65.244C42.2846 66.8434 43.5981 68.1598 45.194 68.1598C46.8182 68.1739 48.1317 66.8717 48.1458 65.2723ZM70.0513 62.3707C68.4412 62.3707 67.1418 63.6729 67.1418 65.2723C67.1418 66.8717 68.4553 68.1739 70.0654 68.1739C71.6613 68.1739 72.9889 66.8576 72.9889 65.2582C72.9748 63.6587 71.6613 62.3566 70.0513 62.3707ZM41.6349 62.2009C39.8412 62.2009 38.0899 62.1301 36.3386 62.2292C35.0958 62.2999 34.3049 63.3898 34.4037 64.6071C36.4657 64.6071 38.5278 64.6071 40.5615 64.6071C40.9287 63.8003 41.2677 63.0501 41.6349 62.2009Z"
                                    fill="white" />
                                <path
                                    d="M46.5498 65.3011C46.5639 64.5509 45.9707 63.914 45.208 63.9423C44.4312 63.9706 43.9511 64.3952 43.8804 65.202C43.8239 65.9522 44.4171 66.6033 45.1657 66.6316C45.9001 66.6599 46.5356 66.0371 46.5498 65.3011Z"
                                    fill="white" />
                                <path
                                    d="M70.0512 66.6319C70.7715 66.6319 71.407 65.9808 71.3929 65.259C71.3788 64.5088 70.7574 63.9002 70.0088 63.9568C69.2179 64.0134 68.766 64.4522 68.7236 65.259C68.6953 65.995 69.3168 66.6319 70.0512 66.6319Z"
                                    fill="white" />
                                <path
                                    d="M39.2198 40.559C39.7989 42.4274 38.2595 43.7013 37.172 45.1167C37.0025 45.3431 36.3528 45.3856 36.0562 45.2441C35.8726 45.1591 35.915 44.5647 35.8867 44.1967C35.8867 44.1117 35.9856 44.0127 36.0562 43.9419C37.4968 42.5548 37.7934 40.828 37.5815 38.9313C37.5109 38.3085 37.6239 37.6858 38.4148 37.7141C39.2057 37.7282 39.234 38.3652 39.2198 38.9738C39.2057 39.4126 39.2198 39.8513 39.2198 40.559Z"
                                    fill="white" />
                                <path
                                    d="M67.3395 55.1095C67.3395 54.2319 67.3395 53.3402 67.3395 52.4626C67.3395 51.7691 67.6502 51.4294 68.3705 51.3586C70.6868 51.1463 72.4946 51.8116 73.5256 54.0762C73.9069 54.9113 74.4295 55.6615 74.8673 56.4683C75.5594 57.7563 74.9944 58.8179 73.5538 58.8603C71.859 58.9028 70.1642 58.8745 68.4835 58.8745C67.6785 58.8745 67.3254 58.464 67.3395 57.6714C67.3536 56.808 67.3395 55.9587 67.3395 55.1095ZM73.229 57.1194C71.6189 53.8639 71.0964 52.675 69.0485 53.1562C69.0485 54.4442 69.0485 55.7464 69.0485 57.1194C70.4467 57.1194 71.7884 57.1194 73.229 57.1194Z"
                                    fill="white" />
                                <path
                                    d="M46.5499 65.3011C46.5358 66.0371 45.8861 66.6599 45.1658 66.6316C44.4314 66.6033 43.8241 65.9522 43.8806 65.2021C43.9371 64.3953 44.4173 63.9706 45.2082 63.9423C45.9709 63.914 46.5641 64.5368 46.5499 65.3011Z"
                                    fill="white" />
                                <path
                                    d="M70.0514 66.6312C69.3169 66.6312 68.6955 65.9942 68.7379 65.2441C68.7661 64.4373 69.2322 63.9985 70.0231 63.9419C70.7858 63.8853 71.4072 64.4939 71.4072 65.2441C71.4072 65.9801 70.7717 66.6312 70.0514 66.6312Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </div>
                    <div class="wrapper-info">
                        <h5 class="wrapper-details about-details">Pengiriman cepat</h5>
                        <p>Nikmati belanja online tanpa repot dengan layanan kami! nikmati pengiriman cepat langsung ke rumah Anda
                            ambang pintu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
