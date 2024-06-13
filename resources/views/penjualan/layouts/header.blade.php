    <header id="header" class="header">
      <div class="header-center-section d-none d-lg-block">
        <div class="container">
          <div class="header-center">
            <div class="logo">
              <a href="index.html">
                <img src="{{ asset('template-assets/front/assets/images/logos/logo.webp') }}" alt="logo">
              </a>
            </div>
            <div class="float-end d-flex gap-4">
              <div class="header-vendor-btn">
                <a href="become-vendor.html" class="shop-btn">
                  <span class="icon">
                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M3.74301 7.07205C3.96405 7.07205 4.15464 7.07205 4.34568 7.07205C6.51947 7.07205 8.69326 7.07205 10.8671 7.07205C13.8478 7.07205 16.8289 7.0725 19.8096 7.0725C20.6984 7.0725 21.5871 7.07024 22.4758 7.07295C22.881 7.07431 23.1902 7.25265 23.3743 7.62651C23.5613 8.00623 23.5118 8.37556 23.2623 8.70426C23.0677 8.96027 22.7947 9.08173 22.4713 9.08037C21.7905 9.07766 21.1097 9.07902 20.4289 9.07902C18.0472 9.07902 15.6659 9.07902 13.2842 9.07902C10.218 9.07902 7.15155 9.07902 4.08545 9.07902C3.97261 9.07902 3.86016 9.07902 3.71783 9.07902C3.81287 9.18332 3.88592 9.26865 3.96426 9.34857C4.43435 9.82672 4.90777 10.3022 5.37714 10.7812C5.86373 11.2779 6.34592 11.7791 6.83252 12.2757C7.50584 12.9634 8.18845 13.6415 8.85241 14.3391C9.09042 14.5893 9.15452 14.9157 9.05941 15.2575C8.84401 16.0305 7.94333 16.2499 7.38806 15.6769C6.56585 14.8286 5.73446 13.9892 4.90728 13.1458C4.30521 12.5317 3.70321 11.9172 3.10148 11.3023C2.40477 10.5902 1.70889 9.87729 1.0122 9.1648C0.89409 9.04425 0.77508 8.9246 0.656466 8.8045C0.30972 8.45367 0.276068 7.84278 0.605699 7.4766C1.00196 7.03683 1.41479 6.61241 1.82437 6.18573C2.20355 5.79066 2.58656 5.39965 2.96969 5.00909C3.32675 4.64473 3.68681 4.28306 4.04467 3.91915C4.38526 3.57284 4.72459 3.22563 5.0644 2.87887C5.48464 2.44948 5.90489 2.01964 6.32563 1.5907C6.74894 1.15861 7.18016 0.734188 7.59428 0.29261C7.96371 -0.101559 8.63028 -0.0816927 8.96557 0.257392C9.37618 0.672782 9.40012 1.26381 9.00505 1.68552C8.66215 2.0517 8.30432 2.40342 7.95349 2.76192C7.07108 3.66449 6.18886 4.56797 5.30627 5.47054C4.81706 5.97081 4.32647 6.47018 3.83681 6.97046C3.81154 6.99574 3.78771 7.02329 3.74301 7.07205Z">
                    </svg>
                  </span>
                  <span class="list-text shop-text">kembali ke pengguna</span>
                </a>
              </div>
              <div class="modal-main mt-1" style="width: 40px; height: 40px; border-radius: 50%;">
                <div class="header-search">
                  <button class="header-search-btn" onclick="modalAction('.search')">
                    <span>
                      <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M13.9708 16.4151C12.5227 17.4021 10.9758 17.9723 9.27353 18.0062C5.58462 18.0802 2.75802 16.483 1.05056 13.1945C-1.76315 7.77253 1.33485 1.37571 7.25086 0.167548C12.2281 -0.848249 17.2053 2.87895 17.7198 7.98579C17.9182 9.95558 17.5566 11.7939 16.5852 13.5061C16.4512 13.742 16.483 13.8725 16.6651 14.0553C18.2412 15.6386 19.8112 17.2272 21.3735 18.8244C22.1826 19.6513 22.2058 20.7559 21.456 21.4932C20.7697 22.1678 19.7047 22.1747 18.9764 21.4793C18.3623 20.8917 17.7774 20.2737 17.1796 19.6688C16.118 18.5929 15.0564 17.5153 13.9708 16.4151ZM2.89545 9.0364C2.91692 12.4172 5.59664 15.1164 8.91967 15.1042C12.2384 15.092 14.9138 12.3493 14.8889 8.98505C14.864 5.63213 12.1826 2.92508 8.89047 2.92857C5.58204 2.93118 2.87397 5.68958 2.89545 9.0364Z"
                          fill="black" />
                      </svg>
                    </span>
                  </button>
                  <div class="modal-wrapper search">
                    <div onclick="modalAction('.search')" class="anywhere-away"></div>
                    <div class="modal-main">
                      <div class="wrapper-close-btn" onclick="modalAction('.search')">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="red" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                            </path>
                          </svg>
                        </span>
                      </div>
                      <div class="wrapper-main">
                        <div class="search-section">
                          <input type="text" placeholder="Search Products.........">
                          <div class="divider"></div>
                          <button type="button">All Categories</button>
                          <a href="#" class="shop-btn">Search</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="header-user mt-2">
                <a href="user-profile.html">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                      class="fill-current">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z">
                      </path>
                    </svg>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
