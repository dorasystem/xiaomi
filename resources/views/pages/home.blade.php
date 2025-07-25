@extends('layouts.page')
<?php
$lang = \Illuminate\Support\Facades\App::getLocale();

use Illuminate\Support\Str;

use App\Models\Product;
use App\Models\StaticKeyword;
use Illuminate\Support\Facades\App;

$currentLocale = app()->getLocale();
$products = Product::take(3)->get();
$categories = \App\Models\Category::all();
$lang = App::getLocale();

$keywords = StaticKeyword::all();

$language = app()->getLocale();
$translations = [];

foreach ($keywords as $keyword) {
    $translations[$keyword->key] = $keyword->{$language};
}

?>
@section('content')


    <main class="">
        <div class="my-4 text-grey container pt-md-0 pt-1">@lang('home.official')</div>
        <!-- Slider banner -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 position-relative">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <!-- Indicators (optional) -->
                        <div class="carousel-indicators">
                            @foreach ($banner->images[app()->getLocale()] ?? [] as $index => $item)
                                <button type="button" data-bs-target="#carouselExample"
                                        data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>

                        <!-- Carousel inner (slides) -->
                        <div class="carousel-inner rounded">
                            @foreach ($banner->images[app()->getLocale()] ?? [] as $index => $item)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    @php
                                        $productId = $banner->product_ids[app()->getLocale()][$index] ?? null;
                                        $product = $productId ? \App\Models\Product::find($productId) : null;
                                        $productUrl = $product ? route('single.product', $product->slug) : '#';
                                    @endphp
                                    <a href="{{ $productUrl }}">
                                        <img src="{{ asset('storage/' . $item) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>


                        <!-- Carousel controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row headerbanners">
                        <div class="col-sm-6 col-md-12 mt-md-0 mt-4">
                            <div style="background-image: url({{ asset('storage/' . $banner->image1) }});"
                                class="banner1 rounded p-lg-4 p-2 d-flex flex-column justify-content-between align-items-start">
                                <div class="fw-bold">@lang('footer.smartphones')</div>
                                <a href="{{ route('category.sort', ['slug' => $category3->getSlugByLanguage($lang)]) }}"
                                    class="btn-orange rounded px-4 py-1">@lang('home.smartphonesAll')</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 mt-4">
                            <div style="background-image: url({{ asset('storage/' . $banner->image2) }});"
                                class="banner2 rounded p-lg-4 p-2 d-flex flex-column justify-content-between align-items-start">
                                <div class="fw-bold">{{ __('messages.smart_home') }}</div>

                                <a href="{{ route('category.sort', ['slug' => $category37->getSlugByLanguage($lang)]) }}"
                                    class="btn-orange rounded px-4 py-1">@lang('home.smartphonesAll')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products -->
        <div class="container mt-5 p-0">
            <div class="m-0 fs-2 fw-bold container">@lang('home.special_offers')</div>
            <div class="d-lg-flex align-items-center justify-content-between d-block container">
                <div class="col-lg-9 d-flex flex-column gap-4 my-3 align-items-start">
                    <ul class="nav nav-tabs mb-1 overflow-auto w-100" id="myTab" role="tablist"
                        style="white-space: nowrap">
                        <li class="me-3 mb-3" role="presentation">
                            <a class="fs-5 p-2 active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">@lang('home.product_on_sale')</a>
                        </li>
                        <li class="me-3 mb-3" role="presentation">
                            <a class="fs-5 pb-2" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">@lang('home.new_items')</a>
                        </li>

                    </ul>
                </div>
                <div class="my-lg-3 my-0 col-lg-3 d-lg-block d-none text-end">
                    <a href="{{ route('products') }}"
                        class="pb-2 view_all_btn text-orange border-0 bg-transparent mb-4 text-end">@lang('home.smartphonesAll')
                        <svg width="16" height="16" viewBox="0 0 23 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_43_12)">
                                <path
                                    d="M18.176 5.27026L17.4665 5.2797L8.88696 5.59498L8.83354 7.04846L15.6796 6.79436L5.18161 17.2924L6.15388 18.2647L16.6514 7.76716L16.3989 14.6117L17.8523 14.5583L18.1676 5.97869L18.176 5.27026Z"
                                    fill="#ff6700" />
                            </g>
                            <defs>
                                <clipPath id="clip0_43_12">
                                    <rect width="13" height="18.1071" fill="white"
                                        transform="translate(13.752 0.501953) rotate(45)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div style="overflow: hidden" class="productSale container py-3 position-relative">

                        {{--   Product slide start --}}
                        <div class="swiper-wrapper">
                            @foreach ($productsWithoutRandom as $product)
                                @php
                                    $cheapestVariant = $product->variants->sortBy('price')->first();
                                @endphp
                                <div class="swiper-slide product shadow-sm position-relative rounded">
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
                                    <a href="{{ route('single.product', $product->slug) }}" class="">

                                        <img class="w-100 pb-4 productImage p-4"
                                            src="{{ asset('storage/' . $product->image) }}" alt="" />
                                    </a>
                                    <div
                                        class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                                        <div class="d-flex align-items-end justify-content-between gap-3 pt-2">
                                            @if ($cheapestVariant->discount_price)
                                                <div class="fw-bold text-orange">
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
                                        <a class="truncate-text" href="{{ route('single.product', $product->slug) }}">
                                            @php
                                                // Matndan faqat birinchi <p> tegi ichidagi matnni olish
                                                preg_match(
                                                    '/<p[^>]*>(.*?)<\/p>/is',
                                                    $product['description_' . $lang],
                                                    $matches,
                                                );

                                                // Matnni HTML teglaridan tozalash va 4 ta so'zni olish
