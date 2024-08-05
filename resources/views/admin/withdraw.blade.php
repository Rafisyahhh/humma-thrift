@extends('layouts.app')

@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <div class="table-responsive text-nowrap">
      <table class="table yajra-datatable w-100">
        <thead class="table-light">
          <tr>
            <th>Requested at</th>
            <th>Nama seller</th>
            <th>Nama Bank</th>
            <th>No Rekening</th>
            <th>Jumlah Penarikan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          {{-- @forelse ($users as $user) --}}
          {{-- <tr>
            <td>
              <div class="d-flex gap-3 align-items-center">
                <p>12 Juni 2024</p>
              </div>
            </td>
            <td>
              <div class="d-flex gap-3 align-items-center">
                <p>Dummy. Shop</p>
              </div>
            </td>
            <td>
              <div class="d-flex gap-3 align-items-center">
                <p>BCA</p>
              </div>
            </td>
            <td>
              <div class="d-flex gap-3 align-items-center">
                <p>00837645272</p>
              </div>
            </td>
            <td>
              <div class="d-flex gap-3 align-items-center">
                <p>Rp. 12.000.000</p>
              </div>
            </td>
            <td>
              <div class="d-flex gap-3 align-items-center">
                <span class="badge bg-danger">Pending</span>
              </div>
            </td>
          </tr> --}}
        </tbody>
      </table>
    </div>


    <div id="components" class="d-none">

      <button class="btn btn-sm btn-info" pendingButton>Pending</button>
      <button class="btn btn-sm btn-warning" processedButton>Processed</button>
      <button class="btn btn-sm btn-success" completeButton>Complete</button>
      <button class="btn btn-sm btn-danger" failedButton>Failed</button>

      <div class="dropdown dropstart" statusDropdown>
        <button type="button" class="badge bg-label-dark me-1 border-0 editStatus" style="background: none;"
          data-bs-toggle="dropdown" aria-expanded="false">
          <i class="ti ti-dots-vertical"></i>
        </button>
        <ul class="dropdown-menu p-0">
          <form action="{{ route('admin.withdraw.update', ':id:') }}" method="POST">
            @csrf
            @method('PUT')
            <input class="d-none" value="" name="status" />
            <li><a class="dropdown-item btn btn-sm btn-danger text-white" role="button"
                onclick="submitForm(this, 'failed')">Failed</a></li>
            <li><a class="dropdown-item btn btn-sm btn-warning text-white" role="button"
                onclick="submitForm(this, 'processed')">Process</a></li>
            <li><a class="dropdown-item btn btn-sm btn-success text-white" role="button"
                onclick="submitForm(this, 'complete')">Complete</a></li>
          </form>
        </ul>
      </div>

    </div>

  </div>
  <!-- Bootstrap Table with Header - Light -->
@endsection

@push('scripts')
  <script src="{{ asset('additional-assets/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('additional-assets/datatables/datatables-button.min.js') }}"></script>
  <script src="{{ asset('additional-assets/datatables/datatables-responsive.min.js') }}"></script>
  <script src="{{ asset('additional-assets/datatables/datatables-stateRestore.min.js') }}"></script>
  <script src="{{ asset('js/AjaxDataTable.js') }}"></script>
@endpush

@push('js')
  <script>
    function submitForm(radioBtn, value) {
      // radioBtn.closest('input.d-none')[0].val(value);
      // radioBtn.closest('form').attr(value)
      $(radioBtn.closest('form')).find('input.d-none').val(value)
      var form = radioBtn.closest('form').submit();
    }
  </script>
  <script type="text/javascript">
    const pendingButton = $('[pendingButton]');
    const processedButton = $('[processedButton]');
    const completeButton = $('[completeButton]');
    const failedButton = $('[failedButton]');
    const statusDropdown = $('[statusDropdown]');

    const dateTimeFormat = new Intl.DateTimeFormat('id', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
    const moneyFormat = new Intl.NumberFormat('id', {
      style: 'currency',
      currency: 'IDR',
      maximumSignificantDigits: 1
    });
    const {
      table
    } = $('.yajra-datatable').AjaxDataTable({
      options: {
        layout: {
          topStart: null,
          topEnd: null,
          bottomStart: null,
        },
        order: [
          [2, 'desc']
        ]
      },
      ajax: "{{ route('yajra.withdrawal') }}",
      columns: [{
          data: 'created_at',
          render: (data, type, row) => dateTimeFormat.format(new Date(data))
        },
        {
          data: 'user.name',
        },
        {
          data: 'bank.name',
        },
        {
          data: 'bank_number',
        },
        {
          data: 'amount',
          render: (data) => moneyFormat.format(data)
        },
        {
          data: 'id',
          className: 'text-center',
          orderable: false,
          searchable: false,
          render: (data, _, row) => {
            const button = {
              pending: pendingButton[0].outerHTML,
              processed: processedButton[0].outerHTML,
              complete: completeButton[0].outerHTML,
              failed: failedButton[0].outerHTML
            };
            let tableStatusDropdown = statusDropdown;
            tableStatusDropdown.find('form').attr('action', statusDropdown.find('form').attr(
              'action').replace(':id:', data));
            console.log(tableStatusDropdown[0].outerHTML);
            tableStatusDropdown = tableStatusDropdown[0].outerHTML;
            return `<div class="d-flex gap-2 float-end">${button[row.status] + tableStatusDropdown}</div>`;
          }
        }
      ]
    });
    table.on("click", "button.editStatus", function() {
      $(this).dropdown('toggle');
    });
  </script>
@endpush
