@extends('layouts.page')
<?php
$lang = \Illuminate\Support\Facades\App::getLocale();
?>
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold text-lowercase fs-14">Главная страница / <span class="text-dark">О нас</span></a>
            </div>
            <hr />
        </div>
        <h1 class="fw-normal hover-orange mb-4 mt-4">Новости Xiaomi →</h1>
        <div class="row">
            @if(!empty($news) && $news->count(0))
                @foreach($news as $new)
                    <a href="{{ route('single.news', $new->slug) }}" class="col-md-4 col-sm-6 mb-3">
                        <img height="250px" class="w-100 fit-cover rounded-top" src="{{ asset('storage/' . $new->image) ?? '/assets/images/news1.jpg'}}" alt="" />
                        <div class="p-4 bg-cardgrey rounded-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/assets/icons/calendar-icon.svg" alt="" />
                                <div class="text-grey">{{ $new->date ?? '17.09.2024'}} г.</div>
                            </div>
                            <h4 class="fw-normal">{{ $new['title_' . $lang] ?? 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15'}}</h4>
                        </div>
                    </a>
                @endforeach
            @else
                <a href="javascript:void(0)" class="col-md-4 col-sm-6 mb-3">
                    <img height="250px" class="w-100 fit-cover rounded-top" src="/assets/images/news1.jpg" alt="" />
                    <div class="p-4 bg-cardgrey rounded-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <img src="/assets/icons/calendar-icon.svg" alt="" />
                            <div class="text-grey">17.09.2024 г.</div>
                        </div>
                        <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col-md-4 col-sm-6 mb-3">
                    <img height="250px" class="w-100 fit-cover rounded-top" src="/assets/images/news1.jpg" alt="" />
                    <div class="p-4 bg-cardgrey rounded-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <img src="/assets/icons/calendar-icon.svg" alt="" />
                            <div class="text-grey">17.09.2024 г.</div>
                        </div>
                        <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col-md-4 col-sm-6 mb-3">
                    <img height="250px" class="w-100 fit-cover rounded-top" src="/assets/images/news1.jpg" alt="" />
                    <div class="p-4 bg-cardgrey rounded-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <img src="/assets/icons/calendar-icon.svg" alt="" />
                            <div class="text-grey">17.09.2024 г.</div>
                        </div>
                        <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col-md-4 col-sm-6 mb-3">
                    <img height="250px" class="w-100 fit-cover rounded-top" src="/assets/images/news1.jpg" alt="" />
                    <div class="p-4 bg-cardgrey rounded-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <img src="/assets/icons/calendar-icon.svg" alt="" />
                            <div class="text-grey">17.09.2024 г.</div>
                        </div>
                        <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                    </div>
                </a>
            @endif
        </div>
        <h1 class="fw-normal hover-orange mb-4 mt-4">Полезные статьи →</h1>
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-3">
                <img height="250px" class="w-100 fit-cover rounded-top" src="./assets/images/category_pilesos.webp" alt="" />
                <div class="p-4 bg-cardgrey rounded-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <img src="./assets/icons/calendar-icon.svg" alt="" />
                        <div class="text-grey">17.09.2024 г.</div>
                    </div>
                    <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <img height="250px" class="w-100 fit-cover rounded-top" src="./assets/images/product_3.webp" alt="" />
                <div class="p-4 bg-cardgrey rounded-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <img src="./assets/icons/calendar-icon.svg" alt="" />
                        <div class="text-grey">17.09.2024 г.</div>
                    </div>
                    <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <img height="250px" class="w-100 fit-cover rounded-top" src="./assets/images/category_photo.jpg" alt="" />
                <div class="p-4 bg-cardgrey rounded-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <img src="./assets/icons/calendar-icon.svg" alt="" />
                        <div class="text-grey">17.09.2024 г.</div>
                    </div>
                    <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <img height="250px" class="w-100 fit-cover rounded-top" src="./assets/images/product_2.webp" alt="" />
                <div class="p-4 bg-cardgrey rounded-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <img src="./assets/icons/calendar-icon.svg" alt="" />
                        <div class="text-grey">17.09.2024 г.</div>
                    </div>
                    <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <img height="250px" class="w-100 fit-cover rounded-top" src="./assets/images/product_2.webp" alt="" />
                <div class="p-4 bg-cardgrey rounded-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <img src="./assets/icons/calendar-icon.svg" alt="" />
                        <div class="text-grey">17.09.2024 г.</div>
                    </div>
                    <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <img height="250px" class="w-100 fit-cover rounded-top" src="./assets/images/product_2.webp" alt="" />
                <div class="p-4 bg-cardgrey rounded-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <img src="./assets/icons/calendar-icon.svg" alt="" />
                        <div class="text-grey">17.09.2024 г.</div>
                    </div>
                    <h4 class="fw-normal">Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4>
                </div>
            </div>
        </div>
    </main>
@endsection
