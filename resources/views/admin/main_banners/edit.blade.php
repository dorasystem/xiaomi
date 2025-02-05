@extends('layouts.admin')

@section('content')
    <form action="{{ route('main_banners.update', $mainBanner->id) }}" method="POST" enctype="multipart/form-data"
          class="needs-validation">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать баннер</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Баннер</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="main-content">
                    <div class="row">
                        @foreach(['uz', 'ru', 'en'] as $lang)
                            <div class="col-lg-4">
                                <div class="card stretch">
                                    <div class="card-header">
                                        <h5 class="card-title">Изображения ({{ strtoupper($lang) }})</h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="form-group pb-3">
                                            <input type="file" name="images[{{ $lang }}][]" class="form-control" multiple>
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="mb-3">Текущие изображения:</label>
                                            <div class="d-flex flex-wrap">
                                                @if (isset($mainBanner->images[$lang]) && is_array($mainBanner->images[$lang]))
                                                    @foreach ($mainBanner->images[$lang] as $key => $image)
                                                        <div class="image-preview m-2 position-relative">
                                                            <a href="{{ isset($mainBanner->product_ids[$lang][$key]) ? route('products.show', $mainBanner->product_ids[$lang][$key]) : '#' }}">
                                                                <img src="{{ asset('storage/' . $image) }}" alt="image"
                                                                     style="width: 100px; height: 100px; object-fit: cover;">
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm delete-image-btn" data-lang="{{ $lang }}" data-image="{{ $image }}"
                                                                    style="position: absolute; top: 0; right: 0;">X
                                                            </button>
                                                            <select name="product_ids[{{ $lang }}][]" class="form-control mt-2">
                                                                <option value="">Выберите продукт</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}"
                                                                        {{ isset($mainBanner->product_ids[$lang][$key]) && $mainBanner->product_ids[$lang][$key] == $product->id ? 'selected' : '' }}>
                                                                        {{ $product->name_ru }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>Нет изображений.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Изображение 1</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <input type="file" name="image1" class="form-control">
                                    </div>
                                    @if ($mainBanner->image1)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/' . $mainBanner->image1) }}" alt="image1"
                                                 style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Изображение 2</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <input type="file" name="image2" class="form-control">
                                    </div>
                                    @if ($mainBanner->image2)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/' . $mainBanner->image2) }}" alt="image2"
                                                 style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="delete_images" id="delete_images" value="{}">
                </div>
            </div>
        </main>
    </form>
@endsection
