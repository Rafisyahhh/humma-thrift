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
        </tbody>
      </table>
    </div>


    <div id="components" class="d-none">

      <button class="btn btn-sm btn-info" pendingButton>Tertunda</button>
      <button class="btn btn-sm btn-warning" processedButton>Diproses</button>
      <button class="btn btn-sm btn-success" completeButton>Menyelesaikan</button>
      <button class="btn btn-sm btn-danger" failedButton>Gagal</button>

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
            <li><a class="dropdown-item btn btn-sm btn-warning text-white" role="button"
                onclick="submitForm(this, 'processed')">Proses</a></li>
          </form>
        </ul>
      </div>
      <div class="dropdown dropstart" statusProcessDropdown>
        <button type="button" class="badge bg-label-dark me-1 border-0 editStatus" style="background: none;"
          data-bs-toggle="dropdown" aria-expanded="false">
          <i class="ti ti-dots-vertical"></i>
        </button>
        <ul class="dropdown-menu p-0">
          <li><a class="dropdown-item btn btn-sm btn-danger text-white" role="button" modal="failed">Gagal</a></li>
          <li><a class="dropdown-item btn btn-sm btn-success text-white" role="button" modal="complete">Menyelesaikan</a>
          </li>
        </ul>
      </div>

    </div>

  </div>

  <div id="failed-modal" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('admin.withdraw.update', ':id:') }}" method="post">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title">Penarikan Gagal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="massage">Alasan</label>
            <textarea type="text" class="form-control" id="massage" placeholder="Masukkan alasan Anda" name="message"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="complete-modal" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('admin.withdraw.update', ':id:') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title">Suksess</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="image">Upload Bukti</label>
            <input type="file" class="form-control" id="image" placeholder="Upload Bukti" name="image">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap Table with Header - Light -->

  <div class="d-none">
    <div datatables-topEnd>
      <div class="d-flex">
        <div class="input-group">
          <input class="form-control mt-3" id="date-before" type="date" placeholder="Tanggal Awal" required />
        </div>
        <div class="ms-1 me-1"></div>
        <div class="input-group">
          <input class="form-control mt-3 me-3" id="date-after" type="date" placeholder="Tanggal Akhir" required />
        </div>
      </div>
    </div>
  </div>
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
    const statusProcessDropdown = $('[statusProcessDropdown]');

    const dateTimeFormat = new Intl.DateTimeFormat('id', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
    const moneyFormat = new Intl.NumberFormat('id', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    });
    const {
      table
    } = $('.yajra-datatable').AjaxDataTable({
      options: {
        layout: {
          topStart: null,
          topEnd: $('[datatables-topEnd]'),
          bottomStart: null,
        },
        order: [
          [5, 'asc']
        ],
        ajax: {
          url: "{{ route('yajra.withdrawal') }}",
          data: function(d) {
            d.dateBefore = $('#date-before').val();
            d.dateAfter = $('#date-after').val();
          }
        }
      },
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
          data: 'status_order',
          className: 'text-center',
          searchable: false,
          render: (data, _, row) => {
            const button = {
              pending: pendingButton[0].outerHTML,
              processed: processedButton[0].outerHTML,
              complete: completeButton[0].outerHTML,
              failed: failedButton[0].outerHTML
            };
            let showEdit = true;
            if (["complete", "failed"].includes(row.status)) {
              showEdit = false;
            }

            let tableStatusDropdown;
            if (row.status === "pending") {
              tableStatusDropdown = statusDropdown.clone();
              tableStatusDropdown.find('form').attr('action', statusDropdown.find('form').attr(
                'action').replace(':id:', row.id));
            } else {
              tableStatusDropdown = statusProcessDropdown.clone();
            }
            tableStatusDropdown = tableStatusDropdown[0].outerHTML;
            return `<div class="d-flex gap-2 float-end">${button[row.status] + (showEdit ? tableStatusDropdown : "<div style='width: 50px;'></div>")}</div>`;
          }
        }
      ]
    });
    table.on("click", "button.editStatus", function() {
      $(this).dropdown('toggle');
    });
    table.on("click", "[modal]", function() {
      const {
        id
      } = table.row($(this).closest("tr")).data();
      const $this = $(`#${$(this).attr("modal")}-modal`);
      const $form = $this.find("form");
      $form.attr("action", $form.attr('action').replace(":id:", id));
      $this.modal('show');
    });
    $('#date-before, #date-after').on('change', function() {
      const dateBefore = $('#date-before').val();
      const dateAfter = $('#date-after').val();

      if (dateBefore && dateAfter) {
        table.draw();
      }
    });
  </script>
@endpush
