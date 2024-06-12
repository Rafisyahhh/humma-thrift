@php
    $errorList = [
        'error' => [
            'type' => 'danger',
            'text' => 'Ada Kesalahan',
        ],
        'warning' => [
            'type' => 'warning',
            'text' => 'Peringatan',
        ],
        'success' => [
            'type' => 'success',
            'text' => 'Berhasil',
        ],
        'info' => [
            'type' => 'info',
            'text' => 'Informasi',
        ],
    ];
@endphp

@if ($errors->all())
    <div class="alert alert-danger">
        <strong>Ada Kesalahan</strong>

        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

@foreach ($errorList as $index => $data)
    @if (session()->has($index))
        <div class="alert alert-{{ $data['type'] }}">
            <strong>{{ $data['text'] }}</strong>
            {{ session()->get($index) }}
        </div>
    @endif
@endforeach
