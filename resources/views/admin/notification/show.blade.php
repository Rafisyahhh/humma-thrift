@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
    <div class="row justify-content-center h-100">
        <div class="col-md-12 h-100">
            <div class="card">
                <div class="card-header border-bottom d-flex gap-3 align-items-center justify-content-between">
                    <h5 class="mb-0">Notifikasi</h5>
                    <a href="{{ route('admin.notification.readAll') }}" class="@if(auth()->user()->unreadNotifications) disabled @endif btn btn-sm btn-light d-flex gap-2 align-items-center">
                        <i class="fas fa-bell"></i>
                        <span>Baca Semua</span>
                    </a>
                </div>
                <div class="row g-0">
                    <div class="col-md-3 border-end">
                        <div class="list-group list-group-flush">
                            @forelse ($notifications as $notification)
                                <a class="list-group-item py-3 position-relative @if($notification->id === $notificationId) active @endif"
                                    href="{{ route('admin.notification.show', $notification->id) }}">
                                    <h6 class="mb-1 fw-bold @if($notification->id === $notificationId) text-white @endif">{{ $notification->data['title'] }}</h6>
                                    <p class="mb-1 @if (!$notification->read_at) fw-bold @endif">
                                        {{ Str::limit($notification->data['message'], 100) }}</p>
                                    <small
                                        class="text-@if($notification->id === $notificationId) text-white opacity-75 @else text-muted @endif @if (!$notification->read_at) fw-bold @endif">{{ $notification->created_at->locale('id')->diffForHumans() }}</small>

                                    {{-- Penanda Kalau Udah Dibaca --}}
                                    @if (!$notification->read_at)
                                        <span class="badge badge-dot bg-primary position-absolute top-0 m-3 end-0"></span>
                                    @endif
                                    {{-- Penanda Kalau Udah Dibaca --}}
                                </a>
                            @empty
                                <div class="list-group-item list-group-item-action">Tidak ada notifikasi</div>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-9" style="min-height: 500px">
                        <div class="card-body d-flex flex-column flex-lg-row">
                            <div>
                                <h4 class="mb-2">{{ $notification->data['title'] }}</h4>
                                <p>{{ $notification->data['message'] }}</p>
                            </div>
                            <div class="ms-lg-auto mt-3 d-flex flex-column align-items-end gap-2 mt-lg-0">
                                <span class="text-muted">{{ $notification->created_at->locale('id')->diffForHumans() }}</span>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-danger"
                                        href="{{ route('admin.notification.destroy', $notification->id) }}"><i
                                            class="fas fa-trash"></i></a>
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.notification.unread', $notification->id) }}"><i
                                            class="fas fa-envelope-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
