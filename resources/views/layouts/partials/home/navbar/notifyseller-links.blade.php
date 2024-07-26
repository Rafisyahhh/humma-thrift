<style>
  .cart-submenu {
    background: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    width: 100%;
    max-width: 400px;
    max-height: 500px;
    overflow-y: auto;
  }

  .cart-wrapper-item {
    padding: 15px;
  }

  .notification-item {
    display: flex;
    align-items: start;
    padding: 10px 15px;
    border-bottom: 1px solid #f0f0f0;
  }

  .wrapper-img img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
  }

  .wrapper-content {
    flex-grow: 1;
  }

  .wrapper-title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
  }

  .new-price {
    font-size: 14px;
    color: #777;
  }

  .card-header {
    background-color: transparent;
    padding: 10px 15px;
    border-bottom: 1px solid #e0e0e0;
  }

  .card-header h5 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
  }

  .list-group {
    position: relative;
    height: 100px;
  }

  .list-group-item {
    position: absolute;
    top: 50%;
    text-align: center;
    transform: translateY(-50%);
  }
</style>
<div class="header-cart header-right-dropdown">
  <a href="{{ route('seller.notification.index') }}" class="cart-item">
    <span style="position: relative; display: inline-block;">
      <i class="fas fa-bell" style="font-size: 1.5em; position: relative;"></i>
      @if (!auth()->user()->unreadNotifications->isEmpty())
        <span
          style="
                position: absolute;
                top: -10px; /* Adjust as needed */
                right: -10px; /* Adjust as needed */
                background-color: #dc3545;
                color: white;
                border-radius: 50%;
                padding:1px 6px; /* Adjust as needed */
                font-size: 0.75em; /* Adjust as needed */
                display: flex;
                align-items: center;
                justify-content: center;
            ">
          {{ auth()->user()->unreadNotifications->count() }}
        </span>
      @endif
    </span>
  </a>
  <div class="cart-submenu">
    <div class="cart-wrapper-item">
      <div class="card-header border-bottom d-flex gap-3 align-items-center justify-content-between">
        <h5 class="mb-0">Notifikasi</h5>
      </div>


      @forelse(auth()->user()->unreadNotifications as $notification)
        @php
          $data = $notification->data;
        @endphp
        <div class="wrapper" style="padding:2px;">
          <div class="wrapper-item">
            <div class="wrapper-content">
              <h5 class="wrapper-title ms-4" style="font-size:1.5rem;">{{ $notification->data['title'] }}
              </h5>
              <div class="price mx-4">
                @if (array_key_exists('data', $data))
                  <p class="new-price">{{ Str::limit($notification->data['data'], 200) }}</p>
                @endif
              </div>

            </div>
          </div>

          {{-- <div class="flex-shrink-0 dropdown-notifications-actions">
                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                            class="badge badge-dot"></span></a>
                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                            class="ti ti-x"></span></a>
                </div> --}}
        </div>
      @empty
        <li class="list-group-item list-group-item-action">Tidak ada notifikasi yang belum dibaca</li>
      @endforelse


    </div>
    <div class="cart-wrapper-section">
      <div class="wrapper-line"></div>

      <div class="cart-btn">
        <a href="{{ route('seller.notification.index') }}" class="shop-btn">Lihat Semua</a>
      </div>
    </div>
  </div>
</div>
