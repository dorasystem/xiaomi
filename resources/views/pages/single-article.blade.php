@extends('layouts.page')

@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold text-lowercase fs-14">@lang('home.home') / <span class="text-dark">@lang('home.useful_articles') </span></a>
            </div>
            <hr />
        </div>
        <div class="row align-items-center justify-content-between mb-lg-0 mb-2">
            <h2 class="order-lg-1 order-2 col-lg-10 fw-normal hover-orange mb-3">{{ $articles['title_' . $locale] ?? 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15'}}</h2>
            <div class="order-lg-2 order-1 col-lg-2 d-flex align-items-center gap-2">
                <img src="/assets/icons/calendar-icon.svg" alt="" />
                <div class="text-grey">{{ $articles->date }}</div>
            </div>
        </div>
        <div class="mb-5">
            {!! $articles['description_' . $locale] !!}
            <br /><br />
            {!! $articles['content_' . $locale] ?? "Какие будут характеристики Xiaomi 15
            Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления
            достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно
            стандарту IP68. <br /><br />
            Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50
            Вт. <br /><br />
            В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки
            через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран." !!}
        </div>
    </main>
@endsection
