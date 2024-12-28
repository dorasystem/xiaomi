@extends('layouts.page')
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="./index.html" class="text-grey fw-bold  fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('home.comparison')</span></a>
            </div>
            <hr />
        </div>
        <!-- Products -->
        <div class="container mt-5 p-0">
            <div class="m-0 fs-2 fw-bold container">@lang('home.featured')</div>
            <div class="d-lg-flex align-items-center justify-content-between d-block container">
                <div class="col-lg-9 d-flex flex-column gap-4 my-3 align-items-start">
                    {{--                    <ul class="nav nav-tabs mb-1 overflow-auto w-100" id="myTab" role="tablist" style="white-space: nowrap"> --}}
                    {{--                        <li class="me-3 mb-3" role="presentation"> --}}
                    {{--                            <a class="fs-5 p-2 active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Телевизоры</a> --}}
                    {{--                        </li> --}}
                    {{--                        <li class="me-3 mb-3" role="presentation"> --}}
                    {{--                            <a class="fs-5 pb-2" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Телефоны</a> --}}
                    {{--                        </li> --}}
                    {{--                    </ul> --}}
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade container show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @if (!empty($products) && $products->count())
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                    <div class="product shadow-sm position-relative rounded">
                                        <div class="">
                                            <div
                                                class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                                                <a href="javascript:void(0);"
                                                    onclick="toggleFavourite({{ $product->id }})">
                                                    <i id="favourite-icon-{{ $product->id }}"
                                                        class="fa-solid {{ in_array($product->id, session('favorites', [])) ? 'text-orange' : 'hover-orange' }} fa-heart fs-4 ps-1"></i>
                                                </a>

                                                <a onclick="toggleCompare({{ $product->id }})">
                                                    <svg id="compare-icon-{{ $product->id }}"
                                                        class="hover-svg {{ in_array($product->id, session('compares', [])) ? 'active-svg' : '' }}"
                                                        width="30" height="20" viewBox="0 0 102 92" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="11" height="92" rx="2" fill="#000" />
                                                        <rect x="23" y="22" width="11" height="70" rx="2"
                                                            fill="#000" />
                                                        <rect x="46" y="45" width="11" height="47" rx="2"
                                                            fill="#000" />
                                                        <rect x="69" y="23" width="11" height="69" rx="2"
                                                            fill="#000" />
                                                        <rect x="91" y="45" width="11" height="47" rx="2"
                                                            fill="#000" />
                                                    </svg>
                                                </a>
                                            </div>
                                            @php
                                                $cheapestVariant = $product->variants->sortBy('price')->first();
                                            @endphp
                                            <a href="{{ route('single.product', $product->slug) }}">
                                                <img class="w-100 pb-4 productImage p-4"
                                                    src="{{ asset('storage/' . $product->image) ?? '/assets/images/category_tv.webp' }}"
                                                    alt="" />
                                            </a>
                                            <div
                                                class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                                                <div class="d-flex align-items-end gap-3 pt-2">
                                                    @if ($cheapestVariant->discount_price)
                                                        <div class="fw-bold">
                                                            {{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                                                            UZS
                                                        </div>
                                                        <del class="text-grey">
                                                            <small>{{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                                                                UZS</small>
                                                        </del>
                                                    @else
                                                        <div class="fw-bold">
                                                            {{ number_format($cheapestVariant->price, 0, ',', ' ') }} UZS
                                                        </div>
                                                    @endif
                                                </div>
                                                <a href="{{ route('single.product', $product->slug) }}">
                                                    <div class="productName fw-bold">
                                                        {{ \Str::words($product['name_' . $lang], 3) }}</div>
                                                </a>
                                                <a class="truncate-text"
                                                    href="{{ route('single.product', $product->slug) }}">
                                                    <p class="text-grey">{!! \Str::words($product['description_' . $lang], 10) !!}</p>
                                                </a>
                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                    <span class="small bg-transparent px-0">
                                                        @if ($cheapestVariant->discount_price)
                                                            {{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                                                            UZS
                                                        @else
                                                            <small>{{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                                                                UZS</small>
                                                        @endif
                                                        <span class="text-orange">@lang('home.incash')</span>
                                                    </span>
                                                    <span
                                                        class="px-2 productmonth-border small text-grey">{{ number_format($cheapestVariant->price_12, 0, ',', ' ') }}
                                                        UZS/@lang('home.month')</span>
                                                </div>

                                                <div class="d-flex gap-4 mt-3">
                                                    <a class="border-orange bg-transparent rounded p-1 px-3"
                                                        href="javascript: void(0);" type="button"
                                                        onclick="addToCart({{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->discount_price ?? $cheapestVariant->price }}, {{ $cheapestVariant->id }})">
                                                        <img src="/assets/icons/shopping-cart.svg" alt="" />
                                                    </a>
                                                    <button data-bs-toggle="modal" data-bs-target="#largeModal"
                                                        class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center"
                                                        data-product-id="{{ $product->id }}"
                                                        data-product-name="{{ $product['name_' . $lang] }}"
                                                        data-product-price="{{ $cheapestVariant->discount_price ?: $cheapestVariant->price }}"
                                                        data-product-image="{{ asset('storage/' . $product->image) }}">
                                                        <span>@lang('home.buy_now')</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <x-page.not-found />
                            <p class="border-bottom-dashed py-1  mt-4  w-100"></p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- products you have seen -->
        <div style="overflow: hidden" class="seenProducts container py-3 position-relative">
            <div class="mb-4 fs-2 fw-bold">@lang('home.top_products')</div>

            <x-page.product.product-slide />

            <div id="product-next" class="swiper-button-next end-0"></div>
            <div id="product-prev" class="swiper-button-prev start-0"></div>
        </div>
    </main>

    <script>
        function addToCart(productId, productName, productPrice, variantId) {
            $.ajax({
                url: `/add-to-cart`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    variant_id: variantId,
                    price: productPrice,
                    storage: 1,
                },
                success: function(response) {
                    // alert('ok')
                    if (response.success) {
                        updateCartCount(response.cart_count); // Update the cart count in real-time
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                            stopOnFocus: true,
                            className: "toast-success",
                            animation: "fade",
                            offset: {
                                x: 30,
                                y: 50
                            },
                        }).showToast();
                    } else {
                        alert('Xatolik yuz berdi: ' + response.message);
                    }
                },
                error: function(xhr) {
                    alert('Xatolik yuz berdi: ' + xhr.responseText);
                }
            });
        }

        function updateCartCount(count) {
            document.getElementById('cart-count').innerText = count; // Updates the cart count badge
        }

        function toggleFavourite(productId) {
            $.ajax({
                url: '/toggle-favorite',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId
                },
                success: function(response) {
                    if (response.success) {
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                        }).showToast();

                        // Sevimlilar sonini yangilash
                        $('#favorite-count').text(response.favorites_count);

                        // Ico'ni yangilash
                        if (response.message.includes('qo\'shildi')) {
                            $('#favourite-icon-' + productId).addClass('text-orange');
                            if (document.getElementById('favourite-icon-' + productId).classList.contains(
                                    "fa-regular")) {
                                document.getElementById('favourite-icon-' + productId).classList.remove(
                                    'fa-regular')
                                document.getElementById('favourite-icon-' + productId).classList.add('fa-solid')
                            }
                        } else {
                            $('#favourite-icon-' + productId).removeClass(
                                'text-orange'); // O'chirilganini ko'rsatish
                            if (document.getElementById('favourite-icon-' + productId).classList.contains(
                                    "fa-solid")) {
                                document.getElementById('favourite-icon-' + productId).classList.remove(
                                    'fa-solid')
                                document.getElementById('favourite-icon-' + productId).classList.add(
                                    'fa-regular')
                            }
                        }
                    }
                },
                error: function(xhr) {
                    alert('Xatolik yuz berdi: ' + xhr.responseText);
                }
            });
        }

        function toggleCompare(productId) {
            $.ajax({
                url: '/toggle-compare',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId
                },
                success: function(response) {
                    if (response.success) {
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                        }).showToast();

                        // Sevimlilar sonini yangilash
                        $('#compare-count').text(response.compares_count); // Id bo'yicha o'zgarish

                        // Ico'ni yangilash
                        if (response.message.includes('qo\'shildi')) {
                            $('#compare-icon-' + productId).addClass(
                                'active-svg'); // Qo'shilganini ko'rsatish
                        } else {
                            $('#compare-icon-' + productId).removeClass(
                                'active-svg'); // O'chirilganini ko'rsatish
                        }
                    }
                },
                error: function(xhr) {
                    alert('Xatolik yuz berdi: ' + xhr.responseText);
                }
            });
        }
    </script>
@endsection
