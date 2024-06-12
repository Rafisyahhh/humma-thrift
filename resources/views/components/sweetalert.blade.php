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
