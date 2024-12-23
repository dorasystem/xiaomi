@extends('layouts.page')
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold text-lowercase fs-14">@lang('home.home') / <span class="text-dark">@lang('home.vacancy')</span></a>
            </div>
            <hr />
        </div>
        <div class="row">
            <div class="row align-items-center justify-content-between">
                <h1 class="col-md-8">@lang('home.vacancy')</h1>
            </div>
            @if(!empty($careers) && $careers->count())
                @foreach($careers as $item)
                    <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="col-md-4 col-sm-6 rounded my-3 career">
                        <div class="bg-white rounded">
                            <img height="300" class="w-100 fit-cover" src="{{ asset('storage/' . $item->image) ?? '/assets/images/vacancy1.webp'}}" alt="" />
                            <div style="font-size: 11px" class="px-3 small fw-bold text-grey">{{ $item['title_' . $lang] ?? 'Мунчештское шоссе, 41'}}</div>
                            <h6 class="px-3 fw-semibold">{{ $item['title_' . $lang] ?? 'Промоутер'}}</h6>
                            {!! $item['description_' . $lang] !!}
                        </div>
                    </div>
                @endforeach
            @else
                <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="col-md-4 col-sm-6 rounded my-3 career">
                    <div class="bg-white rounded">
                        <img height="300" class="w-100 fit-cover" src="/assets/images/vacancy2.webp" alt="" />
                        <div style="font-size: 11px" class="px-3 small fw-bold text-grey">Мунчештское шоссе, 41</div>
                        <h6 class="px-3 fw-semibold">Промоутер</h6>
                        <ul class="pb-4">
                            <li class="fs-12">Свободное владение румынским и русским языками</li>
                            <li class="fs-12">Общительный, смелый, настойчивый</li>
                            <li class="fs-12">Опыт работы приветствуется</li>
                            <li class="fs-12">Приятная внешность</li>
                            <li class="fs-12">Возраст от 16 лет</li>
                        </ul>
                    </div>
                </div>
                <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="col-md-4 col-sm-6 rounded my-3 career">
                    <div class="bg-white rounded">
                        <img height="300" class="w-100 fit-cover" src="/assets/images/vacancy3.webp" alt="" />
                        <div style="font-size: 11px" class="px-3 small fw-bold text-grey">Мунчештское шоссе, 41</div>
                        <h6 class="px-3 fw-semibold">Промоутер</h6>
                        <ul class="pb-4">
                            <li class="fs-12">Свободное владение румынским и русским языками</li>
                            <li class="fs-12">Общительный, смелый, настойчивый</li>
                            <li class="fs-12">Опыт работы приветствуется</li>
                            <li class="fs-12">Приятная внешность</li>
                            <li class="fs-12">Возраст от 16 лет</li>
                        </ul>
                    </div>
                </div>
                <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="col-md-4 col-sm-6 rounded my-3 career">
                    <div class="bg-white rounded">
                        <img height="300" class="w-100 fit-cover" src="/assets/images/vacancy4.webp" alt="" />
                        <div style="font-size: 11px" class="px-3 small fw-bold text-grey">Мунчештское шоссе, 41</div>
                        <h6 class="px-3 fw-semibold">Промоутер</h6>
                        <ul class="pb-4">
                            <li class="fs-12">Свободное владение румынским и русским языками</li>
                            <li class="fs-12">Общительный, смелый, настойчивый</li>
                            <li class="fs-12">Опыт работы приветствуется</li>
                            <li class="fs-12">Приятная внешность</li>
                            <li class="fs-12">Возраст от 16 лет</li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if ($lang === 'uz')
                            Ariza topshirish
                        @elseif ($lang === 'ru')
                            Подать заявку
                        @else
                            Submit an application
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form class="order-lg-1 order-2">
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                @if ($lang === 'uz')
                                    To‘liq ismingiz <span class="text-danger">*</span>
                                @elseif ($lang === 'ru')
                                    Полное имя <span class="text-danger">*</span>
                                @else
                                    Full Name <span class="text-danger">*</span>
                                @endif
                            </label>
                            <input type="text" class="form-control focus_none p-3 rounded-3" id="name"
                                   placeholder="@if ($lang === 'uz') Ismingizni kiriting @elseif ($lang === 'ru') Введите ваше имя @else Enter your name @endif" />
                        </div>
                        <div class="mb-4">
                            <label for="tel" class="form-label">
                                @if ($lang === 'uz')
                                    Telefon <span class="text-danger">*</span>
                                @elseif ($lang === 'ru')
                                    Телефон <span class="text-danger">*</span>
                                @else
                                    Phone <span class="text-danger">*</span>
                                @endif
                            </label>
                            <input type="tel" class="form-control focus_none p-3 rounded-3" id="tel"
                                   placeholder="@if ($lang === 'uz') +998 (90) 123-45-67 @elseif ($lang === 'ru') +998 (90) 123-45-67 @else +998 (90) 123-45-67 @endif" />
                        </div>
                        <button type="submit" class="btn-orange rounded-3 w-100 d-flex align-items-center justify-content-center py-2 gap-2">
                            @if ($lang === 'uz')
                                Arizani yuborish
                            @elseif ($lang === 'ru')
                                Отправить заявку
                            @else
                                Submit Application
                            @endif
                            <img src="/assets/icons/arrow_white.svg" alt="" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
