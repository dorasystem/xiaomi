<?php
$products = \App\Models\Product::all();
$lang = app()->getLocale();
?>

<div class="swiper-wrapper">
    @foreach ($products as $product)
        @php
            $cheapestVariant = $product->variants->sortBy('price')->first();
        @endphp
        <div class="swiper-slide product shadow-sm position-relative rounded">
            <div class=" ">
                <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                    <a onclick="toggleFavourite({{ $product->id }})">
                        <i id="favourite-icon-{{ $product->id }}"
                            class="fa-regular fa-heart fs-4 hover-orange ps-1
       {{ in_array($product->id, session('favorites', [])) ? 'text-orange' : '' }}">
                        </i>
                    </a>
                    <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="11" height="92" rx="2" fill="#000" />
                        <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                        <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                        <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                        <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                    </svg>
                </div>
                <a href="{{ route('single.product', $product->slug) }}" class="">

                    <img class="w-100 pb-4 productImage p-4" src="{{ asset('storage/' . $product->image) }}"
                        alt="" />
                </a>
                <div class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                    <div class="d-flex align-items-end gap-3 pt-2">
                        @if ($cheapestVariant->discount_price)
                            <div class="fw-bold ">{{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                                UZS
                            </div>
                            <del class="text-grey">
                                <small>{{ number_format($cheapestVariant->price, 0, ',', ' ') }} UZS</small>
                            </del>
                        @else
                            <div class="fw-bold">{{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                                UZS
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('single.product', $product->slug) }}">
                        <div class="productName fw-bold"> {{ \Str::words($product['name_' . $lang], 3) }}</div>
                    </a>
                    <a href="{{ route('single.product', $product->slug) }}">
                        <p class="text-grey"> {!! \Str::words($product['description_' . $lang], 15) !!}</p>
                    </a>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <span
                            class="small bg-transparent px-0">{{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                            UZS <span class="text-orange">за наличные</span></span>
                        <span class="px-2 productmonth-border small text-grey">from
                            {{ number_format($cheapestVariant->price_12, 0, ',', ' ') }} UZS/month</span>
                    </div>

                    <div class="d-flex gap-4 mt-3">
                        <a class="border-orange bg-transparent rounded p-1 px-3" href="javascript: void(0);"
                            type="button"
                            onclick="addToCart({{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->price ? $cheapestVariant->discount_price : $cheapestVariant->price }}, {{ $cheapestVariant->id }})">
                            <img src="/assets/icons/shopping-cart.svg" alt="" />
                        </a>
                        <button
                            data-bs-toggle="modal"
                            data-bs-target="#largeModal"
                            class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center"
                            data-product-id="{{ $product->id }}"
                            data-product-name="{{ $product['name_'.$lang] }}"
                            data-product-price="{{ $cheapestVariant->discount_price ?: $cheapestVariant->price }}"
                            data-product-image="{{ asset('storage/' . $product->image) }}"
                        >
                            <span>@lang('home.buy_now')</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

@if(session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
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
            }
        }).showToast();
    </script>
@endif
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
        document.querySelector('.cart-label').innerText = count; // Updates the cart count badge
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
                    $('.badge-position').text(response.favorites_count);

                    // Ico'ni yangilash
                    if (response.message.includes('qo\'shildi')) {
                        $('#favourite-icon-' + productId).addClass(
                            'text-orange'); // Qo'shilganini ko'rsatish
                    } else {
                        $('#favourite-icon-' + productId).removeClass(
                            'text-orange'); // O'chirilganini ko'rsatish
                    }
                }
            },
            error: function(xhr) {
                alert('Xatolik yuz berdi: ' + xhr.responseText);
            }
        });
    }
</script>
