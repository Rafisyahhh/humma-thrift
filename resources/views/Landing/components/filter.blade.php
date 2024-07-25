<div class="col-lg-3 pt-5 h-100">
  <div class="" style="top: 80px;">
    <ul class="nav nav-pills justify-content-around sidebar gap-3 bg-body-secondary p-3" id="myTab" role="tablist"
      style="border-top-left-radius: 2rem; border-top-right-radius: 2rem;">
      <li class="nav-item" role="presentation">
        <button class="nav-link active position-relative" id="home-tab" data-bs-toggle="tab"
          data-bs-target="#category-tab" type="button" role="tab" aria-controls="category-tab"
          aria-selected="true">Kategori
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
            style="display: none;" id="categoriesCount">0</span>
        </button>
      </li>
      @if (Route::currentRouteName() == 'searchProduct')
        <li class="nav-item" role="presentation">
          <button class="nav-link position-relative" id="home-tab" data-bs-toggle="tab" data-bs-target="#tipe-tab"
            type="button" role="tab" aria-controls="type-tab">Tipe
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
              style="display: none;" id="typeCount">0</span>
          </button>
        </li>
      @endif
      <li class="nav-item" role="presentation">
        <button class="nav-link position-relative" id="profile-tab" data-bs-toggle="tab" data-bs-target="#brand-tab"
          type="button" role="tab" aria-controls="brand-tab" aria-selected="false">Brand
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
            style="display: none;" id="brandsCount">0</span>
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab" data-bs-target="#color-tab"
          type="button" role="tab" aria-controls="color-tab" aria-selected="false">Warna
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
            style="display: none;" id="colorsCount">0</span>
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab" data-bs-target="#size-tab"
          type="button" role="tab" aria-controls="size-tab" aria-selected="false">Ukuran
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
            style="display: none;" id="sizesCount">0</span>
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab" data-bs-target="#price-tab"
          type="button" role="tab" aria-controls="price-tab" aria-selected="false">Harga
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
            style="display: none;" id="priceCount">0</span>
        </button>
      </li>
    </ul>
    <div class="tab-content sidebar-section bg-body-tertiary" id="myTabContent"
      style="border-top-left-radius: unset; border-top-right-radius: unset">
      <div class="tab-pane fade show active sidebar-wrapper" id="category-tab" role="tabpanel"
        aria-labelledby="category-tab" tabindex="0">
        <div class="sidebar-item">
          <ul class="sidebar-list">
            @foreach ($categories as $item)
              <li>
                <input type="checkbox" id="{{ $item->id }}" name="categories[]" value="{{ $item->slug }}"
                  @checked(in_array($item->slug, explode(',', request()->categories))) />
                <label for="{{ $item->id }}">{{ $item->title }}</label>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      @if (Route::currentRouteName() == 'searchProduct')
        <div class="tab-pane fade sidebar-wrapper" id="tipe-tab" role="tabpanel" aria-labelledby="category-tab"
          tabindex="0">
          <div class="sidebar-item">
            <ul class="sidebar-list">
              <li>
                <input type="checkbox" id="reguler" name="type[]" value="reguler" @checked(count($products) > 0)>
                <label for="reguler">Reguler</label>
              </li>
              <li>
                <input type="checkbox" id="auction" name="type[]" value="auction" @checked(count($product_auction) > 0)>
                <label for="auction">Lelang</label>
              </li>
            </ul>
          </div>
        </div>
      @endif
      <div class="tab-pane fade sidebar-wrapper" id="brand-tab" role="tabpanel" aria-labelledby="brand-tab"
        tabindex="0">
        <div class="sidebar-item">
          <ul class="sidebar-list">
            @foreach ($brands as $item)
              <li>
                <input type="checkbox" id="brands-{{ $item->id }}" name="brands[]" value="{{ $item->title }}"
                  @checked(in_array($item->slug, explode(',', request()->brands))) />
                <label for="brands-{{ $item->id }}">{{ $item->title }}</label>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="tab-pane fade sidebar-wrapper" id="color-tab" role="tabpanel" aria-labelledby="color-tab"
        tabindex="0">
        <div class="sidebar-item">
          <ul class="sidebar-list">
            @foreach ($colors as $item)
              <li>
                <input type="checkbox" id="{{ $item }}" name="colors[]" value="{{ $item }}"
                  @checked(in_array($item, explode(',', request()->colors))) />
                <label for="{{ $item }}" class="text-capitalize">{{ $item }}</label>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="tab-pane fade sidebar-wrapper" id="size-tab" role="tabpanel" aria-labelledby="size-tab"
        tabindex="0">
        <div class="sidebar-item">
          <ul class="sidebar-list">
            @foreach ($sizes as $item)
              <li>
                <input type="checkbox" id="{{ $item }}" name="sizes[]" value="{{ $item }}"
                  @checked(in_array($item, explode(',', request()->sizes))) />
                <label for="{{ $item }}" class="text-capitalize">{{ $item }}</label>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="tab-pane fade sidebar-wrapper sidebar-range" id="price-tab" role="tabpanel"
        aria-labelledby="price-tab" tabindex="0">
        @if ($isAuction)
          <h5 class="wrapper-heading">Harga Awal</h5>
          <div class="price-slide range-slider">
            <div class="price">
              <div class="range-slider style-1">
                <div id="price-slider" class="slider-range mb-3"></div>
                <span class="example-val" id="slider-margin-value-min"></span>
                <span>-</span>
                <span class="example-val" id="slider-margin-value-max"></span>
              </div>
            </div>
          </div>
          <h5 class="wrapper-heading mt-4">Harga Akhir</h5>
          <div class="price-slide range-slider">
            <div class="price">
              <div class="range-slider style-1">
                <div id="price-slider-2" class="slider-range mb-3"></div>
                <span class="example-val" id="slider-margin-value-min-2"></span>
                <span>-</span>
                <span class="example-val" id="slider-margin-value-max-2"></span>
              </div>
            </div>
          </div>
        @else
          <div class="price-slide range-slider">
            <div class="price">
              <div class="range-slider style-1">
                <div id="price-slider" class="slider-range mb-3"></div>
                <span class="example-val" id="slider-margin-value-min"></span>
                <span>-</span>
                <span class="example-val" id="slider-margin-value-max"></span>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div> <!-- sticky-top ends here -->
</div>
