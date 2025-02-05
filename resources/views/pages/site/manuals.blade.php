@extends('layouts.page')

@section('content')
    <main class="container ">
        <div class="my-4">
            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / </a>
                <span class="text-dark fw-bold">@lang('home.manuals')</span>
            </div>
            <hr/>
        </div>
        <div class=" mb-5 ">
            <div class="row">
                <x-page.sidebar></x-page.sidebar>

                <div class="col-lg-9 ">
                    <ul class="pdf-list">
                        @if($manuals->isNotEmpty())
                            @foreach($manuals as $manual)
                                <li class="pdf-item mb-4">
                                    <svg class="ui-icon ui-icon--pdf" viewBox="0 0 32 32" fill="none">
                                        <path
                                            d="M30.906 8.66L22.753.189A.616.616 0 0 0 22.31 0H10.16a2.468 2.468 0 0 0-2.467 2.465v8.612H2.77a1.847 1.847 0 0 0-1.845 1.845v9.233c0 1.018.828 1.845 1.845 1.845h4.924v5.54A2.466 2.466 0 0 0 10.16 32h18.453a2.466 2.466 0 0 0 2.466-2.46V9.088a.616.616 0 0 0-.172-.427zM22.462 1.66l6.693 6.954h-6.693V1.661zM2.77 22.77a.615.615 0 0 1-.614-.613v-9.234c0-.339.275-.614.614-.614h16.618c.338 0 .614.275.614.614v9.233a.615.615 0 0 1-.614.614H2.769zm27.078 6.772c0 .677-.554 1.228-1.236 1.228H10.16a1.234 1.234 0 0 1-1.235-1.23V24h10.463a1.847 1.847 0 0 0 1.845-1.845v-9.234a1.847 1.847 0 0 0-1.845-1.844H8.924V2.465c0-.68.554-1.234 1.235-1.234h11.072v8c0 .34.276.615.616.615h8v19.695z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M8.28 15.618a1.386 1.386 0 0 0-.76-.517c-.197-.053-.62-.08-1.27-.08H4.539v5.287h1.067v-1.994h.696c.484 0 .853-.026 1.107-.076.188-.041.372-.125.554-.25.181-.127.331-.3.449-.522.118-.221.176-.494.176-.818 0-.421-.102-.764-.306-1.03zm-.913 1.455a.7.7 0 0 1-.334.26c-.142.055-.423.083-.843.083h-.585v-1.5h.516c.385 0 .64.012.768.036.173.031.316.11.43.234.112.125.169.284.169.476a.71.71 0 0 1-.121.411zM13.718 16.466a2.311 2.311 0 0 0-.504-.857 1.768 1.768 0 0 0-.797-.487c-.231-.067-.566-.1-1.006-.1H9.46v5.286h2.008c.395 0 .71-.038.945-.112.315-.101.565-.242.75-.422a2.33 2.33 0 0 0 .566-.934c.108-.315.163-.69.163-1.125 0-.495-.058-.912-.174-1.25zm-1.038 2.17c-.072.237-.165.407-.28.51a.984.984 0 0 1-.43.22c-.133.034-.348.05-.646.05h-.797v-3.5h.48c.435 0 .727.016.876.05.2.043.364.126.494.249s.23.293.303.512c.072.219.108.532.108.941 0 .409-.036.732-.108.968zM18.427 15.916v-.895h-3.623v5.287h1.067V18.06h2.207v-.894H15.87v-1.251h2.556z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <a href="{{ asset('storage/' . $manual->{'pdf_' . $lang}) }}" class="pdf-link">{{ $manual['name_'.$lang] }}</a>
                                </li>
                            @endforeach
                        @else
                            <p class="text-center">
                                На данный момент нет документов.</p>
                        @endif



                    </ul>


                </div>
            </div>
        </div>

    </main>
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
    <style>
        svg {
            margin-right: 10px;
            width: 32px;
            -webkit-box-flex: 0;
            -ms-flex: none;
            flex: none;
        }
    </style>
@endsection
