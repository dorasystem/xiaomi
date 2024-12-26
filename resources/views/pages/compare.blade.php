@extends('layouts.page')
@section('content')
    <main class="container">
    <div class="my-4">
        <div class="d-flex align-items-center gap-3">
            <a href="/" class="text-grey fw-bold text-lowercase fs-14">@lang('home.home') / <span class="text-dark">@lang('home.compare')</span></a>
        </div>
        <hr />
    </div>
    <div class="container mt-5 p-0">
        <div class="m-0 fs-2 fw-normal container">@lang('home.compare')</div>
        <div class="d-lg-flex align-items-center justify-content-between d-block container">
            <div class="col-lg-9 d-flex flex-column gap-4 my-3 align-items-start">
                <ul class="nav nav-tabs mb-1 overflow-auto w-100" id="myTab" role="tablist" style="white-space: nowrap">
                    <li class="me-3 mb-3" role="presentation">
                        <a class="fs-5 p-2 active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Телевизоры <span>(1)</span> </a>
                    </li>
                    <li class="me-3 mb-3" role="presentation">
                        <a class="fs-5 pb-2" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Часы <span>(1)</span></a>
                    </li>
                    <li class="me-3 mb-3" role="presentation">
                        <a class="fs-5 pb-2" id="phones-tab" data-bs-toggle="tab" href="#phones" role="tab" aria-controls="phones" aria-selected="false"> Смартфоны <span>(3)</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content container" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-lg-3 d-none">
                        <div class="d-flex align-items-center gap-3 ps-2">
                            <img src="/assets/icons/filter_icon.svg" alt="" />
                            <div class="">Фильтр</div>
                        </div>
                        <div class="px-2 py-3 border-bottom-dashed d-flex flex-column gap-2">
                            <label>
                                <input type="radio" name="tab1-group" value="option1" class="sync-radio form-check-input" checked />
                                Только различия
                            </label>
                            <label>
                                <input type="radio" name="tab1-group" value="option2" class="sync-radio form-check-input" />
                                Только одинаковые
                            </label>
                            <label>
                                <input type="radio" name="tab1-group" value="option3" class="sync-radio form-check-input" />
                                Все характеристики
                            </label>
                        </div>
                        <div class="d-flex align-items-center gap-3 px-2 py-3">
                            <img width="15" src="/assets/icons/delete_icon.svg" alt="" />
                            <div class="fs-14 text-orange">Очистить список</div>
                        </div>
                    </div>
                    <div style="overflow: hidden" class="col-12 news container py-3 position-relative">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide product shadow-sm position-relative rounded">
                                <a href="#" class=" ">
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

                                    <img class="w-100 pb-4 productImage p-4" src="/assets/images/category_tv.webp" alt="" />
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
                                                <img src="/assets/icons/shopping-cart.svg" alt="" />
                                            </button>
                                            <button data-bs-toggle="modal" data-bs-target="#largeModal" class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center">
                                                <span>Купить сразу</span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div id="products-next" class="swiper-button-next end-0"></div>
                        <div id="products-prev" class="swiper-button-prev start-0"></div>
                    </div>
                </div>
                <div style="overflow-x: auto" class="pt-3 mb-5">
                    <table class="table mb-0">
                        <thead class="bg-white compareProdName position-sticky">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col">Телевизоры</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                        <thead class="bg-white border-top">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                        <thead class="bg-white border-top">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-lg-3 d-none">
                        <div class="d-flex align-items-center gap-3 ps-2">
                            <img src="/assets/icons/filter_icon.svg" alt="" />
                            <div class="">Фильтр</div>
                        </div>
                        <div class="px-2 py-3 border-bottom-dashed d-flex flex-column gap-2">
                            <label><input type="radio" name="tab2-group" value="option1" class="sync-radio form-check-input" checked /> Только различия</label>
                            <label><input type="radio" name="tab2-group" value="option2" class="sync-radio form-check-input" /> Только одинаковые</label>
                            <label><input type="radio" name="tab2-group" value="option3" class="sync-radio form-check-input" /> Все характеристики</label>
                        </div>
                        <div class="d-flex align-items-center gap-3 px-2 py-3">
                            <img width="15" src="/assets/icons/delete_icon.svg" alt="" />
                            <div class="fs-14 text-orange">Очистить список</div>
                        </div>
                    </div>
                    <div style="overflow: hidden" class="col-12 news container py-3 position-relative">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide product shadow-sm position-relative rounded">
                                <a href="./single-product.html" class=" ">
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

                                    <img class="w-100 pb-4 productImage p-4" src="/assets/images/category_clock.webp" alt="" />
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
                                                <img src="/assets/icons/shopping-cart.svg" alt="" />
                                            </button>
                                            <button data-bs-toggle="modal" data-bs-target="#largeModal" class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center">
                                                <span>Купить сразу</span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div id="products-next" class="swiper-button-next end-0"></div>
                        <div id="products-prev" class="swiper-button-prev start-0"></div>
                    </div>
                </div>
                <div style="overflow-x: auto" class="pt-3 mb-5">
                    <table class="table mb-0">
                        <thead class="bg-white">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                        <thead class="bg-white border-top">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                        <thead class="bg-white border-top">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="phones" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-lg-3 d-none">
                        <div class="d-flex align-items-center gap-3 ps-2">
                            <img src="./assets/icons/filter_icon.svg" alt="" />
                            <div class="">Фильтр</div>
                        </div>
                        <div class="px-2 py-3 border-bottom-dashed d-flex flex-column gap-2">
                            <label><input type="radio" name="tab3-group" value="option1" class="sync-radio form-check-input" checked /> Только различия</label>
                            <label><input type="radio" name="tab3-group" value="option2" class="sync-radio form-check-input" /> Только одинаковые</label>
                            <label><input type="radio" name="tab3-group" value="option3" class="sync-radio form-check-input" /> Все характеристики</label>
                        </div>
                        <div class="d-flex align-items-center gap-3 px-2 py-3">
                            <img width="15" src="./assets/icons/delete_icon.svg" alt="" />
                            <div class="fs-14 text-orange">Очистить список</div>
                        </div>
                    </div>
                    <div style="overflow: hidden" class="col-12 news container py-3 position-relative">
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

                                    <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_clock.webp" alt="" />
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

                                    <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_clock.webp" alt="" />
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

                                    <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_clock.webp" alt="" />
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

                                    <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_clock.webp" alt="" />
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
                        <div id="products-next" class="swiper-button-next end-0"></div>
                        <div id="products-prev" class="swiper-button-prev start-0"></div>
                    </div>
                </div>
                <div style="overflow-x: auto" class="pt-3 mb-5 tablesctoll">
                    <table class="table mb-0">
                        <thead class="bg-white">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col">Смартфон</th>
                            <th class="px-4 py-3 fs-14" scope="col">Смартфон</th>
                            <th class="px-4 py-3 fs-14" scope="col">Смартфон</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                        <thead class="bg-white border-top">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                        <thead class="bg-white">
                        <tr>
                            <th class="px-4 py-3 fs-14" scope="col">Общая информация</th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                            <th class="px-4 py-3 fs-14" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Дата выхода на рынок</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                            <td class="px-4 py-3 fs-14">2024 г.</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                            <td class="px-4 py-3 fs-14">Android</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-grey fs-14">Тип</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                            <td class="px-4 py-3 fs-14">Смартфон</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border-0 text-grey fs-14">Операционная система</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                            <td class="px-4 py-3 border-0 fs-14">Android</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- products you have seen -->
    <div style="overflow: hidden" class="seenProducts container py-3 position-relative">
        <div class="mb-4 fs-2 fw-bold">Вы смотрели</div>
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
</main>
@endsection
