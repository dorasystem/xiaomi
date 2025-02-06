@extends('layouts.page')

@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / <span class="text-dark">@lang('footer.blog')</span></a>
            </div>
            <hr />
        </div>
        <div class="blogdes">
            <h1 class="mb-4">{{ $blog['title_' . $lang] }}</h1>

            <div class="row align-items-center">
                <div class="col-md-6 my-3">
                    <h4 class="">
                        {!! $blog['description_' . $lang] !!}
                    </h4>
                </div>
                <img class="col-md-6 my-3 rounded" width="500px" height="300px" src="{{ asset('storage/' . $blog->image) ?? '/assets/images/banner1.webp'}}" alt="" />
            </div>
        </div>
        <div class="blogdes">
            {!! $blog['content_' . $lang] !!}
        </div>
        <div class="blogall blogdes my-5">
            <div class="d-flex gap-4">
                <div class="orange-column"></div>
                <div class="">
                    {!! $blog['general_' . $lang] !!}
                </div>
            </div>
        </div>
    </main>
@endsection
