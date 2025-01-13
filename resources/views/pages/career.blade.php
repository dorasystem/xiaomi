@extends('layouts.page')
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('home.vacancy')</span></a>
            </div>
            <hr />
        </div>
        <div class="row">
            @if (!empty($careers) && $careers->count())
                <div class="row align-items-center justify-content-between">
                    <h1 class="col-md-8">@lang('home.vacancy')</h1>
                </div>
                @foreach ($careers as $item)
                    <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="col-md-4 col-sm-6 rounded my-3 career">
                        <div class="bg-white rounded pb-1 h-100">
                            <img height="300" class="w-100 fit-cover rounded-top"
                                src="{{ asset('storage/' . $item->image) ?? '/assets/images/vacancy1.webp' }}"
                                alt="" />
                            <div style="font-size: 11px" class="px-3 small fw-bold text-grey">
                                {{ $item['title_' . $lang] ?? 'Мунчештское шоссе, 41' }}</div>
                            <h6 class="px-3 fw-semibold">{{ $item['name_' . $lang] ?? 'Промоутер' }}</h6>
                            <div class="px-3">{!! $item['content_' . $lang] !!}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <img class="fit-cover" width="350px" src="/assets/images/not-found.png" alt="">
                </div>

                <x-page.not-found />
            @endif

        </div>
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('home.submit_application')
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form class="order-lg-1 order-2">
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                @lang('home.full_name') <span class="text-danger">*</span>
                            </label>
                            <input required type="text" min="3" class="form-control focus_none p-3 rounded-3"
                                id="name"
                                placeholder="@if ($lang === 'uz') Ismingizni kiriting @elseif ($lang === 'ru') Введите ваше имя @else Enter your name @endif" />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">@lang('home.enter_number') <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control focus_none" id="phone" name="phone"
                                placeholder="+998 (90) 123-45-67" required />
                            <small id="phone-error" class="form-text text-danger"
                                style="display: none;">@lang('home.invalid_phone_format')</small>
                        </div>
                        <button type="submit"
                            class="btn-orange rounded-3 w-100 d-flex align-items-center justify-content-center py-2 gap-2">
                            @lang('home.send_application')
                            <img src="/assets/icons/arrow_white.svg" alt="" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const phoneInput = document.getElementById('phone');
        const errorText = document.getElementById('phone-error');

        phoneInput.addEventListener('input', () => {
            let value = phoneInput.value.replace(/\D/g, '');

            if (!value.startsWith('998')) value = '998' + value;

            value = value.slice(0, 12);

            let formatted = '+998 ';
            if (value.length > 3) formatted += `(${value.slice(3, 5)}`;
            if (value.length > 5) formatted += `) ${value.slice(5, 8)}`;
            if (value.length > 8) formatted += `-${value.slice(8, 10)}`;
            if (value.length > 10) formatted += `-${value.slice(10, 12)}`;

            phoneInput.value = formatted.trim();
        });

        phoneInput.addEventListener('blur', () => {
            const phoneRegex = /^\+998 \([0-9]{2}\) [0-9]{3}-[0-9]{2}-[0-9]{2}$/;
            errorText.style.display = phoneRegex.test(phoneInput.value) ? 'none' : 'block';
        });
    </script>
@endsection
