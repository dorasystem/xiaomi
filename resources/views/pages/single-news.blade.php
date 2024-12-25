@extends('layouts.page')

@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold text-lowercase fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('footer.news')</span></a>
            </div>
            <hr />
        </div>
        <div class="row align-items-center justify-content-between mb-lg-0 mb-2">
            <h2 class="order-lg-1 order-2 col-lg-10 fw-normal hover-orange mb-3">
                {{ $news['title_' . $locale] ?? 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15' }}</h2>
            <div class="order-lg-2 order-1 col-lg-2 d-flex align-items-center gap-2">
                <img src="/assets/icons/calendar-icon.svg" alt="" />
                <div class="text-grey">{{ \Carbon\Carbon::parse($news->date)->format('d.m.Y') }}</div>
            </div>
        </div>
        <div class="mb-5">
            {!! $news['description_' . $locale] !!}
            <br /><br />
            {!! $news['content_' . $locale] ??
                "Какие будут характеристики Xiaomi 15
                        Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления
                        достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно
                        стандарту IP68. <br /><br />
                        Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50
                        Вт. <br /><br />
                        В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки
                        через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран." !!}
        </div>
        <h1 class="fw-normal hover-orange mb-4 mt-5 text-history">@lang('home.other_news')</h1>

        <div style="overflow: hidden" class="news container py-3 position-relative">
            <div class="swiper-wrapper">
                @if (!empty($otherNews) && $otherNews->count())
                    @foreach ($otherNews as $item)
                        <div class="swiper-slide product shadow-sm position-relative rounded">
                            <a href="/" class="mb-3">
                                <img height="250px" class="w-100 fit-cover"
                                    src="{{ asset('storage/' . $item->image) ?? '/assets/images/news1.jpg' }}"
                                    alt="" />
                                <div class="p-4 bg-darkgrey">
                                    <div class="d-flex align-items-center d-none gap-2">
                                        <img src="/assets/icons/calendar-icon.svg" alt="" />
                                        <div class="text-grey"> {{ \Carbon\Carbon::parse($item->date)->format('d.m.Y') }}
                                        </div>
                                    </div>
                                    <h4 class="fw-normal text-history">{{ $item['title_' . $locale] }}</h4>

                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide product shadow-sm position-relative rounded">
                        <a href="/" class="mb-3">
                            <img height="250px" class="w-100 fit-cover" src="/assets/images/news1.jpg" alt="" />
                            <div class="p-4 bg-darkgrey">
                                <div class="d-flex align-items-center d-none gap-2">
                                    <img src="/assets/icons/calendar-icon.svg" alt="" />
                                    <div class="text-grey">17.09.2024 г.</div>
                                </div>
                                <h4 class="fw-normal text-history">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi
                                    15</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide product shadow-sm position-relative rounded">
                        <a href="/single-news.html" class="mb-3">
                            <img height="250px" class="w-100 fit-cover" src="/assets/images/news1.jpg" alt="" />
                            <div class="p-4 bg-darkgrey">
                                <div class="d-flex align-items-center d-none gap-2">
                                    <img src="/assets/icons/calendar-icon.svg" alt="" />
                                    <div class="text-grey">17.09.2024 г.</div>
                                </div>
                                <h4 class="fw-normal text-history">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi
                                    15</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide product shadow-sm position-relative rounded">
                        <a href="/single-news.html" class="mb-3">
                            <img height="250px" class="w-100 fit-cover" src="/assets/images/news1.jpg" alt="" />
                            <div class="p-4 bg-darkgrey">
                                <div class="d-flex align-items-center d-none gap-2">
                                    <img src="/assets/icons/calendar-icon.svg" alt="" />
                                    <div class="text-grey">17.09.2024 г.</div>
                                </div>
                                <h4 class="fw-normal text-history">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi
                                    15</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide product shadow-sm position-relative rounded">
                        <a href="/single-news.html" class="mb-3">
                            <img height="250px" class="w-100 fit-cover" src="/assets/images/news1.jpg" alt="" />
                            <div class="p-4 bg-darkgrey">
                                <div class="d-flex align-items-center d-none gap-2">
                                    <img src="/assets/icons/calendar-icon.svg" alt="" />
                                    <div class="text-grey">17.09.2024 г.</div>
                                </div>
                                <h4 class="fw-normal text-history">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi
                                    15</h4>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            <!-- Navigation buttons (optional) -->
            <div id="products-next" class="swiper-button-next end-0"></div>
            <div id="products-prev" class="swiper-button-prev start-0"></div>
        </div>
    </main>
@endsection
