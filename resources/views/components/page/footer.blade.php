<?php
$lang = \Illuminate\Support\Facades\App::getLocale();
use App\Models\Contact;
$links = Contact::first();

use App\Models\Product;
use App\Models\StaticKeyword;
use Illuminate\Support\Facades\App;
$currentLocale = app()->getLocale();
$products = Product::take(3)->get();
$categories = \App\Models\Category::all();
$lang = App::getLocale();

$keywords = StaticKeyword::all();

$language = app()->getLocale();
$translations = [];

foreach ($keywords as $keyword) {
    $translations[$keyword->key] = $keyword->{$language};
}

// Category
use App\Models\Category;
$categories = Category::all();
$category1 = collect($categories)->firstWhere('id', 1);
$category2 = collect($categories)->firstWhere('id', 2);
$category3 = collect($categories)->firstWhere('id', 3);
$category4 = collect($categories)->firstWhere('id', 4);
$category5 = collect($categories)->firstWhere('id', 5);
$category6 = collect($categories)->firstWhere('id', 6);
$category7 = collect($categories)->firstWhere('id', 7);

?>

<footer class="footer mb-md-0 my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 mb-5 h-100">
                <img class="w-sm-75 w-50 h-50 mb-2 rounded" src="/assets/images/xiaomiStoreWhite.webp" alt="" />
                <div class="mt-3">@lang('footer.join_us')</div>
                <div class="social-icons d-flex align-items-center mt-3">
                    @if (!empty($links->youtube))
                        <a target="_blank" href="{{ $links->youtube }}">
                            <div class="social">
                                <i class="fab fa-youtube"></i>
                            </div>
                        </a>
                    @endif

                    @if (!empty($links->instagram))
                        <a target="_blank" href="{{ $links->instagram }}">
                            <div class="social">
                                <i class="fab fa-instagram"></i>
                            </div>
                        </a>
                    @endif
                    @if (!empty($links->telegram))
                        <a href="{{ $links->telegram }}">
                            <div class="social">
                                <img src="/assets/icons/white_tg.svg" alt="" />
                            </div>
                        </a>
                    @endif
                    @if (!empty($links->facebook))
                        <a target="_blank" href="{{ $links->facebook }}">
                            <div class="social">
                                <i class="fa-brands fa-facebook-f"></i>
                            </div>
                        </a>
                    @endif
                    @if (!empty($links->linkedin))
                        <a target="_blank" href="{{ $links->linkedin }}">
                            <div class="social">
                                <i class="fa-brands fa-linkedin"></i>
                            </div>
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-3">
                <h6 class="mb-3 d-sm-block d-none fw-bold">@lang('footer.catalog')</h6>
                <h6 class="d-sm-none toggle-heading" type="button" data-bs-toggle="collapse"
                    data-bs-target="#companyDropdown" aria-expanded="false" aria-controls="companyDropdown">
                    @lang('footer.catalog')
                    <i class="fa-solid fa-chevron-down toggle-icon text-grey"></i>
                </h6>
                <div class="collapse d-sm-block" id="companyDropdown">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('products') }}">@lang('footer.new_products')</a></li>
                        <li><a
                                href="{{ route('category.sort', ['slug' => $category2->getSlugByLanguage($lang)]) }}">{{ $category2['name_' . $lang] }}</a>
                        </li>
                        <li><a href="{{ route('category.sort', ['slug' => $category4->getSlugByLanguage($lang)]) }}">{{ $category4['name_' . $lang] }}</a></li>
                        <li><a href="{{ route('category.sort', ['slug' => $category1->getSlugByLanguage($lang)]) }}">{{ $category1['name_' . $lang] }}</a></li>
                        <li><a href="{{ route('category.sort', ['slug' => $category3->getSlugByLanguage($lang)]) }}">{{ $category3['name_' . $lang] }}</a></li>
                        <li><a href="{{ route('category.sort', ['slug' => $category5->getSlugByLanguage($lang)]) }}">{{ $category5['name_' . $lang] }}</a></li>
                        <li><a href="{{ route('category.sort', ['slug' => $category6->getSlugByLanguage($lang)]) }}">{{ $category6['name_' . $lang] }}</a></li>
                        <li><a href="{{ route('category.sort', ['slug' => $category7->getSlugByLanguage($lang)]) }}">{{ $category7['name_' . $lang] }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <h6 class="mb-3 d-sm-block d-none fw-bold">@lang('footer.xiaomi_store')</h6>
                <h6 class="d-sm-none toggle-heading mb-4" type="button" data-bs-toggle="collapse"
                    data-bs-target="#customersDropdown" aria-expanded="false" aria-controls="customersDropdown">
                    @lang('footer.xiaomi_store')
                    <i class="fa-solid fa-chevron-down toggle-icon text-grey"></i>
                </h6>
                <div class="collapse d-sm-block" id="customersDropdown">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}">@lang('footer.about_us')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('footer.our_stores')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('footer.contacts')</a></li>
                        <li><a href="{{ route('blog') }}">@lang('footer.blog')</a></li>
                        <li><a href="{{ route('news') }}">@lang('footer.news')</a></li>
                        <li><a href="{{ route('career') }}">@lang('footer.career')</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-3">
                <h6 class="mb-4 fw-bold">@lang('footer.contact_us')</h6>
                <a href="tel:{{ $links->phone }}" class=""><i class="fas fa-phone-alt"></i> {{ $links->phone }}
                </a>
                <p class="mt-3"><i class="fa-regular fa-clock"></i> {{ $translations['work_time'] }}</p>
                <div class="">
                    <i class="fa-solid fa-location-dot"></i> {{ $links->address }}
                </div>

            </div>
        </div>
    </div>
    <div class="footer2 d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mt-4">
                    <small>
                        © 2017–2024 Общество с ограниченной ответственностью "МИ БАЙ" 220007 г. Минск, ул. Аэродромная,
                        д.125, пом.21 Свидетельство о регистрации №291478180, выдано
                        26.06.2017г. Администрацией Ленинского р-на г. Бреста. УНП №392751 от 19.09.2017г.
                    </small>
                </div>
            </div>
        </div>
    </div>
</footer>
