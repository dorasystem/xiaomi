<?php
$lang = app()->getLocale();
?>
<main class="text-light-black fs-14 fs-12-responsive mt-responsive dr-text">
    <div class="container ">
        <div class="d-flex align-items-center  flex-wrap mt-4">
            <div class=" col-md-6 d-flex flex-column align-items center justify-content-center gap-3">
                <h3 class="">@lang('home.not_found')</h3>
                <a class="" href="/">
                    <button type="button" class="btn-orange text-white border-0 rounded p-15-28 ">
                        @lang('home.go_to_home')
                    </button>
                </a>
            </div>
        </div>
    </div>
</main>
