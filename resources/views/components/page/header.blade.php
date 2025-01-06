@php
    use App\Models\Product;
    use App\Models\StaticKeyword;
    use Illuminate\Support\Facades\App;
    use App\Models\Contact;
    $currentLocale = app()->getLocale();
    $products = Product::take(3)->get();
    $categories = \App\Models\Category::all();
    $lang = App::getLocale();
    $links = Contact::first();

    $keywords = StaticKeyword::all();

    $language = app()->getLocale();
    $translations = [];

    foreach ($keywords as $keyword) {
        $translations[$keyword->key] = $keyword->{$language};
    }


@endphp
<nav class="container p-0">
    <div class="container navbar-1 py-2 d-sm-block d-none">
        <div class="row align-items-center nav1">
            <div class="col-lg-7 text-grey d-lg-block d-none">
                <ul class="nav gap-3 justify-content-between justify-content-lg-start">
                    <li class=""><a class="text-grey hover-orange" href="{{ route('news') }}">@lang('footer.news')</a>
                    </li>
                    <li class=""><a class="text-grey hover-orange"
                            href="{{ route('products') }}">@lang('footer.products')</a></li>
                    <li class=""><a class="text-grey hover-orange" href="/about">@lang('footer.about_us')</a></li>
                    <li class=""><a class="text-grey hover-orange" href="/contact">@lang('footer.contacts')</a></li>
                    <li class=""><a class="text-grey hover-orange"
                            href="{{ route('blog') }}">@lang('footer.blog')</a>
                    </li>
                    <li class=""><a class="text-grey hover-orange"
                            href="{{ route('blog') }}">@lang('footer.career')</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5 mt-lg-0 mt-2 ps-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-md-block d-none">
                        <div class="social-icons d-flex align-items-center justify-content-between gap-2">
                            @if (!empty($links->youtube))
                                <a target="_blank" href="{{ $links->youtube }}">
                                    <img src="/assets/icons/youtube.svg" alt="" />
                                </a>
                            @endif

                            @if (!empty($links->instagram))
                                <a target="_blank" href="{{ $links->instagram }}">
                                    <img src="/assets/icons/insta.svg" alt="" />
                                </a>
                            @endif
                            @if (!empty($links->telegram))
                                <a target="_blank" href="{{ $links->telegram }}"><img src="/assets/icons/telegram.svg" alt="" /></a>
                            @endif
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <a href="tel:+998 77 282 00 80" class="d-flex align-items-center gap-1">
                            <img src="/assets/icons/phone" alt="" />
                            <small class="phone_clock_color">{{ $links->phone }} </small>
                        </a>
                    </div>
                    <div class="text-nowrap">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-regular fa-clock phone_clock_color"></i>
                            <small class="phone_clock_color">{{ $translations['work_time'] }}</small>
                        </div>
                    </div>
                    <div
                        class="position-relative w-max d-flex align-items-center justify-content-end justify-content-md-start text-nowrap align-items-center">
                        <div class="dropdown">
                            <button class="border-0 bg-transparent pe-4 py-1 dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if ($currentLocale === 'ru')
                                    Русский
                                @elseif ($currentLocale === 'en')
                                    English
                                @elseif ($currentLocale === 'uz')
                                    O'zbek
                                @else
                                    Language
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('locale/ru') }}">Русский</a></li>
                                <li><a class="dropdown-item" href="{{ url('locale/en') }}">English</a></li>
                                <li><a class="dropdown-item" href="{{ url('locale/uz') }}">O'zbek</a></li>
                            </ul>
                        </div>
                        <i id="select-icon"
                            class="fa-solid fa-angle-down position-absolute end-0 top-50 translate-middle-y pe-2 text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-2 container p-0">
        <div style="z-index: 20" class="container bg-white d-md-none py-2 d-block position-relative pe-0">
            <div class="row align-items-center justify-content-between w-100">
                <div class="col-4">
                    <a class="logo" href="/"><img class="w-100" src="/assets/images/xiaomiStoreBlack.webp"
                            alt="Mi Logo" /> </a>
                </div>
                <div class="col-8 d-flex align-items-center justify-content-end pe-0 gap-4">
                    <div class="">
                        <a href="/compare" class="icon position-relative">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000"
                                    stroke="none">
                                    <path d="M2015 4786 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -982 -3 -2144 l3
                                                    -2112 21 -27 c11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566 21
                                                    15 11 37 33 48 48 l21 27 0 2139 0 2139 -21 27 c-11 15 -33 37 -48 48 -27 21
                                                    -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -2226 l0 -1920 -320 0 -320 0 0
                                                    1920 0 1920 320 0 320 0 0 -1920z" />
                                    <path d="M3615 3506 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -694 -3 -1504 3
                                                    -1468 3 -1472 24 -1499 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539
                                                    0 566 21 15 11 37 33 48 48 21 27 21 28 21 1526 0 1498 0 1499 -21 1526 -11
                                                    15 -33 37 -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -1586
                                                    l0 -1280 -320 0 -320 0 0 1280 0 1280 320 0 320 0 0 -1280z" />
                                    <path d="M415 2226 c-41 -18 -83 -69 -90 -109 -3 -18 -5 -406 -3 -864 3 -822
                                                    3 -832 24 -859 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566
                                                    21 15 11 37 33 48 48 21 27 21 34 21 886 0 852 0 859 -21 886 -11 15 -33 37
                                                    -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -946 l0 -640 -320
                                                    0 -320 0 0 640 0 640 320 0 320 0 0 -640z" />
                                </g>
                            </svg>
                            <span class="badge badge-pill badge-danger badge-position rounded-circle">1</span>
                        </a>
                    </div>
                    <button class="toggleButton border-0 px-2 bg-transparent">
                        <div class="d-flex flex-column katalogicon">
                            <div class="line line1"></div>
                            <div class="line line2"></div>
                            <div class="line line3"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="container w-100 navbar-2 navbar-custom navbar py-sm-3 py-2 ps-2 position-relative">
            <div class="container pe-0">
                <div class="row align-items-center w-100">
                    <div class="col-lg-2 col-4 mb-lg-0 mb-3 d-lg-block d-none">
                        <a class="logo" href="/"><img class="w-100" src="/assets/images/xiaomiStoreWhite.webp"
                                alt="Mi Logo" /> </a>
                    </div>
                    <div class="col-lg-7 px-sm-2 px-0">
                        <div class="d-flex align-items-center gap-4">
                            <button
                                class="toggleButton btn-white d-none rounded d-md-none  align-items-center border-0 ">
                                <div class="d-flex flex-column katalogicon">
                                    <div class="line line1"></div>
                                    <div class="line line2"></div>
                                    <div class="line line3"></div>
                                </div>
                                <span class="d-lg-block d-none text-nowrap"> @lang('footer.catalog')</span>
                            </button>
                            <div class="w-100">
                                <form method="GET" action="{{ route('products.search') }}">
                                    <div class="d-flex align-items-center w-100 nav_form">
                                        <button class="border-0 bg-transparent text-dark search-btn-dark ps-4"
                                            type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <input id="searchInput" name="search"
                                            class="form-control border-0 bg-transparent mr-sm-2 search-bar focus_none text-white"
                                            type="search" aria-label="Search" placeholder="@lang('home.search')"
                                            value="{{ request()->query('search') }}" />
                                        <button class="border-0 bg-transparent text-white search-btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>

                                {{--                                    <div style="display: none" --}}
                                {{--                                         class="position-absolute border-top bg-white start-0 text-dark w-100" --}}
                                {{--                                         id="searchProduct"> --}}
                                {{--                                        <div class="container"> --}}
                                {{--                                            <div class="row"> --}}
                                {{--                                                <div class="col-md-8 p-0 pt-3 border-end"> --}}
                                {{--                                                    <div class="resultProducts"> --}}
                                {{--                                                        @foreach ($products as $product) --}}
                                {{--                                                            @php --}}
                                {{--                                                                $cheapestVariant = $product->variants->sortBy('price')->first(); --}}
                                {{--                                                            @endphp --}}
                                {{--                                                            <div class="d-flex gap-2 align-items-center px-3"> --}}
                                {{--                                                                <img src="{{ asset('storage/' . $product->image) }}" --}}
                                {{--                                                                     width="60px" --}}
                                {{--                                                                     alt="{{ $product['name_'. $lang] }}"/> --}}
                                {{--                                                                <div class="d-flex flex-column"> --}}
                                {{--                                                                    <div> {{ \Str::words($product->name_uz, 6) }}</div> --}}
                                {{--                                                                    <div --}}
                                {{--                                                                        class="fw-bold fs-14">{{ number_format($cheapestVariant->discount_price, 0, '', ' ') }} --}}
                                {{--                                                                        сум --}}
                                {{--                                                                    </div> --}}
                                {{--                                                                </div> --}}
                                {{--                                                            </div> --}}
                                {{--                                                        @endforeach --}}
                                {{--                                                    </div> --}}

                                {{--                                                    <a href="{{route('products')}}" class=" "> --}}
                                {{--                                                        <div --}}
                                {{--                                                            class="text-orange w-100 py-3 px-4 allproductresult text-center"> --}}
                                {{--                                                            Все Продукты  [100 товаров] --}}
                                {{--                                                        </div> --}}
                                {{--                                                    </a> --}}
                                {{--                                                </div> --}}
                                {{--                                                <div class="col-md-4 d-md-flex flex-column gap-2 d-none p-3"> --}}
                                {{--                                                    <div class="text-grey">Все в категориях</div> --}}
                                {{--                                                    @foreach ($categories as $category) --}}
                                {{--                                                    <div class="fw-bold d-flex justify-content-between"> --}}
                                {{--                                                        <div class="fs-14">{{$category['name_'.$lang]}}</div> --}}
                                {{--                                                        <div class="fs-14">{{$category->count()}}</div> --}}
                                {{--                                                    </div> --}}
                                {{--                                                    @endforeach --}}
                                {{--                                                </div> --}}
                                {{--                                            </div> --}}
                                {{--                                        </div> --}}
                                {{--                                    </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-lg-flex d-none justify-content-around align-items-end">
                        <li class="d-flex flex-column align-items-center">
                            <a href="{{ route('favorites') }}" class="icon position-relative">
                                <div class="icon-wrapper">
                                    <i class="fa-regular fa-heart"></i>
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                                <span class="badge badge-pill badge-danger badge-position rounded-circle"
                                    id="favorite-count">
                                    {{ session('favorites') ? count(session('favorites')) : 0 }}
                                </span>
                            </a>
                            <small class="">@lang('home.featured')</small>
                        </li>
                        <li class="d-flex flex-column align-items-center">
                            <a href="/compare" class="icon position-relative">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#fff" stroke="none">
                                        <path d="M2015 4786 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -982 -3 -2144 l3
    -2112 21 -27 c11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566 21
    15 11 37 33 48 48 l21 27 0 2139 0 2139 -21 27 c-11 15 -33 37 -48 48 -27 21
    -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -2226 l0 -1920 -320 0 -320 0 0
    1920 0 1920 320 0 320 0 0 -1920z" />
                                        <path d="M3615 3506 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -694 -3 -1504 3
    -1468 3 -1472 24 -1499 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539
    0 566 21 15 11 37 33 48 48 21 27 21 28 21 1526 0 1498 0 1499 -21 1526 -11
    15 -33 37 -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -1586
    l0 -1280 -320 0 -320 0 0 1280 0 1280 320 0 320 0 0 -1280z" />
                                        <path d="M415 2226 c-41 -18 -83 -69 -90 -109 -3 -18 -5 -406 -3 -864 3 -822
    3 -832 24 -859 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566
    21 15 11 37 33 48 48 21 27 21 34 21 886 0 852 0 859 -21 886 -11 15 -33 37
    -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -946 l0 -640 -320
    0 -320 0 0 640 0 640 320 0 320 0 0 -640z" />
                                    </g>
                                </svg>
                                <span class="badge badge-pill badge-danger badge-position rounded-circle compare"
                                    id="compare-count">
                                    {{ session('compares') ? count(session('compares')) : 0 }}
                                </span>

                            </a>
                            <small class="">@lang('home.comparison')</small>
                        </li>
                        <li class="d-flex flex-column align-items-center">
                            <a href="{{ route('cart') }}" class="icon position-relative">
                                <svg width="30" height="35" viewBox="0 0 16 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 14.0625C5.55228 14.0625 6 13.6428 6 13.125C6 12.6072 5.55228 12.1875 5 12.1875C4.44772 12.1875 4 12.6072 4 13.125C4 13.6428 4.44772 14.0625 5 14.0625Z"
                                        fill="#fff" />
                                    <path
                                        d="M12 14.0625C12.5523 14.0625 13 13.6428 13 13.125C13 12.6072 12.5523 12.1875 12 12.1875C11.4477 12.1875 11 12.6072 11 13.125C11 13.6428 11.4477 14.0625 12 14.0625Z"
                                        fill="#fff" />
                                    <path
                                        d="M14 3.28135H2.91L2.5 1.3126C2.47662 1.20512 2.41379 1.10874 2.32243 1.04022C2.23107 0.971698 2.11697 0.935384 2 0.937595H0V1.8751H1.59L3.5 10.8751C3.52338 10.9826 3.58621 11.079 3.67757 11.1475C3.76893 11.216 3.88303 11.2523 4 11.2501H13V10.3126H4.41L4 8.4376H13C13.1156 8.44024 13.2286 8.40526 13.3197 8.3386C13.4109 8.27193 13.4746 8.17771 13.5 8.07197L14.5 3.85322C14.5168 3.78367 14.5164 3.71145 14.4989 3.64206C14.4814 3.57268 14.4472 3.50795 14.399 3.4528C14.3508 3.39766 14.2898 3.35355 14.2206 3.32384C14.1515 3.29413 14.076 3.27959 14 3.28135ZM12.6 7.5001H3.81L3.11 4.21885H13.375L12.6 7.5001Z"
                                        fill="#fff" />
                                </svg>
                                <span class="badge badge-pill badge-danger badge-position rounded-circle cart-label" id="cart-count">
    {{ session('cart') ? count(session('cart')) : 0 }}
</span>
                            </a>
                            <small class="">@lang('home.basket')</small>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div style="display: none" class="rounded-bottom container px-0 katalog" id="Katalog">
        <div class="py-2 pt-4">
            <div class="d-flex">
                <div class="left">
                    <p class="hover-content hover-catalog d-flex align-items-center gap-2" data-target="content1">
                        <img src="/assets/icons/phone_icon.svg" width="30px" alt="Смартфоны" /> Смартфоны
                    </p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content2">
                        <img src="/assets/icons/accessories_icon.png" width="30px" alt="Аксессуары" /> Аксессуары
                        для
                        смартфонов
                    </p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content3"><img
                            src="/assets/icons/tv_icon.png" width="30px" alt="" />Телевизоры</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content4"><img
                            src="/assets/icons/sumka.svg" width="30px" alt="" />Рюкзаки и чемоданы</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content5"><img
                            src="/assets/icons/fitnes_icon.png" width="30px" alt="" /> Фитнес и здоровоье
                    </p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content6"><img
                            src="/assets/icons/scooter_icon.png" width="30px" alt="" /> Электротранспорт
                    </p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content7"><img
                            src="/assets/icons/pilesos_icon.png" width="30px" alt="" /> Пылесосы</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content8"><img
                            src="/assets/icons/headphone.svg" width="30px" alt="" /> Наушники и колонки</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content9"><img
                            src="/assets/icons/radio.svg" width="30px" alt="" /> Сетевое оборудование</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content10"><img
                            src="/assets/icons/home.png" width="30px" alt="" />Умный дом</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content11"><img
                            src="/assets/icons/print.svg" width="30px" alt="" />Фото и видео</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content12"><img
                            src="/assets/icons/weather.png" width="30px" alt="" />Климатическая техника</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content13"><img
                            src="/assets/icons/planshet.svg" width="30px" alt="" />Планшеты</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content14"><img
                            src="/assets/icons/periphery.png" width="30px" alt="" />Периферия</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content15"><img
                            src="/assets/icons/gift.png" width="30px" alt="" />Подарочные сертификаты</p>
                    <p class="hover-content d-flex align-items-center gap-2" data-target="content16"><img
                            src="/assets/icons/car.png" width="30px" alt="" />Все для авто</p>
                </div>
                <div class="right d-sm-block d-none w-75">
                    <div class="content-change default container h-100 p-0" id="content1">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">POCO</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Redmi</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Xiaomi</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content2">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold d-flex align-items-center">Кабели и переходники</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold d-flex align-items-center">Зарядные устройства</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content3">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-2">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Графические планшеты</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content4">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Мониторы</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Телевизоры</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Телевизионные приставки и пульты</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все TV <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content5">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для города</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для школьников и студенто</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content6">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для школьников</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content7">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для школьников</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content8">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content9">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content10">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для школьников</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content11">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для авто</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content12">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content13">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для школьников</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content14">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для школьников</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content15">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для школьников</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                    <div class="content-change hide container h-100 p-0" id="content16">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="row p-4 py-1">
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Для школьников</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">Спортивные</div>
                                </a>
                                <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                    <div class="cart fw-bold">o Чемоданы</div>
                                </a>
                            </div>
                            <div class="border-top p-4 py-2">
                                <button class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                    Все Смартфоны <img src="/assets/icons/arrow.svg" alt="" /></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="d-sm-none d-block" />
            <ul class="gap-3 d-sm-none d-block">
                <li class="mb-3"><a class="hover-orange" href="{{ route('news') }}">Новости</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('products') }}">Обзоры</a></li>
                <li class="mb-3"><a class="hover-orange" href="/about">О нас</a></li>
                <li class="mb-3"><a class="hover-orange" href="/contacts">Контакты</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('blog') }}">Блог</a></li>
            </ul>
        </div>
    </div> --}}
    <div style="display: none" class="rounded-bottom container px-0 katalog" id="Katalog">
        <div class="py-2 pt-4">

            <ul class="gap-3 d-sm-none d-block">
                <li class="mb-3"><a class="hover-orange" href="{{ route('news') }}">Новости</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('products') }}">Обзоры</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('about') }}">О нас</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('contact') }}">Контакты</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('blog') }}">Блог</a></li>
            </ul>
        </div>
    </div>

</nav>
