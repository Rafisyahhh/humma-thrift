@extends('layouts.panel')

@section('style')
    <style>
        .badge.badge-dot {
            display: inline-block;
            margin: 0;
            padding: 0;
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center h-100">
        <div class="col-md-12 h-100">
            <div class="card shadow-sm">
                <div class="card-header border-bottom d-flex gap-3 align-items-center justify-content-between bg-light">
                    <h5 class="mb-0">Notifikasi</h5>
                    <a href="{{ route('seller.notification.readAll') }}"
                        class="@if (auth()->user()->unreadNotifications->isEmpty()) disabled @endif btn btn-sm btn-light d-flex gap-2 align-items-center">
                        <i class="fas fa-bell" style="font-size:15px;color: #d40000;"></i>
                        <span style="color: #d40000;">Baca Semua</span>
                    </a>
                </div>
                <div class="row g-0">
                    <div class="col-md-12 border-end">
                        <div class="list-group list-group-flush">
                            @forelse ($notifications as $notification)
                                @php
                                    $data = $notification->data;
                                @endphp
                                <a class="list-group-item py-3 position-relative d-flex justify-content-between align-items-center"
                                    {{-- href="{{ route('seller.notification.show', $notification->id) }}" --}}>
                                    <div class="text ms-4" style="text-align:left;">
                                        <h6 class="mb-1 fw-bold" style="font-size: 15px;">{{ $notification->data['title'] }}</h6>

                                        @if (array_key_exists('data', $data))
                                            <p class="mb-1 @if (!$notification->read_at) fw-bold @endif"
                                                style="font-size: 14px;">{{ $notification->data['data'] }}</p>
                                        @endif
                                        @if (array_key_exists('message', $data))
                                            <p class="mb-1 @if (!$notification->read_at) fw-bold @endif"
                                                style="font-size: 14px;">{{ $notification->data['message'] }}</p>
                                        @endif

                                        @if (!$notification->read_at)
                                            <span
                                                class="badge badge-dot bg-primary position-absolute top-0 m-3 end-0"></span>
                                        @endif
                                    </div>
                                    {{-- <div class="ms-lg-auto text-end mt-3 d-flex flex-column align-items-end gap-2 mt-lg-0 col-md-3"> --}}
                                    <div class="aksi">
                                        <span
                                            class="text-muted">{{ $notification->created_at->locale('id')->diffForHumans() }}</span>
                                        <div class="d-flex gap-2 mt-2">
                                            {{-- <a class="btn btn-danger"
                                                href="{{ route('seller.notification.destroy', $notification->id) }}"><i
                                                    class="fas fa-trash"></i></a> --}}
                                            <form action="{{ route('seller.notification.show', $notification->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                            <button type="submit" class="btn btn-success ms-auto">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            </form>
                                            <form action="{{ route('seller.notification.destroy', $notification->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                        </div>
                        </a>
                    @empty
                        <div class="list-group-item py-3">
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fas fa-bell-slash"></i>
                                <span class="fs-5 text-muted">Tidak ada notifikasi</span>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
                {{-- <div class="col-md-9 align-self-center d-flex align-items-center" style="min-height: 500px">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/notification.png') }}" class="mb-0 mx-auto" height="200px"
                                alt="Notifikasi" />
                            <h3 class="mb-1">Klik Salah Satu Notifikasi</h3>
                            <p class="mb-0">Untuk melihat detail notifikasi dan menandainya sebagai telah dibaca.</p>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
    </div>
@endsection
