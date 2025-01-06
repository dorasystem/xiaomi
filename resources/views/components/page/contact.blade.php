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
                            id="tab{{ $location->id }}-button" data-bs-toggle="tab"
                            data-bs-target="#tab{{ $location->id }}-content" type="button" role="tab"
                            aria-controls="tab{{ $location->id }}-content"
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
                @foreach ($locations as $key => $location)
                    <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                         id="tab{{ $location->id }}-content"
                         role="tabpanel"
                         aria-labelledby="tab{{ $location->id }}-button">
                        <div id="map{{ $location->id }}" class="map-container"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    // for map
    const locations = @json($locations);

    const mapConfigs = locations.map(location => ({
        container: `map${location.id}`,
        coordinates: [parseFloat(location.latitude), parseFloat(location.longitude)],
        zoom: 12,
        markerImage: "https://cdn-icons-png.flaticon.com/512/684/684908.png"
    }));

    ymaps.ready(() => {
        mapConfigs.forEach((config) => {
            const map = new ymaps.Map(config.container, {
                center: config.coordinates,
                zoom: config.zoom,
            });

            const customPlacemark = new ymaps.Placemark(
                config.coordinates, {}, {
                    iconLayout: "default#image",
                    iconImageHref: config.markerImage,
                    iconImageSize: [40, 40],
                    iconImageOffset: [-20, -20],
                }
            );

            map.geoObjects.add(customPlacemark);
        });
    });
</script>
