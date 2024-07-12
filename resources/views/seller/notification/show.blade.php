@extends('layouts.panel')

@section('style')
    <style>
    </style>
@endsection

@section('content')
    <div class="row justify-content-center h-100">
        <div class="col-md-12 h-100">
            <div class="card">
                <div class="card-header border-bottom d-flex gap-3 align-items-center justify-content-between">
                    <h5 class="mb-0">Notifikasi</h5>
                    <a href="{{ route('admin.notification.readAll') }}"
                        class="@if (auth()->user()->unreadNotifications->isEmpty()) disabled @endif btn btn-sm btn-light d-flex gap-2 align-items-center">
                        <i class="fas fa-bell"></i>
                        <span>Baca Semua</span>
                    </a>
                </div>
                <div class="row g-0">
                    <div class="col-md-3 border-end">
                        <div class="list-group list-group-flush">
                            @forelse ($notifications as $notify)
                                @php
                                    $data = $notify->data;
                                @endphp

                                <a class="list-group-item py-3 position-relative mt-4"
                                    style="text-align: left;" href="{{ route('seller.notification.show', $notify->id) }}">

                                    <h6 class="mb-1 fw-bold"
                                        style="font-size: 15px;">{{ $notify->data['title'] }}</h6>
                                    @if (array_key_exists('data', $data))
                                        <p class="mb-1 @if (!$notify->read_at) fw-bold @endif"
                                            style="font-size: 14px;">
                                            {{ Str::limit($notify->data['data'], 100) }}</p>
                                    @endif
                                    @if (array_key_exists('message', $data))
                                        <p class="mb-1 @if (!$notify->read_at) fw-bold @endif"
                                            style="font-size: 14px;">
                                            {{ Str::limit($notify->data['message'], 50) }}</p>
                                    @endif

                                    @if (!$notify->read_at)
                                        <span class="badge badge-dot bg-primary position-absolute top-0 m-3 end-0"></span>
                                    @endif
                                </a>
                            @empty
                                <div class="list-group-item list-group-item-action">Tidak ada notifikasi</div>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-9" style="min-height: 500px">
                        <div class="card-body d-flex flex-column flex-lg-row">
                            <div>
                                <h5 class="mb-2">{{ $notification->data['title'] }}</h5>
                                @if (array_key_exists('data', $notification->data))
                                    <p>{{ $notification->data['data'] }}</p>
                                @endif
                                @if (array_key_exists('message', $notification->data))
                                    <p>{{ $notification->data['message'] }}</p>
                                @endif
                            </div>

                            <div class="ms-lg-auto text-end mt-3 d-flex flex-column align-items-end gap-2 mt-lg-0">
                                <span class="text-muted">{{ $notification->created_at->locale('id')->diffForHumans() }}</span>
                                <div class="d-flex gap-2">
                                    {{-- <a class="btn btn-danger"
                                        href="{{ route('seller.notification.destroy', $notification->id) }}"><i
                                            class="fas fa-trash"></i></a> --}}
                                            <form action="{{ route('seller.notification.destroy', $notification->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i
                                                    class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                    {{-- <a class="btn btn-primary" --}}
                                        {{-- href="{{ route('admin.notification.unread', $notification->id) }}"> --}}
                                        {{-- <iclass="fas fa-envelope-open"></i> --}}
                                        {{-- </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
