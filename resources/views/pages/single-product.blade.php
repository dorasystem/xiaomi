@extends('layouts.page')

@section('content')
    <main>
        <div class="mt-4 container d-sm-block d-none">
            <div class="d-flex align-items-center gap-3">
                <a href="./index.html" class="text-grey fw-bold text-lowercase fs-14"
                >Главная страница / <a href="./product-list.html" class="text-grey fw-bold text-lowercase fs-14">Телефоны /</a>
                    <span class="text-dark fw-bold text-lowercase fs-14">Xiaomi 14T 12/256 Gb Titan Gray</span></a
                >
            </div>
        </div>

        <!--Single prodtct  -->
        <div class="container mt-4">
            <div class="container border rounded-3 shadow-sm bg-white">
                <div class="row align-items-center justify-content-between border-bottom">
                    <div class="col-md-9 d-flex align-items-center gap-5 py-3">
                        <div class="d-lg-flex d-none align-items-center gap-2">
                            <img width="24px" style="transform: rotate(225deg)" src="./assets/icons/arrow.svg" alt="" />
                            <span>Назад</span>
                        </div>
                        <div class="productName text-end fs-24">Xiaomi 14T 12/256 Gb Titan Gray</div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-md-end gap-3">
                        <button class="w-100 my-md-0 my-2 bg-transparent px-3 justify-content-center py-1 d-flex align-items-center gap-3 border rounded-2">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000" stroke="none">
                                    <path
                                        d="M2015 4786 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -982 -3 -2144 l3
                                                -2112 21 -27 c11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566 21
                                                15 11 37 33 48 48 l21 27 0 2139 0 2139 -21 27 c-11 15 -33 37 -48 48 -27 21
                                                -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -2226 l0 -1920 -320 0 -320 0 0
                                                1920 0 1920 320 0 320 0 0 -1920z"
                                    />
                                    <path
                                        d="M3615 3506 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -694 -3 -1504 3
                                                -1468 3 -1472 24 -1499 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539
                                                0 566 21 15 11 37 33 48 48 21 27 21 28 21 1526 0 1498 0 1499 -21 1526 -11
                                                15 -33 37 -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -1586
                                                l0 -1280 -320 0 -320 0 0 1280 0 1280 320 0 320 0 0 -1280z"
                                    />
                                    <path
                                        d="M415 2226 c-41 -18 -83 -69 -90 -109 -3 -18 -5 -406 -3 -864 3 -822
                                                3 -832 24 -859 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566
                                                21 15 11 37 33 48 48 21 27 21 34 21 886 0 852 0 859 -21 886 -11 15 -33 37
                                                -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -946 l0 -640 -320
                                                0 -320 0 0 640 0 640 320 0 320 0 0 -640z"
                                    />
                                </g>
                            </svg>
                            <span class="fs-14">Сравнить</span>
                        </button>
                        <button class="w-100 my-md-0 my-2 bg-transparent fs-14 px-3 justify-content-center py-1 d-flex align-items-center gap-3 border rounded-2">
                            <i class="fa-regular fa-heart"></i>
                            <span class="fs-14">Сохранить</span>
                        </button>
                    </div>
                </div>
                <div class="container p-0">
                    <div class="row">
                        <!-- Kichik rasmlar -->
                        <div class="col-lg-1 thumbnail-images p-0 d-lg-block d-none">
                            <button class="border p-0 bg-transparent" type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" aria-current="true">
                                <img src="./assets/images/product_1.webp" alt="Image 1" class="img-fluid little_active" />
                            </button>
                            <button class="border p-0 bg-transparent" type="button" data-bs-target="#productCarousel" data-bs-slide-to="1">
                                <img src="./assets/images/product_2.webp" alt="Image 2" class="img-fluid" />
                            </button>
                            <button class="border p-0 bg-transparent" type="button" data-bs-target="#productCarousel" data-bs-slide-to="2">
                                <img src="./assets/images/product_3.webp" alt="Image 3" class="img-fluid" />
                            </button>
                            <button class="border p-0 bg-transparent" type="button" data-bs-target="#productCarousel" data-bs-slide-to="3">
                                <img src="./assets/images/product_4.webp" alt="Image 4" class="img-fluid" />
                            </button>
                        </div>

                        <!-- Katta rasm va o'q tugmalari -->
                        <div class="col-lg-7 pt-5">
                            <div id="productCarousel" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="./assets/images/product_1.webp" class="d-block w-100" alt="Image 1" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/images/product_2.webp" class="d-block w-100" alt="Image 2" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/images/product_3.webp" class="d-block w-100" alt="Image 3" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/images/product_4.webp" class="d-block w-100" alt="Image 4" />
                                    </div>
                                </div>

                                <!-- Chapga o'tish tugmasi -->
                                <button class="carousel-control-prev rounded-pill" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Oldingi</span>
                                </button>

                                <!-- O'ngga o'tish tugmasi -->
                                <button class="carousel-control-next rounded-pill" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Keyingi</span>
                                </button>
                            </div>
                            <div class="rounded-2 bg-grey p-4 mx-lg-5 d-flex justify-content-between gap-3">
                                <div class="d-flex gap-3">
                                    <div class="rounded-pill p-3 bg-orange plus d-flex align-items-center justify-content-center">
                                        <img src="./assets/icons/white-plus.svg" alt="" />
                                    </div>
                                    <div class="">
                                        <div class="d-flex align-items-center text-orange gap-1">
                                            <img src="./assets/icons/orange_gift.svg" alt="" />
                                            <span>Подарок</span>
                                        </div>
                                        <div class="fs-14 fw-semibold">Фитнес браслет Xiomi Smart Band 9</div>
                                    </div>
                                </div>
                                <div class="">
                                    <img width="70px" src="./assets/images/category_phone.webp" alt="" />
                                </div>
                            </div>
                        </div>

                        <!-- O'ng tarafdagi ma'lumotlar -->
                        <div class="col-lg-4 p-4 border-start">
                            <div class="text-grey my-1">Код товара : MI000025007</div>
                            <h6>Xiaomi 14T 12/256 Gb Titan Gray</h6>
                            <div class="fs-14">
                                Non aute minim enim commodo ad in. Consectetur velit amet laboris ea culpa minim irure. Elit amet eiusmod exercitation fugiat in ad ad proident ea proident sunt
                                culpa quis ad velit magna sunt. Minim excepteur ipsum non in ullamco sit mollit ex amet velit et tempor in. Ex elit
                            </div>
                            <div class="my-3 d-flex align-items-center gap-3 text-orange">
                                Читать дальше
                                <img src="./assets/icons/arrow-orange.svg" alt="" />
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-2">
                                <div class="text-grey fs-14">Выбранный цвет</div>
                                <div class="blue text-white rounded px-3 py-1 fs-14">Синий</div>
                            </div>
                            <div class="productsColor d-flex align-items-center mb-4 pb-2 gap-3 py-3">
                                <div class="border-orange rounded p-2 bg-lightorange">
                                    <img width="60px" src="./assets/images/product_1.webp" alt="" />
                                </div>
                                <div class="border-grey rounded p-2">
                                    <img width="60px" src="./assets/images/product_1.webp" alt="" />
                                </div>
                                <div class="border-grey rounded p-2">
                                    <img width="60px" src="./assets/images/product_1.webp" alt="" />
                                </div>
                                <div class="border-grey rounded p-2">
                                    <img width="60px" src="./assets/images/product_1.webp" alt="" />
                                </div>
                                <div class="border-grey rounded p-2">
                                    <img width="60px" src="./assets/images/product_1.webp" alt="" />
                                </div>
                            </div>
                            <div class="text-grey mb-2 fs-14">Объем памяти</div>
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="fs-12 px-3 py-1 rounded border-orange rouonded bg-lightorange">256 ГБ</div>
                                <div class="fs-12 px-3 py-1 rounded bg-darkgrey">256 ГБ</div>
                            </div>
                            <div class="text-grey mb-2 fs-14">RAM</div>
                            <div class="d-flex align-items-center gap-2 border-bottom pb-3 mb-2">
                                <div class="fs-12 px-3 py-1 rounded border-orange rouonded bg-lightorange">12 ГБ</div>
                                <div class="fs-12 px-3 py-1 rounded bg-darkgrey">8 ГБ</div>
                            </div>
                            <div class="fs-24 fw-bold mb-2">1 000 000 <span>сум</span></div>
                            <div class="fs-14 text-grey mb-2">Вы можете выбрать рассрочку на срок от 6 до 24 месяцев при оформлении заказа</div>
                            <div class="rounded bg-darkgrey py-2 px-3 mb-3 d-flex flex-wrap justify-content-between">
                                <div class="d-flex flex-wrap align-items-center gap-sm-4 gap-2">
                                    <span class="text-nowrap">В рассрочку</span>
                                    <div class="bg-orange text-nowrap text-white rounded px-1">100 000 сум</div>
                                    <span class="text-nowrap">24/ мес. </span>
                                </div>
                                <div type="button" class="" data-bs-toggle="tooltip" title="Tooltip text here">
                                    <img src="./assets/icons/question.svg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex flex-lg-row flex-column d-block align-items-center gap-3">
                                <button class="btn-orange rounded w-100">В корзину</button>
                                <button class="border-0 w-100 bg-darkgrey rounded py-2 px-3">Купить в один клик</button>
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
                        <a
                            class="py-2 fs-14 ps-0 active"
                            id="description-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#description"
                            type="button"
                            role="tab"
                            aria-controls="description"
                            aria-selected="true"
                        >Описание</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                            class="py-2 fs-14"
                            id="specifications-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#specifications"
                            type="button"
                            role="tab"
                            aria-controls="specifications"
                            aria-selected="false"
                        >Характеристики</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="availability-tab" data-bs-toggle="tab" data-bs-target="#availability" type="button" role="tab" aria-controls="availability" aria-selected="false"
                        >Наличие в магазинах</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="installments-tab" data-bs-toggle="tab" data-bs-target="#installments" type="button" role="tab" aria-controls="installments" aria-selected="false"
                        >Рассрочка и кредит</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false"
                        >Отзывы (<span>3</span>)</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="py-2 fs-14 pe-0" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="delivery" aria-selected="false"
                        >Доставка и оплата</a
                        >
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="aboutProductContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="pt-3 border-top container">
                            <div class="row align-items-center mt-4">
                                <div class="col-md-8">
                                    <img class="w-100 rounded" src="./assets/images/product_des1.png" alt="" />
                                </div>
                                <div class="col-md-4 py-3">
                                    <h6>Металлические корпус</h6>
                                    <div class="fs-14">Корпус смартфона изготовлен из высокопрочного алюминиевого сплава 6M13, что делает его не только практичным, но и стильным.</div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png" alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png" alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png" alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-md-4 order-md-1 order-2">
                                    <h6>Металлические корпус</h6>
                                    <div class="fs-14">Корпус смартфона изготовлен из высокопрочного алюминиевого сплава 6M13, что делает его не только практичным, но и стильным.</div>
                                </div>
                                <div class="col-md-8 order-md-2 order-1">
                                    <img class="w-100 rounded" src="./assets/images/product_des1.png" alt="" />
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png" alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png" alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-lg-4 rounded-2">
                                    <img class="w-100 fit-cover rounded-top" src="./assets/images/product_des2.png" alt="" />
                                    <div class="bg-darkgrey p-4 rounded-bottom">
                                        <h6 class="fw-bold">Интелектуальная система связи</h6>
                                        <div class="fs-sm-14">
                                            Интеллектуальная система связи Al, оптимизированная для 16 различных сценариев использования, в сочетании с эффективным расположением антенн
                                            обеспечивает повышение производительности сети в играх.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                        <div class="pt-3 border-top">
                            <table class="table mb-0">
                                <thead class="bg-light">
                                <tr>
                                    <th class="px-4 fs-14" scope="col">Общая информация</th>
                                    <th class="px-4 fs-14" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Дата выхода на рынок</td>
                                    <td class="px-4 fs-14">2024 г.</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Тип</td>
                                    <td class="px-4 fs-14">Смартфон</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Операционная система</td>
                                    <td class="px-4 fs-14">Android</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Тип</td>
                                    <td class="px-4 fs-14">Смартфон</td>
                                </tr>
                                <tr>
                                    <td class="px-4 border-0 text-grey fs-14">Операционная система</td>
                                    <td class="px-4 border-0 fs-14">Android</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table mb-0">
                                <thead class="bg-light">
                                <tr>
                                    <th class="px-4 fs-14" scope="col">Общая информация</th>
                                    <th class="px-4 fs-14" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Дата выхода на рынок</td>
                                    <td class="px-4 fs-14">2024 г.</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Тип</td>
                                    <td class="px-4 fs-14">Смартфон</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Операционная система</td>
                                    <td class="px-4 fs-14">Android</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Тип</td>
                                    <td class="px-4 fs-14">Смартфон</td>
                                </tr>
                                <tr>
                                    <td class="px-4 border-0 text-grey fs-14">Операционная система</td>
                                    <td class="px-4 border-0 fs-14">Android</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table mb-0">
                                <thead class="bg-light">
                                <tr>
                                    <th class="px-4 fs-14" scope="col">Общая информация</th>
                                    <th class="px-4 fs-14" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Дата выхода на рынок</td>
                                    <td class="px-4 fs-14">2024 г.</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Тип</td>
                                    <td class="px-4 fs-14">Смартфон</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Операционная система</td>
                                    <td class="px-4 fs-14">Android</td>
                                </tr>
                                <tr>
                                    <td class="px-4 text-grey fs-14">Тип</td>
                                    <td class="px-4 fs-14">Смартфон</td>
                                </tr>
                                <tr>
                                    <td class="px-4 border-0 text-grey fs-14">Операционная система</td>
                                    <td class="px-4 border-0 fs-14">Android</td>
                                </tr>
                                </tbody>
                            </table>
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
                                    <td class="py-lg-4 py-2 px-4 fs-14 text-grey">Velit sunt Lorem aliquip ut consectetur mollit mini</td>
                                    <td class="py-lg-4 py-2 px-4 fs-14">
                                        <div class="d-flex align-items-center gap-2"><span class="bg-success rounded-pill circle"></span> с 28 ноября</div>
                                    </td>
                                    <td class="py-lg-4 py-2 px-4 fs-14">
                                        <div class="">с 10:00 до 20:00</div>
                                        <div class="">Без выходных</div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="py-lg-4 py-2 px-4 fs-14 fw-bold">Xiomi Store Малика</td>
                                    <td class="py-lg-4 py-2 px-4 fs-14 text-grey">Velit sunt Lorem aliquip ut consectetur mollit mini</td>
                                    <td class="py-lg-4 py-2 px-4 fs-14">
                                        <div class="d-flex align-items-center gap-2"><span class="bg-success rounded-pill circle"></span> с 28 ноября</div>
                                    </td>
                                    <td class="py-3 px-4 fs-14">
                                        <div class="">с 10:00 до 20:00</div>
                                        <div class="">Без выходных</div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="py-lg-4 py-2 px-4 fs-14 fw-bold">Xiomi Store Малика</td>
                                    <td class="py-lg-4 py-2 px-4 fs-14 text-grey">Velit sunt Lorem aliquip ut consectetur mollit mini</td>
                                    <td class="py-lg-4 py-2 px-4 fs-14">
                                        <div class="d-flex align-items-center gap-2"><span class="bg-success rounded-pill circle"></span> с 28 ноября</div>
                                    </td>
                                    <td class="py-3 px-4 fs-14">
                                        <div class="">с 10:00 до 20:00</div>
                                        <div class="">Без выходных</div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="py-lg-4 py-2 px-4 fs-14 fw-bold">Xiomi Store Малика</td>
                                    <td class="py-lg-4 py-2 px-4 fs-14 text-grey">Velit sunt Lorem aliquip ut consectetur mollit mini</td>
                                    <td class="py-lg-4 py-2 px-4 fs-14">
                                        <div class="d-flex align-items-center gap-2"><span class="bg-success rounded-pill circle"></span> с 28 ноября</div>
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
                                Покупайте сейчас, платите потом с помощью кредитных программ и рассрочки! Оформите покупку в кредит или рассрочку до 36 месяцев без первого взноса и переплат.
                                <br /><br />
                                Для оформления потребуется всего несколько простых шагов: <br /><br />
                                Выберите понравившийся товар на сумму от 3 000 до 1 000 000 руб. Выберите в корзине способ оплаты "Рассрочка", авторизуйтесь в Сбербанк Онлайн и заполните заявку на
                                рассрочку или кредит Дождитесь рассмотрения заявки банком - это займет несколько минут Если заявка будет одобрена, то деньги будут автоматически перечислены в
                                магазин Заберите заказ удобным для вас способом Кредит предоставляет ПАО «Сбербанк России», генеральная лицензия Банка России на осуществление банковских операций
                                №1481 от 11.08.2015
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 pt-5">
                                <img class="w-100" src="./assets/images/product-installment.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="pt-3 border-top">
                            <div class="mt-4">
                                <div class="">Test Testov</div>
                                <div class="d-flex align-items-center gap-3 my-2">
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-grey.svg" alt="" />
                                    </div>
                                    <div style="width: 1px; height: 15px; background-color: #bcc1caff" class=""></div>
                                    <div class="">25 ноября 2024</div>
                                </div>
                                <div class="fs-14">
                                    Приобрел смартфон около месяца назад. До этого пользовался телефоном от другого бренда, но не пожалел, что сменил. Особенно поразила камера: фотографии
                                    получаются четкими и яркими. Дисплей с хорошей видимостью на солнце. Заряд держится долго. По соотношению «цена–качество» для меня лучшая модель.
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="">Test Testov</div>
                                <div class="d-flex align-items-center gap-3 my-2">
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-grey.svg" alt="" />
                                    </div>
                                    <div style="width: 1px; height: 15px; background-color: #bcc1caff" class=""></div>
                                    <div class="">25 ноября 2024</div>
                                </div>
                                <div class="fs-14">
                                    Приобрел смартфон около месяца назад. До этого пользовался телефоном от другого бренда, но не пожалел, что сменил. Особенно поразила камера: фотографии
                                    получаются четкими и яркими. Дисплей с хорошей видимостью на солнце. Заряд держится долго. По соотношению «цена–качество» для меня лучшая модель.
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="">Test Testov</div>
                                <div class="d-flex align-items-center gap-3 my-2">
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-orange.svg" alt="" />
                                        <img src="./assets/icons/star-grey.svg" alt="" />
                                    </div>
                                    <div style="width: 1px; height: 15px; background-color: #bcc1caff" class=""></div>
                                    <div class="">25 ноября 2024</div>
                                </div>
                                <div class="fs-14">
                                    Приобрел смартфон около месяца назад. До этого пользовался телефоном от другого бренда, но не пожалел, что сменил. Особенно поразила камера: фотографии
                                    получаются четкими и яркими. Дисплей с хорошей видимостью на солнце. Заряд держится долго. По соотношению «цена–качество» для меня лучшая модель.
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h1 class="fw-normal">Ваша оценка товара</h1>
                            <div class="d-flex align-items-center gap-2 my-3">
                                <div class="">Оценка</div>
                                <div id="testimonials" class="rating">
                                    <input type="radio" name="testimonials" value="5" id="5" /><label for="5">☆</label> <input type="radio" name="testimonials" value="4" id="4" /><label for="4"
                                    >☆</label
                                    >
                                    <input type="radio" name="testimonials" value="3" id="3" /><label for="3">☆</label> <input type="radio" name="testimonials" value="2" id="2" /><label for="2"
                                    >☆</label
                                    >
                                    <input type="radio" name="testimonials" value="1" id="1" /><label for="1">☆</label>
                                </div>
                            </div>

                            <form class="container p-0">
                                <div class="row justify-content-end">
                                    <div class="col-md-6 mb-3">
                                        <label for="testi_name" class="form-label">Имя</label>
                                        <input type="text" class="form-control focus_none bg-grey py-2" id="testi_name" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="testi_lastname" class="form-label">Фамилия</label>
                                        <input type="text" class="form-control focus_none bg-grey py-2" id="testi_lastname" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="testi_message" class="form-label">Комментарий</label>
                                        <textarea class="form-control focus_none bg-grey py-2" id="testi_message" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn-orange rounded w-100 mb-3 py-3">Отправить отзыв</button>
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
                                        Срочная доставка осуществляется при онлайн-оплате. заказ будет доставлен в тот же день, если он был оформлен до 20:00
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/truck-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">Доставка курьером</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Если заказ оформлен до 18:00, доставка курьерской службой по Ташкенту производится на следующий день при любой сумме заказа. Cтоимость стандартной доставки
                                        составляет 490 ₽, при заказе на сумму от 10 000 ₽ доставка бесплатна. Стоимость доставки крупногабаритных товаров указана в карточке товара и корзине.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/location-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">Забрать в магазине</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Забронируйте нужный вам товар в одном из 26 фирменных магазинов Xiaomi. Сразу после получения подтверждения заказа вы можете оплатить и забрать заказ в
                                        выбранном магазине
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/payment-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">Способы оплаты</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Оплатить заказ можно банковскими картами или наличными накассе магазина или при получении у курьера. Cчёт выставляется менеджером при подтверждении заказа.
                                        После выставления счёта товар резервируется на 2 дня. В течение этого времени необходимо оплатить товар и сообщить менеджеру об оплате.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 mt-3">
                                    <div class="d-flex align-items-center gap-1 mb-3">
                                        <img width="30px" src="./assets/icons/bill-logo.svg" alt="" />
                                        <h6 class="text-orange mb-0">Оплата по счету для юрлиц</h6>
                                    </div>
                                    <div class="fs-14 mt-2 text-history fw-normal lh-22">
                                        Если вас интересуют закупки для нужд компании, мы можем предложить вам оплату по счету для юридических лиц. Счёт выставляется менеджером при подтверждении
                                        заказа. После выставления счета товар резервируется на 3 дня. В течение этого времени необходимо оплатить товар и сообщить менеджеру об оплате
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
                        <img src="./assets/icons/check-icon.svg" alt="" />
                        <div class="text-center text-nowrap"><span class="fw-bold">Xiaomi</span> <br />Авторизованный магазин</div>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <img src="./assets/icons/truck-icon.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">Доставка</span> <br />
                            по всему Узбекистану
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <img src="./assets/icons/shop-icon.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">Самовывоз</span> <br />
                            из ближайшего магазина
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <img src="./assets/icons/calendar.svg" alt="" />

                        <div class="text-center text-nowrap">
                            <span class="fw-bold">Выгодная рассрочка</span> <br />
                            без предоплаты
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <!-- <img src="./assets/icons/tools.svg" alt="" /> -->
                        <img src="./assets/icons/settings.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">Бесплатная</span> <br />
                            настройка устройства
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Similar products -->
        <div style="overflow: hidden" class="similarProducts container py-3 mb-5 position-relative">
            <div class="d-flex align-items-center justify-content-between mt-5">
                <div class="mb-4 fs-2 fw-bold">Похожие товары</div>
                <a href="javascript:void(0)" class="view_all_btn text-orange border-0 bg-transparent mb-4">Смотреть все</a>
            </div>
            <div class="swiper-wrapper">
                <div class="swiper-slide product shadow-sm position-relative rounded">
                    <a href="javascript:void(0)" class=" ">
                        <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                            <i class="fa-regular fa-heart fs-4 hover-orange ps-1"></i>
                            <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="11" height="92" rx="2" fill="#000" />
                                <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                                <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                                <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                                <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                            </svg>
                        </div>
                        <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_tv.webp" alt="" />
                        <div class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                            <div class="d-flex align-items-end gap-3 pt-2">
                                <div class="fw-bold">5 300 000 UZS</div>
                                <del class="text-grey">
                                    <small>3 300 000 UZS</small>
                                </del>
                            </div>
                            <div class="productName fw-bold">Телевизоры Xiaomi</div>
                            <p class="text-grey">Cupidatat veniam ad officia cupidatat sit esse ex esse. Commodo culpa incididunt duis cillu</p>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span class="small bg-transparent px-0">490.000 UZS <span class="text-orange">за наличные</span></span>
                                <span class="px-2 productmonth-border small text-grey">from 500 UZS/month</span>
                            </div>

                            <div class="d-flex gap-4 mt-3">
                                <button class="border-orange bg-transparent rounded p-1 px-3">
                                    <img src="./assets/icons/shopping-cart.svg" alt="" />
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#largeModal" class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center">
                                    <span>Купить сразу</span>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide product shadow-sm position-relative rounded">
                    <a href="javascript:void(0)" class=" ">
                        <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                            <i class="fa-regular fa-heart fs-4 hover-orange ps-1"></i>
                            <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="11" height="92" rx="2" fill="#000" />
                                <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                                <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                                <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                                <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                            </svg>
                        </div>
                        <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_tv.webp" alt="" />
                        <div class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                            <div class="d-flex align-items-end gap-3 pt-2">
                                <div class="fw-bold">5 300 000 UZS</div>
                                <del class="text-grey">
                                    <small>3 300 000 UZS</small>
                                </del>
                            </div>
                            <div class="productName fw-bold">Телевизоры Xiaomi</div>
                            <p class="text-grey">Cupidatat veniam ad officia cupidatat sit esse ex esse. Commodo culpa incididunt duis cillu</p>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span class="small bg-transparent px-0">490.000 UZS <span class="text-orange">за наличные</span></span>
                                <span class="px-2 productmonth-border small text-grey">from 500 UZS/month</span>
                            </div>

                            <div class="d-flex gap-4 mt-3">
                                <button class="border-orange bg-transparent rounded p-1 px-3">
                                    <img src="./assets/icons/shopping-cart.svg" alt="" />
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#largeModal" class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center">
                                    <span>Купить сразу</span>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide product shadow-sm position-relative rounded">
                    <a href="javascript:void(0)" class=" ">
                        <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                            <i class="fa-regular fa-heart fs-4 hover-orange ps-1"></i>
                            <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="11" height="92" rx="2" fill="#000" />
                                <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                                <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                                <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                                <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                            </svg>
                        </div>

                        <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_tv.webp" alt="" />
                        <div class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                            <div class="d-flex align-items-end gap-3 pt-2">
                                <div class="fw-bold">5 300 000 UZS</div>
                                <del class="text-grey">
                                    <small>3 300 000 UZS</small>
                                </del>
                            </div>
                            <div class="productName fw-bold">Телевизоры Xiaomi</div>
                            <p class="text-grey">Cupidatat veniam ad officia cupidatat sit esse ex esse. Commodo culpa incididunt duis cillu</p>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span class="small bg-transparent px-0">490.000 UZS <span class="text-orange">за наличные</span></span>
                                <span class="px-2 productmonth-border small text-grey">from 500 UZS/month</span>
                            </div>

                            <div class="d-flex gap-4 mt-3">
                                <button class="border-orange bg-transparent rounded p-1 px-3">
                                    <img src="./assets/icons/shopping-cart.svg" alt="" />
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#largeModal" class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center">
                                    <span>Купить сразу</span>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide product shadow-sm position-relative rounded">
                    <a href="javascript:void(0)" class=" ">
                        <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                            <i class="fa-regular fa-heart fs-4 hover-orange ps-1"></i>
                            <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="11" height="92" rx="2" fill="#000" />
                                <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                                <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                                <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                                <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                            </svg>
                        </div>
                        <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_tv.webp" alt="" />
                        <div class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                            <div class="d-flex align-items-end gap-3 pt-2">
                                <div class="fw-bold">5 300 000 UZS</div>
                                <del class="text-grey">
                                    <small>3 300 000 UZS</small>
                                </del>
                            </div>
                            <div class="productName fw-bold">Телевизоры Xiaomi</div>
                            <p class="text-grey">Cupidatat veniam ad officia cupidatat sit esse ex esse. Commodo culpa incididunt duis cillu</p>
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span class="small bg-transparent px-0">490.000 UZS <span class="text-orange">за наличные</span></span>
                                <span class="px-2 productmonth-border small text-grey">from 500 UZS/month</span>
                            </div>

                            <div class="d-flex gap-4 mt-3">
                                <button class="border-orange bg-transparent rounded p-1 px-3">
                                    <img src="./assets/icons/shopping-cart.svg" alt="" />
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#largeModal" class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center">
                                    <span>Купить сразу</span>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Navigation buttons (optional) -->
            <div id="product-next" class="swiper-button-next end-0"></div>
            <div id="product-prev" class="swiper-button-prev start-0"></div>
        </div>
        <!-- contact -->
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-6 pt-5 pb-4 pe-lg-5 pe-2">
                    <h1 class="mb-4">Наши магазины</h1>
                    <!-- Tabs Navigation -->
                    <ul class="border-0 flex-wrap ps-0 nav-tabs gap-3 addresses" id="tabsNavigation" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="locationtab d-flex gap-4 align-items-center active w-100 border-0 border-top py-4 bg-transparent"
                                id="tab1-button"
                                data-bs-toggle="tab"
                                data-bs-target="#tab1-content"
                                type="button"
                                role="tab"
                                aria-controls="tab1-content"
                                aria-selected="true"
                            >
                                <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                <div class="d-flex flex-column align-items-start">
                                    <h5 class="" class="">Location 1</h5>
                                    <div class="fs-sm-14">Laborum et magna est officia es</div>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                id="tab2-button"
                                data-bs-toggle="tab"
                                data-bs-target="#tab2-content"
                                type="button"
                                role="tab"
                                aria-controls="tab2-content"
                                aria-selected="false"
                            >
                                <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                <div class="d-flex flex-column align-items-start">
                                    <h5 class="" class="">Location 2</h5>
                                    <div class="fs-sm-14">Laborum et magna est officia es</div>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                id="tab3-button"
                                data-bs-toggle="tab"
                                data-bs-target="#tab3-content"
                                type="button"
                                role="tab"
                                aria-controls="tab3-content"
                                aria-selected="false"
                            >
                                <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                <div class="d-flex flex-column align-items-start">
                                    <h5 class="" class="">Location 3</h5>
                                    <div class="fs-sm-14">Laborum et magna est officia es</div>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                id="tab4-button"
                                data-bs-toggle="tab"
                                data-bs-target="#tab4-content"
                                type="button"
                                role="tab"
                                aria-controls="tab4-content"
                                aria-selected="false"
                            >
                                <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                <div class="d-flex flex-column align-items-start">
                                    <h5 class="" class="">Location 4</h5>
                                    <div class="fs-sm-14">Laborum et magna est officia es</div>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                id="tab5-button"
                                data-bs-toggle="tab"
                                data-bs-target="#tab5-content"
                                type="button"
                                role="tab"
                                aria-controls="tab5-content"
                                aria-selected="false"
                            >
                                <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                <div class="d-flex flex-column align-items-start">
                                    <h5 class="">Location 5</h5>
                                    <div class="fs-sm-14">Laborum et magna est officia es</div>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                id="tab6-button"
                                data-bs-toggle="tab"
                                data-bs-target="#tab6-content"
                                type="button"
                                role="tab"
                                aria-controls="tab6-content"
                                aria-selected="false"
                            >
                                <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                <div class="d-flex flex-column align-items-start">
                                    <h5 class="">Location 6</h5>
                                    <div class="fs-sm-14">Laborum et magna est officia es</div>
                                </div>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <!-- Tabs Content -->
                    <div class="tab-content" id="tabsContent">
                        <div class="tab-pane fade show active" id="tab1-content" role="tabpanel" aria-labelledby="tab1-button">
                            <div id="map1" class="map-container"></div>
                        </div>
                        <div class="tab-pane fade pt-3" id="tab2-content" role="tabpanel" aria-labelledby="tab2-button">
                            <div id="map2" class="map-container"></div>
                        </div>
                        <div class="tab-pane fade pt-3" id="tab3-content" role="tabpanel" aria-labelledby="tab3-button">
                            <div id="map3" class="map-container"></div>
                        </div>
                        <div class="tab-pane fade pt-3" id="tab4-content" role="tabpanel" aria-labelledby="tab4-button">
                            <div id="map4" class="map-container"></div>
                        </div>
                        <div class="tab-pane fade pt-3" id="tab5-content" role="tabpanel" aria-labelledby="tab5-button">
                            <div id="map5" class="map-container"></div>
                        </div>
                        <div class="tab-pane fade pt-3" id="tab6-content" role="tabpanel" aria-labelledby="tab6-button">
                            <div id="map6" class="map-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection