@extends('layouts.page')
<?php
$lang = \Illuminate\Support\Facades\App::getLocale();
$isInCompare = in_array($product->id, session('compares', []));

?>

@section('content')
    <main>
        <div class="mt-4 container d-sm-block d-none">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') /
                    <a href="{{ route('products') }}" class="text-grey fw-bold text-lowercase fs-14">
                        @lang('home.katalog') /
                    </a>
                    <span class="text-dark fw-bold text-lowercase fs-14">{{ $product['name_' . $lang] }}</span>
                </a>
            </div>
        </div>
        <!--Single prodtct  -->
        <div class="container mt-4">
            <div class="container border rounded-3 shadow-sm bg-white">
                <div class="row align-items-center justify-content-between border-bottom">
                    <div class="col-md-9 d-flex align-items-center gap-5 py-3">
                        <a href="{{ url()->previous() }}" class="d-lg-flex d-none align-items-center gap-2">
                            <img width="24px" style="transform: rotate(225deg)" src="/assets/icons/arrow.svg"
                                alt="" />
                            <span>@lang('home.back')</span>
                        </a>
                        <div class="productName text-end fs-24">{{ $product['name_' . $lang] }}
                            {{ $product['color_' . $lang] }}
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-md-end gap-3">
                        <button onclick="toggleCompare({{ $product->id }})"
                            class="w-100 my-md-0 my-2 bg-transparent px-3 justify-content-center py-1 d-flex align-items-center gap-3 border rounded-2">
                            {{-- {!! $isInCompare
                                ? '
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1" y="8" width="3" height="4" fill="#ff6700"/>
                                        <rect x="5" y="1" width="3" height="11" fill="#ff6700"/>
                                        <path d="M9 4.5H12V11.5H9V4.5Z" fill="#ff6700"/>
                                        <path d="M5.1162 0.848046C5.0121 0.893749 4.90546 1.02324 4.88769 1.1248C4.88007 1.17051 4.87753 3.61816 4.88007 6.56855L4.88769 11.9311L4.94101 11.9996C4.96894 12.0377 5.0248 12.0936 5.06288 12.1215C5.13144 12.1748 5.15937 12.1748 6.49999 12.1748C7.84062 12.1748 7.86855 12.1748 7.9371 12.1215C7.97519 12.0936 8.03105 12.0377 8.05898 11.9996L8.1123 11.9311V6.5V1.06894L8.05898 1.00039C8.03105 0.962304 7.97519 0.906445 7.9371 0.878515C7.86855 0.825195 7.83554 0.825195 6.53046 0.820117C5.45644 0.815038 5.17714 0.820117 5.1162 0.848046ZM7.31249 6.5V11.375H6.49999H5.68749V6.5V1.625H6.49999H7.31249V6.5Z" fill="#ff6700"/>
                                        <path d="M9.1787 4.09805C9.0746 4.14375 8.96796 4.27324 8.95019 4.3748C8.94257 4.42051 8.94003 6.13691 8.94257 8.19355C8.95019 11.9209 8.95019 11.9311 9.00351 11.9996C9.03144 12.0377 9.0873 12.0936 9.12538 12.1215C9.19394 12.1748 9.22187 12.1748 10.5625 12.1748C11.9031 12.1748 11.931 12.1748 11.9996 12.1215C12.0377 12.0936 12.0935 12.0377 12.1215 11.9996C12.1748 11.9311 12.1748 11.9285 12.1748 8.125C12.1748 4.32148 12.1748 4.31894 12.1215 4.25039C12.0935 4.2123 12.0377 4.15644 11.9996 4.12852C11.931 4.07519 11.898 4.07519 10.593 4.07012C9.51894 4.06504 9.23964 4.07012 9.1787 4.09805ZM11.375 8.125V11.375H10.5625H9.74999V8.125V4.875H10.5625H11.375V8.125Z" fill="#ff6700"/>
                                        <path d="M1.0537 7.34805C0.949597 7.39375 0.842956 7.52324 0.825183 7.6248C0.817565 7.67051 0.812487 8.65566 0.817565 9.81855C0.825183 11.9057 0.825183 11.9311 0.878503 11.9996C0.906433 12.0377 0.962292 12.0936 1.00038 12.1215C1.06893 12.1748 1.09686 12.1748 2.43749 12.1748C3.77811 12.1748 3.80604 12.1748 3.8746 12.1215C3.91268 12.0936 3.96854 12.0377 3.99647 11.9996C4.04979 11.9311 4.04979 11.9133 4.04979 9.75C4.04979 7.58672 4.04979 7.56895 3.99647 7.50039C3.96854 7.4623 3.91268 7.40645 3.8746 7.37852C3.80604 7.3252 3.77303 7.3252 2.46796 7.32012C1.39393 7.31504 1.11464 7.32012 1.0537 7.34805ZM3.24999 9.75V11.375H2.43749H1.62499V9.75V8.125H2.43749H3.24999V9.75Z" fill="#ff6700"/>
                                    </svg>'
                                : '
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                        viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000" stroke="none">
                                            <path d="M2015 4786 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -982 -3 -2144 l3
                                                -2112 21 -27 c11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566 21
                                                15 11 37 33 48 48 l21 27 0 2139 0 2139 -21 27 c-11 15 -33 37 -48 48 -27 21
                                                -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -2226 l0 -1920 -320 0 -320 0 0
                                                1920 0 1920 320 0 320 0 0 -1920z"/>
                                            <path d="M3615 3506 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -694 -3 -1504 3
                                                -1468 3 -1472 24 -1499 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539
                                                0 566 21 15 11 37 33 48 48 21 27 21 28 21 1526 0 1498 0 1499 -21 1526 -11
                                                15 -33 37 -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -1586
                                                l0 -1280 -320 0 -320 0 0 1280 0 1280 320 0 320 0 0 -1280z"/>
                                            <path d="M415 2226 c-41 -18 -83 -69 -90 -109 -3 -18 -5 -406 -3 -864 3 -822
                                                3 -832 24 -859 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566
                                                21 15 11 37 33 48 48 21 27 21 34 21 886 0 852 0 859 -21 886 -11 15 -33 37
                                                -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -946 l0 -640 -320
                                                0 -320 0 0 640 0 640 320 0 320 0 0 -640z"/>
                                        </g>
                                    </svg>' !!} --}}

                            {{-- <svg id="compare-icon-{{ $product->id }}"
                                class="hover-svg {{ in_array($product->id, session('compares', [])) ? 'active-svg' : '' }}"
                                width="30" height="20" viewBox="0 0 102 92" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                                <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                                <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                                <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                            </svg> --}}

                            <svg id="compare-icon-{{ $product->id }}"
                                class="hover-svg {{ in_array($product->id, session('compares', [])) ? 'active-svg' : '' }}"
                                width="11" height="11" viewBox="0 0 11 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 3.5C8 3.22386 8.22386 3 8.5 3H10.5C10.7761 3 11 3.22386 11 3.5V10.5C11 10.7761 10.7761 11 10.5 11H8.5C8.22386 11 8 10.7761 8 10.5V3.5Z"
                                    fill="#000" />
                                <path
                                    d="M2.5 6H0.5C0.223858 6 0 6.22386 0 6.5V10.5C0 10.7761 0.223858 11 0.5 11H2.5C2.77614 11 3 10.7761 3 10.5V6.5C3 6.22386 2.77614 6 2.5 6Z"
                                    fill="#000" />
                                <path
                                    d="M6.5 0H4.5C4.22386 0 4 0.223858 4 0.5V10.5C4 10.7761 4.22386 11 4.5 11H6.5C6.77614 11 7 10.7761 7 10.5V0.5C7 0.223858 6.77614 0 6.5 0Z"
                                    fill="#000" />
                            </svg>

                            <span class="fs-14">@lang('home.compare')</span>
                        </button>
                        <button onclick="toggleFavourite({{ $product->id }})"
                            class="w-100 my-md-0 my-2 bg-transparent fs-14 px-3 justify-content-center py-1 d-flex align-items-center gap-3 border rounded-2">
                            <i id="favourite-icon-{{ $product->id }}"
                                class="fa-{{ in_array($product->id, session('favorites', [])) ? 'solid' : 'regular' }} {{ in_array($product->id, session('favorites', [])) ? 'text-orange' : '' }} fa-heart"></i>
                            <span class="fs-14">@lang('home.save')</span>
                        </button>
                    </div>
                </div>
                <div class="container p-0">
                    <div class="row">
                        @if (count($images) > 1)
                            <div class="col-lg-1 thumbnail-images p-0 d-lg-block d-none"
                                style="overflow: auto; height: 610px">
                                @foreach ($images as $key => $image)
                                    <button class="border p-0 bg-transparent" type="button"
                                        data-bs-target="#productCarousel" data-bs-slide-to="{{ $key }}"
                                        {{ $key === 0 ? 'aria-current="true"' : '' }}>
                                        <img src="{{ asset('storage/' . $image) }}" alt="Image {{ $key + 1 }}"
                                            class="img-fluid {{ $key === 0 ? 'little_active' : '' }}" />
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        <div class="col-lg-7 pt-5">
                            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if (count($images) > 0)
                                        @foreach ($images as $key => $image)
                                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100"
                                                    alt="Image {{ $key + 1 }}" />
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                class="d-block w-100 h-100" alt="Default Image" />
                                        </div>
                                    @endif
                                </div>

                                <!-- Chapga o'tish va O'ngga o'tish tugmalari faqat ko'rsatiladi agar 1 dan ko'p rasm bo'lsa -->
                                @if (count($images) > 1)
                                    <button class="carousel-control-prev rounded-pill" type="button"
                                        data-bs-target="#productCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">@lang('home.previous')</span>
                                    </button>

                                    <button class="carousel-control-next rounded-pill" type="button"
                                        data-bs-target="#productCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">@lang('home.next')</span>
                                    </button>
                                @endif
                            </div>
                            @if ($product->gift_name_ru)
                                <div class="rounded-2 bg-grey p-4 mx-lg-5 mt-3 d-flex justify-content-between gap-3">
                                    <div class="d-flex gap-3">
                                        <div
                                            class="rounded-pill p-3 bg-orange plus d-flex align-items-center justify-content-center">
                                            <img src="/assets/icons/white-plus.svg" alt="" />
                                        </div>
                                        <div class="">
                                            <div class="d-flex align-items-center text-orange gap-1">
                                                <img src="/assets/icons/orange_gift.svg" alt="" />
                                                <span>@lang('home.gift')</span>
                                            </div>
                                            <div class="fs-14 fw-semibold">{{ $product['gift_name_'.$lang] }}</div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <img width="70px" src="{{ asset('storage/' . $product->gift_image) }}"
                                            alt="" />
                                    </div>
                                </div>
                            @endif
                        </div>


                        <!-- O'ng tarafdagi ma'lumotlar -->
                        <div class="col-lg-4 p-4 border-start">
                            <h6>{{ $product['name_' . $lang] }}</h6>
                            <div class="fs-14">
                                {!! $product['description_' . $lang] !!}
                            </div>

                            @if ($variants->isEmpty() || !$variants->contains('storage', 'null'))
                                <div class="text-grey mb-2 fs-14">@lang('home.memory')</div>
                            @endif
                            <div class="d-flex align-items-center gap-2 mb-3" id="storage-options">

                                @foreach ($variants as $variant)
                                    @if ($variants->isEmpty() || !$variants->contains('storage', 'null'))
                                        <div style="cursor: pointer"
                                            class="fs-12 px-3 py-1 rounded storage-option bg-darkgrey"
                                            data-storage="{{ $variant->storage }}" data-price="{{ $variant->price }}"
                                            data-price-6="{{ $variant->price_6 }}"
                                            data-price-12="{{ $variant->price_12 }}"
                                            data-price-24="{{ $variant->price_24 }}">
                                            {{ $variant->storage }}
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                            @php
                                function formatPrice($price)
                                {
                                    return number_format($price, 0, '.', ' '); // Narxni "1 000 000" formatida chiqarish
                                }
                            @endphp

                            <div class="fs-24 fw-bold mb-2">
                                @if (!empty($variants->first()->discount_price))
                                    {{ number_format((float) $variants->first()->discount_price, 0, ',', ' ') }}
                                @else
                                    {{ number_format((float) $variants->first()->price, 0, ',', ' ') }}
                                @endif
                                <span>UZS</span>
                            </div>

                            <div class="">
                                <div class="text-grey mb-2 fs-14">@lang('home.installments')</div>
                                <div class="text-center justify-content-center mb-3 fs-14 p-1 rounded bg-darkgrey border-orange installment-option"
                                    onclick="selectInstallmentOption(this)">
                                    @lang('home.full_payment')
                                </div>
                                <div class="">
                                    <div class="d-flex gap-2 justify-content-center mb-3 fs-14 p-1 rounded bg-darkgrey price-6 installment-option"
                                        onclick="selectInstallmentOption(this)">
                                        <span class="text-orange">6</span> @lang('home.month') <span
                                            class="text-orange">{{ formatPrice($variants->first()->price_6 ?? 0) }}
                                            UZS</span>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-center mb-3 fs-14 p-1 rounded bg-darkgrey price-12 installment-option"
                                        onclick="selectInstallmentOption(this)">
                                        <span class="text-orange">12</span> @lang('home.month') <span
                                            class="text-orange">{{ formatPrice($variants->first()->price_12 ?? 0) }}
                                            UZS</span>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-center mb-3 fs-14 p-1 rounded bg-darkgrey price-24 installment-option"
                                        onclick="selectInstallmentOption(this)">
                                        <span class="text-orange">24</span> @lang('home.month') <span
                                            class="text-orange">{{ formatPrice($variants->first()->price_24 ?? 0) }}
                                            UZS</span>
                                    </div>
                                </div>
                            </div>


                            <script>
                                function selectInstallmentOption(element) {
                                    // Barcha tanlangan variantlarga "bg-lightorange" va "border-orange" classlarini olib tashlash
                                    var allOptions = document.querySelectorAll('.installment-option');
                                    allOptions.forEach(function(option) {
                                        option.classList.remove('bg-lightorange', 'border-orange');
                                    });

                                    // Tanlangan variantga kerakli classlarni qo'shish
                                    element.classList.add('bg-lightorange', 'border-orange');
                                }
                            </script>

                            <hr />

                            <!-- Other UI elements... -->
                            @php
                                $cheapestVariant = $product->variants->sortBy('price')->first();
                            @endphp

                            <div class="d-flex flex-lg-row flex-column d-block align-items-center gap-3">
                                <button
                                    onclick="addToCart({{ $product->id }}, '{{ $product['name_' . $lang] }}', {{ $cheapestVariant->discount_price ?? $cheapestVariant->price }}, {{ $cheapestVariant->id }})"
                                    class="btn-orange rounded w-100"> @lang('home.basket')</button>
                                <button class="border-0 w-100 bg-darkgrey rounded py-2 px-3" data-bs-toggle="modal"
                                    data-bs-target="#largeModal" data-product-id="{{ $product->id }}"
                                    data-product-name="{{ $product['name_' . $lang] }}"
                                    data-product-price="{{ $cheapestVariant->discount_price ?: $cheapestVariant->price }}"
                                    data-product-image="{{ asset('storage/' . $product->image) }}">
                                    <span>@lang('home.buy_now')</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- product description -->
        <div class="container">
            <div class="border rounded-3 shadow-sm bg-white mt-5 p-md-5 p-3">
                <ul class="nav nav-tabs w-100 overflow-auto" id="aboutProduct" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14 ps-0 active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button" role="tab" aria-controls="description"
                            aria-selected="true">@lang('home.desc')</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="specifications-tab" data-bs-toggle="tab"
                            data-bs-target="#specifications" type="button" role="tab"
                            aria-controls="specifications" aria-selected="false">@lang('home.specifications')</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="installments-tab" data-bs-toggle="tab" data-bs-target="#installments"
                            type="button" role="tab" aria-controls="installments"
                            aria-selected="false">@lang('home.installment')</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab" aria-controls="reviews"
                            aria-selected="false">@lang('home.review')
                            (<span>{{ $product->comments->count() }}</span>)</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14 pe-0" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery"
                            type="button" role="tab" aria-controls="delivery"
                            aria-selected="false">@lang('home.payment')</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="aboutProductContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <div class="pt-3 border-top container">
                            <div class="row align-items-center">
                                @foreach ($descImages as $descImage)
                                    <div class="mt-4 col-lg-4 rounded-2">
                                        <img class="w-100 fit-cover rounded-top"
                                            src="{{ asset('storage/' . $descImage->image) }}" alt="" />
                                        <div class="bg-darkgrey p-4 rounded-bottom">
                                            <h6 class="fw-bold d-none">Интелектуальная система связи</h6>
                                            <div class="fs-sm-14">
                                                {{ $descImage['description_' . $lang] }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                        <div class="pt-3 border-top">
                            <style>
                                li strong::after {
                                    content: '';
                                    flex-grow: 1;
                                    border-bottom: 1px dotted #ccc;
                                    margin-left: 10px;
                                    white-space: nowrap;
                                }
                            </style>
                            <div style="display: flex;  margin-top: 20px;">
                                <div style="width: 100%; word-wrap: break-word; list-style:disc!important;  "
                                    class="str_replace">
                                    {!! str_replace('<br>', '', $product['content_' . $lang]) !!}
                                </div>
                            </div>


                            {{--                            <table class="table mb-0"> --}}
                            {{--                                <thead class="bg-light"> --}}
                            {{--                                <tr> --}}
                            {{--                                    <th class="px-4 fs-14" scope="col">Общая информация</th> --}}
                            {{--                                    <th class="px-4 fs-14" scope="col"></th> --}}
                            {{--                                </tr> --}}
                            {{--                                </thead> --}}
                            {{--                                <tbody> --}}
                            {{--                                <tr> --}}
                            {{--                                    <td class="px-4 text-grey fs-14">Дата выхода на рынок</td> --}}
                            {{--                                    <td class="px-4 fs-14">2024 г.</td> --}}
                            {{--                                </tr> --}}
                            {{--                                <tr> --}}
                            {{--                                    <td class="px-4 text-grey fs-14">Тип</td> --}}
                            {{--                                    <td class="px-4 fs-14">Смартфон</td> --}}
                            {{--                                </tr> --}}
                            {{--                                <tr> --}}
                            {{--                                    <td class="px-4 text-grey fs-14">Операционная система</td> --}}
                            {{--                                    <td class="px-4 fs-14">Android</td> --}}
                            {{--                                </tr> --}}
                            {{--                                <tr> --}}
                            {{--                                    <td class="px-4 text-grey fs-14">RAM</td> --}}
                            {{--                                    <td class="px-4 fs-14">12 GB</td> --}}
                            {{--                                </tr> --}}
                            {{--                                <tr> --}}
                            {{--                                    <td class="px-4 border-0 text-grey fs-14">STORAGE</td> --}}
                            {{--                                    <td class="px-4 border-0 fs-14">256 GB</td> --}}
                            {{--                                </tr> --}}
                            {{--                                </tbody> --}}
                            {{--                            </table> --}}

                        </div>
                    </div>

                    <div class="tab-pane fade" id="installments" role="tabpanel" aria-labelledby="installments-tab">
                        <div class="pt-3 border-top row align-items-start pb-5">
                            <div class="col-lg-6 order-lg-1 order-2 pt-5">
                                @lang('home.inst_desc')
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 pt-5">
                                <img class="w-100" src="/assets/images/5555.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <!-- reviews tab -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="pt-3 border-top">
                            @foreach ($comments as $comment)
                                <div class="mt-4">
                                    <div class="">{{ $comment->name }} {{ $comment->lastname }}</div>
                                    <div class="d-flex align-items-center gap-3 my-2">
                                        <div class="d-flex align-items-center gap-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <img src="{{ asset($i <= $comment->rating ? 'assets/icons/star-orange.svg' : 'assets/icons/star-grey.svg') }}"
                                                    alt="" />
                                            @endfor
                                        </div>
                                        <div style="width: 1px; height: 15px; background-color: #bcc1caff"></div>
                                        <div class="">{{ $comment->created_at->format('d F Y') }}</div>
                                    </div>
                                    <div class="fs-14">{{ $comment->message }}</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-5">
                            <h1 class="fw-normal">@lang('home.testimonials')</h1>

                            <form id="comment-form" action="{{ route('comments.store') }}" method="POST"
                                class="container p-0">
                                @csrf
                                <input type="hidden" id="product-id" name="product_id" value="{{ $product->id }}">

                                <div class="row justify-content-end">
                                    <div class="col-md-12 mb-3">
                                        <label for="rating" class="form-label">@lang('home.rating')</label>
                                        <div id="testimonials" class="rating d-flex justify-content-end">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" name="rating" value="{{ $i }}"
                                                    id="rating-{{ $i }}" required />
                                                <label for="rating-{{ $i }}">☆</label>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="testi_name" class="form-label">@lang('home.name')</label>
                                        <input type="text" class="form-control focus_none bg-grey py-2"
                                            id="testi_name" name="name" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="testi_lastname" class="form-label">@lang('home.lastname')</label>
                                        <input type="text" class="form-control focus_none bg-grey py-2"
                                            id="testi_lastname" name="lastname" required />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="testi_message" class="form-label">@lang('home.comment')</label>
                                        <textarea class="form-control focus_none bg-grey py-2" id="testi_message" name="message" rows="3" required></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit"
                                            class="btn-orange rounded w-100 mb-3 py-3">@lang('home.send')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                        <div class="container pt-3 border-top">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 mt-3 d-none">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="/assets/icons/yandex-logo.png" alt="" />
                                        <h6 class="text-orange mb-0">@lang('home.title_des1')</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        @lang('home.pay_des1')
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="/assets/icons/truck-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">@lang('home.title_des2')</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        @lang('home.pay_des2') </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="/assets/icons/location-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">@lang('home.title_des3')</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        @lang('home.pay_des3')
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="/assets/icons/payment-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">@lang('home.title_des4')</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        @lang('home.pay_des4')
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="/assets/icons/bill-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">@lang('home.title_des5')</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        @lang('home.pay_des5') </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- black banner -->
        <div class="banner py-5 mb-3 mt-5">
            <div class="container">
                <div class="p-4 px-lg-4 px-2">
                    <div class="row gy-5 justify-content-center text-white">
                        <div
                            class="fs-13 col-lg-2 col-md-4 col-6 d-flex flex-md-column flex-row align-items-center text-md-center text-start gap-md-2 gap-3">
                            <img src="/assets/icons/check-icon.svg" alt="" class="wh-65" />
                            <div class=""><span class="fw-bold d-md-block d-none">Xiaomi</span></div>
                            <div>@lang('home.authorized_store')</div>
                        </div>
                        <div
                            class="fs-13 col-lg-2  col-6 d-flex flex-md-column flex-row align-items-center text-md-center text-start gap-md-2 gap-3">
                            <img src="/assets/icons/settings.svg" alt="" class="wh-65" />
                            <div class="">
                                <span class="fw-bold d-md-block d-none">@lang('home.free')</span>
                            </div>
                            <div>@lang('home.device_setup')</div>
                        </div>
                        <div
                            class="fs-13 col-lg-2 col-6 d-flex flex-md-column flex-row align-items-center text-md-center text-start gap-md-2 gap-3">
                            <img src="/assets/icons/shop-icon.svg" alt="" class="wh-65" />
                            <div class=""><span class="fw-bold d-md-block d-none">@lang('home.pickup') </span></div>
                            <div>@lang('home.pickup') @lang('home.and') @lang('home.delivery')</div>
                        </div>
                        <div
                            class="fs-13 col-lg-2  col-6 d-flex flex-md-column flex-row align-items-center text-md-center text-start gap-md-2 gap-3">
                            <img src="/assets/icons/calendar.svg" alt="" class="wh-65" />
                            <div class=""><span class="fw-bold d-md-block d-none">@lang('home.favorable_installment_plan')</span></div>
                            <div>@lang('home.without_prepayment')</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Similar products -->
        <div style="overflow: hidden" class="similarProducts container py-3 mb-5 position-relative">
            <div class="d-flex align-items-center justify-content-between mt-5">
                <div class="mb-4 fs-2 fw-bold">@lang('home.similar_product')</div>
                <div class="">
                    <a href="{{ route('products') }}"
                        class="view_all_btn text-orange border-0 bg-transparent mb-4">@lang('home.smartphonesAll')</a>
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
                </div>
            </div>
            {{--   Product slide start --}}
            <x-page.product.product-slide :productId="$product->id" />

            {{--   Product slide end --}}
            <!-- Navigation buttons (optional) -->
            <div id="product-next" class="swiper-button-next end-0"></div>
            <div id="product-prev" class="swiper-button-prev start-0"></div>
        </div>
        <!-- contact -->
        <x-page.contact />
    </main>

    <div id="overlay"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const storageOptions = document.querySelectorAll('.storage-option');
            const priceDisplay = document.getElementById('price-display');

            function updatePriceAndHighlight(option) {
                const price = option.getAttribute('data-price');

                // Update the price display
                priceDisplay.innerHTML = `${price} <span>UZS</span>`;

                // Reset background color for all options
                storageOptions.forEach(function(opt) {
                    opt.classList.remove('bg-lightorange');
                    opt.classList.add('bg-darkgrey');
                    opt.classList.remove('border-orange');

                });

                option.classList.remove('bg-darkgrey');
                option.classList.add('border-orange');
            }

            // Set the default active storage option (4/256 ГБ)
            updatePriceAndHighlight(storageOptions[0]);

            // Add event listeners to each storage option
            storageOptions.forEach(function(option) {
                option.addEventListener('click', function() {
                    updatePriceAndHighlight(option);
                });
            });
        });

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
    <style>
        .str_replace ul li {
            list-style-type: disc !important;
        }
    </style>
@endsection
