@extends('layouts.admin')

@section('content')
    <form action="{{ route('variants.store') }}" method="POST" enctype="multipart/form-data" novalidate
          class="needs-validation">
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
                                <div class="card-body p-4 ">
                                    <div class="row">
                                        <div class="form-group pb-3 col-md-4">
                                            <label for="product_id">Продукт:</label>
                                            <select name="product_id" id="product_id" class="form-control" required>
                                                @foreach ($products as $product)
                                                    <option
                                                        value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                        {{ $product->name_ru }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group pb-3 col-md-4">
                                            <label for="storage">Место хранения:</label>
                                            <select class="form-control" id="storage" name="storage">
                                                <option value="null" {{ old('storage') == 'null' ? 'selected' : '' }}>
                                                    Null
                                                </option>
                                                <option value="32GB" {{ old('storage') == '32GB' ? 'selected' : '' }}>
                                                    32GB
                                                </option>
                                                <option value="64GB" {{ old('storage') == '64GB' ? 'selected' : '' }}>
                                                    64GB
                                                </option>
                                                <option value="128GB" {{ old('storage') == '128GB' ? 'selected' : '' }}>
                                                    128GB
                                                </option>
                                                <option value="256GB" {{ old('storage') == '256GB' ? 'selected' : '' }}>
                                                    256GB
                                                </option>
                                                <option value="512GB" {{ old('storage') == '512GB' ? 'selected' : '' }}>
                                                    512GB
                                                </option>
                                                <option value="1TB" {{ old('storage') == '1TB' ? 'selected' : '' }}>
                                                    1TB
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group pb-3 col-md-4">
                                            <label for="ram">RAM (память):</label>
                                            <select class="form-control" id="ram" name="ram">
                                                <option value="null" {{ old('ram') == 'null' ? 'selected' : '' }}>
                                                    Null
                                                </option>
                                                <option value="2GB" {{ old('ram') == '2GB' ? 'selected' : '' }}>2GB
                                                </option>
                                                <option value="4GB" {{ old('ram') == '4GB' ? 'selected' : '' }}>4GB
                                                </option>
                                                <option value="6GB" {{ old('ram') == '6GB' ? 'selected' : '' }}>6GB
                                                </option>
                                                <option value="8GB" {{ old('ram') == '8GB' ? 'selected' : '' }}>8GB
                                                </option>
                                                <option value="12GB" {{ old('ram') == '12GB' ? 'selected' : '' }}>12GB
                                                </option>
                                                <option value="16GB" {{ old('ram') == '16GB' ? 'selected' : '' }}>16GB
                                                </option>
                                            </select>
                                        </div>


                                        <div class="form-group pb-3 col-md-4">
                                            <label for="color_uz">Цвет UZ:</label>
                                            <select class="form-control" id="color_uz" name="color_uz">
                                                <option value="null" {{ old('color_uz') == 'null' ? 'selected' : '' }}>
                                                    Null
                                                </option>
                                                <option value="red" {{ old('color_uz') == 'red' ? 'selected' : '' }}>
                                                    Qizil
                                                </option> <!-- Uzbek for Red -->
                                                <option
                                                    value="green" {{ old('color_uz') == 'green' ? 'selected' : '' }}>
                                                    Yashil
                                                </option> <!-- Uzbek for Green -->
                                                <option value="blue" {{ old('color_uz') == 'blue' ? 'selected' : '' }}>
                                                    Ko'k
                                                </option> <!-- Uzbek for Blue -->
                                                <option
                                                    value="black" {{ old('color_uz') == 'black' ? 'selected' : '' }}>
                                                    Qora
                                                </option> <!-- Uzbek for Black -->
                                                <option
                                                    value="brown" {{ old('color_uz') == 'brown' ? 'selected' : '' }}>
                                                    Jigarrang
                                                </option> <!-- Uzbek for Brown -->
                                            </select>
                                        </div>

                                        <div class="form-group pb-3 col-md-4">
                                            <label for="color_ru">Цвет RU:</label>
                                            <select class="form-control" id="color_ru" name="color_ru">
                                                <option value="null" {{ old('color_ru') == 'null' ? 'selected' : '' }}>
                                                    Null
                                                </option>
                                                <option value="red" {{ old('color_ru') == 'red' ? 'selected' : '' }}>
                                                    Красный
                                                </option> <!-- Russian for Red -->
                                                <option
                                                    value="green" {{ old('color_ru') == 'green' ? 'selected' : '' }}>
                                                    Зеленый
                                                </option> <!-- Russian for Green -->
                                                <option value="blue" {{ old('color_ru') == 'blue' ? 'selected' : '' }}>
                                                    Синий
                                                </option> <!-- Russian for Blue -->
                                                <option
                                                    value="black" {{ old('color_ru') == 'black' ? 'selected' : '' }}>
                                                    Черный
                                                </option> <!-- Russian for Black -->
                                                <option
                                                    value="brown" {{ old('color_ru') == 'brown' ? 'selected' : '' }}>
                                                    Коричневый
                                                </option> <!-- Russian for Brown -->
                                            </select>
                                        </div>

                                        <div class="form-group pb-3 col-md-4">
                                            <label for="color_en">Цвет EN:</label>
                                            <select class="form-control" id="color_en" name="color_en">
                                                <option value="null" {{ old('color_en') == 'null' ? 'selected' : '' }}>
                                                    Null
                                                </option>
                                                <option value="red" {{ old('color_en') == 'red' ? 'selected' : '' }}>
                                                    Red
                                                </option> <!-- English for Red -->
                                                <option
                                                    value="green" {{ old('color_en') == 'green' ? 'selected' : '' }}>
                                                    Green
                                                </option> <!-- English for Green -->
                                                <option value="blue" {{ old('color_en') == 'blue' ? 'selected' : '' }}>
                                                    Blue
                                                </option> <!-- English for Blue -->
                                                <option
                                                    value="black" {{ old('color_en') == 'black' ? 'selected' : '' }}>
                                                    Black
                                                </option> <!-- English for Black -->
                                                <option
                                                    value="brown" {{ old('color_en') == 'brown' ? 'selected' : '' }}>
                                                    Brown
                                                </option> <!-- English for Brown -->
                                            </select>
                                        </div>

                                        <div class="form-group pb-3 col-md-6">
                                            <label for="price">Цена:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="price" name="price"
                                                       value="{{ old('price') }}">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-6">
                                            <label for="discount_price">Скидочная цена:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="discount_price"
                                                       name="discount_price" value="{{ old('discount_price') }}">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_3">Цена за 3 месяца:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="price_3" name="price_3"
                                                       value="{{ old('price_3') }}">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_6">Цена за 6 месяцев:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="price_6" name="price_6"
                                                       value="{{ old('price_6') }}">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_12">Цена за 12 месяцев:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="price_12" name="price_12"
                                                       value="{{ old('price_12') }}">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_24">Цена за 24 месяца:</label>
                                            <div class="input-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="price_24"
                                                           name="price_24"
                                                           value="{{ old('price_24') }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                        </div>
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
