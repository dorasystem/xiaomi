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
                                  <div class="row">
                                      <div class="form-group pb-3 col-md-4">
                                          <label for="product_id">Продукт:</label>
                                          <select name="product_id" id="product_id" class="form-control" required>
                                              @foreach ($products as $product)
                                                  <option value="{{ $product->id }}" {{ old('product_id', $variant->product_id) == $product->id ? 'selected' : '' }}>
                                                      {{ $product->name_ru }}
                                                  </option>
                                              @endforeach
                                          </select>
                                      </div>

                                      <div class="form-group pb-3 col-md-4">
                                          <label for="storage">Место хранения:</label>
                                          <select class="form-control" id="storage" name="storage">
                                              <option value="32GB" {{ old('storage', $variant->storage) == '32GB' ? 'selected' : '' }}>32GB</option>
                                              <option value="64GB" {{ old('storage', $variant->storage) == '64GB' ? 'selected' : '' }}>64GB</option>
                                              <option value="128GB" {{ old('storage', $variant->storage) == '128GB' ? 'selected' : '' }}>128GB</option>
                                              <option value="256GB" {{ old('storage', $variant->storage) == '256GB' ? 'selected' : '' }}>256GB</option>
                                              <option value="512GB" {{ old('storage', $variant->storage) == '512GB' ? 'selected' : '' }}>512GB</option>
                                              <option value="1TB" {{ old('storage', $variant->storage) == '1TB' ? 'selected' : '' }}>1TB</option>
                                          </select>
                                      </div>

                                      <div class="form-group pb-3 col-md-4">
                                          <label for="ram">RAM (память):</label>
                                          <select class="form-control" id="ram" name="ram">
                                              <option value="2GB" {{ old('ram', $variant->ram) == '2GB' ? 'selected' : '' }}>2GB</option>
                                              <option value="4GB" {{ old('ram', $variant->ram) == '4GB' ? 'selected' : '' }}>4GB</option>
                                              <option value="6GB" {{ old('ram', $variant->ram) == '6GB' ? 'selected' : '' }}>6GB</option>
                                              <option value="8GB" {{ old('ram', $variant->ram) == '8GB' ? 'selected' : '' }}>8GB</option>
                                              <option value="12GB" {{ old('ram', $variant->ram) == '12GB' ? 'selected' : '' }}>12GB</option>
                                              <option value="16GB" {{ old('ram', $variant->ram) == '16GB' ? 'selected' : '' }}>16GB</option>
                                          </select>
                                      </div>
                                      <div class="form-group pb-3 col-md-4">
                                          <label for="color_uz">Цвет UZ:</label>
                                          <select class="form-control" id="color_uz" name="color_uz">
                                              <option value="red" {{ old('color_uz', $variant->color_uz) == 'red' ? 'selected' : '' }}>Qizil</option> <!-- Uzbek for Red -->
                                              <option value="green" {{ old('color_uz', $variant->color_uz) == 'green' ? 'selected' : '' }}>Yashil</option> <!-- Uzbek for Green -->
                                              <option value="blue" {{ old('color_uz', $variant->color_uz) == 'blue' ? 'selected' : '' }}>Ko'k</option> <!-- Uzbek for Blue -->
                                              <option value="black" {{ old('color_uz', $variant->color_uz) == 'black' ? 'selected' : '' }}>Qora</option> <!-- Uzbek for Black -->
                                              <option value="brown" {{ old('color_uz', $variant->color_uz) == 'brown' ? 'selected' : '' }}>Jigarrang</option> <!-- Uzbek for Brown -->
                                          </select>
                                      </div>

                                      <div class="form-group pb-3 col-md-4">
                                          <label for="color_ru">Цвет RU:</label>
                                          <select class="form-control" id="color_ru" name="color_ru">
                                              <option value="red" {{ old('color_ru', $variant->color_ru) == 'red' ? 'selected' : '' }}>Красный</option> <!-- Russian for Red -->
                                              <option value="green" {{ old('color_ru', $variant->color_ru) == 'green' ? 'selected' : '' }}>Зеленый</option> <!-- Russian for Green -->
                                              <option value="blue" {{ old('color_ru', $variant->color_ru) == 'blue' ? 'selected' : '' }}>Синий</option> <!-- Russian for Blue -->
                                              <option value="black" {{ old('color_ru', $variant->color_ru) == 'black' ? 'selected' : '' }}>Черный</option> <!-- Russian for Black -->
                                              <option value="brown" {{ old('color_ru', $variant->color_ru) == 'brown' ? 'selected' : '' }}>Коричневый</option> <!-- Russian for Brown -->
                                          </select>
                                      </div>

                                      <div class="form-group pb-3 col-md-4">
                                          <label for="color_en">Цвет EN:</label>
                                          <select class="form-control" id="color_en" name="color_en">
                                              <option value="red" {{ old('color_en', $variant->color_en) == 'red' ? 'selected' : '' }}>Red</option> <!-- English for Red -->
                                              <option value="green" {{ old('color_en', $variant->color_en) == 'green' ? 'selected' : '' }}>Green</option> <!-- English for Green -->
                                              <option value="blue" {{ old('color_en', $variant->color_en) == 'blue' ? 'selected' : '' }}>Blue</option> <!-- English for Blue -->
                                              <option value="black" {{ old('color_en', $variant->color_en) == 'black' ? 'selected' : '' }}>Black</option> <!-- English for Black -->
                                              <option value="brown" {{ old('color_en', $variant->color_en) == 'brown' ? 'selected' : '' }}>Brown</option> <!-- English for Brown -->
                                          </select>
                                      </div>

                                      <div class="form-group pb-3 col-md-6">
                                          <label for="price">Цена:</label>
                                          <div class="input-group">
                                              <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $variant->price) }}">
                                              <span class="input-group-text">UZS</span>
                                          </div>
                                      </div>

                                      <div class="form-group pb-3 col-md-6">
                                          <label for="discount_price">Скидочная цена:</label>
                                          <div class="input-group">
                                              <input type="number" class="form-control" id="discount_price" name="discount_price" value="{{ old('discount_price', $variant->discount_price) }}">
                                              <span class="input-group-text">UZS</span>
                                          </div>
                                      </div>

                                      <div class="form-group pb-3 col-md-3">
                                          <label for="price_3">Цена за 3 месяца:</label>
                                          <div class="input-group">
                                              <input type="number" class="form-control" id="price_3" name="price_3" value="{{ old('price_3', $variant->price_3) }}">
                                              <span class="input-group-text">UZS</span>
                                          </div>
                                      </div>

                                      <div class="form-group pb-3 col-md-3">
                                          <label for="price_6">Цена за 6 месяцев:</label>
                                          <div class="input-group">
                                              <input type="number" class="form-control" id="price_6" name="price_6" value="{{ old('price_6', $variant->price_6) }}">
                                              <span class="input-group-text">UZS</span>
                                          </div>
                                      </div>

                                      <div class="form-group pb-3 col-md-3">
                                          <label for="price_12">Цена за 12 месяцев:</label>
                                          <div class="input-group">
                                              <input type="number" class="form-control" id="price_12" name="price_12" value="{{ old('price_12', $variant->price_12) }}">
                                              <span class="input-group-text">UZS</span>
                                          </div>
                                      </div>

                                      <div class="form-group pb-3 col-md-3">
                                          <label for="price_24">Цена за 24 месяца:</label>
                                          <div class="input-group">
                                              <input type="number" class="form-control" id="price_24" name="price_24" value="{{ old('price_24', $variant->price_24) }}">
                                              <span class="input-group-text">UZS</span>
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
                                    @if ($variant->image)
                                        <div class="form-group pb-3">
                                            <label for="current_image">Текущее изображение:</label>
                                            <img src="{{ asset('storage/' . $variant->image) }}" alt="Текущее изображение" class="img-thumbnail" width="100">
                                        </div>
                                    @endif


                                    <div class="form-group pb-3">
                                        <label for="images">Дополнительные изображения:</label>
                                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                                    </div>

                                    @if ($variant->images && count($variant->images) > 0)
                                        <div class="form-group pb-3">
                                            <label for="current_images">Текущие дополнительные изображения:</label>
                                            <div class="row">
                                                @foreach ($variant->images as $index => $image)
                                                    <div class="col-3 mt-2 position-relative">
                                                        <!-- Display Image -->
                                                        <img src="{{ asset('storage/' . $image) }}"
                                                             alt="Текущее изображение"
                                                             class="img-thumbnail image-edit-trigger"
                                                             data-index="{{ $index }}"
                                                             style="cursor: pointer; width: 100%; height: 100px; object-fit: cover;">

                                                        <!-- Delete Icon -->
                                                        <button type="button"
                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image-btn"
                                                                data-index="{{ $index }}"
                                                                style="border-radius: 50%; padding: 4px; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">
                                                            &times;
                                                        </button>

                                                        <input type="file"
                                                               class="form-control-file d-none image-input"
                                                               id="image_edit_{{ $index }}"
                                                               name="image_edit[{{ $index }}]">

                                                        <input type="checkbox"
                                                               class="d-none image-delete-checkbox"
                                                               id="image_delete_{{ $index }}"
                                                               name="image_delete[{{ $index }}]"
                                                               value="{{ $image }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif



                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.image-edit-trigger').forEach(function (imageElement) {
                imageElement.addEventListener('click', function () {
                    const index = this.dataset.index;
                    const fileInput = document.querySelector(`#image_edit_${index}`);
                    if (fileInput) {
                        fileInput.click();
                    }
                });
            });

            document.querySelectorAll('.delete-image-btn').forEach(function (deleteButton) {
                deleteButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    const index = this.dataset.index;

                    const confirmation = confirm('Вы уверены, что хотите удалить это изображение?');
                    if (confirmation) {

                        const deleteCheckbox = document.querySelector(`#image_delete_${index}`);
                        if (deleteCheckbox) {
                            deleteCheckbox.checked = true;

                            const imageContainer = this.closest('.col-3');
                            if (imageContainer) {
                                imageContainer.style.display = 'none';
                            }
                        }
                    }
                });
            });
        });


    </script>
    <style>
        .position-relative {
            position: relative !important;
        }

        .btn-danger {
            font-size: 12px;
            line-height: 1;
        }

        .image-edit-trigger {
            transition: transform 0.2s;
        }

        .image-edit-trigger:hover {
            transform: scale(1.05);
        }

    </style>
@endsection