$description = isset($matches[1])
    ? Str::words(strip_tags($matches[1]), 4, '...')
    : '...';
                                            @endphp

                                            <p class="text-grey">{{ $description }}</p>
                                        </a>
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            @if ($cheapestVariant->price_24 > 0)
                                                <span class="px-2 productmonth-border small text-orange rounded-1">
                                                    {{ number_format($cheapestVariant->price_24, 0, ',', ' ') }}
                                                    UZS/@lang('home.month')
                                                </span>
                                            @endif
                                        </div>

                                        <div class="d-flex gap-4 mt-1">
                                            <a class="border-orange bg-transparent rounded p-1 px-3 add-to-cart-btn"
                                                href="javascript: void(0);" type="button"
                                                onclick="addToCart(this,{{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->discount_price ?? $cheapestVariant->price }}, {{ $cheapestVariant->id }})">
                                                <img src="/assets/icons/shopping-cart.svg" alt="" />
                                            </a>
                                            <button
                                                class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#largeModal"
                                                data-product-id="{{ $product->id }}"
                                                data-product-name="{{ $product['name_' . $lang] }}"
                                                data-product-price="{{ $cheapestVariant->discount_price ?: $cheapestVariant->price }}"
                                                data-product-image="{{ asset('storage/' . $product->image) }}">
                                                <span>@lang('home.buy_now')</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{--   Product slide end --}}

                        <!-- Navigation buttons (optional) -->
                        <div id="products-next" class="swiper-button-next end-0"></div>
                        <div id="products-prev" class="swiper-button-prev start-0"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div style="overflow: hidden" class="newProducts container py-3 position-relative">
                        {{--   Product slide start --}}
                        <div class="swiper-wrapper">
                            @foreach ($newProducts as $product)
                                @php
                                    $cheapestVariant = $product->variants->sortBy('price')->first();
                                @endphp
                                <div class="swiper-slide product shadow-sm position-relative rounded">
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
                                    <a href="{{ route('single.product', $product->slug) }}" class="">

                                        <img class="w-100 pb-4 productImage p-4"
                                            src="{{ asset('storage/' . $product->image) }}" alt="" />
                                    </a>
                                    <div
                                        class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                                        <div class="d-flex align-items-end justify-content-between gap-3 pt-2">
                                            @if ($cheapestVariant->discount_price)
                                                <div class="fw-bold  text-orange">
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
                                        <a class="truncate-text" href="{{ route('single.product', $product->slug) }}">
                                            @php
                                                // Matndan faqat birinchi <p> tegi ichidagi matnni olish
                                                preg_match(
                                                    '/<p[^>]*>(.*?)<\/p>/is',
                                                    $product['description_' . $lang],
                                                    $matches,
                                                );

                                                // Matnni HTML teglaridan tozalash va 4 ta so'zni olish
