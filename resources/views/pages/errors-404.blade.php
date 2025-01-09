@extends('layouts.page')
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('home.page_not_found')</span></a>
            </div>
            <hr />
        </div>
        <main class="">
            <div class="container ">
                <div class="row mt-4 mt-lg-0">
                    <div class=" col-md-6 d-flex flex-column align-items-center justify-content-center gap-3">
                        <h3 class="dr-text">@lang('home.page_not_found')</h3>
                        <div class="">
                            <a href="{{ route('home') }}" type="button"
                                class="btn-orange rounded w-100 d-flex align-items-center gap-2 px-4 justify-content-center">
                                @lang('home.go_to_home')
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <img class="fit-cover" width="350px" src="/assets/images/not-found.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </main>
@endsection
