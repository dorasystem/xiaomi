@extends('layouts.page')

@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('home.useful_articles') </span></a>
            </div>
            <hr />
        </div>
        <div class="row align-items-center justify-content-between mb-lg-0 mb-2">
            <h2 class="order-lg-1 order-2 col-lg-10 fw-normal hover-orange mb-3">{{ $articles['title_' . $locale] ?? ' ' }}
            </h2>
            <div class="order-lg-2 order-1 col-lg-2 d-flex align-items-center gap-2">
                <img src="/assets/icons/calendar-icon.svg" alt="" />
                <div class="text-grey">{{ $articles->date }}</div>
            </div>
        </div>
        <div class="mb-5">
            {!! $articles['description_' . $locale] !!}
            <br /><br />
            {!! $articles['content_' . $locale] ?? '' !!}
        </div>
    </main>
@endsection