$description = isset($matches[1])
    ? Str::words(strip_tags($matches[1]), 4, '...')
    : '...';
                                            @endphp

                                            <p class="text-grey">{{ $description }}</p>
                                        </a>
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            @if ($cheapestVariant->price_24 > 0)
                                                <span class="px-2 productmonth-border small text-orange rounded-1">
                                                    {{ number_format($cheapestVariant->price_24, 0, ',', ' ') }}
                                                    UZS/@lang('home.month')
                                                </span>
                                            @endif
                                        </div>

                                        <div class="d-flex gap-4 mt-1">
                                            <a class="border-orange bg-transparent rounded p-1 px-3 add-to-cart-btn"
                                                href="javascript: void(0);" type="button"
                                                onclick="addToCart(this,{{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->discount_price ?? $cheapestVariant->price }}, {{ $cheapestVariant->id }})">
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
                            @endforeach
                        </div>
                        {{--   Product slide end --}}
                        <!-- Navigation buttons (optional) -->
                        <div id="products-next" class="swiper-button-next end-0"></div>
                        <div id="products-prev" class="swiper-button-prev start-0"></div>
                    </div>
                </div>


            </div>
        </div>

        <!-- products you have seen -->
        <div style="overflow: hidden" class="seenProducts container py-3 position-relative">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class=" fs-2 fw-bold">@lang('home.top_products')</div>
                <div class="my-lg-3 my-0 col-lg-3  text-end mx-2 d-md-none d-block">
                    <a href="{{ route('products') }}"
                        class="pb-2 view_all_btn text-orange border-0 bg-transparent mb-4 text-end">@lang('home.smartphonesAll')
                        <svg width="16" height="16" viewBox="0 0 23 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_43_12)">
                                <path
                                    d="M18.176 5.27026L17.4665 5.2797L8.88696 5.59498L8.83354 7.04846L15.6796 6.79436L5.18161 17.2924L6.15388 18.2647L16.6514 7.76716L16.3989 14.6117L17.8523 14.5583L18.1676 5.97869L18.176 5.27026Z"
                                    fill="#ff6700" />
                            </g>
                            <defs>
                                <clipPath id="clip0_43_12">
                                    <rect width="13" height="18.1071" fill="white"
                                        transform="translate(13.752 0.501953) rotate(45)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>

            {{--   Product slide start --}}
            <div class="swiper-wrapper">
                @foreach ($randomProducts as $product)
                    @php
                        $cheapestVariant = $product->variants->sortBy('price')->first();
                    @endphp
                    <div class="swiper-slide product shadow-sm position-relative rounded">
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
                                <div class="productName fw-bold"> {{ \Str::words($product['name_' . $lang]) }}</div>
                            </a>
                            <a class="truncate-text" href="{{ route('single.product', $product->slug) }}">
                                @php
                                    // Matndan faqat birinchi <p> tegi ichidagi matnni olish
                                    preg_match('/<p[^>]*>(.*?)<\/p>/is', $product['description_' . $lang], $matches);

                                    // Matnni HTML teglaridan tozalash va 4 ta so'zni olish
