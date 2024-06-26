@php($preloaderText = str_split('HUMMA THRIFT'))
<div id="preloader" class="preloader">
  <div id="loader" class="th-preloader">
    <div class="animation-preloader">
      <div class="txt-loading">
        @foreach ($preloaderText as $text)
          @if ($text == ' ')
            &nbsp;
          @else
            <span preloader-text="{{ $text }}" class="characters">{{ $text }}</span>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
