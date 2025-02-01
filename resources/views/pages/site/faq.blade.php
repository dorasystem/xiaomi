@extends('layouts.page')

@section('content')
    <main class="">
    <div class="container my-4 mb-5">

            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold  fs-14">@lang('home.home') / </a>
                <span class="text-dark fw-bold">@lang('home.faq')</span>
            </div>
            <hr />


    </div>

        <div class="container my-5">
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
    </main>
@endsection