$description = isset($matches[1])
    ? Str::words(strip_tags($matches[1]), 4, '...')
    : '...';
                                @endphp

                                <p class="text-grey">{{ $description }}</p>
                            </a>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                @if ($cheapestVariant->price_24 > 0)
                                    <span class="px-2 productmonth-border small text-orange rounded-1">
                                        {{ number_format($cheapestVariant->price_24, 0, ',', ' ') }}
                                        UZS/@lang('home.month')
                                    </span>
                                @endif
                            </div>

                            <div class="d-flex gap-4 mt-1">
                                <a class="border-orange bg-transparent rounded p-1 px-3 add-to-cart-btn"
                                    href="javascript: void(0);" type="button"
                                    onclick="addToCart(this,{{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->discount_price ?? $cheapestVariant->price }}, {{ $cheapestVariant->id }})">
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
                @endforeach
            </div>
            {{--   Product slide end --}}
            <!-- Navigation buttons (optional) -->
            <div id="product-next" class="swiper-button-next end-0"></div>
            <div id="product-prev" class="swiper-button-prev start-0"></div>

        </div>


        <!-- Our advantages -->

        <div class="banner py-5 my-5">
            <div class="container">
                <h2>@lang('home.our_advantages')</h2>
                <div class="p-4 px-lg-4 px-2">
                    <div class="row gy-5 justify-content-evenly text-white">
                        <div
                            class="fs-13 col-md-3  col-6 d-flex flex-md-column flex-row align-items-center text-md-center text-start gap-md-2 gap-2">
                            <img src="/assets/icons/check-icon.svg" alt="" class="wh-65 ml-sm" />
                            <div class=""><span class="fw-bold d-md-block d-none">Xiaomi</span></div>
                            <div class="ml-sm">@lang('home.authorized_store')</div>
                        </div>
                        <div
                            class="fs-13 col-md-3  col-6 d-flex flex-md-column flex-row align-items-center text-md-center text-start gap-md-2 gap-2">
                            <img src="/assets/icons/settings.svg" alt="" class="wh-65" />
                            <div class="">
                                <span class="fw-bold d-md-block d-none">@lang('home.free')</span>
                            </div>
                            <div>@lang('home.device_setup')</div>
                        </div>
                        <div
                            class="fs-13 col-md-3  col-6 d-flex flex-md-column flex-row align-items-center text-md-center text-start gap-md-2 gap-2">
                            <img src="/assets/icons/shop-icon.svg" alt="" class="wh-65" />
                            <div class=""><span class="fw-bold d-md-block d-none">@lang('home.pickup') </span></div>
                            <div> @lang('home.delivery')</div>
                        </div>
                        <div
                            class="fs-13 col-md-3 col-6 d-flex flex-md-column flex-row align-items-center text-md-center text-start gap-md-2 gap-2">
                            <img src="/assets/icons/calendar.svg" alt="" class="wh-65" />
                            <div class=""><span class="fw-bold d-md-block d-none">@lang('home.favorable_installment_plan')</span></div>
                            <div>@lang('home.without_prepayment')</div>
                        </div>
                    </div>
                </div>

                {{--                <div class="d-flex flex-column gap-3 align-items-center"> --}}
                {{--                    <!-- <img src="./assets/icons/tools.svg" alt="" /> --> --}}
                {{--                    <img src="/assets/icons/truck-icon.svg" alt="" width="65" height="65"/> --}}
                {{--                    <div><span class="fw-bold">@lang('home.delivery')</span><br/>@lang('home.all_over_uzbekistan')</div> --}}
                {{--                </div> --}}



            </div>
        </div>
        <!-- News -->
        <div class="container">
            <div class="fs-2 fw-bold">@lang('footer.news')</div>
            <div class="row mt-3">
                <div class="col-lg-7 pe-lg-5 pe-2 mb-4">
                    <a href="{{ route('single.news', $new->slug) }}"
                        class="newbanner w-100 rounded text-white d-flex flex-column justify-content-between"
                        style="background-image: url('/storage/{{ $new->image ?? '/assets/images/newbanner.png' }}');">
                        <div class="productName fs-5" style="
    text-shadow: 1px 1px black;
