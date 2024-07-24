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

        .list-group-item.hidden {
            display: none;
        }

        .show-more-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .card-notifications {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center h-100">
        <div class="col-md-12 h-100">
            <div class="card shadow-sm card-notifications">
                <div class="card-header border-bottom d-flex gap-3 align-items-center justify-content-between bg-light">
                    <h5 class="mb-0">Notifikasi</h5>
                    <a href="{{ route('user.notification.readAll') }}"
                        class="@if (auth()->user()->unreadNotifications->isEmpty()) disabled @endif btn btn-sm btn-light d-flex gap-2 align-items-center">
                        <i class="fas fa-bell" style="font-size:15px;color: #d40000;"></i>
                        <span style="color: #d40000;">Baca Semua</span>
                    </a>
                </div>
                <div class="row g-0 h-100" style="max-height:82rem; ">
                    <div class="col-md-12 border-end list-group list-group-flush h-100 mt-5">

                        @forelse ($notifications as $notification)
                            @php
                                $data = $notification->data;
                            @endphp
                            <a
                                class="list-group-item py-3 position-relative d-flex justify-content-between align-items-center">
                                <div class="text ms-4" style="text-align:left;">

                                    {{-- <h6 class="mb-1 fw-bold" style="font-size: 14px;">{{ $notification->data['title'] }}</h6>
                                <p class="mb-1 @if (!$notification->read_at) fw-bold @endif" style="font-size: 14px;">{{ Str::limit($notification->data['data'], 200) }}</p>
                                <small class="text-muted @if (!$notification->read_at) fw-bold @endif" style="font-size: 11px;">{{ $notification->created_at->locale('id')->diffForHumans() }}</small> --}}
                                    <h6 class="mb-1 fw-bold" style="font-size: 15px;">{{ $notification->data['title'] }}
                                    </h6>

                                    @if (array_key_exists('data', $data))
                                        <p class="mb-1 @if (!$notification->read_at) fw-bold @endif"
                                            style="font-size: 14px;">{{ $notification->data['data'] }}</p>
                                    @endif
                                    @if (array_key_exists('message', $data))
                                        <p class="mb-1 @if (!$notification->read_at) fw-bold @endif"
                                            style="font-size: 14px;">{{ $notification->data['message'] }}</p>
                                    @endif
                                    {{-- Penanda Kalau Udah Dibaca --}}
                                    @if (!$notification->read_at)
                                        <span class="badge badge-dot bg-primary position-absolute top-0 m-3 end-0"></span>
                                    @endif
                                    {{-- Penanda Kalau Udah Dibaca --}}
                                </div>
                                <div class="aksi">
                                    <span
                                        class="text-muted">{{ $notification->created_at->locale('id')->diffForHumans() }}</span>
                                    <div class="d-flex gap-2 mt-2" style="justify-content:right;">
                                        @if (!$notification->read_at)
                                            <form action="{{ route('user.notification.show', $notification->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success ms-auto">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        {{-- <form action="{{ route('user.notification.destroy', $notification->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form> --}}
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div
                                class="list-group-item py-3 position-relative d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fas fa-bell-slash"></i>
                                    <span class="fs-5 text-muted">Tidak ada notifikasi</span>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
