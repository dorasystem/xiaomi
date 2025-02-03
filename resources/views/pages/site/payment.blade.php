@extends('layouts.page')

@section('content')
    <main class="container ">
        <div class="my-4">
            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / </a>
                <span class="text-dark fw-bold">@lang('home.payment_text')</span>
            </div>
            <hr />
        </div>
        <div class=" mb-5 ">
            <div class="row">
                <x-page.sidebar></x-page.sidebar>

                <div class="col-lg-9 ">
                    @php
                        $lang = app()->getLocale();
                        $imagePath = '/assets/images/information/11.png'; // Default rasm

                        if ($lang === 'uz') {
                                $imagePath = '/assets/images/information/12.jpg';
                        } elseif ($lang === 'ru') {
                        $imagePath = '/assets/images/information/13.jpg';
                        } elseif ($lang === 'en') {
                            $imagePath = '/assets/images/information/11.jpg';
                        }
                    @endphp

                    <div class="">
                        <img style="min-height: 150px" class="w-100 rounded fit-cover" src="{{ $imagePath }}" alt="">
                    </div>
                    <h4 class="fw-semibold mt-4">Как оплачивать товары в интернет-магазине «Texnomart»?</h4>
                    <div class="my-3">Мы предлагаем несколько удобных и безопасных способов оплаты для Вашего комфорта:
                        наличными, банковскими картами (Humo,Uzcard), платежными системами Click или Payme для оплаты
                        онлайн. Для юридических лиц предусмотрена оплата перечислением (с учётом НДС).

                    </div>
                    <h5 class="fw-semibold mt-4 mb-3">Чтобы совершить покупку необходимо:</h5>
                    <ol class="">
                        <li class="mb-3">Скачать мобильное приложение или зайти на сайт.</li>
                        <li class="mb-3">Авторизоваться</li>
                        <li class="mb-3">Выбрать необходимый товар и нажать на кнопку "Оформить покупку".</li>
                        <li class="mb-3">Ввести запрашиваемые данные.</li>
                        <li class="mb-3">Произвести оплату любым удобным для Вас способом.</li>
                    </ol>
                    <div class="">Возникли вопросы? Не понимаете, как оплатить Вашу покупку? Просто закажите обратный
                        звонок и наши специалисты решат любой возникший вопрос.
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script>
        function toggleDiv() {
            var content = document.getElementById("toggleContent");
            var icon = document.querySelector("#toggleButton i");
            var btn = document.querySelector("#toggleButton");

            if (content.style.maxHeight === "0px" || content.style.maxHeight === "") {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = "rotate(180deg)";
                btn.style.borderWidth = "2px 2px 0";
                btn.style.borderRadius = "0.375rem 0.375rem 0 0";
                console.log('open');


            } else {
                content.style.maxHeight = "0px";
                icon.style.transform = "rotate(0deg)";
                btn.style.borderWidth = "2px";
                btn.style.borderRadius = "0.375rem";
                console.log('close');
            }
        }
    </script>
@endsection
