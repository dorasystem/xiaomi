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
                <div class="col-lg-3 d-lg-block d-none">
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
                <div class="col-lg-3 d-lg-none  d-flex ">
                    <div class="w-100 mb-4 position-relative">
                        <button style="border: 2px solid #dee1e6ff; border-radius: 0.375rem" onclick="toggleDiv()"
                            id="toggleButton"
                            class="w-100 d-flex justify-content-between p-2 ps-3 drop-shadow bg-transparent ">
                            @lang('home.payment_text')
                            <i class="fa-solid fa-chevron-down transition-icon"></i>
                        </button>
                        <div id="toggleContent" class="position-absolute drop-shadow hidden-content w-100"
                            style="z-index: 10; overflow: hidden; max-height: 0; ">
                            <ul style=" border-width: 1px 2px 2px 2px; border-color:#dee1e6ff; border-style: solid;"
                                class="d-flex flex-column rounded-bottom bg-white p-3 pb-0">
                                <li class="mb-3">
                                    <a href="{{ route('payment') }}"
                                        class="text-grey hover_text_org {{ request()->routeIs('payment') ? 'active-link' : '' }}">@lang('home.payment_text')</a>
                                </li>
                                <li class="mb-3">
                                    <a href="javascript:void(0)"
                                        class="text-grey hover_text_org {{ request()->routeIs('delivery') ? 'active-link' : '' }}">@lang('home.delivery')</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 ">
                    <h4 class="fw-bold">Оплата картой онлайн</h4>
                    <div class="row align-items-start  my-3">
                        <img class="col-3" src="/assets/images/info-pay.png" alt="">
                        <div class="col-9">Вы можете оплатить заказ онлайн с использованием банковской карты.</div>
                    </div>
                    <div class="disc">
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

                    <h4 class="fw-bold mt-5 mb-1">Способ оплаты "Paygine"</h4>
                    <div class="">
                        <img src="/assets/images/paymentbanner.png" alt="" style="max-height:180px;"
                            class="w-100 fit-cover rounded-1">
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-3 my-3">
                        <img src="/assets/images/mastercard.png" alt="">
                        <img src="/assets/images/mir.png" alt="">
                        <img src="/assets/images/visa.png" alt="">
                        <img src="/assets/images/paygine.png" alt="">
                    </div>
                    <div class="">Оплатить заказ можно с помощью банковских карт платёжных систем Visa, MasterCard,
                        МИР. При оплате банковской картой безопасность платежей гарантирует процессинговый центр
                        <a href="https://paygine.ru">Paygine</a>
                    </div>
                    <br>
                    <div class="">Приём платежей происходит через защищённое безопасное соединение, используя протокол
                        TLS 1.2. Компания <a href="https://paygine.ru">Paygine</a> соответствует международным требованиями
                        PCI DSS для обеспечения
                        безопасной обработки реквизитов банковской карты плательщика. Ваши конфиденциальные данные
                        необходимые для оплаты (реквизиты карты, регистрационные данные и др.) не поступают в
                        Интернет-магазин, их обработка производится на стороне процессингового центра <a
                            href="https://paygine.ru">Paygine</a> и полностью
                        защищена. Никто, в том числе интернет-магазин mi-shop.com, не может получить банковские и
                        персональные данные плательщика.
                    </div>
                    <br>
                    <div class="">
                        При оплате заказа банковской картой возврат денежных средств производится на ту же самую карту, с
                        которой был произведён платёж
                    </div>

                    <h4 class="fw-bold mt-5 mb-1">Способ оплаты "Яндекс Сплит"</h4>
                    <div class="row align-items-start my-4">
                        <img class="col-3" src="/assets/images/split-logo.png" alt="">
                        <div class="col-9">Это простой и безопасный сервис оплаты частями, с которым можно сплитовать
                            покупки на срок до 2-х лет! </div>
                    </div>
                    <h5 class="fw-bold">Как оформить покупку в "Сплит":</h5>
                    <ol style="padding-left:18px;">
                        <li class="mt-3">Кладем товары в корзину</li>
                        <li class="mt-3">Выбираем способ оплаты "Яндекс Сплит"</li>
                        <li class="mt-3">Выбирайте комфортный для вас срок сплита. Сплит на два месяца бесплатный, а более
                            длительный
                            срок сплита с небольшой доплатой. </li>
                        <li class="mt-3">После оплаты спишется первый платеж, остальные согласно графику.</li>
                    </ol>
                    <div class="mt-3">Товар вы получите сразу</div>
                    <div class="mt-3">Ищите "Сплит" в способах оплаты в корзине</div>

                    <h4 class="fw-bold mt-5 mb-1">Рассрочка «Покупай со Сбером»</h4>
                    <div class="row align-items-center  my-4">
                        <img class="col-3" src="/assets/images/rass.png" alt="">
                        <div class="col-9">Владельцы дебетовой банковской карты ПАО Сбербанк, подключившиеся к услуге
                            «Мобильный банк» и системе «СберБанк Онлайн», могут совершать покупки в рассрочку, не выходя из
                            дома! </div>
                    </div>
                    <h5 class="mt-3 fw-bold">Преимущества сервиса:</h5>
                    <div class="disc">
                        <ul>
                            <li class="mt-3">Оформление онлайн</li>
                            <li class="mt-3">Без первоначального взноса по кредиту</li>
                            <li class="mt-3">Без переплаты за товар</li>
                            <li class="mt-3">Срок действия рассрочки 6, 10* или 12* месяцев</li>
                            <li class="mt-3">Сумма кредита от 3 000 до 300 000 рублей</li>
                            <li class="mt-3">Электронный чек направляется на адрес электронной почты или номер телефона
                                покупателя после оформления доставки.</li>
                        </ul>
                    </div>
                    <h5 class="mt-3 fw-bold">Основные требования:</h5>
                    <div class="disc">
                        <ul>
                            <li class="mt-3">Гражданство РФ</li>
                            <li class="mt-3">Возраст покупателя — от 21 до 70 лет на момент возврата кредита по договору
                            </li>
                            <li class="mt-3">Наличие постоянной (временной) регистрации по месту жительства/пребывания на
                                территории РФ</li>
                        </ul>
                    </div>
                    <h5 class="mt-3 fw-bold">Как это работает:</h5>
                    <ol>
                        <li class="mt-3">Определитесь с покупкой. В качестве оплаты выберите «Рассрочка от СберБанка».
                            Выберите удобный способ доставки.</li>
                        <li class="mt-3">Авторизуйтесь в приложении Сбербанк Онлайн и заполните заявку.</li>
                        <li class="mt-3">Если рассрочка одобрена, оплата заказа происходит автоматически. Получите товар.
                        </li>
                    </ol>
                    <p>Подробнее ознакомиться с условиями кредитования Вы можете на сайте «Покупай со Сбером». ПАО
                        Сбербанк.
                        *-временно недоступны
                    </p>

                    <h4 class="fw-bold mt-5 mb-1">Рассрочка «ТБанк»</h4>
                    <div class="row align-items-center  my-4">
                        <img class="col-3" src="/assets/images/rasst.png" alt="">
                        <div class="col-9">Совершайте покупки в рассрочку, не выходя из дома! </div>
                    </div>
                    <h5 class="mt-3 fw-bold">Как оформить рассрочку:</h5>
                    <ol>
                        <li class="mt-3">Добавьте понравившийся товар на сайте нашего магазина в корзину.</li>
                        <li class="mt-3">Выберите в корзине способ оплаты «В рассрочку».</li>
                        <li class="mt-3">Заполните форму с вашими данными.</li>
                        <li class="mt-3">Дождитесь одобрения банка — это займет до двух минут.</li>
                        <li class="mt-3">Подпишите договор доступным способом:
                            - Подписание через СМС. Договор с условиями и графиком платежей придет вам на почту;

                            - Подписание на встрече с представителем. Представитель привезет вам на подпись договор с
                            условиями и графиком платежей;

                            - Подписание с помощью Self ID. Вы сможете использовать технологию Self ID. Чтобы подписать
                            договор онлайн, нужно будет загрузить фотографии страниц паспорта и ваше селфи с паспортом.</li>
                        <li class="mt-3">Магазин Mi-Shop доставит покупку по своим стандартным правилам. Получить товар
                            может только
                            человек, на которого оформлен договор, для этого нужно показать паспорт.
                        </li>
                    </ol>
                    <h5 class="my-3 fw-bold">Кто и на каких условиях может взять рассрочку:</h5>
                    <div class="ps-5">- Граждане РФ в возрасте от 18 до 75 лет <br> <br>

                        - С пропиской на территории РФ <br> <br>

                        - Номер телефона для оформления заявки должен начинаться на +7 (9**) <br> <br>

                        -Сумма покупки — от 3000р. <br> <br>

                        - Срок рассрочки на 3, 4, 6 и 10 месяцев
                    </div>

                    <h5 class="my-3 fw-bold">Как платить по рассрочке:</h5>
                    <ol class="padding-left:18px;">
                        <li class="mt-3"> Если вы оформили рассрочку с подписанием через СМС, получите график платежей
                            вместе
                            с договором и номером счета. Документ придет по электронной почте или ссылкой по СМС</li>
                        <li class="mt-3">Если подписать онлайн не вышло, представитель привезет вам договор на подпись.
                        </li>
                        <li class="mt-3">В любом случае вы можете погасить рассрочку досрочно — деньги за это не взимают.
                        </li>
                    </ol>
                    <h4 class="my-3 fw-bold mb-5">Быстро и удобно:</h4>
                    <div class="ps-5">
                        - Подтверждение дохода не обязательно <br>

                        - Достаточно только паспорта <br>

                        - Решение банка за две минуты
                    </div>
                    <div class="mt-2">Участвуют банки: АО "ТБанк", АО «ОТП Банк», ПАО «Совкомбанк», КБ «Ренессанс Кредит»
                        (ООО), ПАО «МТС-Банк», ООО МФК "ЭйрЛоанс" (Квику)</div>
                    <div class="row my-3">
                        <img class="col-3" src="/assets/images/icons.png" alt="">
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
