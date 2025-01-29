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
$categories = Category::latest()->get();
$category1 = $categories->first();
$category2 = $categories->skip(1)->first();
$category3 = $categories->skip(2)->first();
$category4 = $categories->skip(3)->first();
$category5 = $categories->skip(4)->first();
$category6 = $categories->skip(5)->first();
$category7 = $categories->skip(6)->first();
?>

<footer class="footer mb-md-0 my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 mb-5 h-100">
                <img class="w-sm-75 w-50 h-50 mb-2 rounded" src="/assets/images/miLogo.svg" alt="" />
                <div class="mt-3">@lang('footer.join_us')</div>
                <div class="social-icons d-flex align-items-center mt-4">
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


                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-3">
                <h6 class="mb-3 d-sm-block d-none fw-bold">Покупателям</h6>
                <h6 class="d-sm-none toggle-heading" type="button" data-bs-toggle="collapse"
                    data-bs-target="#companyDropdown" aria-expanded="false" aria-controls="companyDropdown">
                    Покупателям
                    <i class="fa-solid fa-chevron-down toggle-icon text-grey"></i>
                </h6>
                <div class="collapse d-sm-block" id="companyDropdown">
                    <ul class="list-unstyled text-capitalize aaa">
                        <li><a href="#"><?= __('messages.delivery') ?></a></li>
                        <li><a href="#"><?= __('messages.payment') ?></a></li>
                        <li><a href="#"><?= __('messages.authenticity_check') ?></a></li>
                        <li><a href="#"><?= __('messages.warranty') ?></a></li>
                        <li><a href="#"><?= __('messages.return') ?></a></li>
                        <li><a href="#"><?= __('messages.service_centers') ?></a></li>
                        <li><a href="#"><?= __('messages.instructions') ?></a></li>
                        <li><a href="#"><?= __('messages.faq') ?></a></li>
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
                    <ul class="list-unstyled aaa">
                        <li><a href="{{ route('about') }}">@lang('footer.about_us')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('footer.our_stores')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('footer.contacts')</a></li>
                    </ul>
                </div>
                <h6 class="mb-2 mt-1 d-sm-block d-none fw-bold"><?= __('messages.information') ?></h6>
                <h6 class="d-sm-none toggle-heading mb-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#customersDropdown" aria-expanded="false" aria-controls="customersDropdown">
                    <?= __('messages.information') ?>
                    <i class="fa-solid fa-chevron-down toggle-icon text-grey"></i>
                </h6>

                <div class="collapse d-sm-block" id="customersDropdown">
                    <ul class="list-unstyled aaa">

                        <li><a href="{{ route('blog') }}">@lang('footer.blog')</a></li>
                        <li><a href="{{ route('news') }}">@lang('footer.news')</a></li>
                        <li><a href="{{ route('career') }}">@lang('footer.career')</a></li>
                    </ul>
                </div>
            </div>
            <style>
                .aaa li {
                    margin-top: 1.2px;
                }
                .comp-logo-wrap {
                    cursor: pointer;
                    transition-duration: 500ms;
                }

                .comp-logo {
                    width: 0;
                    transition-property: all;
                    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                    transition-duration: 500ms;
                }

                .comp-logo-wrap:hover .comp-logo {
                    width: 100px !important;
                }


                input[type=number]::-webkit-outer-spin-button,
                input[type=number]::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }

                input[type=number] {
                    -moz-appearance: textfield;
                }
            </style>
            <div class="col-lg-3 col-sm-6 mb-3">
                <h6 class="mb-4 fw-bold">@lang('footer.contact_us')</h6>
                <a href="tel:{{ str_replace(' ', '', $links->phone) }}" class="">
                    <i class="fa-solid fa-phone"></i>
                    <span class="mx-2">{{ $links->phone }} </span>
                </a>

                <p class="mt-3"><i class="fa-regular fa-clock"></i>
                    <span class="mx-2">{{ $translations['work_time'] }} </span></p>
                <div class="mb-2 mt-sm-0 mt-5">
                    <textarea class="form-control focus_none" id="message" rows="3" placeholder="<?= __('messages.write_text') ?>"></textarea>
                </div>
                <button type="submit" class="btn btn-orange rounded w-100"><?= __('messages.send') ?></button>


            </div>

        </div>
    </div>
    <div class="footer2 ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-4">
                    <small>
                       @lang('home.footer_desc')
                    </small>
                </div>
                <div class="col-md-4">
                    <div class="mt-3 d-flex justify-content-end align-items-center comp-logo-wrap">
                        <div class="footer__bottom__title__h5 mb-0">@lang('home.footer_title')</div>
                        <div class="comp-logo-wrap">
                            <img src="/assets/images/dora_small.svg" alt="DORA®" class="smaill-logo ms-3"
                                width="25px" />
                            <img src="/assets/images/dora-logo.svg" alt="DORA®" class="comp-logo ms-3" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>

