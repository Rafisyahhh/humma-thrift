@extends('layouts.app')

@section('title', 'Penghasilan')

@push('style')
  <style>
    .modal-content {
      max-width: 50rem;
      width: 100%;
    }

    .review-form {
      width: 100%;
    }

    .modal-header {
      padding: 1rem 1.5rem;
    }

    .product-info {
      padding: 2rem;
    }

    .product-info-img {
      margin-bottom: 1.5rem;
    }

    .product-info-content h5 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      font-weight: bold;
      color: #000;
    }

    .price .new-price {
      font-size: 1rem;
      color: blue;
    }

    .product-details th,
    .product-details td {
      padding: 0.5rem 1rem;
    }

    .product-details th {
      text-align: left;
      width: 60%;
      font-weight: 600;
      padding: 10px;
      color: rgba(0, 0, 0, 0.4);
    }

    .product-info-content .product-details .inner-text {
      color: #1c3879;
    }

    .product-details td {
      text-align: left;
      width: 75%;
    }

    .product-details hr {
      margin: 1.5rem 0;
    }

    .product-info-img .product-top .slider-top-img img {
      width: 100%;
      height: 100%;
      object-fit: cover !important;
      border: 1px solid rgba(126, 163, 219, 0.4);
      border-radius: 1rem;
    }


    .product-info-img .product-top .slider-top-img {
      width: 21rem;
      height: 25.5rem;
    }

    .inner-status {
      background: rgba(110, 109, 121, 0.10);
      color: rgba(0, 0, 0, .87);
      font-size: 0.8rem;
      font-weight: 400;
      margin: 0;
      padding: 0.47rem;
      text-transform: capitalize;
    }
  </style>
@endpush

