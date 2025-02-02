<div class="col-lg-3 d-lg-block d-none">
                    <ul class="p-0">
                        <li class="mb-4">
                            <a href="{{ route('payment') }}"
                                class="fs-5 text-grey hover_text_org {{ request()->routeIs('payment') ? 'active-link' : '' }}">@lang('home.payment_text')</a>
                        </li>
                        <li class="mb-4">
                            <a href="javascript:void(0)"
                                class="fs-5 text-grey hover_text_org {{ request()->routeIs('delivery') ? 'active-link' : '' }}">@lang('home.delivery')</a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-3 d-lg-none  d-flex ">
                    <div class="w-100 mb-4 position-relative">
                        <button style="border: 2px solid #dee1e6ff; border-radius: 0.375rem" onclick="toggleDiv()"
                            id="toggleButton"
                            class="w-100 d-flex justify-content-between p-2 ps-3 drop-shadow bg-transparent ">
                            @lang('home.payment_text')
                            <i class="fa-solid fa-chevron-down transition-icon"></i>
                        </button>
                        <div id="toggleContent" class="position-absolute drop-shadow hidden-content w-100"
                            style="z-index: 10; overflow: hidden; max-height: 0; ">
                            <ul style=" border-width: 1px 2px 2px 2px; border-color:#dee1e6ff; border-style: solid;"
                                class="d-flex flex-column rounded-bottom bg-white p-3 pb-0">
                                <li class="mb-3">
                                    <a href="{{ route('payment') }}"
                                        class="text-grey hover_text_org {{ request()->routeIs('payment') ? 'active-link' : '' }}">@lang('home.payment_text')</a>
                                </li>
                                <li class="mb-3">
                                    <a href="javascript:void(0)"
                                        class="text-grey hover_text_org {{ request()->routeIs('delivery') ? 'active-link' : '' }}">@lang('home.delivery')</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
