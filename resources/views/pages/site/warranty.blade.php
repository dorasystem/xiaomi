@extends('layouts.page')

@section('content')
    <main class="container ">
        <div class="my-4">
            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / </a>
                <span class="text-dark fw-bold">@lang('home.warranty')</span>
            </div>
            <hr/>
        </div>
        <div class=" mb-5 ">
            <div class="row">
                <x-page.sidebar></x-page.sidebar>

                <div class="col-lg-9 ">
                    @php
                        $lang = app()->getLocale();
                        $imagePath = '/assets/images/information/1111.png'; // Default rasm

                        if ($lang === 'uz') {
                                $imagePath = '/assets/images/information/1111.jpg';
                        } elseif ($lang === 'ru') {
                        $imagePath = '/assets/images/information/1112.jpg';
                        } elseif ($lang === 'en') {
                            $imagePath = '/assets/images/information/1113.jpg';
                        }
                    @endphp

                    <div class="">
                        <img style="min-height: 150px" class="w-100 rounded fit-cover" src="{{ $imagePath }}" alt="">
                    </div>
                    <h4 class="fw-semibold mt-4">Гарантия на товары</h4>
                    <div class="disc mt-3">
                        <b class="fs-14">Куда обратиться за гарантийным обслуживанием?</b>
                        <ul class="">
                            <li class="mb-3 fs-14">На товары в нашем магазине предоставляется гарантия, подтверждающая обязательства по отсутствию в товаре наличия заводских дефектов. Гарантия предоставляется на срок от 10 дней до 3 лет, в зависимости от сервисной политики производителя. Срок гарантии указан в описании каждого товара на нашем сайте.
                            </li>
                            <li class="mb-3 fs-14">Пожалуйста, проверяйте комплектацию и отсутствие дефектов товара при получении.</li>
                            <li class="mb-3 fs-14">Гарантийным обслуживанием занимаются сервисные центры, авторизованные производителями. Вы можете отправить товар на гарантийный ремонт или вызвать мастера за счёт сервисного центра. Доступные варианты указаны в Вашем гарантийном талоне.</li>
                            <li class="mb-3 fs-14">Адреса и телефоны сервисных центров можно найти на гарантийном талоне или в списке сервисных центров.
                            </li>
                            <li class="mb-3 fs-14">Если в вашем городе нет сервисного центра, обслуживающего товар, Вы можете обратиться в отдел клиентского обслуживания нашей компании.
                            </li>
                        </ul>
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
