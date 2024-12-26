@extends('layouts.page')
<?php
$lang = \Illuminate\Support\Facades\App::getLocale();
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
                        <div class="d-lg-flex d-none align-items-center gap-2">
                            <img width="24px" style="transform: rotate(225deg)" src="/assets/icons/arrow.svg"
                                alt="" />
                            <span>@lang('home.back')</span>
                        </div>
                        <div class="productName text-end fs-24">{{ $product['name_' . $lang] }}
                            {{ $product['color_' . $lang] }}
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-md-end gap-3">
                        <button
                            class="w-100 my-md-0 my-2 bg-transparent px-3 justify-content-center py-1 d-flex align-items-center gap-3 border rounded-2">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000"
                                    stroke="none">
                                    <path d="M2015 4786 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -982 -3 -2144 l3
                                                                                    -2112 21 -27 c11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566 21
                                                                                    15 11 37 33 48 48 l21 27 0 2139 0 2139 -21 27 c-11 15 -33 37 -48 48 -27 21
                                                                                    -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -2226 l0 -1920 -320 0 -320 0 0
                                                                                    1920 0 1920 320 0 320 0 0 -1920z" />
                                    <path
                                        d="M3615 3506 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -694 -3 -1504 3
                                                                                    -1468 3 -1472 24 -1499 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539
                                                                                    0 566 21 15 11 37 33 48 48 21 27 21 28 21 1526 0 1498 0 1499 -21 1526 -11
                                                                                    15 -33 37 -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -1586
                                                                                    l0 -1280 -320 0 -320 0 0 1280 0 1280 320 0 320 0 0 -1280z" />
                                    <path
                                        d="M415 2226 c-41 -18 -83 -69 -90 -109 -3 -18 -5 -406 -3 -864 3 -822
                                                                                    3 -832 24 -859 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566
                                                                                    21 15 11 37 33 48 48 21 27 21 34 21 886 0 852 0 859 -21 886 -11 15 -33 37
                                                                                    -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -946 l0 -640 -320
                                                                                    0 -320 0 0 640 0 640 320 0 320 0 0 -640z" />
                                </g>
                            </svg>
                            <span class="fs-14">@lang('home.compare')</span>
                        </button>
                        <button
                            class="w-100 my-md-0 my-2 bg-transparent fs-14 px-3 justify-content-center py-1 d-flex align-items-center gap-3 border rounded-2">
                            <i class="fa-regular fa-heart"></i>
                            <span class="fs-14">@lang('home.save')</span>
                        </button>
                    </div>
                </div>
                <div class="container p-0">
                    <div class="row">
                        <div class="col-lg-1 thumbnail-images p-0 d-lg-block d-none" style="overflow: auto; height: 610px">
                            @foreach ($images as $key => $image)
                                <button class="border p-0 bg-transparent" type="button" data-bs-target="#productCarousel"
                                    data-bs-slide-to="{{ $key }}" {{ $key === 0 ? 'aria-current="true"' : '' }}>
                                    <img src="{{ asset('storage/' . $image) }}" alt="Image {{ $key + 1 }}"
                                        class="img-fluid {{ $key === 0 ? 'little_active' : '' }}" />
                                </button>
                            @endforeach
                        </div>

                        <div class="col-lg-7 pt-5">
                            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($images as $key => $image)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 h-100"
                                                alt="Image {{ $key + 1 }}" />
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Chapga o'tish tugmasi -->
                                <button class="carousel-control-prev rounded-pill" type="button"
                                    data-bs-target="#productCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Oldingi</span>
                                </button>

                                <!-- O'ngga o'tish tugmasi -->
                                <button class="carousel-control-next rounded-pill" type="button"
                                    data-bs-target="#productCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Keyingi</span>
                                </button>
                            </div>
                        </div>

                        <!-- O'ng tarafdagi ma'lumotlar -->
                        <div class="col-lg-4 p-4 border-start">
                            <h6>{{ $product['name_' . $lang] }}</h6>
                            <div class="fs-14">
                                {!! $product['description_' . $lang] !!}
                            </div>

                            <div class="text-grey mb-2 fs-14">@lang('home.memory')</div>
                            <div class="d-flex align-items-center gap-2 mb-3" id="storage-options">
                                @foreach ($variants as $variant)
                                    <div style="cursor: pointer" class="fs-12 px-3 py-1 rounded storage-option bg-darkgrey"
                                        data-storage="{{ $variant->storage }}" data-price="{{ $variant->price }}"
                                        data-price-3="{{ $variant->price_3 }}" data-price-6="{{ $variant->price_6 }}"
                                        data-price-12="{{ $variant->price_12 }}" data-price-24="{{ $variant->price_24 }}">
                                        {{ $variant->storage }}
                                    </div>
                                @endforeach
                            </div>

                            <div class="fs-24 fw-bold mb-2" id="price-display">
                                {{ $variants->first()->price ?? '0' }} <span>UZS</span>
                            </div>
                            <div class="">
                                <div class="text-grey mb-2 fs-14">@lang('home.installments')</div>
                                <div
                                    class="text-center justify-content-center mb-3 fs-14 p-1 rounded bg-lightorange border-orange">
                                    @lang('home.full_payment')
                                </div>
                                <div class="">
                                    <div
                                        class="d-flex gap-2 justify-content-center mb-3 fs-14 p-1 rounded bg-darkgrey price-3">
                                        <span class="text-orange">3</span> @lang('home.month') <span
                                            class="text-orange">{{ $variants->first()->price_3 ?? '0' }} UZS</span>
                                    </div>
                                    <div
                                        class="d-flex gap-2 justify-content-center mb-3 fs-14 p-1 rounded bg-darkgrey price-6">
                                        <span class="text-orange">6</span> @lang('home.month') <span
                                            class="text-orange">{{ $variants->first()->price_6 ?? '0' }} UZS</span>
                                    </div>
                                    <div
                                        class="d-flex gap-2 justify-content-center mb-3 fs-14 p-1 rounded bg-darkgrey price-12">
                                        <span class="text-orange">12</span> @lang('home.month') <span
                                            class="text-orange">{{ $variants->first()->price_12 ?? '0' }} UZS</span>
                                    </div>
                                    <div
                                        class="d-flex gap-2 justify-content-center mb-3 fs-14 p-1 rounded bg-darkgrey price-24">
                                        <span class="text-orange">24</span> @lang('home.month') <span
                                            class="text-orange">{{ $variants->first()->price_24 ?? '0' }} UZS</span>
                                    </div>
                                </div>


                            </div>
                            <hr />

                            <!-- Other UI elements... -->

                            <div class="d-flex flex-lg-row flex-column d-block align-items-center gap-3">
                                <button class="btn-orange rounded w-100"> @lang('home.basket')</button>
                                <button class="border-0 w-100 bg-darkgrey rounded py-2 px-3"> @lang('home.buy_now')</button>
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
                            aria-selected="true">Описание</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="specifications-tab" data-bs-toggle="tab"
                            data-bs-target="#specifications" type="button" role="tab"
                            aria-controls="specifications" aria-selected="false">Характеристики</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="availability-tab" data-bs-toggle="tab" data-bs-target="#availability"
                            type="button" role="tab" aria-controls="availability" aria-selected="false">Наличие в
                            магазинах</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="installments-tab" data-bs-toggle="tab" data-bs-target="#installments"
                            type="button" role="tab" aria-controls="installments" aria-selected="false">Рассрочка и
                            кредит</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab" aria-controls="reviews" aria-selected="false">Отзывы
                            (<span>{{ $product->comments->count() }}</span>)</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14 pe-0" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery"
                            type="button" role="tab" aria-controls="delivery" aria-selected="false">Доставка и
                            оплата</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="aboutProductContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <div class="pt-3 border-top container">
                            <div class="row align-items-center mt-4">
                                <div class="col-md-8">
                                    <img class="w-100 rounded" src="./assets/images/product_des1.png" alt="" />
                                </div>
                                <div class="col-md-4 py-3">
                                    <h6>Металлические корпус</h6>
                                    <div class="fs-14">Корпус смартфона изготовлен из высокопрочного алюминиевого сплава
                                        6M13, что делает его не только практичным, но и стильным.
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png"
                                        alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных
                                            сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png"
                                        alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных
                                            сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png"
                                        alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных
                                            сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-md-4 order-md-1 order-2">
                                    <h6>Металлические корпус</h6>
                                    <div class="fs-14">Корпус смартфона изготовлен из высокопрочного алюминиевого сплава
                                        6M13, что делает его не только практичным, но и стильным.
                                    </div>
                                </div>
                                <div class="col-md-8 order-md-2 order-1">
                                    <img class="w-100 rounded" src="./assets/images/product_des1.png" alt="" />
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png"
                                        alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных
                                            сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png"
                                        alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных
                                            сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png"
                                        alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных
                                            сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
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
                                    {!! str_replace('<br>', '', $product->content_uz) !!}
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
                    <div class="tab-pane fade" id="availability" role="tabpanel" aria-labelledby="availability-tab">
                        <div class="pt-3 border-top">

                            <table class="table tableshop mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="px-4 fs-14" scope="col">Магазин</th>
                                        <th class="px-4 fs-14" scope="col">Адрес</th>
                                        <th class="px-4 fs-14" scope="col">Наличие</th>
                                        <th class="px-4 fs-14" scope="col">Часы работы</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td class="py-lg-4 py-2 px-4 fs-14 fw-bold">Xiomi Store Малика</td>
                                        <td class="py-lg-4 py-2 px-4 fs-14 text-grey">Velit sunt Lorem aliquip ut
                                            consectetur mollit mini
                                        </td>
                                        <td class="py-lg-4 py-2 px-4 fs-14">
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="bg-success rounded-pill circle"></span> с 28 ноября
                                            </div>
                                        </td>
                                        <td class="py-lg-4 py-2 px-4 fs-14">
                                            <div class="">с 10:00 до 20:00</div>
                                            <div class="">Без выходных</div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="py-lg-4 py-2 px-4 fs-14 fw-bold">Xiomi Store Малика</td>
                                        <td class="py-lg-4 py-2 px-4 fs-14 text-grey">Velit sunt Lorem aliquip ut
                                            consectetur mollit mini
                                        </td>
                                        <td class="py-lg-4 py-2 px-4 fs-14">
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="bg-success rounded-pill circle"></span> с 28 ноября
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 fs-14">
                                            <div class="">с 10:00 до 20:00</div>
                                            <div class="">Без выходных</div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="py-lg-4 py-2 px-4 fs-14 fw-bold">Xiomi Store Малика</td>
                                        <td class="py-lg-4 py-2 px-4 fs-14 text-grey">Velit sunt Lorem aliquip ut
                                            consectetur mollit mini
                                        </td>
                                        <td class="py-lg-4 py-2 px-4 fs-14">
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="bg-success rounded-pill circle"></span> с 28 ноября
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 fs-14">
                                            <div class="">с 10:00 до 20:00</div>
                                            <div class="">Без выходных</div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="py-lg-4 py-2 px-4 fs-14 fw-bold">Xiomi Store Малика</td>
                                        <td class="py-lg-4 py-2 px-4 fs-14 text-grey">Velit sunt Lorem aliquip ut
                                            consectetur mollit mini
                                        </td>
                                        <td class="py-lg-4 py-2 px-4 fs-14">
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="bg-success rounded-pill circle"></span> с 28 ноября
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 fs-14">
                                            <div class="">с 10:00 до 20:00</div>
                                            <div class="">Без выходных</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="installments" role="tabpanel" aria-labelledby="installments-tab">
                        <div class="pt-3 border-top row align-items-start pb-5">
                            <div class="col-lg-6 order-lg-1 order-2 pt-5">
                                Покупайте сейчас, платите потом с помощью кредитных программ и рассрочки! Оформите
                                покупку в кредит или рассрочку до 36 месяцев без первого взноса и переплат.
                                <br /><br />
                                Для оформления потребуется всего несколько простых шагов: <br /><br />
                                Выберите понравившийся товар на сумму от 3 000 до 1 000 000 руб. Выберите в корзине
                                способ оплаты "Рассрочка", авторизуйтесь в Сбербанк Онлайн и заполните заявку на
                                рассрочку или кредит Дождитесь рассмотрения заявки банком - это займет несколько минут
                                Если заявка будет одобрена, то деньги будут автоматически перечислены в
                                магазин Заберите заказ удобным для вас способом Кредит предоставляет ПАО «Сбербанк
                                России», генеральная лицензия Банка России на осуществление банковских операций
                                №1481 от 11.08.2015
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 pt-5">
                                <img class="w-100" src="./assets/images/product-installment.png" alt="" />
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
                            <h1 class="fw-normal">Ваша оценка товара</h1>

                            <form id="comment-form" action="{{ route('comments.store') }}" method="POST"
                                class="container p-0">
                                @csrf
                                <input type="hidden" id="product-id" name="product_id" value="{{ $product->id }}">

                                <div class="row justify-content-end">
                                    <div class="col-md-12 mb-3">
                                        <label for="rating" class="form-label">Оценка</label>
                                        <div id="testimonials" class="rating d-flex justify-content-end">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" name="rating" value="{{ $i }}"
                                                    id="rating-{{ $i }}" required />
                                                <label for="rating-{{ $i }}">☆</label>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="testi_name" class="form-label">Имя</label>
                                        <input type="text" class="form-control focus_none bg-grey py-2"
                                            id="testi_name" name="name" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="testi_lastname" class="form-label">Фамилия</label>
                                        <input type="text" class="form-control focus_none bg-grey py-2"
                                            id="testi_lastname" name="lastname" required />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="testi_message" class="form-label">Комментарий</label>
                                        <textarea class="form-control focus_none bg-grey py-2" id="testi_message" name="message" rows="3" required></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" class="btn-orange rounded w-100 mb-3 py-3">Отправить
                                            отзыв
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                        <div class="container pt-3 border-top">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/yandex-logo.png" alt="" />
                                        <h6 class="text-orange mb-0">Яндекс. Доставка за 4 часа</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Срочная доставка осуществляется при онлайн-оплате. заказ будет доставлен в тот
                                        же день, если он был оформлен до 20:00
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/truck-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">Доставка курьером</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Если заказ оформлен до 18:00, доставка курьерской службой по Ташкенту
                                        производится на следующий день при любой сумме заказа. Cтоимость стандартной
                                        доставки
                                        составляет 490 ₽, при заказе на сумму от 10 000 ₽ доставка бесплатна. Стоимость
                                        доставки крупногабаритных товаров указана в карточке товара и корзине.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/location-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">Забрать в магазине</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Забронируйте нужный вам товар в одном из 26 фирменных магазинов Xiaomi. Сразу
                                        после получения подтверждения заказа вы можете оплатить и забрать заказ в
                                        выбранном магазине
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/payment-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">Способы оплаты</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Оплатить заказ можно банковскими картами или наличными накассе магазина или при
                                        получении у курьера. Cчёт выставляется менеджером при подтверждении заказа.
                                        После выставления счёта товар резервируется на 2 дня. В течение этого времени
                                        необходимо оплатить товар и сообщить менеджеру об оплате.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/bill-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">Оплата по счету для юрлиц</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Если вас интересуют закупки для нужд компании, мы можем предложить вам оплату по
                                        счету для юридических лиц. Счёт выставляется менеджером при подтверждении
                                        заказа. После выставления счета товар резервируется на 3 дня. В течение этого
                                        времени необходимо оплатить товар и сообщить менеджеру об оплате
                                    </div>
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
                <div class="d-flex justify-content-between advantages py-4 gap-5">
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <img src="/assets/icons/check-icon.svg" alt="" />
                        <div class="text-center text-nowrap"><span class="fw-bold">Xiaomi</span> <br />@lang('home.authorized_store')
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <img src="/assets/icons/truck-icon.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">@lang('home.delivery')</span> <br />
                            @lang('home.all_over_uzbekistan')
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <img src="/assets/icons/shop-icon.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">@lang('home.pickup')</span> <br />
                            @lang('home.from_the_nearest_store')
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <img src="/assets/icons/calendar.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">@lang('home.favorable_installment_plan')</span> <br />
                            @lang('home.without_prepayment')
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <!-- <img src="./assets/icons/tools.svg" alt="" /> -->
                        <img src="/assets/icons/settings.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">@lang('home.free')</span> <br />
                            @lang('home.device_setup')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Similar products -->
        <div style="overflow: hidden" class="similarProducts container py-3 mb-5 position-relative">
            <div class="d-flex align-items-center justify-content-between mt-5">
                <div class="mb-4 fs-2 fw-bold">@lang('home.similar_product')</div>
                <a href="javascript:void(0)"
                    class="view_all_btn text-orange border-0 bg-transparent mb-4">@lang('home.smartphonesAll')</a>
            </div>
            {{--   Product slide start --}}
            <x-page.product.product-slide />
            {{--   Product slide end --}}
            <!-- Navigation buttons (optional) -->
            <div id="product-next" class="swiper-button-next end-0"></div>
            <div id="product-prev" class="swiper-button-prev start-0"></div>
        </div>
        <!-- contact -->
        <x-page.contact />
    </main>
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const storageOptions = document.querySelectorAll('.storage-option');
            const priceDisplay = document.getElementById('price-display');
            const installmentOptions = {
                3: document.querySelector('.price-3'),
                6: document.querySelector('.price-6'),
                12: document.querySelector('.price-12'),
                24: document.querySelector('.price-24')
            };

            storageOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Tanlangan `storage-option` elementining qiymatlarini o'qing
                    const selectedPrice = this.getAttribute('data-price');
                    const selectedStorage = this.getAttribute('data-storage');

                    // Tanlangan elementni faol qilish
                    storageOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');

                    // Narxni yangilang
                    priceDisplay.innerHTML = `${selectedPrice} <span>сум</span>`;

                    // Bo'lib to'lash qiymatlarini yangilang
                    Object.keys(installmentOptions).forEach(period => {
                        const element = installmentOptions[period];
                        const monthlyPrice = (selectedPrice / period).toFixed(
                            2); // Har oy uchun hisob
                        element.innerHTML =
                            `<span class="text-orange">${period}</span> месяцев от <span class="text-orange">${monthlyPrice} р./мес</span>`;
                    });
                });
            });
        });
    </script>
    <style>
        .str_replace ul li {
            list-style-type: disc !important;
        }
    </style>
@endsection
