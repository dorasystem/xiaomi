@extends('layouts.page')
@section('content')
    <main class="container">

        <div class="my-4">
            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / </a> <span
                    class="text-dark fw-bold">@lang('home.basket')</span>
            </div>
            <hr />
        </div>
        @if (session('cart') && count(session('cart')) !== 0)
            <div class="row mb-5">
                <div class="col-lg-8 pe-lg-4">
                    <div class="d-flex align-items-center gap-1 justify-content-between pb-2 border-bottom-dashed">
                        <h1 class="fw-normal">@lang('home.basket')</h1>
                        <form action="{{ route('removeAllCart') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="d-flex align-items-center gap-2 bg-transparent border-0">
                                <img src="/assets/icons/delete_icon.svg" alt="" />
                                <div>@lang('home.clear_cart')</div>
                            </button>
                        </form>
                    </div>
                    <div class="orders container">
                        @foreach ($cartProducts as $cartItem)
                            <div id="item-{{ $cartItem['id'] }}"
                                class="row align-items-center justify-content-between border-bottom-dashed p-2 ps-0">
                                <div class="col-lg-8 d-flex align-items-center gap-3">
                                    <img class="orderImage" src="{{ asset('storage/' . $cartItem['image']) }}"
                                        alt="{{ $cartItem['name'] }}" />
                                    <div class="d-flex flex-column gap-1">
                                        <h5 class="hover-orange fs-sm-14">{{ $cartItem['name'] }}</h5>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-flex flex-column align-items-end gap-4">
                                    <div class="d-flex align-items-center gap-3 w-100 justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <button onclick="updateQuantity({{ $cartItem['id'] }}, -1)"
                                                id="decrement-{{ $cartItem['id'] }}"
                                                class="decrement border-0 rounded-circle bg-history d-flex align-items-center justify-content-center"
                                                {{ $cartItem['quantity'] <= 1 ? 'disabled' : '' }}>
                                                <i class="fa-solid fa-minus fs-sm-12"></i>
                                            </button>

                                            <div class="count" data-value="{{ $cartItem['quantity'] }}">
                                                {{ $cartItem['quantity'] }}</div>

                                            <button onclick="updateQuantity({{ $cartItem['id'] }}, 1)"
                                                id="increment-{{ $cartItem['id'] }}"
                                                class="increment decrement border-0 rounded-circle bg-history d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-plus fs-sm-12"></i>
                                            </button>

                                        </div>
                                        <div class="fw-bold text-nowrap">
                                            @if ($cartItem['discount_price'])
                                                <h5 class="price" data-price="{{ $cartItem['price'] }}"
                                                    data-discount-price="{{ $cartItem['discount_price'] }}"
                                                    data-total="{{ $cartItem['discount_price'] * $cartItem['quantity'] }}">
                                                    {{ number_format($cartItem['discount_price'] * $cartItem['quantity'], 0, '.', ' ') }}
                                                    UZS
                                                </h5>
                                                <del class="text-danger">
                                                    <small
                                                        data-total-original="{{ $cartItem['price'] * $cartItem['quantity'] }}">
                                                        {{ number_format($cartItem['price'] * $cartItem['quantity'], 0, '.', ' ') }}
                                                    </small> UZS
                                                </del>
                                            @else
                                                <h5 class="price" data-price="{{ $cartItem['price'] }}"
                                                    data-total="{{ $cartItem['price'] * $cartItem['quantity'] }}">
                                                    {{ number_format($cartItem['price'] * $cartItem['quantity'], 0, '.', ' ') }}
                                                    UZS
                                                </h5>
                                            @endif

                                        </div>
                                    </div>
                                    <div style="height: 50px" class="d-flex align-items-center gap-4">
                                        <a onclick="toggleFavourite({{ $cartItem['id'] }})" class="">
                                            <i id="favourite-icon-{{ $cartItem['id'] }}"
                                                class="fa-{{ in_array($cartItem['id'], session('favorites', [])) ? 'solid' : 'regular' }} fa-heart fs-4 hover-orange ps-1
                                 {{ in_array($cartItem['id'], session('favorites', [])) ? 'text-orange' : '' }}">
                                            </i>
                                        </a>
                                        <button class="rounded border-0"
                                            onclick="removeFromCart({{ $cartItem['id'] }})"><img
                                                src="/assets/icons/x-mark.svg" alt="Remove" /></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="orderSum bg-darkgrey rounded p-3 position-sticky">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="text-orange">@lang('home.your_order')</h4>
                            <small id="cart-count">@lang('home.products'):
                                {{ session('cart') ? collect(session('cart'))->sum('quantity') : 0 }}</small>
                        </div>
                        <hr class="my-4 text-history" />
                        @foreach ($cartProducts as $cartItem)
                            <div id="item-{{ $cartItem['id'] }}" class="d-flex align-items-start justify-content-between">
                                <div class="small">{{ $cartItem['name'] }}</div>
                                @if ($cartItem['discount_price'])
                                    <div class="small">{{ number_format($cartItem['discount_price']) }}</div>
                                @else
                                    <div class="small">{{ number_format($cartItem['price']) }}</div>
                                @endif
                            </div>
                            <p class="border-bottom-dashed py-1   w-100"></p>
                        @endforeach
                        {{--                        <div class="mb-3 d-flex align-items-center justify-content-between"> --}}
                        {{--                            <div class="text-dark">@lang('home.total_amount')</div> --}}
                        {{--                            <h6 class="m-0 fw-bold">{{ number_format($totalDiscount, 0, '.', ' ') }} UZS</h6><br> --}}
                        {{--                        </div> --}}
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <div class="text-dark">@lang('home.total_discount_amount')</div>
                            <h6 class="m-0 fw-bold price">{{ number_format($discountedTotal, 0, '.', ' ') }} UZS</h6>
                        </div>
                        <hr class="my-4 text-history" />

                        <button type="button" class="btn-orange rounded w-100" data-bs-toggle="modal"
                            data-bs-target="#largeModal" @if (empty($cartProducts)) disabled @endif>
                            @lang('home.place_order')
                        </button>
                    </div>
                </div>
            </div>
        @else
            <style>
                .card {
                    text-align: center;
                    border: none;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    transition: transform 0.2s;
                }

                .card:hover {
                    transform: scale(1.05);
                }

                .card img {
                    width: 50px;
                    height: auto;
                    margin: auto;
                    padding: 10px;
                }
            </style>
            <div class="text-center" id="empty-cart">
                <img width="350px" src="/assets/images/not-found.png" alt="">
            </div>
            <div style="overflow: hidden" class="seenProducts container py-3 px-0 position-relative">
                <div class="mb-4 fs-2 fw-bold">@lang('home.top_products')</div>
                <div class="container pb-5">
                    <div class="row g-4">
                        @foreach ($categories as $item)
                            <div class="col-md-6 col-12 col-lg-4">
                                <a href="{{ route('category.sort', ['slug' => $item->getSlugByLanguage($lang)]) }}"
                                    class="d-flex align-items-center p-2 border rounded">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item['name_' . $lang] }}"
                                        class="img-fluid me-3 rounded"
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
        <script>
            function updateQuantity(productId, change) {
                $.ajax({
                    url: '/update-cart',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: productId,
                        change: change
                    },
                    success: function(response) {
                        if (response.success) {
                            const updatedItem = response.updated_item;

                            const countElement = $('#item-' + updatedItem.id + ' .count');
                            countElement.text(updatedItem.quantity);
                            const priceContainer = $('#item-' + updatedItem.id + ' .price');
                            const delContainer = $('#item-' + updatedItem.id + ' del');

                            const basePrice = parseFloat(priceContainer.data('price')); // Asosiy narx
                            const discountPrice = parseFloat(priceContainer.data('discount-price')) ||
                                null; // Chegirma narxi

                            let priceHtml = '';
                            if (discountPrice) {
                                priceHtml = `
                            ${new Intl.NumberFormat('ru-RU').format(discountPrice * updatedItem.quantity)} UZS
                                `;

                                priceContainer.attr('data-total', discountPrice * updatedItem.quantity);

                                if (delContainer.length) {
                                    delContainer.html(`
                            <small data-total-original="${basePrice * updatedItem.quantity}">
                                ${new Intl.NumberFormat('ru-RU').format(basePrice * updatedItem.quantity)}
                            </small> UZS
                            `);
                                } else {
                                    priceContainer.after(`
                            <del class="text-danger">
                                <small data-total-original="${basePrice * updatedItem.quantity}">
                                    ${new Intl.NumberFormat('ru-RU').format(basePrice * updatedItem.quantity)}
                                </small> UZS
                            </del>
                            `);
                                }
                            } else {
                                priceHtml = `
                             ${new Intl.NumberFormat('ru-RU').format(basePrice * updatedItem.quantity)} UZS
                            `;

                                priceContainer.attr('data-total', basePrice * updatedItem.quantity);

                                if (delContainer.length) {
                                    delContainer.remove();
                                }
                            }

                            priceContainer.html(priceHtml);

                            $('.orderSum h6:last').text(
                                new Intl.NumberFormat('ru-RU').format(response.total_amount) + ' UZS'
                            );

                            const decrementButton = $('#decrement-' + updatedItem.id);
                            const incrementButton = $('#increment-' + updatedItem.id);

                            decrementButton.prop('disabled', updatedItem.quantity <= 1);
                            incrementButton.prop('disabled', updatedItem.quantity >= updatedItem.max_quantity);
                        }
                    },
                    error: function(xhr) {
                        alert('Xatolik yuz berdi: ' + xhr.responseText);
                    }
                });
            }


            function removeFromCart(productId) {
                $.ajax({
                    url: '/remove-from-cart',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: productId
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#item-' + productId).remove();

                            $('.orderSum h6:last').text(
                                new Intl.NumberFormat('ru-RU').format(response.total_amount) + ' UZS'
                            );

                            $('#cart-count').text(response.cart_count);

                            if (response.cart_count === 0) {
                                $('#cart-container').html(response.empty_cart_html);
                            }
                        } else {
                            alert('Xatolik yuz berdi: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        location.reload()
                    }
                });
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

                            $('#favorite-count').text(response.favorites_count);

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
                                    'text-orange');
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
        </script>
    </main>
    {{-- modal --}}
    <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content px-4">
                <div class="modal-header border-0 ">
                    {{-- <h6 class="" >@lang('home.total_discount_amount'): <span class=""> {{ number_format($discountedTotal, 0, '.', ' ') }} UZS </span></h6> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body application_modal row align-items-end">
                    <form id="formProduct" method="POST" action="{{ route('orders.products.store') }}"
                        class="col-lg-4 order-lg-1 order-2">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('home.full_name') <span
                                    class="text-danger">*</span></label>
                            <input required type="text" class="form-control focus_none" id="name"
                                name="first_name" placeholder="@lang('home.message_input2')" />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">@lang('home.enter_number') <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control focus_none" id="phone" name="phone"
                                placeholder="+998 (90) 123-45-67" required />
                            <small id="phone-error" class="form-text text-danger"
                                style="display: none;">@lang('home.invalid_phone_format')</small>
                        </div>

                        <!-- Hidden fields for all product details -->
                        <input type="hidden" name="cart_items" id="cart_items">
                        <button type="submit" class="btn-orange rounded w-100 mb-2">@lang('home.send')</button>
                    </form>


                    <!-- Product details for modal -->
                    <div class="col-lg-8 order-lg-2 order-1">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="d-flex flex-column" id="modal-products-list">
                                <!-- Dynamic list of products will be inserted here -->

                            </div>
                            <div class="row align-items-start">
                                <div class="col-sm-6 mb-2">
                                    <div class="phone text-nowrap border-orange rounded text-center px-2 py-1 w-100">
                                        <a href="tel: +998772828080 " class="text-orange"> <i
                                                class="fa-solid fa-phone-volume text-orange me-2"></i> +998 77 282 80
                                            80
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="phone text-nowrap border-orange rounded text-center px-2 py-1 w-100">
                                        <a href="tel: +998772828080 " class="text-orange"> <i
                                                class="fa-solid fa-phone-volume text-orange me-2"></i> +998 77 282 80
                                            80
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const phoneInput = document.getElementById('phone');
        const errorText = document.getElementById('phone-error');

        phoneInput.addEventListener('input', () => {
            let value = phoneInput.value.replace(/\D/g, '');

            if (!value.startsWith('998')) value = '998' + value;

            value = value.slice(0, 12);

            let formatted = '+998 ';
            if (value.length > 3) formatted += `(${value.slice(3, 5)}`;
            if (value.length > 5) formatted += `) ${value.slice(5, 8)}`;
            if (value.length > 8) formatted += `-${value.slice(8, 10)}`;
            if (value.length > 10) formatted += `-${value.slice(10, 12)}`;

            phoneInput.value = formatted.trim();
        });

        phoneInput.addEventListener('blur', () => {
            const phoneRegex = /^\+998 \([0-9]{2}\) [0-9]{3}-[0-9]{2}-[0-9]{2}$/;
            errorText.style.display = phoneRegex.test(phoneInput.value) ? 'none' : 'block';
        });
    </script>
    <script>
        var cartItems = @json($cartProducts); // PHPdan JS ga cartItems yuborilgan

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('largeModal');

            modal.addEventListener('show.bs.modal', function(event) {
                // Modaldagi mahsulotlar ro'yxatini tozalash
                const modalProductsList = document.getElementById('modal-products-list');
                modalProductsList.innerHTML = '';

                // cartItems array bo'ylab aylanish va mahsulotlarni modalga qo'shish
                cartItems.forEach(function(cartItem) {
                    const productDiv = document.createElement('div');
                    productDiv.classList.add('d-flex', 'justify-content-between', 'mb-3');

                    const productName = cartItem.name;
                    const productNameShortened = productName.split(' ').slice(0, 5).join(' ');

                    // Mahsulotni HTMLga joylash
                    productDiv.innerHTML = `
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('storage') }}/${cartItem.image}" alt="${cartItem.name}" class="img-thumbnail" style="width: 50px; height: 50px;">
                        <span>${productNameShortened}</span>
                    </div>
                    <div class="mt-3">
                        ${new Intl.NumberFormat('ru-RU').format(cartItem.price || cartItem.discount_price)} UZS
                    </div>
                `;
                    modalProductsList.appendChild(productDiv);
                });
            });

            // Form yuborilishi oldidan cartItems'ni console'ga chiqarish
            const form = document.querySelector('#formProduct');
            form.addEventListener('submit', function() {
                console.log(cartItems); // cartItems qiymatini tekshirish uchun
                document.getElementById('cart_items').value = JSON.stringify(
                    cartItems); // JSON formatida yuborish
            });
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
