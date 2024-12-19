@extends('layouts.admin')

@section('content')
    <form action="{{ route('variants.store') }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation">
        @csrf

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Создание нового варианта</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('variants.index') }}">Варианты</a></li>
                            <li class="breadcrumb-item active">Новый вариант</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Создать</button>
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
                                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name_ru }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="storage">Место хранения:</label>
                                        <input type="text" class="form-control" id="storage" name="storage" value="{{ old('storage') }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="ram">RAM (память):</label>
                                        <input type="text" class="form-control" id="ram" name="ram" value="{{ old('ram') }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="price">Цена:</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="color_uz">Цвет UZ:</label>
                                        <input type="text" class="form-control" id="color_uz" name="color_uz" value="{{ old('color_uz') }}">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="color_en">Цвет RU:</label>
                                        <input type="text" class="form-control" id="color_en" name="color_en" value="{{ old('color_en') }}">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="color_en">Цвет EN:</label>
                                        <input type="text" class="form-control" id="color_en" name="color_en" value="{{ old('color_en') }}">
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
                                    <div class="form-group pb-3">
                                        <label for="image">Первое изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>

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
