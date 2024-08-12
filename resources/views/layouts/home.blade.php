<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="keywords"
      content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-128.png') }}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('mstile-310x310.png') }}" />

    @hasSection('title')
      <title>{{ $__env->yieldContent('title') }} &bullet; {{ config('app.name') }}</title>
    @else
      <title>{{ config('app.name') }}</title>
    @endif
    <link rel="stylesheet" href="{{ asset('additional-assets/toastr-2.1.4/toastr.min.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&Inter:wght@100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('additional-assets/fontawesome-free-6.5.2/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('additional-assets/tabler-icons-3.4.0/tabler-icons.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/swiper10-bundle.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/bootstrap-5.3.2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/nouislider.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/aos-3.0.0.css') }}">

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/style.css') }}">

    <link href="{{ asset('additional-assets/summernote-0.8.20/summernote.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/flasher/flasher.min.css') }}">

    <script src="{{ asset('vendor/flasher/flasher.min.js') }}"></script>

    {!!htmlScriptTagJsApi()!!}

    <style>
      .header-right-dropdown>div {
        right: 0 !important;
        left: unset !important;
      }

      .submitLoading {
        pointer-events: none !important;
        filter: brightness(0.5) !important;
      }
    </style>

    @stack('link')
    @yield('link')

    @stack('style')
    @yield('style')
  </head>

  <body>
    {{-- <div class="modal fade show" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="login-section">
              <div class="review-form">
                <h5 class="comment-title">Masuk</h5>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="review-inner-form ">
                    <div class="review-form-name">
                      <label for="email" class="form-label">Surat Elektronik</label>
                      <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Surat elektronik" value="{{ old('email') }}" name="email"
                        autocomplete="email" autofocus>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="review-form-name">
                      <label for="password" class="form-label">Kata Sandi</label>
                      <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan kata sandimu" autocomplete="current-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="review-form-name checkbox">
                      <div class="checkbox-item d-flex align-items-center">
                        <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="m-0">
                          Remember Me</label>
                      </div>
                      <div class="forget-pass">
                        @if (Route::has('password.request'))
                          <a href="{{ route('password.request') }}">
                            <p>Lupa Password</p>
                          </a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="login-btn text-center">
                    <button type="submit" class="shop-btn text-white">Masuk</button>
                    <span class="shop-account">Belum punya akun?<a href="{{ route('register') }}">Daftar
                        disini</a></span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    @include('layouts.partials.home.header')

    @yield('content')

    @include('layouts.partials.home.footer')

    <script src="{{ asset('template-assets/front/assets/js/jquery_3.7.1.min.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/bootstrap_5.3.2.bundle.min.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/nouislider.min.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/aos-3.0.0.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/swiper10-bundle.min.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/shopus.js') }}"></script>
    <script src="{{ asset('additional-assets/sweetalert2-11.12.0/sweetalert2.all.js') }}"></script>


    @stack('script')
    @yield('script')

    <script>
      function confirmDeletion(msg, callback) {
        Swal.fire({
          title: "Apa kamu yakin?",
          text: msg && "Anda tidak akan dapat mengembalikan ini!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, Hapus"
        }).then((result) => {
          if (result.isConfirmed) {
            callback?.();
          }
        });
        return false;
      }

      $("[data-route]").click(function({
        target: {
          tagName
        }
      }) {
        if (!["A", "I"].includes(tagName)) window.location.href = $(this).data("route");
      });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      });
      //   $(document).on('click', 'button, [onclick], a, :radio, :checkbox, [tabindex]', function(e) {
      //     let $this = $(this);
      //     $this.prop('disabled', true);
      //     setTimeout(function() {
      //       $this.prop('disabled', false);
      //     }, 250);
      //   });
      $("form[action*='product/storesproduct'], form[action*='product/storecart']").submit(function(e) {
        e.preventDefault();
        const form = $(this);
        const product = form.closest('swiper-slide, [isProduct]');
        product.addClass('submitLoading');
        $.ajax({
          url: form.attr('action'),
          type: "POST",
          cache: true,
          success: function(response) {
            product.removeClass('submitLoading');
            if (response.error) {
              flasher.error(response.error);
              return false;
            } else {
              flasher.success(response.success);
            }
            window.globalVarProxy[response.type] = response.data;
          }
        });
        return false;
      });
    </script>

    <script src="{{ asset('additional-assets/toastr-2.1.4/toastr.min.js') }}"></script>

    @stack('js')
    @yield('js')
  </body>

</html>
