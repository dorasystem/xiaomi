@extends('layouts.page')
@section('content')
    <main class="">
        <!-- contact -->
        <div class="container my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="./index.html" class="text-grey fw-bold text-lowercase fs-14">Главная страница / <span class="text-dark">О нас</span></a>
            </div>
            <hr />
        </div>
        <div class="bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-5 pe-lg-5 pe-2">
                        <h1 class="mb-4">Наши магазины</h1>
                        <!-- Tabs Navigation -->
                        <ul class="border-0 flex-wrap ps-0 nav-tabs gap-3 addresses mb-0" id="tabsNavigation" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="locationtab d-flex gap-4 align-items-center active w-100 border-0 border-top py-4 bg-transparent"
                                    id="tab1-button"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tab1-content"
                                    type="button"
                                    role="tab"
                                    aria-controls="tab1-content"
                                    aria-selected="true"
                                >
                                    <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                    <div class="d-flex flex-column align-items-start">
                                        <h5 class="" class="">Location 1</h5>
                                        <div class="">Laborum et magna est officia es</div>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                    id="tab2-button"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tab2-content"
                                    type="button"
                                    role="tab"
                                    aria-controls="tab2-content"
                                    aria-selected="false"
                                >
                                    <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                    <div class="d-flex flex-column align-items-start">
                                        <h5 class="" class="">Location 2</h5>
                                        <div class="">Laborum et magna est officia es</div>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                    id="tab3-button"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tab3-content"
                                    type="button"
                                    role="tab"
                                    aria-controls="tab3-content"
                                    aria-selected="false"
                                >
                                    <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                    <div class="d-flex flex-column align-items-start">
                                        <h5 class="" class="">Location 3</h5>
                                        <div class="">Laborum et magna est officia es</div>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                    id="tab4-button"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tab4-content"
                                    type="button"
                                    role="tab"
                                    aria-controls="tab4-content"
                                    aria-selected="false"
                                >
                                    <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                    <div class="d-flex flex-column align-items-start">
                                        <h5 class="" class="">Location 4</h5>
                                        <div class="">Laborum et magna est officia es</div>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                    id="tab5-button"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tab5-content"
                                    type="button"
                                    role="tab"
                                    aria-controls="tab5-content"
                                    aria-selected="false"
                                >
                                    <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                    <div class="d-flex flex-column align-items-start">
                                        <h5 class="">Location 5</h5>
                                        <div>Laborum et magna est officia es</div>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="locationtab d-flex gap-4 align-items-center w-100 border-0 border-top py-4 bg-transparent"
                                    id="tab6-button"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tab6-content"
                                    type="button"
                                    role="tab"
                                    aria-controls="tab6-content"
                                    aria-selected="false"
                                >
                                    <div class="shop-icon p-2 rounded"><i class="fa-solid fa-shop"></i></div>
                                    <div class="d-flex flex-column align-items-start">
                                        <h5 class="">Location 6</h5>
                                        <div>Laborum et magna est officia es</div>
                                    </div>
                                </button>
                            </li>
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
        </div>
    </main>
@endsection
