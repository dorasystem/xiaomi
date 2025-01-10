@extends('layouts.page')
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') /</a> <span
                    class="text-dark fw-bold">@lang('home.compare')</span>
            </div>
            <hr />
        </div>
        <div class="container  p-0">
            <h1 class="m-0 fs-2 fw-normal container">@lang('home.compare')</h1>
            @if (!empty($categoriesWithProducts) && $products->count())
                <div class="d-lg-flex align-items-center justify-content-between d-block container">
                    <div class="col-lg-9 d-flex flex-column gap-4 my-3 align-items-start">
                        <ul class="nav nav-tabs mb-1 overflow-auto w-100" id="myTab" role="tablist"
                            style="white-space: nowrap">
                            @foreach ($categoriesWithProducts as $item)
                                <li class="me-3 mb-3" role="presentation">
                                    <a class="fs-5 p-2 @if ($loop->first) active @endif"
                                        id="products{{ $item['category']->id }}-tab" data-bs-toggle="tab"
                                        href="#products{{ $item['category']->id }}" role="tab"
                                        aria-controls="products{{ $item['category']->id }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ $item['category']['name_' . $lang] }}
                                        <span>({{ $item['products']->count() }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="tab-content container" id="myTabContent">
                    @foreach ($categoriesWithProducts as $item)
                        <div class="tab-pane fade @if ($loop->first) show active @endif"
                            id="products{{ $item['category']->id }}" role="tabpanel"
                            aria-labelledby="products{{ $item['category']->id }}-tab">
                            <div class="row">
                                @foreach ($item['products'] as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <div class="product shadow-sm position-relative rounded">
                                            <div class="">
                                                <div
                                                    class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                                                    <a href="javascript:void(0);"
                                                        onclick="toggleFavourite({{ $product->id }})">
                                                        <i id="favourite-icon-{{ $product->id }}"
                                                            class="fa-{{ in_array($product['id'], session('favorites', [])) ? 'solid' : 'regular' }} {{ in_array($product->id, session('favorites', [])) ? 'text-orange' : 'hover-orange' }} fa-heart fs-4 ps-1"></i>
                                                    </a>

                                                    <a onclick="toggleCompare({{ $product->id }})">
                                                        <svg id="compare-icon-{{ $product->id }}"
                                                            class="hover-svg {{ in_array($product->id, session('compares', [])) ? 'active-svg' : '' }}"
                                                            width="30" height="20" viewBox="0 0 102 92"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="11" height="92" rx="2"
                                                                fill="#000" />
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
                                                <div style="height: 200px"
                                                    class="d-flex flex-column justify-content-between bg-white p-4 rounded-bottom">
                                                    <div class="d-flex align-items-end gap-3 pt-2">
                                                        @if ($cheapestVariant->discount_price)
                                                            <div class="fw-bold ">
                                                                {{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                                                                UZS
                                                            </div>
                                                            <del class="text-grey">
                                                                <small>{{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                                                                    UZS</small>
                                                            </del>
                                                        @else
                                                            <div class="fw-bold">
                                                                {{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                                                                UZS
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <a href="{{ route('single.product', $product->slug) }}">
                                                        <div class="productName fw-bold">
                                                            {{ \Str::words($product['name_' . $lang], 3) }}</div>
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
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <img width="350px" src="/assets/images/not-found.png" alt="">
                </div>
                <x-page.not-found />

                <div style="overflow: hidden" class="seenProducts container py-3 px-0 position-relative">
                    <div class="mb-4 fs-2 fw-bold">@lang('home.top_products')</div>

                    <div class="container py-5">
                        <div class="row g-4">
                            @foreach ($allPategories as $item)
                                <div class="col-md-6 col-12 col-lg-4">
                                    <a href="{{ route('category.sort', ['slug' => $item->getSlugByLanguage($lang)]) }}"
                                        class="d-flex align-items-center p-2 border rounded">
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ $item['name_' . $lang] }}" class="img-fluid me-3 rounded"
                                            style="width: 80px; height: 80px; object-fit: cover;">
                                        <div>
                                            <p class="mb-0 fw-bold">{{ $item['name_' . $lang] }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
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
                    if (response.success) {
                        updateCartCount(response.cart_count);

                        // Bootstrap toast xabarni ko'rsatish
                        const toastBody = document.querySelector('#liveToast .toast-body');
                        toastBody.textContent = response.message;

                        const toastElement = document.getElementById('liveToast');
                        const toast = new bootstrap.Toast(toastElement);
                        toast.show();
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
                        const toastBody = document.querySelector('#liveToast .toast-body');
                        toastBody.textContent = response.message;

                        const toastElement = document.getElementById('liveToast');
                        const toast = new bootstrap.Toast(toastElement);
                        toast.show();

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
                        const toastBody = document.querySelector('#liveToast .toast-body');
                        toastBody.textContent = response.message;

                        const toastElement = document.getElementById('liveToast');
                        const toast = new bootstrap.Toast(toastElement);
                        toast.show();

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
