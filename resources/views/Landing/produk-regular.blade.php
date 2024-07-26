@extends('layouts.home')

@section('title', 'Product')

@push('style')
    <style>
        .submitLoading {
            pointer-events: none !important;
            filter: brightness(0.5);
        }
    </style>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            max-width: 60rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">
                @include('Landing.components.filter', ['isAuction' => false])
                <div class="col-lg-9">
                    <div class="product-sidebar-section">
                        <div class="row g-5" id="product-container">
                            <div class="col-lg-12">
                                <div class="product-sorting-section" style="padding-bottom: unset; margin-bottom: unset">
                                    <div class="result">
                                        <p>Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari
                                            {{ $products->total() }} hasil</p>
                                    </div>
                                </div>
                            </div>
                            @include('Landing.components.loader')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function openModal(modal, callback) {
            $(modal).modal('show');
            callback?.($(modal));
        }

        function openModal2(modal, callback) {
            $(modal).show();
            callback?.($(modal));
        }

        function closeModal2(modal) {
            $(modal).hide();
        }
        document.addEventListener('DOMContentLoaded', function() {
            var modals = document.querySelectorAll('.modal');
            var btns = document.querySelectorAll('.openModal');
            var spans = document.querySelectorAll('.close');

            document.querySelectorAll('.openModal').forEach(function(btn, index) {
                btn.onclick = function() {
                    var productId = btn.getAttribute('data-id');
                    var modal = document.getElementById('reviewModal-' + productId);
                    var auctionForm = document.getElementById('auctionForm-' + productId);

                    if (auctionForm) {
                        auctionForm.querySelector('input[name="product_id"]').value = productId;
                    }

                    modal.style.display = 'flex';
                }
            });

            document.querySelectorAll('.close').forEach(function(span, index) {
                span.onclick = function() {
                    var modal = span.closest('.modal');
                    modal.style.display = 'none';
                }
            });

            window.onclick = function(event) {
                document.querySelectorAll('.modal').forEach(function(modal) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            const url = new URL(window.location.href);
            window.scrollTo(0, 0);
            let updateTimeout;
            let page = 0;
            let loading = true;
            let lastPage = false;
            const filters = ['categories', 'brands', 'colors', 'sizes', 'price'];
            const maxPrice = +('{{ $products->pluck('price')->max() }}');
            const loader = $('[isLoader]');

            const getCheckedFilters = () => {
                const checked = {};

                filters.forEach(filter => {
                    checked[filter] = $(`input:checkbox[name="${filter}[]"]:checked`).map(function() {
                        return this.value;
                    }).get();
                });

                if ($('#price-slider').length > 0) {
                    const priceRange = $('#price-slider')[0].noUiSlider.get().map(value => Number(value));
                    checked['price'] = (priceRange[0] <= 0 && priceRange[1] >= maxPrice) ? [] : [
                        `${priceRange[0]}-${priceRange[1]}`
                    ];
                } else {
                    checked['price'] = [];
                }

                return checked;
            };

            const updateFilters = () => {
                clearInterval(updateTimeout);
                updateTimeout = setTimeout(() => {
                    page = 1;
                    lastPage = false;
                    const checked = getCheckedFilters();

                    filters.forEach(filter => {
                        const count = checked[filter].length;
                        if (count > 0) {
                            url.searchParams.set(filter, checked[filter].join(','));
                        } else {
                            url.searchParams.delete(filter);
                        }
                        $(`#${filter}Count`).toggle(count > 0).text(count);
                    });

                    window.history.replaceState(null, null, url);
                    $('[isProduct]').addClass('submitLoading');

                    $.ajax({
                        url: url.toString(),
                        type: 'GET',
                        success: function(data) {
                            loading = false;
                            $('[isProduct],[isLoader]').remove();
                            $('#product-container').append(data);
                        },
                        error: function() {
                            loading = false;
                            $('[isProduct]').removeClass('submitLoading');
                            console.error('Failed to update filters.');
                        }
                    });
                }, 500);
            };

            const initPriceSlider = () => {
                if ($("#price-slider").length > 0) {
                    const tooltipSlider = document.getElementById("price-slider");

                    noUiSlider.create(tooltipSlider, {
                        start: [{{ explode('-', request()->price ?? '0')[0] }},
                            {{ explode('-', request()->price ?? '0-' . $products->pluck('price')->max())[1] }}
                        ],
                        connect: true,
                        format: {
                            from: Number,
                            to: Math.round
                        },
                        step: 500,
                        range: {
                            min: 0,
                            max: maxPrice
                        }
                    });

                    const formatValues = [
                        $("#slider-margin-value-min"),
                        $("#slider-margin-value-max")
                    ];

                    tooltipSlider.noUiSlider.on("update", (values) => {
                        formatValues[0].text("Harga: Rp" + values[0]);
                        formatValues[1].text("Rp" + values[1]);
                        updateFilters();
                        $('#priceCount').toggle(values[0] > 0 || values[1] < maxPrice).text(1);
                    });
                }
            };

            const loadPage = () => {
                $.ajax({
                    url: url.toString() + (url.search ? '&' : '?') + 'page=' + page,
                    type: 'GET',
                    beforeSend: function() {
                        $("#product-container").append(loader);
                    },
                    success: function(data) {
                        loading = false;
                        $('[isLoader]').remove();
                        if (data.lastPage) {
                            lastPage = true;
                            $("#product-container").append(`
                <div class="col" style="align-self: center;" isProduct>
                  <h3 class="text-center">Produk Habis</h3>
                  <p class="text-center">Maaf ya, sepertinya tidak ada lagi produk yang tersedia.</p>
                </div>
              `);
                            return;
                        }
                        $("#product-container").append(data);
                    },
                    error: function() {
                        loading = false;
                        console.error('No response from server');
                    }
                });
            };

            initPriceSlider();

            $('input:checkbox[name="categories[]"], input:checkbox[name="brands[]"], input:checkbox[name="colors[]"], input:checkbox[name="sizes[]"]')
                .on('change', updateFilters);

            $(window).on("scroll", function() {
                if (loading || lastPage) return;
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 450) {
                    loading = true;
                    page++;
                    loadPage();
                }
            });
        });
    </script>
    <script>
        function ajaxSubmit(e, $this, callback) {
            e.preventDefault();
            const form = $($this);
            const product = form.closest('[isProduct]');
            product.addClass('submitLoading');
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                success: function(response) {
                    if (response.error) {
                        flasher.error(response.error);
                    } else {
                        flasher.success(response.success);
                    }
                    product.removeClass('submitLoading');
                    callback();
                }
            });
        };
    </script>
@endpush
