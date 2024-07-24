<style>
  .header-favourite .wishlist-count {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: #dc3545;
    color: white;
    border-radius: 50%;
    padding: 1px 6px;
    font-size: 0.75em;
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>

<style>
  .dropdown-menu {
    overflow: hidden;
  }

  .dropdown-menu a {
    padding: 0.5rem 1.5rem;
    border-bottom: 1px solid #eee;
  }

  .dropdown-menu li:last-child a {
    border-bottom: 0;
  }
</style>

<style>
  .dropdown-menu a.selected {
    font-weight: bold;
    color: #007bff;
  }
</style>

<div class="header-search">
  <div onclick="modalAction('.search')" class="anywhere-away"></div>
  <div class="modal-main">
    <div class="wrapper-close-btn" onclick="modalAction('.search')"></div>
    <div class="wrapper-main">
      <form class="search-section" action="{{ route('searchProduct') }}" id="global-search"
        onsubmit="handleFormSubmit(event)">
        <input type="search" placeholder="Telusuri produk..." name="search" id="search-input"
          value="{{ request()->search }}">
        {{-- <div class="divider" style="margin-right: 25rem;"></div>
                <div class="dropdown" style="position: absolute; right: 6.5rem; top: 0;">
                    <a class="search-select d-flex align-items-center gap-2" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" id="dropbtn" onclick="toggleDropdown()">
                        <span id="dropbtn-text" style="font-size: 15px">Produk</span>
                        <i class="fas fa-chevron-down" style="font-size: 15px;"></i>
                    </a>
                    <div class="btn-group">
                        <div class="dropdown">
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                style="width: 20rem; text-align: center; font-size: 16px;" id="dropdown-content">
                                <li><a class="dropdown-item" href="#" onclick="selectCategory('Produk')"
                                        style="font-size: 16px;">Produk</a></li>
                                <li><a class="dropdown-item" href="#" onclick="selectCategory('Produk Lelang')"
                                        style="font-size: 16px;">Produk Lelang</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
        <a role="button" class="shop-btn" onclick="document.getElementById('global-search').submit()"><i
            class="fas fa-search"></i></a>
      </form>
    </div>
  </div>
</div>

<script>
  function selectCategory(category) {
    document.getElementById('dropbtn').innerText = category;
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {}
</script>

<script>
  let selectedCategory = 'Produk';

  @if (Route::is('searchProductAuction'))
    document.getElementById('dropbtn-text').innerText = 'Produk Lelang';
  @endif

  //   function selectCategory(category) {
  //     selectedCategory = category;
  //     const form = $('#global-search');
  //     if (selectedCategory === 'Produk') {
  //       form.attr("action", "{{-- route('searchProductRegular') --}}");
  //     } else if (selectedCategory === 'Produk Lelang') {
  //       form.attr("action", "{{-- route('searchProductAuction') --}}");
  //     }
  //     document.getElementById('dropbtn-text').innerText = category;
  //   }

  function handleFormSubmit(event) {
    event.preventDefault();
    form.submit();
  }
</script>
