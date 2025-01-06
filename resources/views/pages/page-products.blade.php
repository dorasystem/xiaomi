@extends('layouts.page')

@section('content')

    <main>


        <div class="container mt-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('home.filter_res')</span></a>
            </div>
            <hr />
        </div>
        <div class="productHeader bg-grey">
            <div class="container py-5 d-flex align-items-center flex-lg-row flex-column justify-content-between">
                <div class="">
                    <p>@lang('home.filter_title')</p>
                    <h2 class="fw-bold fs-1">
                        @lang('home.filter_desc')
                    </h2>
                </div>
                <div class="productbanner align-items-start gap-4 mt-5">
                    <div class="product_list d-flex align-items-center justify-content-center">
                        <img src="/assets/images/headphones.png" width="250px" alt="" />
                    </div>
                    <div class="">
                        <div class="little_product d-flex align-items-center justify-content-center">
                            <img src="/assets/images/airpods.png" width="120px" alt="" />
                        </div>
                        <div class="position-relative">
                            <img class="bottom_product border-orange" src="/assets/images/bottom_product.png"
                                width="120px" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filterProducts container py-4">
            <div class="row">
                <div class="col-lg-3 d-lg-block d-none">
                    <div style="top:30px;" class="bg-white p-4 rounded position-sticky ">
                        <form method="GET" action="{{ route('products.filter') }}">
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseOne">
                                            @lang('home.category')
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            @foreach ($categories as $category)
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" name="categories[]"
                                                        value="{{ $category->id }}" id="category-{{ $category->id }}"
                                                        {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="category-{{ $category->id }}">
                                                        <small>{{ $category['name_' . $lang] }}</small>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseTwo">
                                            @lang('home.price')
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show pt-3"
                                        aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            <div class="range-slider">
                                                <div class="inputs">
                                                    <input type="number" id="minValue" name="min_price"
                                                        value="{{ request('min_price', 20) }}" min="0"
                                                        max="600" />
                                                    <span>до</span>
                                                    <input type="number" id="maxValue" name="max_price"
                                                        value="{{ request('max_price', 600) }}" min="0"
                                                        max="600" />
                                                </div>
                                                <div class="slider-container">
                                                    <div class="slider-track"></div>
                                                    <input type="range" id="rangeMin" min="0" max="600"
                                                        value="20" />
                                                    <input type="range" id="rangeMax" min="0" max="600"
                                                        value="600" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit"
                                class="w-100 btn-orange rounded text-center mb-3">@lang('home.search')</button>
                            <button class="w-100 text-orange bg-transparent rounded text-center border-orange rounded py-1">
                                <a href="{{ route('products') }}"
                                    class="w-100 text-orange bg-transparent  text-center  py-1">
                                    @lang('home.reset')
                                </a>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="container">
                        <div class="d-flex gap-2">
                            <!-- Mobile Filter Modal -->
                            <form method="GET" action="{{ route('products.filter') }}">
                                <div class="d-lg-none d-block">
                                    <button class="btn-orange rounded mb-3" type="button" data-bs-toggle="modal"
                                        data-bs-target="#filtermodal">Filter
                                    </button>
                                    <div class="modal" id="filtermodal" tabindex="-1"
                                        aria-labelledby="filtermodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div style="height: 650px; overflow-y: auto"
                                                class="modal-content d-flex flex-column justify-content-between">
                                                <div class="">
                                                    <div class="modal-header position-sticky top-0 bg-white z-3">
                                                        <h2 class="fw-normal">@lang('home.all_filters')</h2>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                <button class="accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#panelsStayOpen-collapseOne"
                                                                    aria-expanded="true"
                                                                    aria-controls="panelsStayOpen-collapseOne">
                                                                    @lang('home.category')
                                                                </button>
                                                            </h2>
                                                            <div id="panelsStayOpen-collapseOne"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="panelsStayOpen-headingOne">
                                                                <div class="accordion-body">
                                                                    @foreach ($categories as $category)
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="categories[]"
                                                                                value="{{ $category->id }}"
                                                                                id="category-{{ $category->id }}"
                                                                                {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }} />
                                                                            <label class="form-check-label"
                                                                                for="category-{{ $category->id }}">
                                                                                <small>{{ $category['name_' . $lang] }}</small>
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                                <button class="accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#panelsStayOpen-collapseTwo"
                                                                    aria-expanded="true"
                                                                    aria-controls="panelsStayOpen-collapseTwo">
                                                                    @lang('home.price')
                                                                </button>
                                                            </h2>
                                                            <div id="panelsStayOpen-collapseTwo"
                                                                class="accordion-collapse collapse show pt-3"
                                                                aria-labelledby="panelsStayOpen-headingTwo">
                                                                <div class="accordion-body">
                                                                    <div class="range-slider">
                                                                        <div class="inputs">
                                                                            <input type="number" id="minValue2"
                                                                                name="min_price"
                                                                                value="{{ request('min_price', 20) }}"
                                                                                min="0" max="600" />
                                                                            <span>до</span>
                                                                            <input type="number" id="maxValue2"
                                                                                name="max_price"
                                                                                value="{{ request('max_price', 600) }}"
                                                                                min="0" max="600" />
                                                                        </div>
                                                                        <div class="slider-container">
                                                                            <div class="slider-track2"></div>
                                                                            <input type="range" id="rangeMin2"
                                                                                min="0" max="600"
                                                                                value="20" />
                                                                            <input type="range" id="rangeMax2"
                                                                                min="0" max="600"
                                                                                value="600" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-3 position-sticky bottom-0 z-3 bg-white">
                                                    <!-- Submit and Reset Button in Modal -->
                                                    <button type="submit"
                                                        class="w-100 btn-orange rounded text-center mb-3">@lang('home.search')</button>
                                                    <button
                                                        class="w-100 text-orange bg-transparent rounded text-center border-orange rounded py-1">
                                                        <a href="{{ route('products') }}"
                                                            class="w-100 text-orange bg-transparent text-center py-1">
                                                            @lang('home.reset')
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            @if (!empty($products) && $products->count())
                                @foreach ($products as $product)
                                    @php
                                        $cheapestVariant = $product->variants->sortBy('price')->first();
                                    @endphp
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="product border position-relative rounded">
                                            <div class="">
                                                <div
                                                    class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                                                    <a onclick="toggleFavourite({{ $product->id }})">
                                                        <i id="favourite-icon-{{ $product->id }}"
                                                            class="fa-{{ in_array($product->id, session('favorites', [])) ? 'solid' : 'regular' }} fa-heart fs-4 hover-orange ps-1
                                              {{ in_array($product->id, session('favorites', [])) ? 'text-orange' : '' }}">
                                                        </i>
                                                    </a>
                                                    <a onclick="toggleCompare({{ $product->id }})">
                                                        <svg id="compare-icon-{{ $product->id }}"
                                                            class="hover-svg {{ in_array($product->id, session('compares', [])) ? 'active-svg' : '' }}"
                                                            width="30" height="20" viewBox="0 0 102 92"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="11" height="92" rx="2"
                                                                fill="#000" />
                                                            <rect x="23" y="22" width="11" height="70"
                                                                rx="2" fill="#000" />
                                                            <rect x="46" y="45" width="11" height="47"
                                                                rx="2" fill="#000" />
                                                            <rect x="69" y="23" width="11" height="69"
                                                                rx="2" fill="#000" />
                                                            <rect x="91" y="45" width="11" height="47"
                                                                rx="2" fill="#000" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                @if ($cheapestVariant)
                                                    <img class="w-100 pb-4 productImage p-4"
                                                        src="{{ asset('storage/' . $product->image) }}" alt="" />
                                                    <div
                                                        class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
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
                                                        <a class="truncate-text"
                                                            href="{{ route('single.product', $product->slug) }}">
                                                            <p class="text-grey">{!! \Str::words($product['description_' . $lang], 10) !!}</p>
                                                        </a>

                                                        <div
                                                            class="d-flex align-items-center justify-content-between w-100">
                                                            <span class="small bg-transparent px-0">
                                                                {{ number_format($cheapestVariant->price ?? $cheapestVariant->discount_price, 0, ',', ' ') }}

                                                                UZS <span
                                                                    class="text-orange">@lang('home.incash')</span></span>
                                                            <span class="px-2 productmonth-border small text-grey">
                                                                {{ number_format($cheapestVariant->price_12, 0, ',', ' ') }}
                                                                UZS/@lang('home.month')</span>
                                                        </div>
                                                        <div class="d-flex gap-4 mt-3">
                                                            <a class="border-orange bg-transparent rounded p-1 px-3"
                                                                href="javascript: void(0);" type="button"
                                                                onclick="addToCart({{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->discount_price ?? $cheapestVariant->price }}, {{ $cheapestVariant->id }})">
                                                                <img src="/assets/icons/shopping-cart.svg"
                                                                    alt="" />
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
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <x-page.not-found />
                            @endif
                        </div>
                        {{ $products->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
            <div class="searchProductBanner text-white rounded-3 my-4 py-lg-4 px-lg-5 p-3">
                <h1 class="text-center">@lang('home.message_title')</h1>
                <p class="text-center">@lang('home.message_desc')</p>
                <div class="messageInputs p-4 rounded-4 container">
                    <form class="row align-items-center" action="{{ route('orders.store.form') }}" method="POST">
                        @csrf
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                            <input class="form-control focus_none py-3" placeholder="@lang('home.message_input1')?" type="text"
                                name="message" />
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                            <input class="form-control focus_none py-3" placeholder="@lang('home.message_input2')" type="text"
                                name="first_name" />
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                            <input class="form-control focus_none py-3" placeholder="+998 __ ___ ___ ___" type="tel"
                                name="phone" />
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <button class="btn-orange rounded px-5 py-3 w-100" type="submit">@lang('home.send')</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </main>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @if (session('success'))
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
