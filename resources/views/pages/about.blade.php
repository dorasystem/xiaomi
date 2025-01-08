@extends('layouts.page')
@section('content')
    <main class="">
        <div class="container my-4 mb-5">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold fs-14">@lang('home.home') / <span
                        class="text-dark">@lang('footer.about_us')</span></a>
            </div>
            <hr />
            <h1 class="my-3 mb-5">@lang('home.about_or_company')</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex">
                        <div style="width: 7px" class="bg-orange me-5"></div>
                        <div style="font-family: Courier New" class="fs-4">
                            {!! $about['about_or_company_' . $lang] !!}
                        </div>
                    </div>
                </div>
                {{--                <div class="col-md-1"></div> --}}
                {{--                <div class="col-md-3 text-center"> --}}
                {{--                    <h1 class="fw-bold fs-85">100+</h1> --}}
                {{--                    <div class="text-grey"> --}}
                {{--                        стран и регионов в которых <br /> --}}
                {{--                        доступна продукция Xiaomi --}}
                {{--                    </div> --}}
                {{--                </div> --}}

            </div>
        </div>

        {{--        <div class="aboutImages d-flex gap-3"> --}}
        {{--            <img class="h-100 fit-cover" src="/assets/images/aboutbanner1.webp" alt="" /> --}}
        {{--            <img class="w-100 h-100 fit-cover" src="/assets/images/aboutbanner2.webp" alt="" /> --}}
        {{--        </div> --}}
        <div class="container my-5">
            <div class="row">
                @foreach ($histories as $history)
                    <div class="col-md-3 col-sm-6">
                        <h1 style="font-size: 50px" class="border-top border-3 pt-4 text-lightgrey fw-bold mt-3">
                            {{ $history->year }}</h1>
                        <div class="lh-normal text-black">{!! $history['description_' . $lang] !!}</div>
                    </div>
                @endforeach
            </div>
            <div class="row my-5">
                <div class="col-md-6"><img style="object-position: right" class="w-100 rounded h-100 fit-cover"
                        src="{{ asset('storage/' . $about->image) }}" alt="" /></div>
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-start gap-4">
                    {!! $about['description_' . $lang] !!}
                </div>
            </div>
            <div class="row my-5">
                <div class="order-md-1 order-2 col-md-6 d-flex flex-column justify-content-center align-items-start gap-4">
                    {!! $about['content_' . $lang] !!}
                </div>
                <div class="order-md-2 order-1 col-md-6"><img class="w-100 rounded h-100 fit-cover"
                        src="{{ asset('storage/' . $about->photo) }}" alt="" /></div>
            </div>
            <div class="row">
                <div class="row align-items-center justify-content-between">
                    <h1 class="col-md-8">@lang('home.command')</h1>

                </div>
                @if (!empty($careers) && $careers->count())
                    @foreach ($careers as $item)
                        <a href="/career" class="col-md-3 col-sm-6 rounded mb-3">
                            <div class="bg-white rounded">
                                <img height="300" class="w-100 fit-cover"
                                    src="{{ asset('storage/' . $item->image) ?? '/assets/images/vacancy1.webp' }}"
                                    alt="" />
                                <div style="font-size: 11px" class="px-3 small fw-bold text-grey">
                                    {{ $item['title_' . $lang] }}</div>
                                <div class="px-3 pb-4 fw-semibold">{{ $item['name_' . $lang] }}</div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <x-page.not-found />
                @endif
            </div>
        </div>
    </main>
@endsection
