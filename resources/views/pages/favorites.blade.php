@extends('layouts.page')
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="./index.html" class="text-grey fw-bold text-lowercase fs-14">Главная страница / <span class="text-dark">Сравнение</span></a>
            </div>
            <hr />
        </div>
        <!-- Products -->
        <div class="container mt-5 p-0">
            <div class="m-0 fs-2 fw-bold container">Специальные предложения</div>
            <div class="d-lg-flex align-items-center justify-content-between d-block container">
                <div class="col-lg-9 d-flex flex-column gap-4 my-3 align-items-start">
                    <ul class="nav nav-tabs mb-1 overflow-auto w-100" id="myTab" role="tablist" style="white-space: nowrap">
                        <li class="me-3 mb-3" role="presentation">
                            <a class="fs-5 p-2 active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Телевизоры</a>
                        </li>
                        <li class="me-3 mb-3" role="presentation">
                            <a class="fs-5 pb-2" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Телефоны</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade container show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="product shadow-sm position-relative rounded">
                                <a href="./single-product.html" class="">
                                    <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                                        <i class="fa-solid text-orange fa-heart fs-4 ps-1"></i>
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
                    </div>
                </div>
                <div class="tab-pane fade container" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="product shadow-sm position-relative rounded">
                                <a href="./single-product.html" class="">
                                    <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                                        <i class="fa-solid text-orange fa-heart fs-4 ps-1"></i>
                                        <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="11" height="92" rx="2" fill="#000" />
                                            <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                                            <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                                            <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                                            <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                                        </svg>
                                    </div>
                                    <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_phone.webp" alt="" />
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
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="product shadow-sm position-relative rounded">
                                <a href="./single-product.html" class="">
                                    <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                                        <i class="fa-solid text-orange fa-heart fs-4 ps-1"></i>
                                        <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="11" height="92" rx="2" fill="#000" />
                                            <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                                            <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                                            <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                                            <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                                        </svg>
                                    </div>
                                    <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_phone.webp" alt="" />
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
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="product shadow-sm position-relative rounded">
                                <a href="./single-product.html" class="">
                                    <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                                        <i class="fa-solid text-orange fa-heart fs-4 ps-1"></i>
                                        <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="11" height="92" rx="2" fill="#000" />
                                            <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                                            <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                                            <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                                            <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                                        </svg>
                                    </div>
                                    <img class="w-100 pb-4 productImage p-4" src="./assets/images/category_phone.webp" alt="" />
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
