@php
    use App\Models\Product;
    use App\Models\StaticKeyword;
    use Illuminate\Support\Facades\App;
    use App\Models\Contact;
    use App\Models\Category;

    $currentLocale = app()->getLocale();
$categories = Category::whereNull('parent_id')->orderBy('id', 'desc')->get();

    $childCategories = Category::with('children')->get();
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
                    <li><a class="text-grey hover-orange {{ request()->is('about') ? 'active' : '' }}"
                           href="/about">@lang('footer.about_us')</a></li>
                    <li><a class="text-grey hover-orange {{ request()->routeIs('products') ? 'active' : '' }}"
                           href="{{ route('products') }}">@lang('footer.products')</a></li>
                    <li><a class="text-grey hover-orange {{ request()->routeIs('career') ? 'active' : '' }}"
                           href="{{ route('career') }}">@lang('footer.career')</a></li>
                    <li><a class="text-grey hover-orange {{ request()->routeIs('news') ? 'active' : '' }}"
                           href="{{ route('news') }}">@lang('footer.news')</a></li>
                    <li><a class="text-grey hover-orange {{ request()->routeIs('blog') ? 'active' : '' }}"
                           href="{{ route('blog') }}">@lang('footer.blog')</a></li>
                    <li><a class="text-grey hover-orange {{ request()->is('contact') ? 'active' : '' }}"
                           href="/contact">@lang('footer.contacts')</a></li>
                </ul>

            </div>
            <div class="col-lg-5 mt-lg-0 mt-2 ps-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-md-block d-none">
                        <div class="social-icons d-flex align-items-center justify-content-between gap-2">
                            @if (!empty($links->youtube))
                                <a target="_blank" href="{{ $links->youtube }}">
                                    <i class="fa-brands fa-youtube" style="color: #9095a0"></i>
                                </a>
                            @endif

                            @if (!empty($links->instagram))
                                <a target="_blank" href="{{ $links->instagram }}">
                                    <i class="fa-brands fa-instagram" style="color: #9095a0"></i>
                                </a>
                            @endif
                            @if (!empty($links->telegram))
                                <a target="_blank" href="{{ $links->telegram }}"><i class="fa-brands fa-telegram"
                                                                                    style="color: #9095a0"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <a href="tel:+998 77 282 00 80" class="d-flex align-items-center gap-1">
                            <img src="/assets/icons/phone" alt=""/>
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
                                                  alt="Mi Logo"/> </a>
                </div>
                <div class="col-8 d-flex align-items-center justify-content-end pe-0 gap-4">
                    <div class="">
                        {{--                        <a href="/compare" class="icon position-relative">--}}
                        {{--                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30" height="30"--}}
                        {{--                                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">--}}
                        {{--                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000"--}}
                        {{--                                    stroke="none">--}}
                        {{--                                    <path d="M2015 4786 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -982 -3 -2144 l3--}}
                        {{--                                                    -2112 21 -27 c11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566 21--}}
                        {{--                                                    15 11 37 33 48 48 l21 27 0 2139 0 2139 -21 27 c-11 15 -33 37 -48 48 -27 21--}}
                        {{--                                                    -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -2226 l0 -1920 -320 0 -320 0 0--}}
                        {{--                                                    1920 0 1920 320 0 320 0 0 -1920z" />--}}
                        {{--                                    <path d="M3615 3506 c-41 -18 -83 -69 -90 -109 -3 -18 -4 -694 -3 -1504 3--}}
                        {{--                                                    -1468 3 -1472 24 -1499 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539--}}
                        {{--                                                    0 566 21 15 11 37 33 48 48 21 27 21 28 21 1526 0 1498 0 1499 -21 1526 -11--}}
                        {{--                                                    15 -33 37 -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -1586--}}
                        {{--                                                    l0 -1280 -320 0 -320 0 0 1280 0 1280 320 0 320 0 0 -1280z" />--}}
                        {{--                                    <path d="M415 2226 c-41 -18 -83 -69 -90 -109 -3 -18 -5 -406 -3 -864 3 -822--}}
                        {{--                                                    3 -832 24 -859 11 -15 33 -37 48 -48 27 -21 38 -21 566 -21 528 0 539 0 566--}}
                        {{--                                                    21 15 11 37 33 48 48 21 27 21 34 21 886 0 852 0 859 -21 886 -11 15 -33 37--}}
                        {{--                                                    -48 48 -27 21 -40 21 -554 23 -423 2 -533 0 -557 -11z m865 -946 l0 -640 -320--}}
                        {{--                                                    0 -320 0 0 640 0 640 320 0 320 0 0 -640z" />--}}
                        {{--                                </g>--}}
                        {{--                            </svg>--}}
                        {{--                            @if(session('compares') && count(session('compares')) > 0)--}}
                        {{--                                <span class="badge badge-pill badge-danger badge-position rounded-circle compare" id="compare-count">--}}
                        {{--                                        {{ count(session('compares')) }}--}}
                        {{--                                    </span>--}}
                        {{--                            @else--}}
                        {{--                                <span class="badge badge-pill badge-danger badge-position rounded-circle compare" id="compare-count"></span>--}}
                        {{--                            @endif--}}
                        {{--                        </a>--}}
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="{{ asset('admins/assets/vendors/img/flags/4x3/' . $currentLocale . '.svg') }}"
                                     alt="" class="img-fluid wd-20"/>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="">
                                    <a href="{{ url('locale/uz') }}"
                                       class="dropdown-item d-flex align-items-center gap-2 {{ $currentLocale === 'uz' ? 'active' : '' }}">
                                        <img src="{{ asset('/admins/assets/vendors/img/flags/1x1/uz.svg') }}"
                                             alt="Uzbek" class="img-fluid wd-20"
                                             style="width: 30px;height: 30px;border-radius: 50%"/>
                                        <span class="text-black">O'zbek</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ url('locale/ru') }}"
                                       class="dropdown-item d-flex align-items-center gap-2 {{ $currentLocale === 'ru' ? 'active' : '' }}">
                                        <img src="{{ asset('/admins/assets/vendors/img/flags/1x1/ru.svg') }}"
                                             alt="Русский" class="img-fluid wd-20"
                                             style="width: 30px;height: 30px;border-radius: 50%"/>
                                        <span class="text-black">Русский</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ url('locale/en') }}"
                                       class="dropdown-item d-flex align-items-center gap-2 {{ $currentLocale === 'en' ? 'active' : '' }}">
                                        <img src="{{ asset('/admins/assets/vendors/img/flags/1x1/en.svg') }}"
                                             alt="English" class="img-fluid wd-20"
                                             style="width: 30px;height: 30px;border-radius: 50%"/>
                                        <span class="text-black">English</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <button class="toggleButton border-0 px-2 bg-transparent">
                        <div class="d-flex flex-column katalogicon">
                            <div class="line line2"></div>
                            <div class="line line2"></div>
                            <div class="line line2"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="container w-100 navbar-2 navbar-custom navbar py-sm-3 py-2 ps-2 position-relative">
            <div class="container pe-0">
                <div class="row align-items-center w-100">
                    <div class="col-lg-2 col-4 mb-lg-0 mb-3 d-lg-block d-none">
                        <a class="logo" href="/"><img style="width: 87%" src="/assets/images/miLogo.svg"
                                                      alt="Mi Logo"/> </a>
                    </div>
                    <div class="col-lg-7 px-sm-2 px-0">
                        <div class="d-flex align-items-center gap-4">
                            <button class="toggleButton btn-white d-none rounded d-sm-flex gap-3 align-items-center border-0 px-4">
                                <div class="d-flex flex-column katalogicon">
                                    <div class="line line2"></div>
                                    <div class="line line2"></div>
                                    <div class="line line2"></div>
                                </div>
                                <span class="d-lg-block d-none text-nowrap"> @lang('footer.catalog')</span>
                            </button>
                            <div class="w-100">
                                <form method="GET" action="{{ route('products.search') }}">
                                    <div class="d-flex align-items-center w-100 nav_form">
                                        <button class="border-0 bg-transparent text-dark search-btn-dark ps-4"
                                                type="submit" disabled>
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <input id="searchInput" name="search"
                                               class="form-control border-0 bg-transparent mr-sm-2 search-bar focus_none text-white"
                                               type="search" aria-label="Search" placeholder="@lang('home.search')"
                                               value="{{ request()->query('search') }}"/>
                                        <button class="border-0 px-4 bg-transparent text-white search-btn" type="submit"
                                                disabled>
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const searchInput = document.getElementById('searchInput');
                                        const searchButtons = document.querySelectorAll('.search-btn, .search-btn-dark');

                                        // Tugmachalarni dastlab o‘chirish (agar input bo‘sh bo‘lsa)
                                        toggleSearchButtons();

                                        // Input qiymati o'zgarganda tugmachalarni faollashtirish yoki o'chirish
                                        searchInput.addEventListener('input', toggleSearchButtons);

                                        function toggleSearchButtons() {
                                            const isInputEmpty = searchInput.value.trim() === '';
                                            searchButtons.forEach(button => {
                                                button.disabled = isInputEmpty; // Tugmachani faollashtirish yoki o'chirish
                                                button.style.opacity = isInputEmpty ? '0.5' : '1'; // Tugmachaning ko'rinishini boshqarish
                                                button.style.cursor = isInputEmpty ? 'not-allowed' : 'pointer'; // Tugmachaning ko'rinishini boshqarish
                                            });
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-lg-flex d-none justify-content-around align-items-end">
                        <li class="d-flex flex-column align-items-center">
                            <a href="{{ route('favorites') }}" class="icon position-relative">
                                <div class="icon-wrapper">
                                    <i class="fa-sharp fa-regular fa-heart" style="font-size: 24px"></i>
                                    <i class="fa-sharp fa-solid fa-heart" style="font-size: 24px"></i>
                                </div>
                                @if(session('favorites') && count(session('favorites')) > 0)
                                    <span class="badge badge-pill badge-danger badge-position rounded-circle"
                                          id="favorite-count">
                                        {{ count(session('favorites')) }}
                                    </span>
                                @else
                                    <span class="badge badge-pill badge-danger badge-position rounded-circle"
                                          id="favorite-count"></span>
                                @endif
                            </a>
                            <small class="">@lang('home.featured')</small>
                        </li>
                        <li class="d-flex flex-column align-items-center">
                            <a href="/compare" class="icon position-relative">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30" height="35"
                                     style="font-size: 24px"
                                     viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                       fill="#fff" stroke="none">
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
                                </svg>
                                @if(session('compares') && count(session('compares')) > 0)
                                    <span class="badge badge-pill badge-danger badge-position rounded-circle compare"
                                          id="compare-count">
                                        {{ count(session('compares')) }}
                                    </span>
                                @else
                                    <span class="badge badge-pill badge-danger badge-position rounded-circle compare"
                                          id="compare-count"></span>
                                @endif
                            </a>
                            <small class="">@lang('home.comparison')</small>
                        </li>
                        <li class="d-flex flex-column align-items-center">
                            <a href="{{ route('cart') }}" class="icon position-relative">
                                <svg width="30" height="35" viewBox="0 0 16 15" fill="none" style="font-size: 24px"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M5 14.0625C5.55228 14.0625 6 13.6428 6 13.125C6 12.6072 5.55228 12.1875 5 12.1875C4.44772 12.1875 4 12.6072 4 13.125C4 13.6428 4.44772 14.0625 5 14.0625Z"
                                            fill="#fff"/>
                                    <path
                                            d="M12 14.0625C12.5523 14.0625 13 13.6428 13 13.125C13 12.6072 12.5523 12.1875 12 12.1875C11.4477 12.1875 11 12.6072 11 13.125C11 13.6428 11.4477 14.0625 12 14.0625Z"
                                            fill="#fff"/>
                                    <path
                                            d="M14 3.28135H2.91L2.5 1.3126C2.47662 1.20512 2.41379 1.10874 2.32243 1.04022C2.23107 0.971698 2.11697 0.935384 2 0.937595H0V1.8751H1.59L3.5 10.8751C3.52338 10.9826 3.58621 11.079 3.67757 11.1475C3.76893 11.216 3.88303 11.2523 4 11.2501H13V10.3126H4.41L4 8.4376H13C13.1156 8.44024 13.2286 8.40526 13.3197 8.3386C13.4109 8.27193 13.4746 8.17771 13.5 8.07197L14.5 3.85322C14.5168 3.78367 14.5164 3.71145 14.4989 3.64206C14.4814 3.57268 14.4472 3.50795 14.399 3.4528C14.3508 3.39766 14.2898 3.35355 14.2206 3.32384C14.1515 3.29413 14.076 3.27959 14 3.28135ZM12.6 7.5001H3.81L3.11 4.21885H13.375L12.6 7.5001Z"
                                            fill="#fff"/>
                                </svg>
                                @if(session('cart') && count(session('cart')) > 0)
                                    <span class="badge badge-pill badge-danger badge-position rounded-circle cart-label"
                                          id="cart-count">
                                        {{ count(session('cart')) }}
                                    </span>
                                @else
                                    <span class="badge badge-pill badge-danger badge-position cart-label rounded-pill"
                                          id="cart-count"></span>
                                @endif
                            </a>
                            <small class="">@lang('home.basket')</small>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Katalog modal start--}}
    <div style="display: none; top: 130px" class="rounded-bottom container px-0 katalog" id="Katalog">
        <div class="py-2 pt-4">
            <div class="d-flex">
                <div class="left  d-sm-block d-none">
                        @foreach($categories as $index => $category)
                            <p class="hover-content d-flex align-items-center gap-2 {{ $index === 0 ? 'hover-catalog' : '' }}"
                               data-target="content0{{ $category->id }}">
                                <img src="{{ asset('storage/' . $category->icon) }}" width="30px"
                                     alt="{{ $category['name_' . $lang] }}"/>
                                {{ $category['name_' . $lang] }}
                            </p>
                        @endforeach
                </div>

                <div class="right d-sm-block d-none w-75">
                    @foreach($childCategories as $index => $category)
                        <div class="content-change container h-100 p-0 {{ $index === 0 ? 'default' : 'hide' }}"
                             id="content0{{ $category->id }}">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class="row p-4 py-1">
                                    @forelse($category->children as $childCategory)
                                        <a href="{{ route('category.sort', ['slug' => $childCategory->getSlugByLanguage($lang)]) }}"
                                           class="col-md-4 col-sm-6 col-12 mb-2">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $childCategory->icon) }}" class="me-2"
                                                     alt="{{ \Str::words($childCategory['name_' . $lang], 3) }}"
                                                     style="width: 50px; height: 50px;"/>
                                                <div class="cart fw-bold">{{ \Str::words($childCategory['name_' . $lang], 3) }}</div>
                                            </div>
                                        </a>
                                    @empty
                                        <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                            <div class="cart fw-bold">{{ __('messages.not_available') }}</div>
                                        </a>
                                    @endforelse
                                </div>
                                <div class="border-top p-4 py-2">
                                    <a href="{{ route('category.sort', ['slug' => $category->getSlugByLanguage($lang)]) }}"
                                       class="d-flex align-items-center gap-2 border bg-transparent p-3 py-1 rounded">
                                        {{ __('messages.all') }} {{ \Str::words($category['name_' . $lang], 3) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-sm-none d-block w-100">
                    <div class="accordion" id="mobileCategoryAccordion">
                        @foreach($categories as $index => $category)
                            <div class="accordion-item px-2">
                                <h2 class="accordion-header" id="heading{{ $category->id }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $category->id }}">
                                        <img src="{{ asset('storage/' . $category->icon) }}" width="30px" class="me-2"
                                             alt="{{ $category['name_' . $lang] }}" />
                                        {{ $category['name_' . $lang] }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $category->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                     aria-labelledby="heading{{ $category->id }}" data-bs-parent="#mobileCategoryAccordion">
                                    <div class="accordion-body">
                                        @forelse($category->children as $childCategory)
                                            <a href="{{ route('category.sort', ['slug' => $childCategory->getSlugByLanguage($lang)]) }}"
                                               class="d-flex align-items-center gap-2 mb-2">
                                                <img src="{{ asset('storage/' . $childCategory->icon) }}" width="30px" class="me-2"
                                                     alt="{{ \Str::words($childCategory['name_' . $lang], 3) }}" />
                                                <div class="cart fw-bold">{{ \Str::words($childCategory['name_' . $lang], 3) }}</div>
                                            </a>
                                        @empty
                                            <a href="javascript:void(0)" class="col-md-4 col-sm-6 col-12 mb-2">
                                                <div class="cart fw-bold">{{ __('messages.not_available') }}</div>
                                            </a>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const hoverItems = document.querySelectorAll(".hover-content");
                    const contentChange = document.querySelectorAll(".content-change");

                    hoverItems.forEach((item) => {
                        item.addEventListener("mouseover", function () {
                            const targetId = item.getAttribute("data-target");

                            hoverItems.forEach((hoverItem) => hoverItem.classList.remove("hover-catalog"));
                            item.classList.add("hover-catalog");

                            contentChange.forEach((content) => {
                                if (content.id === targetId) {
                                    content.classList.remove("hide");
                                    content.classList.add("default");
                                } else {
                                    content.classList.remove("default");
                                    content.classList.add("hide");
                                }
                            });
                        });
                    });

                    // Birinchi kategoriya va unga tegishli mahsulotlarni aktiv qilish
                    if (hoverItems.length > 0) {
                        hoverItems[0].classList.add("hover-catalog");
                    }

                    if (contentChange.length > 0) {
                        contentChange[0].classList.remove("hide");
                        contentChange[0].classList.add("default");
                    }
                });

            </script>

            <hr class="d-sm-none d-block"/>
            <ul class="gap-3 d-sm-none d-block">
                <li class="mb-3"><a class="hover-orange" href="{{ route('news') }}">Новости</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('products') }}">Обзоры</a></li>
                <li class="mb-3"><a class="hover-orange" href="/about">О нас</a></li>
                <li class="mb-3"><a class="hover-orange" href="/contacts">Контакты</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('blog') }}">Блог</a></li>
            </ul>
        </div>
    </div>
    {{--    Katalog modal end--}}
    <div style="display: none" class="rounded-bottom container px-0 katalog" id="Katalog">
        <div class="py-2 pt-4">

            <ul class="gap-3 d-sm-none d-block">
                <li class="mb-3"><a class="hover-orange" href="{{ route('about') }}">@lang('footer.about_us')</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('products') }}">@lang('footer.products')</a>
                </li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('news') }}">@lang('footer.news')</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('blog') }}">@lang('footer.blog')</a></li>
                <li class="mb-3"><a class="hover-orange" href="{{ route('contact') }}">@lang('footer.contacts')</a></li>
            </ul>
        </div>
    </div>

</nav>
<style>
    /* Til tanlash dropdown asosiy tugma */
    .dropdown-toggle {
        border: none;
        background: transparent;
        padding: 0;
        display: flex;
        align-items: center;
    }

    /* Dropdown tugmachasi (faqat flag chiqadi) */
    .dropdown-toggle img {
        width: 30px;  /* Flagning to‘g‘ri ko‘rinishi uchun */
        height: 20px;
        border-radius: 3px;
        object-fit: cover;
    }

    /* Dropdown menyusi */
    .dropdown-menu {
        min-width: 160px;
        border-radius: 8px;
        padding: 5px 0;
    }

    /* Har bir til opsiyasi */
    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 15px;
    }

    /* Flaglar (bayroqlar) dizaynini yaxshilash */
    .flag-icon {
        width: 25px;  /* Bir xil o‘lcham */
        height: 18px;
        border-radius: 3px;
        object-fit: cover;
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.2); /* Engil soyali effekt */
    }

    /* Tanlangan tilni ajratish */
    .dropdown-item.active {
        font-weight: bold;
        background-color: #f8f9fa;
    }
    .nav a.active {
        color: #ff6700 !important;
        text-decoration: none;
    }
    .nav a:hover {
        color: #ff6700 !important;
    }

</style>
