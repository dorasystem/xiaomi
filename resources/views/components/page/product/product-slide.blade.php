@props(['productId'])

@php
    $lang = app()->getLocale();
    $currentProduct = \App\Models\Product::find($productId);
    $products = \App\Models\Product::where('category_id', $currentProduct->category_id)
        ->where('id', '!=', $currentProduct->id)
        ->inRandomOrder()
        ->take(10)
        ->get();
@endphp

<div class="swiper-wrapper">
    @foreach ($products as $product)
        @php
            $cheapestVariant = $product->variants->sortBy('price')->first();
        @endphp
        <div class="AAD swiper-slide product shadow-sm position-relative rounded">
            <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                <a onclick="toggleFavourite({{ $product->id }})">
                    <i id="favourite-icon-{{ $product->id }}"
                        class="fa-{{ in_array($product->id, session('favorites', [])) ? 'solid' : 'regular' }} fa-heart fs-4 hover-orange ps-1
                                 {{ in_array($product->id, session('favorites', [])) ? 'text-orange' : '' }}">
                    </i>
                </a>
                <a onclick="toggleCompare({{ $product->id }})">
                    <svg id="compare-icon-{{ $product->id }}"
                        class="hover-svg {{ in_array($product->id, session('compares', [])) ? 'active-svg' : '' }}"
                        width="30" height="20" viewBox="0 0 102 92" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="11" height="92" rx="2" fill="#000" />
                        <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                        <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                        <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                        <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                    </svg>
                </a>
            </div>
            <a href="{{ route('single.product', $product->slug) }}" class="">

                <img class="w-100 pb-4 productImage p-4" src="{{ asset('storage/' . $product->image) }}"
                    alt="" />
            </a>
            <div class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                <div class="d-flex align-items-end justify-content-between gap-3 pt-2">
                    @if ($cheapestVariant->discount_price)
                        <div class="fw-bold text-orange ">
                            {{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                            UZS
                        </div>
                        <del class="text-grey">
                            <small>{{ number_format($cheapestVariant->price, 0, ',', ' ') }} UZS</small>
                        </del>
                    @else
                        <div class="fw-bold text-orange">{{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                            UZS
                        </div>
                    @endif
                </div>
                <a href="{{ route('single.product', $product->slug) }}">
                    <div class="productName fw-bold"> {{ \Str::words($product['name_' . $lang], 3) }}</div>
                </a>
                <a class="truncate-text" href="{{ route('single.product', $product->slug) }}">
                    <p class="text-grey"> {!! \Str::words($product['description_' . $lang], 10) !!}</p>
                </a>
                <div class="d-flex align-items-center justify-content-between w-100">
                    @if ($cheapestVariant->price_12 > 0)
                        <span class="px-2 productmonth-border small text-orange rounded-1">
                            {{ number_format($cheapestVariant->price_12, 0, ',', ' ') }} UZS/@lang('home.month')</span>
                    @endif
                </div>

                <div class="d-flex gap-4 mt-1">
                    <a class="border-orange bg-transparent rounded p-1 px-3" href="javascript: void(0);" type="button"
                        onclick="addToCart({{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->discount_price ?? $cheapestVariant->price }}, {{ $cheapestVariant->id }})">
                        <img src="/assets/icons/shopping-cart.svg" alt="" />
                    </a>
                    <button data-bs-toggle="modal" data-bs-target="#largeModal"
                        class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center"
                        data-product-id="{{ $product->id }}" data-product-name="{{ $product['name_' . $lang] }}"
                        data-product-price="{{ $cheapestVariant->discount_price ?: $cheapestVariant->price }}"
                        data-product-image="{{ asset('storage/' . $product->image) }}">
                        <span>@lang('home.buy_now')</span>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".AAD strong").forEach(el => el.remove());
    });
</script>
