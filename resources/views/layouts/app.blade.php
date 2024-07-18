<!doctype html>

<html lang="id" class="layout-compact dark-style layout-menu-fixed layout-navbar-fixed" dir="ltr"
  data-theme="theme-default" data-assets-path="{{ asset('template-assets/admin/assets/') }}/"
  data-template="vertical-menu-template-no-customizer">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    @hasSection('title')
      <title>{{ $__env->yieldContent('title') }} &bullet; {{ config('app.name') }}</title>
    @else
      <title>{{ config('app.name') }}</title>
    @endif

    <meta name="description" content="" />

    <!-- Favicon -->
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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('additional-assets/datatables/datatables.min.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('template-assets/admin/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('template-assets/admin/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template-assets/admin/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" id="stylesheet-core"
      href="{{ asset('template-assets/admin/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" id="stylesheet-theme"
      href="{{ asset('template-assets/admin/assets/vendor/css/rtl/theme-bordered.css') }}" />
    <link rel="stylesheet" href="{{ asset('template-assets/admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('template-assets/admin/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet"
      href="{{ asset('template-assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('template-assets/admin/assets/vendor/libs/typeahead-js/typeahead.css') }}" />

    <link href="{{ asset('additional-assets/summernote-0.8.20/summernote-lite.css') }}" rel="stylesheet" />

    <style>
      .menu-item.active {
        background-color: #0000;
      }

      .dt-info {
        margin-left: 10%;
      }

      div.dt-container div.dt-paging {
        margin: 0;
        margin-right: 10%;
        margin-left: -10%;
      }


      ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
      }

      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      ::-webkit-scrollbar-thumb {
        background: #888;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }
    </style>

    <!-- Page CSS -->
    @stack('link')
    @yield('link')

    <!-- Helpers -->
    <script src="{{ asset('template-assets/admin/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('template-assets/admin/assets/js/config.js') }}"></script>

    @stack('style')
    @yield('style')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        @include('layouts.partials.app.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          @include('layouts.partials.app.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
              @yield('content')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-fluid">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    made with ❤️ by
                    <a href="{{ url('/') }}" target="_blank" class="footer-link text-primary fw-medium">Humma
                      Appreticenship Team</a>
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('template-assets/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('additional-assets/sweetalert2-11.12.0/sweetalert2.all.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('template-assets/admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('template-assets/admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('template-assets/admin/assets/js/app-ecommerce-dashboard.js') }}"></script>

    @stack('scripts')
    @yield('scripts')

    <!-- Vendors JS -->
    @include('components.sweetalert')

    <script>
      function confirmDeletion(callback) {
        Swal.fire({
          title: "Apa kamu yakin?",
          text: "Anda tidak akan dapat mengembalikan ini!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, Hapus"
        }).then((result) => {
          if (result.isConfirmed) {
            callback();
          }
        });
      }
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      });
      // $(document).on('click', 'button, [onclick], a, :radio, :checkbox, [tabindex]', function(e) {
      //   let $this = $(this);
      //   $this.prop('disabled', true);
      //   setTimeout(function() {
      //     $this.prop('disabled', false);
      //   }, 250);
      // });
    </script>
    @yield('js')
    @stack('js')
  </body>

</html>
