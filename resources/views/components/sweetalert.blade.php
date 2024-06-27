@push('link')
  <link rel="stylesheet" href="{{ asset('additional-assets/toastr-2.1.4/toastr.min.css') }}" />
@endpush

@push('script')
  <script src="{{ asset('additional-assets/toastr-2.1.4/toastr.min.js') }}"></script>
@endpush

@push('script')
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
@endpush
