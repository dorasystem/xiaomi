@extends('layouts.frontend')

@section('content')

    <main class="">
        <div class="my-4 text-grey container">Официальный магазин Xiaomi в Узбекистане</div>
        <!-- Slider banner -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 position-relative">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <!-- Indicators (optional) -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <!-- Carousel inner (slides) -->
                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                                <img src="./asssets/images/slider1.webp" class="d-block w-100" alt="Slide 1" />
                            </div>
                            <div class="carousel-item">
                                <img src="./asssets/images/slider2.webp" class="d-block w-100" alt="Slide 2" />
                            </div>
                            <div class="carousel-item">
                                <img src="./asssets/images/slider3.webp" class="d-block w-100" alt="Slide 3" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Slide 3</h5>
                                    <p>Slide 3 description</p>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row headerbanners">
                        <div class="col-sm-6 col-md-12 mt-md-0 mt-4">
                            <div class="banner1 rounded p-lg-4 p-2 d-flex flex-column justify-content-between align-items-start">
                                <div class="fw-bold">Смартфоны</div>
                                <a href="./product-list.html" class="btn-orange rounded px-4 py-1">Смотреть все</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 mt-4">
                            <div class="banner2 rounded p-lg-4 p-2 d-flex flex-column justify-content-between align-items-start">
                                <div class="fw-bold">Умный дом</div>
                                <a href="./product-list.html" class="btn-orange rounded px-4 py-1">Смотреть все</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products -->
        <div class="container mt-5 p-0">
            <div class="m-0 fs-2 fw-bold container">Специальные предложения</div>
            <div class="d-lg-flex align-items-center justify-content-between d-block container">
                <div class="col-lg-9 d-flex flex-column gap-4 my-3 align-items-start">
                    <ul class="nav nav-tabs mb-1 overflow-auto w-100" id="myTab" role="tablist" style="white-space: nowrap">
                        <li class="me-3 mb-3" role="presentation">
                            <a class="fs-5 p-2 active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Товары на акции</a>
                        </li>
                        <li class="me-3 mb-3" role="presentation">
                            <a class="fs-5 pb-2" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Новинки</a>
                        </li>
                        <li class="me-3 mb-3" role="presentation">
                            <a class="fs-5 pb-2" id="phones-tab" data-bs-toggle="tab" href="#phones" role="tab" aria-controls="phones" aria-selected="false">Хиты продаж</a>
                        </li>
                    </ul>
                </div>
                <div class="my-lg-3 my-0 col-lg-3 d-lg-block d-none text-end">
                    <button class="view_all_btn text-orange border-0 bg-transparent mb-4">Смотреть все</button>
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div style="overflow: hidden" class="productSale container py-3 position-relative">
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

                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_tv.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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

                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_clock.jpg" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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

                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_laptop.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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

                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_pilesos.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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

                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/knopka.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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

                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_tv.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                        <div id="products-next" class="swiper-button-next end-0"></div>
                        <div id="products-prev" class="swiper-button-prev start-0"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div style="overflow: hidden" class="newProducts container py-3 position-relative">
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_tv.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_photo.jpg" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_transport.jpg" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_laptop.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_powerbank.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_phone.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                        <div id="products-next" class="swiper-button-next end-0"></div>
                        <div id="products-prev" class="swiper-button-prev start-0"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="phones" role="tabpanel" aria-labelledby="phones-tab">
                    <div style="overflow: hidden" class="xitProducts container py-3 position-relative">
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/schetka.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_powerbank.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_photo.jpg" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/category_tv.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/schetka.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                                    <img class="w-100 pb-4 productImage p-4" src="./asssets/images/schetka.webp" alt="" />
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
                                                <img src="./asssets/icons/shopping-cart.svg" alt="" />
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
                        <div id="products-next" class="swiper-button-next end-0"></div>
                        <div id="products-prev" class="swiper-button-prev start-0"></div>
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
                        <img class="w-100 pb-4 productImage p-4" src="/asssets/images/category_clock.jpg" alt="" />
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
                                    <img src="/asssets/icons/shopping-cart.svg" alt="" />
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
                        <img class="w-100 pb-4 productImage p-4" src="/asssets/images/category_tv.webp" alt="" />
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
                                    <img src="/asssets/icons/shopping-cart.svg" alt="" />
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

                        <img class="w-100 pb-4 productImage p-4" src="/asssets/images/category_tv.webp" alt="" />
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
                                    <img src="/asssets/icons/shopping-cart.svg" alt="" />
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
                        <img class="w-100 pb-4 productImage p-4" src="/asssets/images/category_tv.webp" alt="" />
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
                                    <img src="/asssets/icons/shopping-cart.svg" alt="" />
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
        <!-- Our advantages -->
        <div class="banner py-5 my-5">
            <div class="container">
                <h2>Наши преимущества</h2>
                <div class="d-flex justify-content-between advantages py-4 gap-5">
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <img src="/asssets/icons/check-icon.svg" alt="" />
                        <div class="text-center text-nowrap"><span class="fw-bold">Xiaomi</span> <br />Авторизованный магазин</div>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <img src="/asssets/icons/truck-icon.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">Доставка</span> <br />
                            по всему Узбекистану
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <img src="/asssets/icons/shop-icon.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">Самовывоз</span> <br />
                            из ближайшего магазина
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <img src="/asssets/icons/calendar.svg" alt="" />

                        <div class="text-center text-nowrap">
                            <span class="fw-bold">Выгодная рассрочка</span> <br />
                            без предоплаты
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 align-items-center">
                        <!-- <img src="./asssets/icons/tools.svg" alt="" /> -->
                        <img src="/asssets/icons/settings.svg" alt="" />
                        <div class="text-center text-nowrap">
                            <span class="fw-bold">Бесплатная</span> <br />
                            настройка устройства
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News -->
        <div class="container">
            <div class="fs-2 fw-bold">Новости</div>
            <div class="row mt-3">
                <div class="col-lg-7 pe-lg-5 pe-2 mb-4">
                    <div class="newbanner w-100 rounded text-white d-flex flex-column justify-content-between">
                        <div class="productName fs-5">
                            Сравнение Xiaomi 14T и Xiaomi 14T Pro: Какой <br />
                            выбрать?
                        </div>
                        <small class="fw-bold border-top pt-3">Опубликовано 7 октября в 15:31</small>
                    </div>
                </div>

                <div class="col-lg-5 d-flex flex-column justify-content-between">
                    <div class="d-flex gap-2">
                        <ul class="nav justify-content-between nav-tabs new-borderbottom mb-2 overflow-auto w-100" id="newTab" role="tablist" style="white-space: nowrap">
                            <div class="d-flex">
                                <li class="pe-3 fs-5" role="presentation">
                                    <a class="pb-2 ps-0 active newtab" id="new-tab" data-bs-toggle="tab" href="#new" role="tab" aria-controls="home" aria-selected="true">Новинки</a>
                                </li>
                                <li class="pe-3 fs-5" role="presentation">
                                    <a class="pb-2 newtab" id="popular-tab" data-bs-toggle="tab" href="#popular" role="tab" aria-controls="profile" aria-selected="false">Популярные</a>
                                </li>
                            </div>
                            <li class="me-3 fs-5 mb-2" role="presentation">
                                <a href="./news.html" class="pb-2 view_all_btn text-orange border-0 bg-transparent mb-4 text-end"
                                >Все статьи
                                    <svg width="16" height="16" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_43_12)">
                                            <path
                                                d="M18.176 5.27026L17.4665 5.2797L8.88696 5.59498L8.83354 7.04846L15.6796 6.79436L5.18161 17.2924L6.15388 18.2647L16.6514 7.76716L16.3989 14.6117L17.8523 14.5583L18.1676 5.97869L18.176 5.27026Z"
                                                fill="#ff6700"
                                            />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_43_12">
                                                <rect width="13" height="18.1071" fill="white" transform="translate(13.752 0.501953) rotate(45)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content mt-4" id="newTabContent">
                        <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
                            <div class="d-flex align-items-start gap-3 justify-content-between">
                                <div class="">
                                    <div class="text-grey">7 октября в 15:31</div>
                                    <h5>Сравнение Xiaomi 14T и Xiaomi 14T Pro</h5>
                                </div>
                                <div class="">
                                    <img class="newImg rounded" src="https://xiaomistore.md/media/newsxiaomi-14t-and-14t-pro-2.webp" alt="" />
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-start gap-3 justify-content-between">
                                <div class="">
                                    <div class="text-grey">7 октября в 15:31</div>
                                    <h5>Сравнение Xiaomi 14T и Xiaomi 14T Pro</h5>
                                </div>
                                <div class="">
                                    <img class="newImg rounded" src="https://xiaomistore.md/media/newsxiaomi-14t-and-14t-pro-2.webp" alt="" />
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-start gap-3 justify-content-between">
                                <div class="">
                                    <div class="text-grey">7 октября в 15:31</div>
                                    <h5>Сравнение Xiaomi 14T и Xiaomi 14T Pro</h5>
                                </div>
                                <div class="">
                                    <img class="newImg rounded" src="https://xiaomistore.md/media/newsxiaomi-14t-and-14t-pro-2.webp" alt="" />
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-start gap-3 justify-content-between">
                                <div class="">
                                    <div class="text-grey">7 октября в 15:31</div>
                                    <h5>Сравнение Xiaomi 14T и Xiaomi 14T Pro</h5>
                                </div>
                                <div class="">
                                    <img class="newImg rounded" src="https://xiaomistore.md/media/newsxiaomi-14t-and-14t-pro-2.webp" alt="" />
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="tab-pane fade show" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                            <div class="d-flex align-items-start gap-3 justify-content-between">
                                <div class="">
                                    <div class="text-grey">7 октября в 15:31</div>
                                    <h5>Сравнение Xiaomi 14T и Xiaomi 14T Pro</h5>
                                </div>
                                <div class="">
                                    <img class="newImg rounded" src="https://xiaomistore.md/media/news/poco-m6-pro-9blnk72.webp" alt="" />
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-start gap-3 justify-content-between">
                                <div class="">
                                    <div class="text-grey">7 октября в 15:31</div>
                                    <h5>Сравнение Xiaomi 14T и Xiaomi 14T Pro</h5>
                                </div>
                                <div class="">
                                    <img class="newImg rounded" src="https://xiaomistore.md/media/news/poco-m6-pro-9blnk72.webp" alt="" />
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-start gap-3 justify-content-between">
                                <div class="">
                                    <div class="text-grey">7 октября в 15:31</div>
                                    <h5>Сравнение Xiaomi 14T и Xiaomi 14T Pro</h5>
                                </div>
                                <div class="">
                                    <img class="newImg rounded" src="https://xiaomistore.md/media/news/poco-m6-pro-9blnk72.webp" alt="" />
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-start gap-3 justify-content-between">
                                <div class="">
                                    <div class="text-grey">7 октября в 15:31</div>
                                    <h5>Сравнение Xiaomi 14T и Xiaomi 14T Pro</h5>
                                </div>
                                <div class="">
                                    <img class="newImg rounded" src="https://xiaomistore.md/media/news/poco-m6-pro-9blnk72.webp" alt="" />
                                </div>
                            </div>
                            <hr />
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
                        <div class="fs-5 rounded category1 p-3 w-100">Умные часы</div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="row h-100">
                            <div class="col-12">
                                <div class="fs-5 p-3 category2 rounded h-95">транспорт</div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-3 category3 rounded h-100">Наушники</div>
                            </div>
                            <div class="col-lg-6 ps-0">
                                <div class="p-3 category4 rounded h-100">телевизор</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pe-0">
                        <div class="row h-100">
                            <div class="col-lg-6">
                                <div class="p-3 category5 rounded h-100">регистраторы</div>
                            </div>
                            <div class="col-lg-6 ps-0">
                                <div class="p-3 category6 rounded h-100">пылесосы</div>
                            </div>
                            <div class="col-12">
                                <div class="fs-5 p-3 mt-3 category7 rounded h-95">смартфон</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="categories d-lg-none d-grid">
                <a href="" class="category1 rounded fs-5 fw-bold p-2 text-white">Умные часы</a>
                <a href="" class="category2 rounded fs-5 fw-bold p-2 text-white">Умные часы</a>
                <a href="" class="category3 rounded fs-5 fw-bold p-2 text-white">Умные часы</a>
                <a href="" class="category4 rounded fs-5 fw-bold p-2 text-white">Умные часы</a>
                <a href="" class="category5 rounded fs-5 fw-bold p-2 text-white">Умные часы</a>
                <a href="" class="category6 rounded fs-5 fw-bold p-2 text-white">Умные часы</a>
                <a href="" class="category7 rounded fs-5 fw-bold p-2 text-white">Умные часы</a>
            </div>
        </div>
        <!-- video obzor -->
        <div class="bg-black text-white pt-4 mt-5">
            <div class="container py-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h1>Видеообзоры</h1>
                    <button class="border border-white border-1 bg-transparent rounded text-white p-2 d-sm-block d-none">
                        Все видео-обзоры <img src="./asssets/icons/arrow_white.svg" alt="" />
                    </button>
                </div>
                <div class="videoBanner my-2 rounded d-flex align-items-center justify-content-center">
                    <div class="video bg-white rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-play text-orange fs-2"></i>
                    </div>
                </div>

                <div class="ratio ratio-16x9 d-none">
                    <iframe
                        class="rounded"
                        src="https://www.youtube.com/embed/kyGDngkTCXQ"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>

                <div class="row mt-5">
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
                                <img width="120px" height="100px" class="fit-cover rounded" src="./asssets/images/videoProductImage.jpg" alt="" />
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
        <!-- contact -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pe-lg-5 pe-2">
                    <h1 class="mb-4">Наши магазины</h1>
                    <!-- Tabs Navigation -->
                    <ul class="border-0 flex-wrap ps-0 nav-tabs gap-3 addresses mb-0" id="tabsNavigation" role="tablist">
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
                                    <div class="">Laborum et magna est officia es</div>
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
                                    <div class="">Laborum et magna est officia es</div>
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
                                    <div class="">Laborum et magna est officia es</div>
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
                                    <div class="">Laborum et magna est officia es</div>
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
                                    <div>Laborum et magna est officia es</div>
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
                                    <div>Laborum et magna est officia es</div>
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
