@foreach ($lists as $item)
  <div class="col-lg-4 col-sm-6 placeholder-glow loader">
    <div class="product-wrapper p-0">
      <div class="product-img">
        <div class="bg-body-secondary w-100" style="height: 300px;"></div>
      </div>
      <div class="product-info">
        <div class="product-description">
          <a class="placeholder disabled bg-secondary" aria-disabled="true" style="width: 150px"></a>
          <div class="price">
            <span class="placeholder bg-secondary" style="width: 75px"></span>
          </div>
        </div>
      </div>
      <div class="product-cart-btn" style="bottom:0;">
        <button class="product-btn placeholder disabled" aria-disabled="true" style="width: 100px"></button>
      </div>
    </div>
  </div>
@endforeach
