@extends('layouts.page')

@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold fs-14">@lang('home.home') / </a>
                <span class="text-dark fw-bold">@lang('home.delivery')</span>
            </div>
            <hr />
        </div>

        @php
            $content = \App\Models\PageContent::find(2); // ID=2 bo‘yicha ma'lumot olish
            $lang = app()->getLocale();
            $imagePath = $content ? $content->{'image_' . $lang} : '/assets/images/information/1.png'; // Default rasm
        @endphp

        <div class="mb-5">
            <div class="row">
                <x-page.sidebar></x-page.sidebar>

                <div class="col-lg-9">
                    <div class="aaa">
                        @if($content)
                            <img class="w-100 rounded fit-cover" src="{{ asset('storage/' . $imagePath) }}" alt="">
                        @else
                            <img class="w-100 rounded fit-cover" src="{{ $imagePath }}" alt="">
                        @endif
                    </div>

                    @if($content)
                        <div class="my-3 content-text">{!! str_replace(['<pre>', '</pre>'], '', $content->{'content_' . $lang}) !!}</div>

                    @else
                        <div class="my-3">Извините, но информация для этой страницы отсутствует.</div>
                    @endif
                </div>
            </div>
        </div>
    </main>
    <style>
        .content-text {
            word-wrap: break-word !important; /* Uzun so‘zlarni ajratadi */
            overflow-wrap: break-word !important; /* Harflarni uzib bo‘lsa ham ajratadi */
            white-space: normal !important; /* Matnning o‘ralishiga imkon beradi */
        }
        ul li {
            list-style-type: none;
            white-space: normal !important;
        }

    </style>
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
