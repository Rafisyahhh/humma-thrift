<!doctype html>

<html lang="en" class="layout-compact dark-style layout-menu-fixed layout-navbar-fixed" dir="ltr"
    data-theme="theme-default" data-assets-path="template-assets/admin/assets/"
    data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin</title>    

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="template-assets/admin/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/css/rtl/core-dark.css" />
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/css/rtl/theme-bordered-dark.css" />
    <link rel="stylesheet" href="template-assets/admin/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Page CSS -->
    @stack('link')
    @yield('link')

    <!-- Helpers -->
    <script src="template-assets/admin/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="template-assets/admin/assets/js/config.js"></script>

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
                                    <a href="{{ url('/') }}" target="_blank"
                                        class="footer-link text-primary fw-medium">Humma Appreticenship Team</a>
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

    <script src="template-assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="template-assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="template-assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="template-assets/admin/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="template-assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="template-assets/admin/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="template-assets/admin/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="template-assets/admin/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="template-assets/admin/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    @stack('scripts')
    @yield('scripts')

    <!-- Main JS -->
    <script src="template-assets/admin/assets/js/main.js"></script>

    <!-- Page JS -->


    <!-- Vendors JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr/build/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr/build/toastr.min.css">
    @if ($errors->any())
    <script>
        toastr.error(`{!! implode('\n', $errors->all()) !!}`);
    </script>
@endif

@if (session('warning'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('warning') }}"
        });
    </script>
@endif


@if (session('success'))
    <script>
        Swal.fire({
            // title: "Good job!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
@endif

    @stack('js')
    @yield('js')




</body>

</html>
