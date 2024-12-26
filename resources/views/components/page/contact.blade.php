<?php
use App\Models\Store;
$lang = app()->getLocale();
$locations = Store::all();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 pt-5 pe-lg-5 pe-2">
            <h1 class="mb-4">@lang('home.our_shops')</h1>
            <!-- Tabs Navigation -->
            <ul class="border-0 flex-wrap ps-0 nav-tabs gap-3 addresses mb-0" id="tabsNavigation" role="tablist">
                @foreach ($locations as $key => $location)
                    <li class="nav-item" role="presentation">
                        <button
                            class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent {{ $key === 0 ? 'active' : '' }}"
                            id="tab{{ $location['id'] }}-button" data-bs-toggle="tab"
                            data-bs-target="#tab{{ $location['id'] }}-content" type="button" role="tab"
                            aria-controls="tab{{ $location['id'] }}-content"
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                            <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                            <div class="d-flex flex-column align-items-start">
                                <h5>{{ $location['address_' . $lang] }}</h5>
                                <div>{{ $location['title_' . $lang] }}</div>
                            </div>
                        </button>
                    </li>
                @endforeach
            </ul>

        </div>
        <div class="col-lg-6">
            <!-- Tabs Content -->
            <div class="tab-content" id="tabsContent">
                <div class="tab-pane fade show active" id="tab1-content" role="tabpanel" aria-labelledby="tab1-button">
                    <div id="map1" class="map-container"></div>
                </div>
                <div class="tab-pane fade pt-3" id="tab2-content" role="tabpanel" aria-labelledby="tab2-button">
                    <div id="map2" class="map-container"></div>
                </div>
                <div class="tab-pane fade pt-3" id="tab3-content" role="tabpanel" aria-labelledby="tab3-button">
                    <div id="map3" class="map-container"></div>
                </div>
                <div class="tab-pane fade pt-3" id="tab4-content" role="tabpanel" aria-labelledby="tab4-button">
                    <div id="map4" class="map-container"></div>
                </div>
                <div class="tab-pane fade pt-3" id="tab5-content" role="tabpanel" aria-labelledby="tab5-button">
                    <div id="map5" class="map-container"></div>
                </div>
                <div class="tab-pane fade pt-3" id="tab6-content" role="tabpanel" aria-labelledby="tab6-button">
                    <div id="map6" class="map-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
