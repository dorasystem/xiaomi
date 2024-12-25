@extends('layouts.page')
@section('content')
    <main class="container">
    <div class="my-4">
        <div class="d-flex align-items-center gap-3">
            <a href="/" class="text-grey fw-bold text-lowercase fs-14">Главная страница / <span class="text-dark">Корзина</span></a>
        </div>
        <hr />
    </div>
    <div class="row mb-5">
        <div class="col-lg-9 pe-lg-4">
            <div class="d-flex align-items-center gap-1 justify-content-between pb-2 border-bottom-dashed">
                <h1 class="fw-normal">Корзина</h1>
                <button class="d-flex align-items-center gap-2 bg-transparent border-0">
                    <img src="./assets/icons/delete_icon.svg" alt="" />
                    <div>Очистить корзину</div>
                </button>
            </div>
            <div class="orders container">
                <div class="row align-items-center justify-content-between border-bottom-dashed pe-3">
                    <div class="col-lg-6 d-flex align-items-center gap-3">
                        <img class="orderImage" src="./assets/images/category_tv.webp" alt="" />
                        <div class="d-flex flex-column gap-1">
                            <h5 class="hover-orange fs-sm-14">Телевизоры Xiaomi Mi TV A Pro 55</h5>
                            <div class="fs-sm-12">Артикул: ELA5473GL</div>
                        </div>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center justify-content-end gap-1 fs-sm-12">
                        <div class="circle bg-success rounded-circle"></div>
                        <div class="text-nowrap">В наличии</div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column align-items-end gap-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <button onclick="decrement(this)" class="decrement border-0 rounded-circle bg-history d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-minus fs-sm-12"></i>
                                </button>
                                <div class="count" data-value="0">0</div>

                                <button onclick="increment(this)" class="decrement border-0 rounded-circle bg-history d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-plus fs-sm-12"></i>
                                </button>
                            </div>
                            <h5 class="fw-bold text-nowrap">1 250 000 сум</h5>
                        </div>
                        <div style="height: 50px" class="d-flex align-items-center gap-4">
                            <div class="icon-wrapper">
                                <i class="fa-regular fa-heart text-orange fs-24"></i>
                                <i class="fa-solid fa-heart text-orange fs-24"></i>
                            </div>
                            <img src="./assets/icons/x-mark.svg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="orderSum bg-darkgrey rounded p-3 position-sticky">
                <div class="d-flex align-items-center justify-content-between">
                    <h4>Ваш заказ</h4>
                    <small>Товаров: 10</small>
                </div>
                <hr class="my-4 text-history" />
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div class="text-dark">Стоимость товара</div>
                    <h6 class="m-0 fw-bold">1 600 000 сум</h6>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div class="text-dark">Скидка</div>
                    <h6 class="m-0 fw-bold">0 сум</h6>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div class="text-dark">Итоговая сумма:</div>
                    <h6 class="m-0 fw-bold">1 600 000 сум</h6>
                </div>
                <hr class="my-4 text-history" />
                <button class="btn-orange rounded w-100">Оформить заказ</button>
            </div>
        </div>
    </div>
</main>
@endsection
