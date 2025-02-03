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
                    @if (!empty($links->tik_tok))
                        <a href="{{ $links->tik_tok }}">
                            <div class="social">
                                <i class="fa-brands fa-tiktok"></i>
                            </div>
                        </a>
                    @endif


                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-3">
                <h6 class="mb-3 d-sm-block d-none fw-bold">@lang('home.for_customers')</h6>
                <h6 class="d-sm-none toggle-heading" type="button" data-bs-toggle="collapse"
                    data-bs-target="#companyDropdown" aria-expanded="false" aria-controls="companyDropdown">
                    @lang('home.for_customers')
                    <i class="fa-solid fa-chevron-down toggle-icon text-grey"></i>
                </h6>

                <div class="collapse d-sm-block" id="companyDropdown">
                    <ul class="list-unstyled text-capitalize aaa">
                        <li><a href="{{route('delivery')}}"><?= __('messages.delivery') ?></a></li>
                        <li><a href="{{route('payment')}}"><?= __('messages.payment') ?></a></li>
                        <li><a href="#"><?= __('messages.authenticity_check') ?></a></li>
                        <li><a href="{{route('warranty')}}"><?= __('messages.warranty') ?></a></li>
                        <li><a href="{{route('return.of.goods')}}"><?= __('messages.return') ?></a></li>
                        <li><a href="#"><?= __('messages.service_centers') ?></a></li>
                        <li><a href="{{{route('manuals')}}}"><?= __('messages.instructions') ?></a></li>
                        <li><a href="{{route('faq')}}"><?= __('messages.faq') ?></a></li>
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
                    data-bs-target="#customersDropdown2" aria-expanded="false" aria-controls="customersDropdown2">
                    <?= __('messages.information') ?>
                    <i class="fa-solid fa-chevron-down toggle-icon text-grey"></i>
                </h6>

                <div class="collapse d-sm-block" id="customersDropdown2">
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
                <form id="contactForm">
                    <div class="mb-2 mt-sm-0 mt-5">
                        <textarea class="form-control focus_none" id="message" rows="3" placeholder="<?= __('messages.write_text') ?>"></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange rounded w-100"><?= __('messages.send') ?></button>
                </form>


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
                    <div class="mt-3 d-flex justify-content-start justify-content-lg-end align-items-center comp-logo-wrap">
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
<!-- Bootstrap toast notifikatsiyasi -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    const apiKey = "7538620633:AAH1UhziRkCXnTDXRKB9kgPh-IPDm_z5tY8"; // Bot tokeningiz
    const chatId = "7422505676";  // Telegram user yoki guruh chat ID
    const contactForm = document.getElementById("contactForm");

    contactForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const messageText = document.getElementById("message").value.trim();
        const toastBody = document.querySelector('#liveToast .toast-body');
        const toastElement = document.getElementById('liveToast');
        const toast = new bootstrap.Toast(toastElement);

        if (!messageText) {
            toastBody.textContent = "❌ Пожалуйста, введите сообщение!";
            toastElement.classList.replace("bg-success", "bg-danger");
            toast.show();
            return;
        }

        const message = `
📩 <strong>Новое сообщение:</strong>
——————————————
💬 <b>Сообщение:</b> ${messageText}
——————————————
`;

        try {
            const response = await fetch(`https://api.telegram.org/bot${apiKey}/sendMessage`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    chat_id: chatId,
                    text: message,
                    parse_mode: "HTML",
                }),
            });

            if (response.ok) {
                toastBody.textContent = "✅ Сообщение успешно отправлено!";
                toastElement.classList.replace("bg-danger", "bg-success");
                toast.show();
                contactForm.reset();
            } else {
                toastBody.textContent = "⚠️ Ошибка! Попробуйте еще раз.";
                toastElement.classList.replace("bg-success", "bg-danger");
                toast.show();
            }
        } catch (error) {
            console.error("Ошибка:", error);
            toastBody.textContent = "❌ Ошибка при отправке сообщения.";
            toastElement.classList.replace("bg-success", "bg-danger");
            toast.show();
        }
    });
</script>


