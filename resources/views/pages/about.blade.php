@extends('layouts.page')
@section('content')
    <main class="">
        <div class="container my-4 mb-5">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold text-lowercase fs-14">@lang('home.home') / <span class="text-dark">@lang('footer.about_us')</span></a>
            </div>
            <hr />
            <h1 class="my-3 mb-5">О нашей компании</h1>
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex">
                        <div style="width: 7px" class="bg-orange me-5"></div>
                        <div style="font-family: Courier New" class="fs-4">
                            ”MI в нашем логотипе означает «Мобильный Интернет», но также для нас это звучит как <span class="text-orange">«Миссия Невыполнима</span> » На английском – Mission
                            Impossible Xiaomi часто сталкивался с вызовами, многие из которых по началу казались невыполнимыми в наши ранние годы.”
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 text-center">
                    <h1 class="fw-bold fs-85">100+</h1>
                    <div class="text-grey">
                        стран и регионов в которых <br />
                        доступна продукция Xiaomi
                    </div>
                </div>
            </div>
        </div>

        <div class="aboutImages d-flex gap-3">
            <img class="h-100 fit-cover" src="/assets/images/aboutbanner1.webp" alt="" />
            <img class="w-100 h-100 fit-cover" src="/assets/images/aboutbanner2.webp" alt="" />
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h1 style="font-size: 50px" class="border-top border-3 pt-4 text-lightgrey fw-bold mt-3">2010</h1>
                    <div class="lh-normal text-black">Xiaomi și-a început activitățile cu dezvoltarea firmware-ului MIUI, care a câștigat încrederea întregii lumi.</div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h1 style="font-size: 50px" class="border-top border-3 pt-4 text-lightgrey fw-bold mt-3">2011</h1>
                    <div class="lh-normal text-black">Компания выпустила собственный смартфон. Он отличался доступной ценой и мощными параметрами.</div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h1 style="font-size: 50px" class="border-top border-3 pt-4 text-lightgrey fw-bold mt-3">2013</h1>
                    <div class="lh-normal text-black">Уже спустя три года аудитория MIUI превысила 30 миллионов человек и продолжает непрерывно расти.</div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h1 style="font-size: 50px" class="border-top border-3 pt-4 text-lightgrey fw-bold mt-3">2014</h1>
                    <div class="lh-normal text-black">Компании удалось занять 6 место по продажам смартфонов на рынке и продолжает удерживать позиции.</div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-6"><img style="object-position: right" class="w-100 rounded h-100 fit-cover" src="/assets/images/aboutImage1.webp" alt="" /></div>
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-start gap-4">
                    <h2 class="fw-normal ps-md-5 me-md-5">
                        Мы ценим наших клиентов, <br />
                        ведь они не просто покупатели
                    </h2>
                    <div class="ps-md-5 me-md-5 text-black">
                        Они наши близкие друзья, а мы больше, чем продавцы смартфонов, ноутбуков и планшетов. Для них мы – красочные и всегда четкие воспоминания, захватывающие игры на
                        максимальной производительности, любимая музыка доступная на каждом шагу, уют и свежесть в доме. <br /><br />
                        Вы можете делиться вашими эмоциями во всех соц. сетях используя хэштег #xiaomifamily или отмечайте нас. Каждая публикация по настоящему греет наше сердце.
                    </div>
                    <button class="rounded-3 btn-black p-3 px-4 text-white ms-md-5 border-0 d-flex align-items-center gap-3 fw-semibold">
                        Наши социальные сети<img width="17px" src="/assets/icons/arrow_white.svg" alt="" />
                    </button>
                </div>
            </div>
            <div class="row my-5">
                <div class="order-md-1 order-2 col-md-6 d-flex flex-column justify-content-center align-items-start gap-4">
                    <h2 class="fw-normal pe-5 me-md-5">
                        Мы ценим наших клиентов, <br />
                        ведь они не просто покупатели
                    </h2>
                    <div class="pe-5 me-md-5 text-black">
                        Они наши близкие друзья, а мы больше, чем продавцы смартфонов, ноутбуков и планшетов. Для них мы – красочные и всегда четкие воспоминания, захватывающие игры на
                        максимальной производительности, любимая музыка доступная на каждом шагу, уют и свежесть в доме. <br /><br />
                        Вы можете делиться вашими эмоциями во всех соц. сетях используя хэштег #xiaomifamily или отмечайте нас. Каждая публикация по настоящему греет наше сердце.
                    </div>
                    <button class="rounded-3 btn-black p-3 px-4 text-white border-0 d-flex align-items-center gap-3 fw-semibold">
                        Наши социальные сети<img width="17px" src="/assets/icons/arrow_white.svg" alt="" />
                    </button>
                </div>
                <div class="order-md-2 order-1 col-md-6"><img class="w-100 rounded h-100 fit-cover" src="/assets/images/aboutImage2.webp" alt="" /></div>
            </div>
            <div class="row">
                <div class="row align-items-center justify-content-between">
                    <h1 class="col-md-8">Хочешь в нашу команду?</h1>
                    <div class="col-md-4 text-md-end mb-3">
                        <a href="/career.html" class="border-1 rounded-2 btn-blackborder py-1 px-3">Все вакансии <img src="/assets/icons/arrow.svg" alt="" /></a>
                    </div>
                </div>
                <a href="./career.html" class="col-md-3 col-sm-6 rounded mb-3">
                    <div class="bg-white rounded">
                        <img height="300" class="w-100 fit-cover" src="/assets/images/vacancy1.webp" alt="" />
                        <div style="font-size: 11px" class="px-3 small fw-bold text-grey">Мунчештское шоссе, 41</div>
                        <div class="px-3 pb-4 fw-semibold">Промоутер</div>
                    </div>
                </a>
                <a href="./career.html" class="col-md-3 col-sm-6 rounded mb-3">
                    <div class="bg-white rounded">
                        <img height="300" class="w-100 fit-cover" src="/assets/images/vacancy2.webp" alt="" />
                        <div style="font-size: 11px" class="px-3 small fw-bold text-grey">Мунчештское шоссе, 41</div>
                        <div class="px-3 pb-4 fw-semibold">Промоутер</div>
                    </div>
                </a>
                <a href="./career.html" class="col-md-3 col-sm-6 rounded mb-3">
                    <div class="bg-white rounded">
                        <img height="300" class="w-100 fit-cover" src="/assets/images/vacancy3.webp" alt="" />
                        <div style="font-size: 11px" class="px-3 small fw-bold text-grey">Мунчештское шоссе, 41</div>
                        <div class="px-3 pb-4 fw-semibold">Промоутер</div>
                    </div>
                </a>
                <a href="./career.html" class="col-md-3 col-sm-6 rounded mb-3">
                    <div class="bg-white rounded">
                        <img height="300" class="w-100 fit-cover" src="/assets/images/vacancy4.webp" alt="" />
                        <div style="font-size: 11px" class="px-3 small fw-bold text-grey">Мунчештское шоссе, 41</div>
                        <div class="px-3 pb-4 fw-semibold">Промоутер</div>
                    </div>
                </a>
            </div>
        </div>
    </main>
@endsection
