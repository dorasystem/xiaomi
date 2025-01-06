<?php
$lang = app()->getLocale();
?>
<main class="text-light-black fs-14 fs-12-responsive mt-responsive dr-text">
    <div class="container ">
        <div class="d-flex align-items-center justify-content-center flex-wrap mt-4 mt-lg-0">
            <div class="d-flex flex-column align-items center justify-content-center gap-3">
                <h3 class="dr-text">@lang('home.page_not_found')</h3>
                <a class="text-center" href="{{ route('index') }}">
                    <button type="button" class="bg-main-orange text-white border-0 rounded-5-main p-15-28 mt-4">
                        @lang('home.go_to_home')
                    </button>
                </a>
            </div>
        </div>
    </div>
</main>
