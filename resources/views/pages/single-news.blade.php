@extends('layouts.page')
<?php
$lang = \Illuminate\Support\Facades\App::getLocale();
?>
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('footer.news')</span></a>
            </div>
            <hr />
        </div>
        {{-- <div class="row align-items-center justify-content-between mb-lg-0 mb-2">
            <h2 class="order-lg-1 order-2 col-lg-10 fw-normal hover-orange mb-3">{{ $news['title_' . $locale] ?? ' ' }}</h2>
            <div class="order-lg-2 order-1 col-lg-2 d-flex align-items-center gap-2">
                <img src="/assets/icons/calendar-icon.svg" alt="" />
                <div class="text-grey">{{ \Carbon\Carbon::parse($news['date'])->format('d.m.Y') }}</div>
            </div>
        </div> --}}
        <img src="{{ asset('storage/' . $news->image) }}" alt="" width="100%" class="d-block d-sm-none rounded "  style="margin-bottom:10px ">
         <div class="col-12 pe-lg-5 pe-2 mb-4 d-sm-block d-none">
            <div class="newbanner w-100 rounded text-white d-flex flex-column justify-content-end"
                style="background-image: url('{{ asset('storage/' . $news->image) }}'); height:400px;" >


                <h1 class="mb-4">
                    {{ $news['title_' . $locale] ?? ' ' }}
                </h1>
                <small class="fw-bold border-top pt-3">
                    {{ \Carbon\Carbon::parse($news['date'])->format('d.m.Y') }}</small>
            </div>
        </div>
        <div class="news-content mb-5">
            {!! $news['description_' . $locale] ?? 'Китайская компания готовит к выпуску...' !!}
            {!! $news['content_' . $locale] !!}
        </div>

        <h1 class="fw-normal hover-orange mb-4 mt-5 text-history">@lang('home.other_news')</h1>
        <div style="overflow: hidden" class="news container py-3 position-relative">
            <div class="swiper-wrapper">
                @if (!empty($otherNews) && $otherNews->count())
                    @foreach ($otherNews as $item)
                        <div class="swiper-slide product shadow-sm position-relative rounded">
                            <a href="{{ route('single.news', $item->slug) }}"
                               class="mb-3">
                                <img height="250px" class="w-100 fit-cover rounded-top"
                                     src="{{ asset('storage/' . $item->image) ?? '/assets/images/news1.jpg' }}"
                                     alt="" />
                                <div class="p-4 bg-darkgrey">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/icons/calendar-icon.svg" alt="" />
                                        <div class="text-grey">
                                            {{ \Carbon\Carbon::parse($item->date)->format('d.m.Y') }}</div>
                                    </div>
                                    <h4 class="fw-normal text-history">{{ $item['title_' . $locale] }}</h4>

                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <x-page.not-found />
                @endif
            </div>
            <!-- Navigation buttons (optional) -->
            <div id="products-next" class="swiper-button-next end-0"></div>
            <div id="products-prev" class="swiper-button-prev start-0"></div>
        </div>
    </main>
    <style>
        .news-content img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px auto;
        }
    </style>

@endsection