">
                            {!! $new['title_' . $lang] ?? 'Сравнение Xiaomi 14T и Xiaomi 14T Pro: Какой <br/> выбрать?' !!}
                        </div>
                        <small class="fw-bold border-top pt-3">
                            {{ \Carbon\Carbon::parse($new->date)->format('d.m.Y') }}</small>
                    </a>
                </div>

                <div class="col-lg-5 d-flex flex-column justify-content-between">
                    <div class="d-flex gap-2">
                        <ul class="nav justify-content-between nav-tabs new-borderbottom mb-2 overflow-auto w-100"
                            id="newTab" role="tablist" style="white-space: nowrap">
                            <div class="d-flex">
                                <li class="pe-3 fs-5" role="presentation">
                                    <a class="pb-2 ps-0 active newtab" id="new-tab" data-bs-toggle="tab"
                                        href="#new" role="tab" aria-controls="home"
                                        aria-selected="true">@lang('home.new_items')</a>
                                </li>
                                <li class="pe-3 fs-5" role="presentation">
                                    <a class="pb-2 newtab" id="popular-tab" data-bs-toggle="tab" href="#popular"
                                        role="tab" aria-controls="profile"
                                        aria-selected="false">@lang('home.popular')</a>
                                </li>
                            </div>
                            <li class="me-3 fs-5 mb-2" role="presentation">
                                <a href="/news"
                                    class="pb-2 view_all_btn text-orange border-0 bg-transparent mb-4 text-end">@lang('home.smartphonesAll')
                                    <svg width="16" height="16" viewBox="0 0 23 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_43_12)">
                                            <path
                                                d="M18.176 5.27026L17.4665 5.2797L8.88696 5.59498L8.83354 7.04846L15.6796 6.79436L5.18161 17.2924L6.15388 18.2647L16.6514 7.76716L16.3989 14.6117L17.8523 14.5583L18.1676 5.97869L18.176 5.27026Z"
                                                fill="#ff6700" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_43_12">
                                                <rect width="13" height="18.1071" fill="white"
                                                    transform="translate(13.752 0.501953) rotate(45)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content mt-4" id="newTabContent">
                        <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
                            @if (!empty($news1 && $news1->count(4)))
                                @foreach ($news1 as $item)
                                    <a href="{{ route('single.news', $item->slug) }}"
                                        class="d-flex align-items-start gap-3 justify-content-between">
                                        <div class="">
                                            <div class="text-grey">
                                                {{ \Carbon\Carbon::parse($item->date)->format('d.m.Y') }}</div>
                                            <h5>{{ $item['title_' . $lang] ?? '' }}
                                            </h5>
                                        </div>
                                        <div class="">
                                            <img class="newImg rounded"
                                                src="{{ asset('storage/' . $item->image) ?? 'https://xiaomistore.md/media/newsxiaomi-14t-and-14t-pro-2.webp' }}"
                                                alt="" />
                                        </div>
                                    </a>
                                    <hr />
                                @endforeach
                            @else
                                <h4>@lang('home.no_other_news')</h4>
                            @endif
                        </div>
                        <div class="tab-pane fade show" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                            @if ($news2 && $news2->count(4))
                                @foreach ($news2 as $item)
                                    <a href="{{ route('single.news', $item->slug) }}" class="d-flex align-items-start gap-3 justify-content-between">
                                        <div class="">
                                            <div class="text-grey">
                                                {{ \Carbon\Carbon::parse($item->date)->format('d.m.Y') }}</div>
                                            <h5>{{ $item['title_' . $lang] }}</h5>
                                        </div>
                                        <div class="">
                                            <img class="newImg rounded" src="{{ asset('storage/' . $item->image) }}"
                                                alt="" />
                                        </div>
                                    </a>
                                    <hr />
                                @endforeach
                            @else
                                <h4>@lang('home.no_other_news')</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category -->
        <div class="container my-5">
            <div class="container text-white d-lg-block d-none">
                <div class="row">
                    <div class="col-lg-4 ps-0">
                        <a href="{{ route('category.sort', ['slug' => $category3->getSlugByLanguage($lang)]) }}">
                            <div style="background-image: url('{{ asset('storage/' . $category3->image) }}')"
                                class="fs-5 rounded category1 p-3 w-100 text-white text-shadow">
                                {{ $category3['name_' . $lang] }}
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="row h-100">
                            <div class="col-12">
                                <a href="{{ route('category.sort', ['slug' => $category5->getSlugByLanguage($lang)]) }}">
                                    <div style="background-image: url('{{ asset('storage/' . $category5->image) }}')"
                                        class="fs-5 p-3 category2 rounded h-95 text-white text-shadow">
                                        {{ $category5['name_' . $lang] }}
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('category.sort', ['slug' => $category4->getSlugByLanguage($lang)]) }}">
                                    <div style="background-image: url('{{ asset('storage/' . $category4->image) }}')"
                                        class="fs-5 p-3 category3 rounded h-100 text-white text-shadow">
                                        {{ $category4['name_' . $lang] }}
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 ps-0">
                                <a href="{{ route('category.sort', ['slug' => $category1->getSlugByLanguage($lang)]) }}">
                                    <div style="background-image: url('{{ asset('storage/' . $category1->image) }}')"
                                        class="fs-5 p-3 category4 rounded h-100 text-white text-shadow">
                                        {{ $category1['name_' . $lang] }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pe-0">
                        <div class="row h-100">
                            <div class="col-lg-6">
                                <a href="{{ route('category.sort', ['slug' => $category6->getSlugByLanguage($lang)]) }}">
                                    <div style="background-image: url('{{ asset('storage/' . $category6->image) }}')"
                                        class="fs-5 p-3 category5 rounded h-100 text-white text-shadow">
                                        {{ $category6['name_' . $lang] }}
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 ps-0">
                                <a href="{{ route('category.sort', ['slug' => $category7->getSlugByLanguage($lang)]) }}">
                                    <div style="background-image: url('{{ asset('storage/' . $category7->image) }}')"
                                        class="fs-5 p-3 category6 rounded h-100 text-white text-shadow">
                                        {{ $category7['name_' . $lang] }}
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('category.sort', ['slug' => $category2->getSlugByLanguage($lang)]) }}">
                                    <div style="background-image: url('{{ asset('storage/' . $category2->image) }}')"
                                        class="fs-5 p-3 mt-3 category7 rounded h-95 text-white text-shadow">
                                        {{ $category2['name_' . $lang] }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="categories d-lg-none d-grid">
                <a style="background-image: url('{{ asset('storage/' . $category3->image) }}')"
                    href="{{ route('category.sort', ['slug' => $category3->getSlugByLanguage($lang)]) }}"
                    class="category1 rounded fs-5 fw-bold p-2 text-white">{{ $category3['name_' . $lang] }}</a>
                <a style="background-image: url('{{ asset('storage/' . $category4->image) }}')"
                    href="{{ route('category.sort', ['slug' => $category4->getSlugByLanguage($lang)]) }}"
                    class="category2 rounded fs-5 fw-bold p-2 text-white">{{ $category4['name_' . $lang] }}</a>
                <a style="background-image: url('{{ asset('storage/' . $category5->image) }}')"
                    href="{{ route('category.sort', ['slug' => $category5->getSlugByLanguage($lang)]) }}"
                    class="category3 rounded fs-5 fw-bold p-2 text-white">{{ $category5['name_' . $lang] }}</a>
                <a style="background-image: url('{{ asset('storage/' . $category1->image) }}')"
                    href="{{ route('category.sort', ['slug' => $category1->getSlugByLanguage($lang)]) }}"
                    class="category4 rounded fs-5 fw-bold p-2 text-white">{{ $category1['name_' . $lang] }}</a>
                <a style="background-image: url('{{ asset('storage/' . $category6->image) }}')"
                    href="{{ route('category.sort', ['slug' => $category6->getSlugByLanguage($lang)]) }}"
                    class="category5 rounded fs-5 fw-bold p-2 text-white">{{ $category6['name_' . $lang] }}</a>
                <a style="background-image: url('{{ asset('storage/' . $category7->image) }}')"
                    href="{{ route('category.sort', ['slug' => $category7->getSlugByLanguage($lang)]) }}"
                    class="category6 rounded fs-5 fw-bold p-2 text-white">{{ $category7['name_' . $lang] }}</a>
                <a style="background-image: url('{{ asset('storage/' . $category2->image) }}')"
                    href="{{ route('category.sort', ['slug' => $category2->getSlugByLanguage($lang)]) }}"
                    class="category7 rounded fs-5 fw-bold p-2 text-white">{{ $category2['name_' . $lang] }}</a>
            </div>
        </div>
        <!-- video obzor -->
        <div class="bg-black text-white pt-4 mt-5">
            <div class="container py-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h1>@lang('home.video_reviews')</h1>

                </div>
                <div class="videoBanner my-2 rounded d-flex align-items-center justify-content-center">
                    <div class="video bg-white rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-play text-orange fs-2"></i>
                    </div>
                </div>

                <div class="ratio ratio-16x9 d-none">
                    <iframe class="rounded" src="{{ $translations['video_reviews'] }}" title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>

                <div class="row mt-5 d-none">
                    <div class="col-lg-7 mb-3">
                        <div class="fs-2">Xiaomi Fan Unboxing | Titan Gray | Xiaomi 14T Pro</div>
                        <hr />
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="text-grey">Длительность: 1 минута Опубликовано 1 октября в 16:52</small>
                            <div class="badge videobutton rounded border-0 text-white p-2 px-3">Xiaomi 14T series</div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-3">
                        <div class="product w-100 rounded bannerProduct p-3">
                            <div class="d-flex align-items-start gap-3">
                                <img width="120px" height="100px" class="fit-cover rounded"
                                    src="/assets/images/videoProductImage.jpg" alt="" />
                                <div class="d-flex flex-column">
                                    <h6 class="text-grey fw-bold">Следующий видео-обзор</h6>
                                    <div class="fw-semibold">Xiaomi Fan Unboxing | Titan Gray</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Contact --}}
        <x-page.contact />
    </main>
    <script>
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
                        const toastBody = document.querySelector('#liveToast .toast-body');
                        toastBody.textContent = response.message;

                        const toastElement = document.getElementById('liveToast');
                        const toast = new bootstrap.Toast(toastElement);
                        toast.show();

                        // Sevimlilar sonini yangilash
                        $('#favorite-count').text(response.favorites_count);
                        $('#favorite-count2').text(response.favorites_count);

                        // Ico'ni yangilash
                        if (response.action === "added") {
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
                    console.log(response)
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
                            console.log(1);
                            $('#compare-icon-' + productId).addClass(
                                'active-svg'); // Qo'shilganini ko'rsatish
                        } else {
                            console.log(2);
                            $('#compare-icon-' + productId).removeClass('hover-svg active-svg');// O'chirilganini ko'rsatish
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
