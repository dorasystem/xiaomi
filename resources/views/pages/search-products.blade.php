@extends('layouts.page')
<?php
$lang = app()->getLocale();
$categories = \App\Models\Category::all();
?>
@section('content')
    <main>
        <div class="container mt-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold text-lowercase fs-14">Главная страница / <span
                        class="text-dark">Результаты поиска</span></a>
            </div>
            <hr />
        </div>
        <div class="productHeader bg-grey">
            <div class="container py-5 d-flex align-items-center flex-lg-row flex-column justify-content-between">
                <div class="">
                    <p>Absolutely hot collections 🔥</p>
                    <h2 class="fw-bold fs-1">
                        The Best Place To <br />
                        Find And Buy <br class="d-lg-block d-none" />
                        Amazing <span class="text-orange">Product</span>
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
                            <img class="bottom_product border-orange" src="/assets/images/bottom_product.webp"
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
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseTwo">
                                            Цена
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
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseOne">
                                            Категории
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
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
                            </div>
                            <button type="submit" class="w-100 btn-orange rounded text-center mb-3">Поиск</button>
                            <button class="w-100 text-orange bg-transparent rounded text-center border-orange rounded py-1">
                                <a href="{{ route('products') }}"
                                    class="w-100 text-orange bg-transparent  text-center  py-1">
                                    Сбросить
                                </a>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="container">
                        <div class="d-flex gap-2">
                            <div class="d-lg-none d-block">
                                <button class="btn-orange rounded" type="button" data-bs-toggle="modal"
                                    data-bs-target="#filtermodal">Filter
                                </button>
                                <div class="modal" id="filtermodal" tabindex="-1" aria-labelledby="filtermodalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div style="height: 650px; overflow-y: auto"
                                            class="modal-content d-flex flex-column justify-content-between">
                                            <div class="">
                                                <div class="modal-header position-sticky top-0 bg-white z-3">
                                                    <h2 class="fw-normal">Все фильтры</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapseTwo"
                                                                aria-expanded="true"
                                                                aria-controls="panelsStayOpen-collapseTwo">
                                                                Цена
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapseTwo"
                                                            class="accordion-collapse collapse show pt-3"
                                                            aria-labelledby="panelsStayOpen-headingTwo">
                                                            <div class="accordion-body">
                                                                <div class="range-slider">
                                                                    <div class="inputs">
                                                                        <input type="number" id="minValue2"
                                                                            value="20" min="0"
                                                                            max="600" />
                                                                        <span>до</span>
                                                                        <input type="number" id="maxValue2"
                                                                            value="600" min="0"
                                                                            max="600" />
                                                                    </div>
                                                                    <div class="slider-container">
                                                                        <div class="slider-track2"></div>
                                                                        <input type="range" id="rangeMin2"
                                                                            min="20" max="600"
                                                                            value="20" />
                                                                        <input type="range" id="rangeMax2"
                                                                            min="30" max="600"
                                                                            value="600" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapseOne"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapseOne">
                                                                Категории
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapseOne"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-headingOne">
                                                            <div class="accordion-body">
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="flexCheckChecked" />
                                                                    <label class="form-check-label"
                                                                        for="flexCheckChecked">
                                                                        <small>checkbox</small>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="flexCheckChecked2" />
                                                                    <label class="form-check-label"
                                                                        for="flexCheckChecked2">
                                                                        <small>checkbox</small>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="flexCheckChecked3" />
                                                                    <label class="form-check-label"
                                                                        for="flexCheckChecked3">
                                                                        <small>checkbox</small>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item mb-2">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapseThree"
                                                                aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapseThree">
                                                                Рейтинг
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapseThree"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="panelsStayOpen-headingThree">
                                                            <div class="accordion-body">
                                                                <div class="rating">
                                                                    <input type="radio" name="rating" value="5"
                                                                        id="5" /><label for="5">☆</label>
                                                                    <input type="radio" name="rating" value="4"
                                                                        id="4" /><label for="4">☆</label>
                                                                    <input type="radio" name="rating" value="3"
                                                                        id="3" /><label for="3">☆</label>
                                                                    <input type="radio" name="rating" value="2"
                                                                        id="2" /><label for="2">☆</label>
                                                                    <input type="radio" name="rating" value="1"
                                                                        id="1" /><label for="1">☆</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-3 position-sticky bottom-0 z-3 bg-white">
                                                <button class="w-100 btn-orange rounded text-center mb-3">Поиск</button>
                                                <button
                                                    class="w-100 text-orange bg-transparent rounded text-center border-orange rounded py-1">
                                                    Сбросить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="position-relative w-max d-flex align-items-center justify-content-end justify-content-md-start text-nowrap align-items-center">
                                <div class="">Сортировка:</div>
                                <select class="form-select-sm border-0 bg-transparent pe-4 py-1">
                                    <option class="option" value="populars">По популярности</option>
                                    <option class="option" value="news">Новинки</option>
                                    <option class="option" value="Хиты продаж">Хиты продаж</option>
                                </select>
                                <i id="select-icon"
                                    class="fa-solid fa-angle-down position-absolute end-0 top-50 translate-middle-y pe-2 text-dark"></i>
                            </div>
                        </div>
                        <div class="row pt-3">
                            @foreach ($products as $product)
                                @php
                                    $cheapestVariant = $product->variants->sortBy('price')->first();
                                @endphp
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="product border position-relative rounded">
                                        <a href="{{ route('single.product', $product->slug) }}" class="">
                                            <div
                                                class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                                                <i class="fa-regular fa-heart fs-4 hover-orange ps-1"></i>
                                                <svg class="hover-svg" width="30" height="20"
                                                    viewBox="0 0 102 92" fill="none"
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

                                                    <div class="productName fw-bold">
                                                        {{ \Str::words($product->name_uz, 3) }}
                                                    </div>
                                                    <p class="text-grey">
                                                        {!! \Str::words($product->description_uz, 15) !!}
                                                    </p>

                                                    <div class="d-flex align-items-center justify-content-between w-100">
                                                        <span
                                                            class="small bg-transparent px-0">{{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                                                            UZS <span class="text-orange">за наличные</span></span>
                                                        <span class="px-2 productmonth-border small text-grey">from
                                                            {{ number_format($cheapestVariant->price_12, 0, ',', ' ') }}
                                                            UZS/month</span>
                                                    </div>
                                                    <div class="d-flex gap-4 mt-3">
                                                        <button class="border-orange bg-transparent rounded p-1 px-3">
                                                            <img src="/assets/icons/shopping-cart.svg" alt="" />
                                                        </button>
                                                        <button data-bs-toggle="modal" data-bs-target="#largeModal"
                                                            class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center">
                                                            <span>Купить сразу</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="searchProductBanner text-white rounded-3 my-4 py-lg-4 px-lg-5 p-3">
                <h1 class="text-center">@lang('home.message_title')</h1>
                <p class="text-center">@lang('home.message_title')</p>
                <div class="messageInputs p-4 rounded-4 container">
                    <form class="row align-items-center" action="">
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                            <input class="form-control focus_none py-3" placeholder="@lang('home.message_input1')" type="text" />
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                            <input class="form-control focus_none py-3" placeholder="@lang('home.message_input2')" type="text" />
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                            <input class="form-control focus_none py-3" placeholder="+998 __ ___ ___ ___" type="tel"
                                name="tel" />
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <button class="btn-orange rounded px-5 py-3 w-100" type="submit">@lang('home.send')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
