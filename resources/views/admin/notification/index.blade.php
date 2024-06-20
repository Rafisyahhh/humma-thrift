@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
    <div class="row justify-content-center h-100">
        <div class="col-md-12 h-100">
            <div class="card">
                <div class="card-header border-bottom d-flex gap-3 align-items-center justify-content-between">
                    <h5 class="mb-0">Notifikasi</h5>
                    <a href="javascript:void(0)" class="btn btn-sm btn-light d-flex gap-2 align-items-center">
                        <i class="fas fa-bell"></i>
                        <span>Baca Semua</span>
                    </a>
                </div>
                <div class="row g-0">
                    <div class="col-md-3 border-end">
                        <div class="list-group list-group-flush">
                            @forelse ($notifications as $notification)
                                <a class="list-group-item py-3 position-relative" href="{{ route('admin.notification.show', $notification->id) }}">
                                    <h6 class="mb-1 fw-bold">{{ $notification->data['title'] }}</h6>
                                    <p class="mb-1">{{ Str::limit($notification->data['message'], 200) }}</p>
                                    <small class="text-muted">{{ $notification->created_at->locale('id')->diffForHumans() }}</small>

                                    <span class="badge badge-dot bg-primary position-absolute top-0 m-3 end-0"></span>
                                </a>
                            @empty
                                <div class="list-group-item list-group-item-action">Tidak ada notifikasi</div>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-9 align-self-center d-flex align-items-center" style="min-height: 500px">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/notification.png') }}" class="mb-0 mx-auto" height="200px" alt="Notifikasi" />
                            <h2 class="mb-1">Klik Salah Satu Notifikasi</h2>
                            <p class="mb-0">Untuk melihat detail notifikasi dan menandainya sebagai telah dibaca.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
