@extends('layouts.admin')

@section('content')
    <form action="{{ route('variants.update', $variant->id) }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation">
        @csrf
        @method('PUT')  <!-- This will specify the update method for the form -->

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактирование варианта</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('variants.index') }}">Варианты</a></li>
                            <li class="breadcrumb-item active">Редактировать вариант</li>
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
                        <div class="col-lg-8">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Детали варианта</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="product_id">Продукт:</label>
                                        <select name="product_id" id="product_id" class="form-control" required>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" {{ old('product_id', $variant->product_id) == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name_ru }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="storage">Место хранения:</label>
                                        <input type="text" class="form-control" id="storage" name="storage" value="{{ old('storage', $variant->storage) }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="ram">RAM (память):</label>
                                        <input type="text" class="form-control" id="ram" name="ram" value="{{ old('ram', $variant->ram) }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="price">Цена:</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $variant->price) }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="color_uz">Цвет UZ:</label>
                                        <input type="text" class="form-control" id="color_uz" name="color_uz" value="{{ old('color_uz', $variant->color_uz) }}">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="color_ru">Цвет RU:</label>
                                        <input type="text" class="form-control" id="color_ru" name="color_ru" value="{{ old('color_ru', $variant->color_ru) }}">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="color_en">Цвет EN:</label>
                                        <input type="text" class="form-control" id="color_en" name="color_en" value="{{ old('color_en', $variant->color_en) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Добавить изображение</h5>
                                </div>
                                <div class="card-body p-4">
                                    @if ($variant->image)
                                        <div class="form-group pb-3">
                                            <label for="current_image">Текущее изображение:</label>
                                            <img src="{{ asset('storage/' . $variant->image) }}" alt="Текущее изображение" class="img-thumbnail" width="100">
                                        </div>
                                    @endif

                                    <div class="form-group pb-3">
                                        <label for="image">Первое изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>

                                    @if ($variant->images && count($variant->images) > 0)
                                        <div class="form-group pb-3">
                                            <label for="current_images">Текущие дополнительные изображения:</label>
                                            <div class="row">
                                                @foreach ($variant->images as $image)
                                                    <div class="col-3">
                                                        <img src="{{ asset('storage/' . $image) }}" alt="Текущее изображение" class="img-thumbnail" width="100">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group pb-3">
                                        <label for="images">Дополнительные изображения:</label>
                                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </form>
@endsection
