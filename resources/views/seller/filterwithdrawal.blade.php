<div class="table-view">
  <div class="table-header">
    <div class="table-item">#</div>
    <div class="table-item">Tanggal Diajukan</div>
    <div class="table-item">Nominal</div>
    <div class="table-item">Status</div>
    <div class="table-item">Aksi</div>
  </div>

  @forelse ($withdrawals as $withdrawal)
    <div class="table-body">
      <a href="{{ route('seller.withdraw.detail', $withdrawal->transaction_id) }}">
        <div class="table-item flex-column d-flex">
          <strong>{{ $withdrawal->transaction_id }}</strong>
          <span class="text-muted">@currency($withdrawal->amount)</span>
        </div>
      </a>
      <div class="table-item">{{ $withdrawal->created_at->locale('id')->isoFormat('D MMMM YYYY') }}</div>
      <div class="table-item">@currency($withdrawal->amount)</div>
      <div class="table-item">
        <span class="badge bg-{{ $withdrawal->status->color() }}">{{ $withdrawal->status->label() }}</span>
      </div>
      <div class="table-item">
        @if ($withdrawal->status->value == 'complete')
          <a role="button" class="btn btn-primary withdrawal-btn" data-bs-toggle="modal"
            data-bs-target="#detailAlasan{{ $withdrawal->id }}">Lihat Bukti</a>
        @elseif ($withdrawal->status->value == 'failed')
          <a role="button" class="btn btn-primary withdrawal-btn" data-bs-toggle="modal"
            data-bs-target="#detailAlasan{{ $withdrawal->id }}">Lihat Alasan</a>
        @else
          <a href="{{ route('whatsapp') }}?phone=6285707062531&text=Permisi%20saya%20{{ urlencode($withdrawal->first()->store->name) }}%20melakukan%20penarikan%20dana%20sejumlah%20{{ urlencode('Rp. ' . number_format($withdrawal->amount, 0, ',', '.')) }}%20pada%20tanggal%20{{ urlencode($withdrawal->created_at->format('d-m-Y')) }}%20memohon%20untuk%20segera%20disetujui"
            target="_blank" class="btn btn-primary withdrawal-btn">
            Hubungi Admin <i class="fa-brands fa-whatsapp fa-lg"></i>
          </a>
        @endif
      </div>
    </div>
  @empty
    <div class="table-item d-flex flex-column justify-content-center align-items-center w-100"
      style="text-align: center;font-size: 14px;">
      <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
      <p>Tidak ada data</p>
    </div>
  @endforelse

  {{ $withdrawals->links() }}
</div>
