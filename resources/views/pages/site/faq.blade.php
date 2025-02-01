@extends('layouts.page')

@section('content')
    <div class="container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('home.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('home.faq')</li>
            </ol>
        </nav>

        <h2 class="fw-bold">@lang('home.faq')</h2>

        <div class="accordion mt-4 p-4 rounded bg-white" id="faqAccordion">
            @foreach($faqs as $index => $faq)
                <div class="accordion-item border mt-2 rounded">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $index }}">
                            {{ $faq['question'] }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                         aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ $faq['answer'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
