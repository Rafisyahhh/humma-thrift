@extends('layouts.panel')

@section('content')
    @include('components.show-errors')
    <div class="seller-application-section">
        <div class="row">
            <div class="col-lg-7">
                <h5 class="comment-title">Perbarui Profil</h5>
                <p class="paragraph">Silahkan isikan dengan data yang lengkap untuk melakukan transaksi.</p>
                <form action="{{ route('user.profile.update', auth()->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="review-form">
                        <div class="account-inner-form">
                            <div class="review-form-name mb-4">
                                <label for="username" class="form-label">Nama Pengguna</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="akbar" value="{{ auth()->user()->username }}" />
                            </div>
                            <div class="review-form-name mb-4">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Akbar Rafsyah" value="{{ auth()->user()->name }}" />
                            </div>
                        </div>
                        <div class="account-inner-form">
                            <div class="review-form-name mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="email@kamu.tld" value="{{ auth()->user()->email }}" disabled/>
                            </div>
                            <div class="review-form-name mb-4">
                                <label for="telephone" name="phone" class="form-label">Nomor Telepon</label>
                                <input type="number" name="phone" id="telephone" class="form-control" placeholder="+6281234567890"
                                    value="{{ auth()->user()->phone }}" />
                            </div>
                        </div>
                        <div class="account-inner-form">
                            <div class="review-form-name mb-4">
                                <label for="birthplace" class="form-label">Tempat Lahir</label>
                                <input type="text" name="pbirth" id="birthplace" class="form-control"
                                    placeholder="Mis: Malang" value="{{ auth()->user()->pbirth }}" />
                            </div>
                            <div class="review-form-name mb-4">
                                <label for="birthdate" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="dbirth" id="birthdate" class="form-control"
                                    placeholder="Mis: 08-06-12" value="{{ auth()->user()->dbirth }}" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-5">
                <div class="img-upload-section">
                    <div class="logo-wrapper">
                        <h5 class="comment-title">Perbarui Foto Profil</h5>
                        <p class="paragraph">Ukuran 300x300.</p>
                        <div class="logo-upload">
                            <img src="{{ asset(auth()->user()->avatar ? 'storage/'.auth()->user()->avatar : 'template-assets/front/assets/images/homepage-one/sallers-cover.png') }}" alt="up" class="upload-img"
                                id="upload-img">
                            <div class="upload-input">
                                <label for="input-file">
                                    <span>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
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
                                <input type="file" name="avatar" accept="image/jpeg, image/jpg, image/png, image/webp" id="input-file">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="submit-btn d-flex justify-content-center w-100 mt-5">
                                <button type="submit" class="shop-btn update-btn">Perbarui Profil</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
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
        }

        // When the user clicks on close button in address modal, close the address modal
        addressCloseBtn.onclick = function() {
            addressModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close the address modal
        window.onclick = function(event) {
            if (event.target == addressModal) {
                addressModal.style.display = "none";
            }
        }
    });
</script>
@endpush
