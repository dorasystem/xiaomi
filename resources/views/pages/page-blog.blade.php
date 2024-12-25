@extends('layouts.page')
<?php
$lang = \Illuminate\Support\Facades\App::getLocale()
?>
@section('content')
<main class="container">
    <div class="my-4">
        <div class="d-flex align-items-center gap-3">
            <a href="/" class="text-grey fw-bold text-lowercase fs-14">@lang('home.home') / <span class="text-dark">@lang('footer.blog')</span></a>
        </div>
        <hr />
    </div>
    <div class="blogbanner rounded w-100 my-3 py-5 d-flex align-items-center">
        <div class="col-sm-4 col-8">
            <div class="text-grey">Обзоры</div>
            <h2 class="fw-bold">Два титана: сравнительный обзор Xiaomi 14T и Xiaomi 14T Pro</h2>
            <div class="d-flex align-items-center gap-4 mb-3">
                <div class="text-grey">30.09.2024</div>
                <div class="d-flex align-items-center text-grey gap-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.3">
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M10 5.5C7.51472 5.5 5.5 7.51472 5.5 10C5.5 12.4853 7.51472 14.5 10 14.5C12.4853 14.5 14.5 12.4853 14.5 10C14.5 7.51472 12.4853 5.5 10 5.5ZM6.5 10C6.5 8.067 8.067 6.5 10 6.5C11.933 6.5 13.5 8.067 13.5 10C13.5 11.933 11.933 13.5 10 13.5C8.067 13.5 6.5 11.933 6.5 10Z"
                                fill="black"
                            />
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M10 3C7.07115 3 4.58248 4.45581 2.84644 6.00157C1.97516 6.77735 1.27951 7.58772 0.798043 8.27586C0.557608 8.61951 0.365858 8.93941 0.23193 9.21513C0.108863 9.46849 0 9.75253 0 10C0 10.2475 0.108863 10.5315 0.23193 10.7849C0.365858 11.0606 0.557608 11.3805 0.798043 11.7241C1.27951 12.4123 1.97516 13.2226 2.84644 13.9984C4.58248 15.5442 7.07115 17 10 17C12.9288 17 15.4175 15.5442 17.1536 13.9984C18.0248 13.2226 18.7205 12.4123 19.202 11.7241C19.4424 11.3805 19.6341 11.0606 19.7681 10.7849C19.8911 10.5315 20 10.2475 20 10C20 9.75253 19.8911 9.46849 19.7681 9.21513C19.6341 8.93941 19.4424 8.61951 19.202 8.27586C18.7205 7.58772 18.0248 6.77735 17.1536 6.00157C15.4175 4.45581 12.9288 3 10 3ZM1.02221 10.0854C1.00606 10.0349 1.00164 10.0079 1.00044 10C1.00164 9.99209 1.00606 9.96508 1.02221 9.91464C1.04351 9.8481 1.07882 9.76037 1.13143 9.65205C1.23658 9.43559 1.39869 9.16174 1.61741 8.84914C2.05424 8.22478 2.69806 7.47265 3.51143 6.74843C5.14468 5.29419 7.406 4 10 4C12.594 4 14.8553 5.29419 16.4886 6.74843C17.3019 7.47265 17.9458 8.22478 18.3826 8.84914C18.6013 9.16174 18.7634 9.43559 18.8686 9.65205C18.9212 9.76037 18.9565 9.8481 18.9778 9.91464C18.9939 9.96508 18.9984 9.99209 18.9996 10C18.9984 10.0079 18.9939 10.0349 18.9778 10.0854C18.9565 10.1519 18.9212 10.2396 18.8686 10.3479C18.7634 10.5644 18.6013 10.8383 18.3826 11.1509C17.9458 11.7752 17.3019 12.5274 16.4886 13.2516C14.8553 14.7058 12.594 16 10 16C7.406 16 5.14468 14.7058 3.51143 13.2516C2.69806 12.5274 2.05424 11.7752 1.61741 11.1509C1.39869 10.8383 1.23658 10.5644 1.13143 10.3479C1.07882 10.2396 1.04351 10.1519 1.02221 10.0854Z"
                                fill="black"
                            />
                        </g>
                    </svg>
                    <div class="">4255</div>
                </div>
            </div>
            <button class="border-1 rouned rounded text-uppercase py-1 px-4 bg-transparent">читать</button>
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($blogs as $blog)
            <a href="{{ route('single.blog', ['slug' => $blog->getSlugByLanguage($lang)]) }}" class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <img height="220px" class="mb-2 w-100 rounded-top fit-cover"
                     src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog['title_' . $lang] }}" />

                <div class="text-grey fs-14">Обзоры</div>
                <h6 class="fw-bold">{{ $blog->title_ru }}</h6>
                <div class="d-flex align-items-center gap-4 mb-3 fs-14">
                    <div class="text-grey">{{ \Carbon\Carbon::parse($blog->date)->format('d.m.Y') }}</div>
                    
                </div>
            </a>
        @endforeach
    </div>

    <div class="w-100 text-center mb-5">
        <button class="text-uppercase border-1 mb-5 rounded py-1 px-4 bg-transparent text-center">@lang('home.show_more')</button>
    </div>
</main>
@endsection
