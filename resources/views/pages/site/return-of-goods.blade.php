@extends('layouts.page')

@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold fs-14">@lang('home.home') / </a>
                <span class="text-dark fw-bold">@lang('home.goods')</span>
            </div>
            <hr />
        </div>

        @php
            $content = \App\Models\PageContent::find(3); // ID=3 bo‘yicha ma'lumot olish
            $lang = app()->getLocale();
            $imagePath = $content ? $content->{'image_' . $lang} : '/assets/images/information/111.png'; // Default rasm
        @endphp

        <div class="mb-5">
            <div class="row">
                <x-page.sidebar></x-page.sidebar>

                <div class="col-lg-9">
                    <div class="">
                        @if($content)
                            <img class="w-100 rounded fit-cover" src="{{ asset('storage/' . $imagePath) }}" alt="">
                        @else
                            <img class="w-100 rounded fit-cover" src="{{ $imagePath }}" alt="">
                        @endif
                    </div>

                    @if($content)
                        <div class="my-3 content-text">{!! $content->{'content_' . $lang} !!}</div>
                    @else
                        <h4 class="fw-semibold mt-4">Информация не найдена</h4>
                        <div class="my-3">Извините, но информация для этой страницы отсутствует.</div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <style>
        .content-text {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
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
