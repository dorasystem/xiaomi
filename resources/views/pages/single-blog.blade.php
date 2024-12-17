@extends('layouts.page')

@section('content')
<main class="container">
    <div class="my-4">
        <div class="d-flex align-items-center gap-3">
            <a href="./index.html" class="text-grey fw-bold text-lowercase fs-14">Главная страница / <span class="text-dark">Блог</span></a>
        </div>
        <hr />
    </div>
    <div style="background-image: url('./asssets/images/single-blogimage.jpg')" class="text-white rounded mb-3 singleblogbanner px-5 w-100 d-flex flex-column justify-content-center">
        <h1>Обзор Redmi 14C:</h1>
        <h4 class="">самый демократичный смартфон с экраном 120 герц</h4>
    </div>
    <div class="">
        Ворвавшись в бюджетный сегмент, Redmi 14С одержал убедительную победу в номинации “топ за свои деньги”. Здесь дисплей с поддержкой 120 герц, элегантный корпус толщиной 8.22 миллиметра,
        камера с ИИ-алгоритмами, достойная производительность и автономность. <br /><br />
        Рассказываем всё самое важное про Redmi 14С в нашем обзоре.
    </div>
    <div style="overflow: hidden" class="blogimages container py-3 pt-5 px-0 position-relative">
        <div class="swiper-wrapper pt-3">
            <div class="swiper-slide product shadow-sm position-relative rounded">
                <img class="w-100 fit-cover rounded blogcard" src="./asssets/images/aksiya1.webp" alt="" />
            </div>
            <div class="swiper-slide product shadow-sm position-relative rounded">
                <img class="w-100 fit-cover rounded blogcard" src="./asssets/images/aksiya2.webp" alt="" />
            </div>
            <div class="swiper-slide product shadow-sm position-relative rounded">
                <img class="w-100 fit-cover rounded blogcard" src="./asssets/images/aksiya3.webp" alt="" />
            </div>
            <div class="swiper-slide product shadow-sm position-relative rounded">
                <img class="w-100 fit-cover rounded blogcard" src="./asssets/images/aksiya4.webp" alt="" />
            </div>
            <div class="swiper-slide product shadow-sm position-relative rounded">
                <img class="w-100 fit-cover rounded blogcard" src="./asssets/images/aksiya2.webp" alt="" />
            </div>
        </div>
        <div class="text-center mt-3">
            <h1 class="text-orange">Redmi</h1>
            <h4 class="mb-4">Король бюджетного сегмента</h4>
            <a href="javascript:void(0)" style="font-size: 20px" class="btn-orange rounded px-5 py-1">Купить</a>
        </div>
        <!-- Navigation buttons (optional) -->
        <div id="products-next" class="swiper-button-next end-0"></div>
        <div id="products-prev" class="swiper-button-prev start-0"></div>
    </div>
    <div class="blogdes">
        <h1 class="mb-4">Дизайн и эргономика</h1>
        <div style="font-size: 18px" class="">
            Redmi Watch 5 Lite получили тонкий и лёгкий корпус весом 29.2 грамм, они почти не ощущаются на запястье. Дизайн минималистичный и универсальный, часы сочетаются хоть со спортивным,
            хоть с деловым костюмом.
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 my-3">
                <h4 class="">На первый взгляд кажется, что Lite получили металлический корпус, но на деле и здесь, и в Active используется пластик с металлическим напылением.</h4>
                <h5 class="">На первый взгляд кажется, что Lite получили металлический корпус, но на деле и здесь, и в Active используется пластик с металлическим напылением.</h5>
            </div>
            <img class="col-md-6 my-3 rounded" width="500px" height="300px" src="./asssets/images/banner1.webp" alt="" />
        </div>
    </div>
    <div class="blogdes">
        <h1 class="mb-3">Экраны</h1>
        <div class="" style="font-size: 18px">
            Redmi Watch 5 Lite получили AMOLED-дисплей, экран Redmi Watch 5 Active выполнен по IPS технологии. Конечно, победа в этом сравнении достаётся Lite-версии, очевидно из-за
            преимуществ AMOLED-технологии, таких как “бесконечный” контраст и поддержка Always-On-Display.
            <br /><br />
            При этом нельзя сказать, что матрица у Watch 5 Active плоха: это эталонный IPS, а запас яркости составляет приблизительно 500 нит против 600 у Lite. Тем не менее, для тренировок на
            улице экран Lite подходит лучше.
        </div>
    </div>
    <div class="blogall blogdes my-5">
        <h1 class="mb-3">Итоги</h1>
        <div class="d-flex gap-4">
            <div class="orange-column"></div>
            <div class="">
                <h4 class="">
                    Redmi Watch 5 Lite подойдут тем, кто ищет практичные, но максимально функциональные смарт часы, которыми приятно пользоваться. Главные преимущества - GPS, возможность
                    отвечать на входящие вызовы и отличный AMOLED-дисплей, что редко встречается в устройствах этой ценовой категории.
                </h4>
                <br />
                <div class="">
                    Redmi Watch 5 Active оснащены скромнее, но при этом радуют шикарной автономностью, стильным дизайном и впечатляющим набором тренировочных режимов. Тем, кто ищет хорошее
                    носимое устройство для поддержания активности, эти часы подойдут как нельзя лучше.
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
