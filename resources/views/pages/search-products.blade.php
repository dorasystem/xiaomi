@php use Illuminate\Support\Facades\Route; @endphp
@extends('layouts.page')
<?php
$lang = app()->getLocale();
$categories = \App\Models\Category::all();
?>
@section('content')
    <style>
        .slider-container {
            position: relative;
            width: 100%;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-container input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 5px;
            background: #ff6600;
            border-radius: 5px;
            outline: none;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .slider-container input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            background: #ff6600;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: auto;
            position: relative;
        }

        .slider-container input[type="range"]::-moz-range-thumb {
            width: 16px;
            height: 16px;
            background: #ff6600;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: auto;
        }

        .slider-container input[type="range"]::-webkit-slider-thumb:hover {
            background: #ff4500;
        }

        .slider-container input[type="range"]::-moz-range-thumb:hover {
            background: #ff4500;
        }

        .slider-track {
            position: absolute;
            height: 5px;
            background: #ff6600;
            /*z-index: -1;*/
            width: 100%;
        }
    </style>
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
                        <img src="/assets/images/products/tel.png" width="250px" alt="" />
                    </div>
                    <div class="">
                        <div class="little_product d-flex align-items-center justify-content-center">
                            <img src="/assets/images/products/air.png" width="120px" alt="" />
                        </div>
                        <div class="position-relative">
                            <img class="bottom_product border-orange" src="/assets/images/products/soat.png" width="120px"
                                alt="" />
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
                                <!-- 📌 POPULAR MAHSULOTLAR FILTRI -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header"
                                        id="panelsStayOpen-headingThree">
                                        <button class="accordion-button" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseThree"
                                                aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseThree">
                                            @lang('home.popular_products')
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseThree"
                                         class="accordion-collapse collapse show"
                                         aria-labelledby="panelsStayOpen-headingThree">
                                        <div class="accordion-body">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                       name="popular" id="popular-checkbox"
                                                    {{ request('popular') ? 'checked' : '' }} />
                                                <label class="form-check-label"
                                                       for="popular-checkbox">
                                                    <small>@lang('home.only_popular')</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="all-categories"
                                                    {{ request()->has('categories') && count(request('categories', [])) === $categories->count() ? 'checked' : '' }} />
                                                <label class="form-check-label" for="all-categories">
                                                    <small>@lang('home.all_categories')</small>
                                                </label>
                                            </div>

                                            <!-- Individual checkboxes -->
                                            <div id="category-container">
                                                @foreach ($categories as $index => $category)
                                                    @php

                                                        // ✅ 1. Query string orqali kelgan kategoriyalarni olish
                                                        $selectedCategories = request()->has('categories')
                                                            ? request('categories')
                                                            : [];

                                                        // ✅ 2. Agar kategoriya {slug} orqali kelgan bo‘lsa, slug bo‘yicha tekshirish
                                                        $currentCategorySlug = Route::current()->parameter('category');
                                                        $isChecked =
                                                            in_array($category->id, $selectedCategories) ||
                                                            ($currentCategorySlug &&
                                                                $category->slug == $currentCategorySlug);
                                                    @endphp

                                                    <div class="form-check mb-3 category-item"
                                                         style="display: {{ $index < 10 ? 'block' : 'none' }}">
                                                        <input class="form-check-input category-checkbox"
                                                               type="checkbox"
                                                               name="categories[]" value="{{ $category->id }}"
                                                               id="category-{{ $category->id }}"
                                                            {{ $isChecked ? 'checked' : '' }} />
                                                        <label class="form-check-label"
                                                               for="category-{{ $category->id }}">
                                                            <small>{{ $category['name_' . $lang] }}</small>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Ko'proq ko'rsatish tugmasi -->
                                            <a id="showMoreBtn" class="w-100 btn-orange2 rounded text-center mb-3 btn">
                                                @lang('home.show_more')
                                            </a>

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
                                                <div class="slider-container">
                                                    <div class="slider-track"></div>
                                                    <input type="range" id="rangeMin" min="10" max="40000000"
                                                           step="1000"
                                                           value="{{ request('min_price', 10) }}"/>
                                                    <input type="range" id="rangeMax" min="10" max="40000000"
                                                           step="1000"
                                                           value="{{ request('max_price', 40000000) }}"/>
                                                </div>
                                                <span id="minValue1" style="font-size: 14px">
                                                        {{ number_format(request('min_price', 10), 0, ',', ' ') }} so'm
                                                    </span> -
                                                <span id="maxValue1" style="font-size: 14px">
                                                        {{ number_format(request('max_price', 40000000), 0, ',', ' ') }} so'm
                                                    </span>
                                            </div>
                                            <input type="hidden" name="min_price" id="min_price_hidden"
                                                   value="{{ request('min_price', 1) }}">
                                            <input type="hidden" name="max_price" id="max_price_hidden"
                                                   value="{{ request('max_price', 40000000) }}">


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit"
                                    class="w-100 btn-orange rounded text-center mb-3">@lang('home.search')</button>
                            <button
                                class="w-100 text-orange bg-transparent rounded text-center border-orange rounded py-1">
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
                                            data-bs-target="#filtermodal">@lang('home.filter')
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
                                                        <!-- 📌 POPULAR MAHSULOTLAR FILTRI -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header"
                                                                id="panelsStayOpen-headingThree">
                                                                <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#panelsStayOpen-collapseThree"
                                                                        aria-expanded="true"
                                                                        aria-controls="panelsStayOpen-collapseThree">
                                                                    @lang('home.popular_products')
                                                                </button>
                                                            </h2>
                                                            <div id="panelsStayOpen-collapseThree"
                                                                 class="accordion-collapse collapse show"
                                                                 aria-labelledby="panelsStayOpen-headingThree">
                                                                <div class="accordion-body">
                                                                    <div class="form-check mb-2">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="popular" id="popular-checkbox"
                                                                            {{ request('popular') ? 'checked' : '' }} />
                                                                        <label class="form-check-label"
                                                                               for="popular-checkbox">
                                                                            <small>@lang('home.only_popular')</small>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                                    <div class="form-check mb-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               id="all-categories2"
                                                                            {{ count(request('categories', [])) === $categories->count() ? 'checked' : '' }} />
                                                                        <label class="form-check-label"
                                                                               for="all-categories2">
                                                                            <small>@lang('home.all_categories')</small>
                                                                        </label>
                                                                    </div>

                                                                    @foreach ($categories as $category)
                                                                        <div class="form-check mb-3">
                                                                            <input
                                                                                class="form-check-input category-checkbox"
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
                                                                        <div class="slider-container">
                                                                            <div class="slider-track"></div>
                                                                            <input type="range" id="rangeMin2" min="10" max="40000000"
                                                                                   step="1000"
                                                                                   value="{{ request('min_price2', 10) }}"/>
                                                                            <input type="range" id="rangeMax2" min="10" max="40000000"
                                                                                   step="1000"
                                                                                   value="{{ request('max_price', 40000000) }}"/>
                                                                        </div>
                                                                        <span id="minValue2" style="font-size: 14px">
                                                                            {{ number_format(request('min_price', 10), 0, ',', ' ') }} so'm
                                                                        </span> -
                                                                        <span id="maxValue2" style="font-size: 14px">
                                                                            {{ number_format(request('max_price', 40000000), 0, ',', ' ') }} so'm
                                                                        </span>
                                                                    </div>
                                                                    <input type="hidden" name="min_price" id="min_price_hidden2"
                                                                           value="{{ request('min_price', 1) }}">
                                                                    <input type="hidden" name="max_price" id="max_price_hidden2"
                                                                           value="{{ request('max_price', 40000000) }}">
                                                                    <script>
                                                                        document.addEventListener("DOMContentLoaded", function () {
                                                                            let rangeMin = document.querySelectorAll("#rangeMin, #rangeMin2");
                                                                            let rangeMax = document.querySelectorAll("#rangeMax, #rangeMax2");
                                                                            let minPriceInputs = document.querySelectorAll("#min_price_hidden, #min_price_hidden2");
                                                                            let maxPriceInputs = document.querySelectorAll("#max_price_hidden, #max_price_hidden2");
                                                                            let minValueDisplays = document.querySelectorAll("#minValue1, #minValue2");
                                                                            let maxValueDisplays = document.querySelectorAll("#maxValue1, #maxValue2");
                                                                            let categoryCheckboxes = document.querySelectorAll(".category-checkbox");
                                                                            let allCategoriesCheckbox = document.querySelectorAll("#all-categories, #all-categories2");

                                                                            function formatPrice(value) {
                                                                                return new Intl.NumberFormat('uz-UZ').format(Number(value)) + " so'm";
                                                                            }

                                                                            function updateValues() {
                                                                                rangeMin.forEach((min, index) => {
                                                                                    let max = rangeMax[index];
                                                                                    let minInput = minPriceInputs[index];
                                                                                    let maxInput = maxPriceInputs[index];
                                                                                    let minValue = minValueDisplays[index];
                                                                                    let maxValue = maxValueDisplays[index];

                                                                                    minValue.textContent = formatPrice(min.value);
                                                                                    maxValue.textContent = formatPrice(max.value);
                                                                                    minInput.value = min.value;
                                                                                    maxInput.value = max.value;
                                                                                });
                                                                            }

                                                                            rangeMin.forEach(min => min.addEventListener("input", updateValues));
                                                                            rangeMax.forEach(max => max.addEventListener("input", updateValues));

                                                                            function toggleAllCategories() {
                                                                                let checked = this.checked;
                                                                                categoryCheckboxes.forEach(checkbox => {
                                                                                    checkbox.checked = checked;
                                                                                });
                                                                            }

                                                                            allCategoriesCheckbox.forEach(checkbox => checkbox.addEventListener("change", toggleAllCategories));

                                                                            updateValues(); // Sahifa yuklanganda narxlarni yangilash
                                                                        });
                                                                    </script>


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
                        <div class="row AAD">
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
                                                        <div
                                                            class="d-flex align-items-end justify-content-between gap-3 pt-2">
                                                            @if ($cheapestVariant->discount_price)
                                                                <div class="fw-bold text-orange ">
                                                                    {{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                                                                    UZS
                                                                </div>
                                                                <del class="text-grey">
                                                                    <small>{{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                                                                        UZS</small>
                                                                </del>
                                                            @else
                                                                <div class="fw-bold text-orange">
                                                                    {{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                                                                    UZS
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <a href="{{ route('single.product', $product->slug) }}">
                                                            <div class="productName fw-bold">
                                                                {{ \Str::words($product['name_' . $lang]) }}</div>
                                                        </a>
                                                        <a class="truncate-text"
                                                            href="{{ route('single.product', $product->slug) }}">
                                                            <p class="text-grey">{!! \Str::words($product['description_' . $lang], 10) !!}</p>
                                                        </a>

                                                        <div
                                                            class="d-flex align-items-center justify-content-between w-100">
                                                            @if ($cheapestVariant->price_24 > 0)
                                                                <span
                                                                    class="px-2 productmonth-border small text-orange rounded-1">
                                                                    {{ number_format($cheapestVariant->price_24, 0, ',', ' ') }}
                                                                    UZS/@lang('home.month')
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex gap-4 mt-1">
                                                            <a class="border-orange bg-transparent rounded p-1 px-3 add-to-cart-btn"
                                                                href="javascript: void(0);" type="button"
                                                                onclick="addToCart(this,{{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->discount_price ?? $cheapestVariant->price }}, {{ $cheapestVariant->id }})">
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
                                <?php
                                $lang = app()->getLocale();
                                ?>
                                <main class="text-light-black fs-14 fs-12-responsive mt-responsive dr-text">
                                    <div class="container ">
                                        <div class="d-flex align-items-center  flex-wrap mt-4 w-100">
                                            <div
                                                class=" col-md-6 d-flex flex-column align-items center justify-content-center gap-3 w-100 text-center">
                                                <h3 class="">@lang('home.not_found') {{ $search }}</h3>
                                                <a class="" href="/">
                                                    <button type="button"
                                                        class="btn-orange text-white border-0 rounded p-15-28 ">
                                                        @lang('home.go_to_home')
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            @endif

                        </div>
                        {{ $products->links('pagination::bootstrap-4') }}
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
                            <input class="form-control focus_none py-3" placeholder="@lang('home.message_input1')" type="text"
                                required name="message" />
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                            <input class="form-control focus_none py-3" placeholder="@lang('home.message_input2')" type="text"
                                required name="first_name" />
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                            <input class="form-control focus_none py-3" placeholder="+998 __ ___ ___ ___" type="tel"
                                name="phone" required pattern="^\+\d{7,}$"
                                title="Номер телефона должен содержать не менее 7 цифр" />
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
            const toastBody = document.querySelector('#liveToast .toast-body');
            toastBody.textContent = response.message;

            const toastElement = document.getElementById('liveToast');
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
        </script>
    @endif

    <script>


        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".AAD strong").forEach(el => el.remove());
        });


        document.addEventListener('DOMContentLoaded', function() {
            const allCategoriesCheckbox = document.getElementById('all-categories');
            const allCategoriesCheckbox2 = document.getElementById('all-categories2');
            const categoryCheckboxes = document.querySelectorAll('.category-checkbox');

            // "All" checkbox tanlanganda barcha checkboxlarni boshqaradi
            allCategoriesCheckbox.addEventListener('change', function() {
                categoryCheckboxes.forEach(checkbox => {
                    checkbox.checked = allCategoriesCheckbox.checked;
                });
            });
            allCategoriesCheckbox2.addEventListener('change', function() {
                categoryCheckboxes.forEach(checkbox => {
                    checkbox.checked = allCategoriesCheckbox2.checked;
                });
            });

            // Boshqa checkboxlar o'zgarganda "All" checkboxni yangilaydi
            categoryCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    allCategoriesCheckbox.checked = Array.from(categoryCheckboxes).every(checkbox =>
                        checkbox.checked);
                });
            });
        });

        function addToCart(button, productId, productName, productPrice, variantId) {
            button.classList.add("loading");
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
                },
                complete: function() {
                    // 1 soniyadan keyin loading klassini olib tashlash
                    setTimeout(() => {
                        button.classList.remove("loading");
                    }, 1000); // 1000ms = 1 sekund
                }
            });
        }

        function updateCartCount(count) {
            document.getElementById('cart-count').innerText = count; // Updates the cart count badge
            document.getElementById('cart-count2').innerText = count; // Updates the cart count badge
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
                        console.log(response);
                        const toastBody = document.querySelector('#liveToast .toast-body');
                        toastBody.textContent = response.message;

                        const toastElement = document.getElementById('liveToast');
                        const toast = new bootstrap.Toast(toastElement);
                        toast.show();

                        // Sevimlilar sonini yangi  console.log(response);lash
                        $('#favorite-count').text(response.favorites_count);
                        $('#favorite-count2').text(response.favorites_count);

                        // Ico'ni yangilash
                        if (response.action === "added") {
                            console.log(1)
                            $('#favourite-icon-' + productId).addClass('text-orange');
                            if (document.getElementById('favourite-icon-' + productId).classList.contains(
                                "fa-regular")) {
                                document.getElementById('favourite-icon-' + productId).classList.remove(
                                    'fa-regular')
                                document.getElementById('favourite-icon-' + productId).classList.add('fa-solid')
                            }
                        } else {
                            console.log(2)
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
                    console.log(response);
                    if (response.success) {
                        const toastBody = document.querySelector('#liveToast .toast-body');
                        toastBody.textContent = response.message;

                        const toastElement = document.getElementById('liveToast');
                        const toast = new bootstrap.Toast(toastElement);
                        toast.show();

                        // Sevimlilar sonini yangilash
                        $('#compare-count').text(response.compares_count); // Id bo'yicha o'zgarish
                        $('#compare-count2').text(response.compares_count); // Id bo'yicha o'zgarish

                        // Ico'ni yangilash
                        if (response.action === "added") {
                            $('#compare-icon-' + productId).addClass(
                                'active-svg'); // Qo'shilganini ko'rsatish
                        } else {
                            $('#compare-icon-' + productId).removeClass(
                                'hover-svg active-svg'); // O'chirilganini ko'rsatish
                        }
                    }
                },
                error: function(xhr) {
                    alert('Xatolik yuz berdi: ' + xhr.responseText);
                }
            });
        }
    </script>
    {{-- ko'proq ko'rsatish scripti va css --}}
    <style>
        .btn-orange2 {
            background-color: #ff6600;
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            transition: 0.3s;
        }

        .btn-orange2:hover {
            background-color: #e65c00;
        }
        input[type="range"]::-webkit-slider-thumb {
            background: linear-gradient(to right, #FF6600, #FFCC00);
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let hiddenCategories = document.querySelectorAll(".category-item");
            let showMoreBtn = document.getElementById("showMoreBtn");
            let visibleCount = 10; // Boshlang'ich ko'rsatilgan kategoriya soni

            showMoreBtn.addEventListener("click", function() {
                let nextVisibleCount = visibleCount + 10;
                let foundHidden = false;

                hiddenCategories.forEach((item, index) => {
                    if (index >= visibleCount && index < nextVisibleCount) {
                        item.style.display = "block";
                        foundHidden = true;
                    }
                });

                visibleCount = nextVisibleCount;
                if (!foundHidden) {
                    showMoreBtn.style.display = "none";
                }
            });
        });
    </script>
@endsection