@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <section>
    <div class="d-flex justify-content-between">
      <h5 class="card-header">Data Penghasilan</h5>
      <ul class="ms-auto nav nav-pills d-none d-md-flex mt-3 me-3" id="incomeData" role="tablist">
        <li class="nav-item">
          <button class="nav-link active" type="button" id="daily-income-tab" data-bs-toggle="tab"
            data-bs-target="#daily-income" type="button" role="tab" aria-controls="daily-income"
            aria-selected="true">Harian</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" type="button" id="monthly-income-tab" data-bs-toggle="tab"
            data-bs-target="#monthly-income" type="button" role="tab" aria-controls="monthly-income"
            aria-selected="false">Bulanan</button>
        </li>
      </ul>
    </div>
    <div class="tab-content mt-5" id="myTabContent">
      <div class="tab-pane fade show active" id="daily-income" role="tabpanel" aria-labelledby="daily-income-tab">
        <div class="monthly-income-section">
          <canvas id="penjualan-harian" width="400" height="100"></canvas>
        </div>
      </div>
      <div class="tab-pane fade" id="monthly-income" role="tabpanel" aria-labelledby="monthly-income-tab">
        <div class="monthly-income-section">
          <canvas id="penjualan-bulanan" width="400" height="100"></canvas>
        </div>
      </div>
    </div>
  </section>
  <section id="income">
    <div class="row mb-3">
      <div class="col-md-4">
        <div class="card card-border-shadow-primary">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2 pb-1">
              <div class="avatar me-2">
                <span class="avatar-initial rounded bg-label-primary"><i class="fas fa-box"></i></span>
              </div>
              <h4 class="ms-1 mb-0">@currency($transactionTotal)</h4>
              <p class="ms-3 mb-0">Total Transaksi</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-border-shadow-primary">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2 pb-1">
              <div class="avatar me-2">
                <span class="avatar-initial rounded bg-label-primary"><i class="fas fa-coins"></i></span>
              </div>
              <h4 class="ms-1 mb-0">@currency($saldo)</h4>
              <p class="ms-3 mb-0">Transaksi Bersih</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-border-shadow-primary">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2 pb-1">
              <div class="avatar me-2">
                <span class="avatar-initial rounded bg-label-primary"><i class="fas fa-wallet"></i></span>
              </div>
              <h4 class="ms-1 mb-0">@currency($accountBalance)</h4>
              <p class="ms-3 mb-0">Saldo Admin</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="card">
    <div class="table-responsive text-nowrap">
      <table class="table yajra-datatable w-100">
        <thead class="table-light">
          <tr>
            <th class="text-start">#</th>
            <th class="text-start">No Transaksi</th>
            <th class="text-start">Pembeli</th>
            <th class="text-start">Penjual</th>
            <th class="text-start">Tanggal Kadaluarsa</th>
            <th class="text-start">Tanggal Di Bayar</th>
            <th class="text-start">Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
      </table>
    </div>
  </div>
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
        <div class="input-group">
          <input class="form-control mt-3 me-4" placeholder="Cari Transaksi&hellip;" id="searchInput" />
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
      // radioBtn.closest('input.d-none')[0].val(value);
      $(radioBtn.closest('form')).find('input.d-none').val(value)
      var form = radioBtn.closest('form').submit();
    }
  </script>
  <script type="text/javascript">
    const {
      table
    } = $('.yajra-datatable').AjaxDataTable({
      onCreate: {
        modal: $('#tambahModal'),
        text: 'Tambahkan Brand',
        className: 'btn ms-4'
      },
      onEdit: {
        modal: $('#editModal'),
        onClick: (form, data) => {
          form.find('img#logo_image').attr('src', `{{ asset('storage/') }}/${data.logo}`)
        }
      },
      onDelete: {
        modal: $('#editModal'),
        url: '{{ route('admin.brand.destroy', ':id:') }}',
        onClick: ($delete) => {
          confirmDeletion(() => {
            $delete()
          });
        }
      },
      options: {
        layout: {
          topStart: $(`<h5 class="card-header">Data Penghasilan</h5>`),
          topEnd: $('[datatables-topEnd]'),
          bottomStart: {
            info: {
              text: 'Menampilkan _START_ dari _END_ hasil'
            }
          },
        },
        ajax: {
          url: "{{ route('yajra.incomes') }}",
          data: function(d) {
            d.dateBefore = $('#date-before').val();
            d.dateAfter = $('#date-after').val();
          }
        }
      },
      columns: [{
          data: 'DT_RowIndex',
          orderable: false,
          searchable: false,
          width: "5%"
        },
        {
          data: 'name',
        },
        {
          data: 'user.name',
        },
        {
          data: 'store',
        },
        {
          data: 'expired_at',
        },
        {
          data: 'paid_at',
        },
        {
          data: 'status',
          render: (data, __, row) => {
            const badge = {
              'UNPAID': `<span class="badge text-bg-danger">Belum Bayar</span>`,
              'PAID': `<span class="badge text-bg-success">Sudah Bayar</span>`,
              'EXPIRED': `<span class="badge text-bg-danger">Pembayaran Kadaluarsa</span>`,
              'REFUND': `<span class="badge text-bg-warning">Produk Dikembalikan</span>`,
              'FAILED': `<span class="badge text-bg-danger">Pembayaran Gagal</span>`,
            } [data];
            return badge || data;
          }
        },
      ]
    });

    $("#search").submit(function(e) {
      e.preventDefault();
      table.search($(this).find("input[name='search']").val()).draw();
    });

    function setupOrderButton(button, searchValue) {
      button.click(function(e) {
        e.preventDefault();
        $("ul").find("li a").removeClass("active");
        $(this).addClass("active");
        table.search(searchValue).draw();
        $('#searchInput').val("");
      });
    }

    setupOrderButton($("#order-all"), "");
    setupOrderButton($("#order-user"), ":Product:");
    setupOrderButton($("#order-seller"), ":ProductAuction:");

    table.on("click", "button#detail", function() {
      const modal = $('#detailModal');
      const data = table.row($(this).closest("tr")).data();

      const editedData = {
        ...data,
        name: typeof data.user === "object" ? data.user.name : data.user,
      };

      modal.find("#detail_image").attr("src", "{{ asset('storage/') }}/" + editedData.image);

      modal.find("[data-row]").each(function() {
        $(this).text(editedData[$(this).data("row")]);
      });

      modal.modal("show");
    });
    table.on("click", "button.editStatus", function() {
      $(this).dropdown('toggle');
    });


    let searchTimeout;

    $('#searchInput').on('input', function() {
      clearTimeout(searchTimeout);

      searchTimeout = setTimeout(function() {
        const searchTerm = $('#searchInput').val().trim();
        table.search(searchTerm).draw();
      }, 750);
    });
    $('#date-before, #date-after').on('change', function() {
      const dateBefore = $('#date-before').val();
      const dateAfter = $('#date-after').val();

      if (dateBefore && dateAfter) {
        table.draw();
      }
    });
  </script>
  <script src="{{ asset('additional-assets/chart.js-4.4.3/chart.umd.js') }}"></script>

  <script>
    const ctxBulanan = document.getElementById('penjualan-bulanan').getContext('2d');
    const gradientBulanan = ctxBulanan.createLinearGradient(0, 0, 0, 250);
    gradientBulanan.addColorStop(0, 'rgba(25, 56, 121, 0.25)');
    gradientBulanan.addColorStop(1, 'rgba(25, 56, 121, 0.0)');

    var labels = [
      @foreach ($months as $month)
        '{{ $month }}',
      @endforeach
    ];

    const dataBulanan = {
      labels: labels,
      datasets: [{
          label: 'Penghasilan Kotor per Bulan',
          data: @json($monthlyGrossSales),
          backgroundColor: gradientBulanan,
          borderColor: 'rgba(25, 56, 121, 1)',
          borderWidth: 3,
          borderCapStyle: 'round',
          borderJoinStyle: 'round',
          pointBackgroundColor: 'rgba(25, 56, 121, 1)',
          pointBorderColor: '#fff',
          pointBorderWidth: 2,
          pointRadius: 5,
          pointHoverRadius: 7,
          pointHoverBackgroundColor: 'rgba(25, 56, 121, 1)',
          pointHoverBorderColor: '#fff',
          pointHoverBorderWidth: 2,
          fill: true
        },
        {
          label: 'Penghasilan Bersih per Bulan',
          data: @json($monthlyNetIncome),
          backgroundColor: 'rgb(222, 255, 249)',
          borderColor: 'rgb(136, 215, 219)',
          borderWidth: 3,
          borderCapStyle: 'round',
          borderJoinStyle: 'round',
          pointBackgroundColor: 'rgb(136, 215, 219)',
          pointBorderColor: '#fff',
          pointBorderWidth: 2,
          pointRadius: 5,
          pointHoverRadius: 7,
          pointHoverBackgroundColor: 'rgb(136, 215, 219)',
          pointHoverBorderColor: '#fff',
          pointHoverBorderWidth: 2,
          fill: true
        }
      ]
    };

    var options = {
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            display: false
          },
          ticks: {
            display: false
          },
          border: {
            display: false
          }
        },
        x: {
          grid: {
            display: false
          },
          ticks: {
            display: false
          },
          border: {
            display: false
          }
        }
      },
      responsive: true,
      plugins: {
        legend: {
          display: true
        },
        tooltip: {
          enabled: true
        }
      }
    };

    new Chart(ctxBulanan, {
      type: 'line',
      data: dataBulanan,
      options: options
    });
  </script>

  @php
    $currentDate = new DateTime();
    $currentMonth = $currentDate->format('m');
    $daysInMonth = $currentDate->format('t');
    $dates = [];
    for ($i = 1; $i <= $daysInMonth; $i++) {
        $dates[] = $currentDate->format('Y-m-') . str_pad($i, 2, '0', STR_PAD_LEFT);
    }
  @endphp

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const ctxHarian = document.getElementById('penjualan-harian').getContext('2d');
      const gradientHarian = ctxHarian.createLinearGradient(0, 0, 0, 250);
      gradientHarian.addColorStop(0, 'rgba(25, 56, 121, 0.25)');
      gradientHarian.addColorStop(1, 'rgba(25, 56, 121, 0.0)');

      var labels = [
        @foreach ($dates as $date)
          '{{ $date }}',
        @endforeach
      ];

      const dataHarian = {
        labels: labels,
        datasets: [{
            label: 'Penghasilan Kotor per Hari',
            data: @json($dailyGrossSales),
            backgroundColor: gradientHarian,
            borderColor: 'rgba(25, 56, 121, 1)',
            borderWidth: 3,
            pointBackgroundColor: 'rgba(25, 56, 121, 1)',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7,
            pointHoverBackgroundColor: 'rgba(25, 56, 121, 1)',
            pointHoverBorderColor: '#fff',
            pointHoverBorderWidth: 2,
            fill: false, // Tidak mengisi area di bawah garis
            tension: 0.1 // Garis lurus
          },
          {
            label: 'Penghasilan Bersih per Hari',
            data: @json($dailySales),
            backgroundColor: 'rgb(222, 255, 249)',
            borderColor: 'rgb(136, 215, 219)',
            borderWidth: 3,
            pointBackgroundColor: 'rgb(136, 215, 219)',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7,
            pointHoverBackgroundColor: 'rgb(136, 215, 219)',
            pointHoverBorderColor: '#fff',
            pointHoverBorderWidth: 2,
            fill: true,
            tension: 0.1 // Garis lurus
          }
        ]
      };

      var options = {
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              display: false
            },
            ticks: {
              display: false
            },
            border: {
              display: false
            }
          },
          x: {
            grid: {
              display: false
            },
            ticks: {
              display: false
            },
            border: {
              display: false
            }
          }
        },
        responsive: true,
        plugins: {
          legend: {
            display: true
          },
          tooltip: {
            enabled: true
          }
        }
      };

      new Chart(ctxHarian, {
        type: 'line',
        data: dataHarian,
        options: options
      });
    });
  </script>
@endpush
