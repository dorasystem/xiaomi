@extends('layouts.page')
@section('content')
    <main class="">
        <!-- contact -->
        <div class="container my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / <span class="text-dark">@lang('footer.contacts')</span></a>
            </div>
            <hr />
        </div>
        <x-page.contact />
    </main>
@endsection
