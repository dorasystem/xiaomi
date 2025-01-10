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
        <h1 class="fw-normal hover-orange mb-4 mt-4">@lang('home.new_items') Xiaomi </h1>
        <div class="row">
            @if (!empty($news) && $news->count(0))
                @foreach ($news as $new)
                    <a href="{{ route('single.news', $new->slug) }}"
                        class="col-md-4 col-sm-6 mb-3">
                        <img height="250px" class="w-100 fit-cover rounded-top"
                            src="{{ asset('storage/' . $new->image) ?? '/assets/images/news1.jpg' }}" alt="" />
                        <div class="p-4 bg-cardgrey rounded-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/assets/icons/calendar-icon.svg" alt="" />
                                <div class="text-grey"> {{ \Carbon\Carbon::parse($new->date)->format('d.m.Y') }}</div>
                            </div>
                            <h4 class="fw-normal">
                                {{ $new['title_' . $lang] ?? 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15' }}
                            </h4>
                        </div>
                    </a>
                @endforeach
            @else
                <h2>@lang('home.no_other_news')</h2>
            @endif
        </div>
        <h1 class="fw-normal hover-orange mb-4 mt-4">@lang('home.useful_articles') </h1>
        <div class="row">
            @if (!empty($articles) && $articles->count(0))
                @foreach ($articles as $item)
                    <a href="{{ route('single.article', $item->slug) }}"
                        class="col-md-4 col-sm-6 mb-3">
                        <img height="250px" class="w-100 fit-cover rounded-top"
                            src="{{ asset('storage/' . $item->image) ?? '/assets/images/category_pilesos.webp' }}"
                            alt="" />
                        <div class="p-4 bg-cardgrey rounded-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/assets/icons/calendar-icon.svg" alt="" />
                                <div class="text-grey"> {{ \Carbon\Carbon::parse($item->date)->format('d.m.Y') }}</div>
                            </div>
                            <h4 class="fw-normal">
                                {{ $item['title_' . $lang] ?? 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15' }}
                            </h4>
                        </div>
                    </a>
                @endforeach
            @else
                <h2>@lang('home.no_other_news')</h2>
            @endif
        </div>
    </main>
@endsection
