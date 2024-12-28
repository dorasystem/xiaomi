@extends('layouts.page')
<?php
$lang = \Illuminate\Support\Facades\App::getLocale();
?>
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold text-lowercase fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('footer.blog')</span></a>
            </div>
            <hr />
        </div>
        <div class="blogbanner rounded w-100 my-3 py-5 d-flex align-items-center">
            <div class="col-sm-4 col-8">
                <div class="text-grey">Обзоры</div>
                <h2 class="fw-bold">{{ $blog['title_' . $lang] }}</h2>
                <div class="d-flex align-items-center gap-4 mb-3">
                    <div class="text-grey">30.09.2024</div>

                </div>
                <button class="border-1 rouned rounded text-uppercase py-1 px-4 bg-transparent">читать</button>
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($blogs as $blog)
                <a href="{{ route('single.blog', ['slug' => $blog->getSlugByLanguage($lang)]) }}"
                    class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <img height="220px" class="mb-2 w-100 rounded-top fit-cover"
                        src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog['title_' . $lang] }}" />

                    <div class="text-grey fs-14">Обзоры</div>
                    <h6 class="fw-bold">{{ $blog['title_' . $lang] }}</h6>
                    <div class="d-flex align-items-center gap-4 mb-3 fs-14">
                        <div class="text-grey">{{ \Carbon\Carbon::parse($blog->date)->format('d.m.Y') }}</div>

                    </div>
                </a>
            @endforeach
        </div>

        <div class="w-100 text-center mb-5">
            <button
                class="text-uppercase border-1 mb-5 rounded py-1 px-4 bg-transparent text-center">@lang('home.show_more')</button>
        </div>
    </main>
@endsection
