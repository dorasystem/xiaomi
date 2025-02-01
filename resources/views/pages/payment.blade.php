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
        <div class=" my-5">
            <div class="row">
                <div class="col-3">
                    <ul class="p-0">
                        <li class="mb-4">
                            <a href="{{ route('payment') }}"
                                class="fs-5 text-grey hover_text_org {{ request()->routeIs('payment') ? 'active-link' : '' }}">@lang('home.payment_text')</a>
                        </li>
                        <li class="mb-4">
                            <a href="javascript:void(0)"
                                class="fs-5 text-grey hover_text_org {{ request()->routeIs('delivery') ? 'active-link' : '' }}">@lang('home.delivery')</a>
                        </li>

                    </ul>
                </div>
                <div class="col-9 disc">
                    <h5 class="fw-bold">Оплата картой онлайн</h5>
                    <div class="d-flex align-items-start gap-2 my-3">
                        <img src="/assets/images/info-pay.png" alt="">
                        <div class="">Вы можете оплатить заказ онлайн с использованием банковской карты.</div>
                    </div>
                    <div class="">
                        <ul class="">
                            <li>Мы используем платежный шлюз ПАО «Сбербанк России» и принимаем к оплате карты: VISA,
                                MasterCard и МИР. </li>
                            <li>Заказ можно оплатить сразу или в течение 4 часов после создания. На это время товар
                                зарезервирован за вами. </li>
                            <li>Пожалуйста, приготовьте вашу пластиковую карту заранее. Соединение с платежным шлюзом и
                                передача информации осуществляется в защищенном режиме с использованием протокола шифрования
                                SSL. </li>
                        </ul>
                        <div class="">В случае, если ваш банк поддерживает технологию безопасного проведения
                            интернет-платежей Verified By Visa или MasterCard Secure Code, для проведения платежа также
                            может потребоваться ввод специального пароля. Способы и возможность получения паролей для
                            совершения интернет-платежей вы можете уточнить в банке, выпустившем карту.
                            Настоящий сайт поддерживает 256-битное шифрование. Конфиденциальность сообщаемой персональной
                            информации обеспечивается ПАО «Сбербанк России». Введенная информация не будет предоставлена
                            третьим лицам за исключением случаев, предусмотренных законодательством РФ. Проведение платежей
                            по банковским картам осуществляется в строгом соответствии с требованиями платежных систем.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
