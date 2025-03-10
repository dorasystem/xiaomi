@extends('layouts.admin')

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" novalidate
          class="needs-validation" onsubmit="updateEditorContent()">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать продукт</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Продукты</li>
                            <li class="breadcrumb-item active">Редактировать</li>
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
                        <div class="col-lg-8 pb-5">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Детали продукта</h5>
                                </div>
                                <div class="card-body p-4">
                                    <ul class="nav-tab-items-wrapper nav nav-justified invoice-overview-tab-item">
                                        <li class="nav-item">
                                            <a href="#uzContent" class="nav-link active" data-bs-toggle="tab"
                                               data-bs-target="#uzContent">O'zbekcha</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#enContent" class="nav-link" data-bs-toggle="tab"
                                               data-bs-target="#enContent">English</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#ruContent" class="nav-link" data-bs-toggle="tab"
                                               data-bs-target="#ruContent">Русский</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        @foreach (['uz', 'en', 'ru'] as $lang)
                                            <div class="tab-pane fade show {{ $lang == 'uz' ? 'active' : '' }}"
                                                 id="{{ $lang }}Content">
                                                <div class="form-group pb-3">
                                                    <label for="name_{{ $lang }}">Название ({{ strtoupper($lang) }}
                                                        ):</label>
                                                    <input type="text" class="form-control" id="name_{{ $lang }}"
                                                           name="name_{{ $lang }}"
                                                           value="{{ old('name_' . $lang, $product->{'name_' . $lang}) }}"
                                                           required>
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="description_{{ $lang }}">Описание
                                                        ({{ strtoupper($lang) }}):</label>
                                                    <div id="descriptionEditor_{{ $lang }}"
                                                         style="height:200px;">{!! old('description_' . $lang , $product['description_' . $lang]) !!}</div>
                                                    <input type="hidden" id="description_{{ $lang }}"
                                                           name="description_{{ $lang }}"
                                                           value="{{ old('description_' . $lang   , $product['description_' . $lang]) }}">
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="content_{{ $lang }}">Характеристики
                                                        ({{ strtoupper($lang) }}):</label>
                                                    <div id="contentEditor_{{ $lang }}"
                                                         style="height:200px;">{!! old('content_' . $lang, $product['content_' . $lang]) !!}</div>
                                                    <input type="hidden" id="content_{{ $lang }}"
                                                           name="content_{{ $lang }}"
                                                           value="{{ old('content_' . $lang , $product['content_' . $lang]) }}">
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                                <div id="product-forms">
                                    @foreach($product->variants as $price)
                                        <div class="row px-4 pb-2 product-form" id="variant-{{ $loop->index }}">
                                            <div class="form-group pb-3 col-md-4">
                                                <label for="storage">Место хранения:</label>
                                                <select class="form-control" name="storage[]">
                                                    <option
                                                        value="null" {{ $price->storage == 'null' ? 'selected' : '' }}>
                                                        Null
                                                    </option>
                                                    <option
                                                        value="2/32GB" {{ $price->storage == '2/32GB' ? 'selected' : '' }}>
                                                        2/32 GB
                                                    </option>

                                                    <option
                                                        value="2/64GB" {{ $price->storage == '2/64GB' ? 'selected' : '' }}>
                                                        2/64 GB
                                                    </option>
                                                    <option
                                                        value="3/64GB" {{ $price->storage == '3/64GB' ? 'selected' : '' }}>
                                                        3/64 GB
                                                    </option>
                                                    <option
                                                        value="4/64GB" {{ $price->storage == '4/64GB' ? 'selected' : '' }}>
                                                        4/64 GB
                                                    </option>
                                                    <option
                                                        value="4/128GB" {{ $price->storage == '4/128GB' ? 'selected' : '' }}>
                                                        4/128 GB
                                                    </option>
                                                    <option
                                                        value="6/128GB" {{ $price->storage == '6/128GB' ? 'selected' : '' }}>
                                                        6/128 GB
                                                    </option>
                                                    <option
                                                        value="8/128GB" {{ $price->storage == '8/128GB' ? 'selected' : '' }}>
                                                        8/128 GB
                                                    </option>
                                                    <option
                                                        value="8/256GB" {{ $price->storage == '8/256GB' ? 'selected' : '' }}>
                                                        8/256 GB
                                                    </option>
                                                    <option
                                                        value="6/256GB" {{ $price->storage == '6/256GB' ? 'selected' : '' }}>
                                                        6/256 GB
                                                    </option>
                                                    <option
                                                        value="12/256GB" {{ $price->storage == '12/256GB' ? 'selected' : '' }}>
                                                        12/256 GB
                                                    </option>
                                                    <option
                                                        value="12/512GB" {{ $price->storage == '12/512GB' ? 'selected' : '' }}>
                                                        12/512 GB
                                                    </option>
                                                    <option
                                                        value="12/1TB" {{ $price->storage == '12/1TB' ? 'selected' : '' }}>
                                                        12/1 TB
                                                    </option>
                                                    <option
                                                        value="16/1TB" {{ $price->storage == '16/1TB' ? 'selected' : '' }}>
                                                        16/1 TB
                                                    </option>
                                                </select>

                                            </div>
                                            <div class="form-group pb-3 col-md-4">
                                                <label for="price">Цена:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price[]"
                                                           value="{{ $price->price }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-4">
                                                <label for="discount_price">Скидочная цена:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="discount_price[]"
                                                           value="{{ $price->discount_price }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>

                                            <div class="form-group pb-3 col-md-3">
                                                <label for="price_6">Цена за 6 месяцев:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price_6[]"
                                                           value="{{ $price->price_6 }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-3">
                                                <label for="price_12">Цена за 12 месяцев:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price_12[]"
                                                           value="{{ $price->price_12 }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-3">
                                                <label for="price_24">Цена за 24 месяца:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price_24[]"
                                                           value="{{ $price->price_24 }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-3">
                                                <label for="price_24">SKU:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="sku[]"
                                                           value="{{ $price->sku }}">
                                                    <span class="input-group-text">#</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="hidden" name="deleted_variants[]"
                                                       value="{{ $price->id ?? '' }}">
                                                <button type="button" class="btn btn-danger btn-sm remove-variant">
                                                    Удалить
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add-more" class="btn btn-primary mt-3">Добавить ещё</button>

                            </div>
                        </div>

                        <div class="col-lg-4 pb-5">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Дополнительно</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="category_id">Категория:</label>
                                        <select id="category_id" name="category_id" class="form-control" required>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name_ru }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Popular checkbox -->
                                    <div class="form-check pb-3">
                                        <input type="checkbox" id="popular" name="popular" class="form-check-input"
                                            {{ old('popular', isset($product) && $product->popular ? 'checked' : '') }}>
                                        <label for="popular" class="form-check-label">Популярный продукт</label>
                                    </div>
                                    <div class="form-check pb-3">
                                        <input type="checkbox" id="discount_status" name="discount_status"
                                               class="form-check-input"
                                            {{ old('discount_status', isset($product) && $product->discount_status   ? 'checked' : '' )}}>
                                        <label for="discount_status" class="form-check-label">Скидка на продукт</label>
                                    </div>
                                    <div class="form-check pb-3">
                                        <input type="checkbox" id="recommend_status" name="recommend_status"
                                               class="form-check-input"
                                            {{ old('recommend_status', isset($product) && $product->recommend_status   ? 'checked' : '' )}}>
                                        <label for="recommend_status" class="form-check-label">Recommend на
                                            продукт</label>
                                    </div>


                                    <div class="form-group pb-3">
                                        <label for="color_ru">Цвет RU:</label>
                                        <select class="form-control" id="color_ru" name="color_ru">
                                            <option value="Null" {{ $product->color_ru == 'Null' ? 'selected' : '' }}>
                                                Null
                                            </option>
                                            <option value="Red" {{ $product->color_ru == 'Red' ? 'selected' : '' }}>
                                                Красный
                                            </option>
                                            <option value="White" {{ $product->color_ru == 'White' ? 'selected' : '' }}>
                                                Белый
                                            </option>
                                            <option value="Green" {{ $product->color_ru == 'Green' ? 'selected' : '' }}>
                                                Зелёный
                                            </option>
                                            <option value="Grey" {{ $product->color_ru == 'Grey' ? 'selected' : '' }}>
                                                Серый
                                            </option>
                                            <option value="Blue" {{ $product->color_ru == 'Blue' ? 'selected' : '' }}>
                                                Синий
                                            </option>
                                            <option value="Black" {{ $product->color_ru == 'Black' ? 'selected' : '' }}>
                                                Черный
                                            </option>
                                            <option value="Brown" {{ $product->color_ru == 'Brown' ? 'selected' : '' }}>
                                                Коричневый
                                            </option>
                                            <option
                                                value="Aurora Purple" {{ $product->color_ru == 'Aurora Purple' ? 'selected' : '' }}>
                                                Aurora Purple
                                            </option>
                                            <option
                                                value="Ocean Blue" {{ $product->color_ru == 'Ocean Blue' ? 'selected' : '' }}>
                                                Ocean Blue
                                            </option>
                                            <option
                                                value="Lavender Purple" {{ $product->color_ru == 'Lavender Purple' ? 'selected' : '' }}>
                                                Lavender Purple
                                            </option>
                                            <option
                                                value="Frost Blue" {{ $product->color_ru == 'Frost Blue' ? 'selected' : '' }}>
                                                Frost Blue
                                            </option>
                                            <option
                                                value="Midnight Black" {{ $product->color_ru == 'Midnight Black' ? 'selected' : '' }}>
                                                Midnight Black
                                            </option>
                                            <option
                                                value="Lite Blue" {{ $product->color_ru == 'Lite Blue' ? 'selected' : '' }}>
                                                Lite Blue
                                            </option>
                                            <option
                                                value="Lite Pink" {{ $product->color_ru == 'Lite Pink' ? 'selected' : '' }}>
                                                Lite Pink
                                            </option>
                                            <option
                                                value="Sage Green" {{ $product->color_ru == 'Sage Green' ? 'selected' : '' }}>
                                                Sage Green
                                            </option>
                                            <option
                                                value="Starry Blue" {{ $product->color_ru == 'Starry Blue' ? 'selected' : '' }}>
                                                Starry Blue
                                            </option>
                                            <option
                                                value="Clover Green" {{ $product->color_ru == 'Clover Green' ? 'selected' : '' }}>
                                                Clover Green
                                            </option>
                                            <option
                                                value="Dreamy Purple" {{ $product->color_ru == 'Dreamy Purple' ? 'selected' : '' }}>
                                                Dreamy Purple
                                            </option>
                                            <option
                                                value="Sandy Gold" {{ $product->color_ru == 'Sandy Gold' ? 'selected' : '' }}>
                                                Sandy Gold
                                            </option>
                                            <option
                                                value="Pearl Pink" {{ $product->color_ru == 'Pearl Pink' ? 'selected' : '' }}>
                                                Pearl Pink
                                            </option>
                                            <option
                                                value="Sky Blue" {{ $product->color_ru == 'Sky Blue' ? 'selected' : '' }}>
                                                Sky Blue
                                            </option>
                                            <option
                                                value="Dark Gray" {{ $product->color_ru == 'Dark Gray' ? 'selected' : '' }}>
                                                Dark Gray
                                            </option>
                                            <option
                                                value="Light Gray" {{ $product->color_ru == 'Light Gray' ? 'selected' : '' }}>
                                                Light Gray
                                            </option>
                                            <option
                                                value="Mint Green" {{ $product->color_ru == 'Mint Green' ? 'selected' : '' }}>
                                                Mint Green
                                            </option>
                                            <option
                                                value="Mist Blue" {{ $product->color_ru == 'Mist Blue' ? 'selected' : '' }}>
                                                Mist Blue
                                            </option>
                                            <option value="Gold" {{ $product->color_ru == 'Gold' ? 'selected' : '' }}>
                                                Gold
                                            </option>
                                            <option
                                                value="Gravity Gray" {{ $product->color_ru == 'Gravity Gray' ? 'selected' : '' }}>
                                                Gravity Gray
                                            </option>
                                            <option
                                                value="Aurora Green" {{ $product->color_ru == 'Aurora Green' ? 'selected' : '' }}>
                                                Aurora Green
                                            </option>
                                            <option
                                                value="Graphite Gray" {{ $product->color_ru == 'Graphite Gray' ? 'selected' : '' }}>
                                                Graphite Gray
                                            </option>
                                            <option
                                                value="Moonlight Silver" {{ $product->color_ru == 'Moonlight Silver' ? 'selected' : '' }}>
                                                Moonlight Silver
                                            </option>
                                        </select>
                                    </div>


                                    <div class="form-group pb-3">
                                        <label for="image">Первое изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                                 class="img-fluid mt-2">
                                        @endif
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="images">Дополнительные изображения:</label>
                                        <input type="file" class="form-control" id="images" name="images[]" multiple>

                                        @php
                                            $images = is_string($product->images) ? json_decode($product->images) : $product->images;
                                        @endphp


                                        @foreach($images as $key => $image)
                                            <div class="image-container">
                                                <img src="{{ asset('storage/' . $image) }}" alt="Image"
                                                     data-key="{{ $key }}">
                                                <button type="button" class="delete-icon"
                                                        onclick="deleteImage('{{ $image }}', this)">x
                                                </button>
                                                <input type="file" name="edit_images[{{ $key }}]" class="hidden-input"
                                                       id="edit_image_{{ $key }}" accept="image/*">
                                                <input type="hidden" name="current_images[{{ $key }}]"
                                                       value="{{ $image }}">
                                                <input type="checkbox" name="deleted_images[]" value="{{ $image }}"
                                                       class="hidden-checkbox d-none">
                                            </div>
                                        @endforeach

                                    </div>


                                    <div class="form-group pb-3 gift-fields ">
                                        <label for="gift_name">Подарок название UZ:</label>
                                        <input type="text" class="form-control" id="gift_name_uz" name="gift_name_uz"
                                               value="{{ old('gift_name_uz', $product->gift_name_uz) }}">
                                    </div>
                                    <div class="form-group pb-3 gift-fields ">
                                        <label for="gift_name">Подарок название RU:</label>
                                        <input type="text" class="form-control" id="gift_name_ru" name="gift_name_ru"
                                               value="{{ old('gift_name_ru', $product->gift_name_ru) }}">
                                    </div>
                                    <div class="form-group pb-3 gift-fields ">
                                        <label for="gift_name">Подарок название EN:</label>
                                        <input type="text" class="form-control" id="gift_name_en" name="gift_name_en"
                                               value="{{ old('gift_name_en', $product->gift_name_en) }}">
                                    </div>

                                    <div class="form-group pb-3 gift-fields ">
                                        <label for="gift_image">Изображение Подарок:</label>
                                        <input type="file" class="form-control" id="gift_image" name="gift_image">
                                        @if ($product->gift_image)
                                            <img src="{{ asset('storage/' . $product->gift_image) }}" alt="Gift Image"
                                                 class="img-fluid mt-2">
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </form>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script>

        @foreach (['uz', 'en', 'ru'] as $lang)
        var descriptionEditor{{ ucfirst($lang) }} = new Quill('#descriptionEditor_{{ $lang }}', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{'header': [1, 2, 3, false]}], // Sarlavhalar
                    ['bold', 'italic', 'underline', 'strike'], // Matn stilizatsiyasi
                    [{'color': []}, {'background': []}], // 📌 **Matn rangi va fon rangi**
                    [{'script': 'sub'}, {'script': 'super'}], // Yuqori va pastki indeks
                    [{'list': 'ordered'}, {'list': 'bullet'}], // Ro‘yxatlar
                    [{'indent': '-1'}, {'indent': '+1'}], // Ichki joylashuv
                    [{'direction': 'rtl'}], // Matn yo‘nalishi
                    [{'align': []}], // Matnni joylash
                    ['blockquote', 'code-block'], // Quote va kod bloki
                    ['link'], // Havola qo‘shish
                    ['clean'] // Tozalash
                ]
            }
        });
        var contentEditor{{ ucfirst($lang) }} = new Quill('#contentEditor_{{ $lang }}', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{'header': [1, 2, 3, false]}], // Sarlavhalar
                    ['bold', 'italic', 'underline', 'strike'], // Matn stilizatsiyasi
                    [{'color': []}, {'background': []}], // 📌 **Matn rangi va fon rangi**
                    [{'script': 'sub'}, {'script': 'super'}], // Yuqori va pastki indeks
                    [{'list': 'ordered'}, {'list': 'bullet'}], // Ro‘yxatlar
                    [{'indent': '-1'}, {'indent': '+1'}], // Ichki joylashuv
                    [{'direction': 'rtl'}], // Matn yo‘nalishi
                    [{'align': []}], // Matnni joylash
                    ['blockquote', 'code-block'], // Quote va kod bloki
                    ['link'], // Havola qo‘shish
                    ['clean'] // Tozalash
                ]
            }
        });
        @endforeach

        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
            document.getElementById('description_{{ $lang }}').value = descriptionEditor{{ ucfirst($lang) }}.root.innerHTML;
            @endforeach
            @foreach (['uz', 'en', 'ru'] as $lang)
            document.getElementById('content_{{ $lang }}').value = contentEditor{{ ucfirst($lang) }}.root.innerHTML;
            @endforeach
        }
    </script>
    <script>
        document.querySelectorAll('.image-container img').forEach(img => {
            img.addEventListener('click', function () {
                const fileInput = this.nextElementSibling.nextElementSibling;
                fileInput.click(); // Hidden inputni ochish
                fileInput.addEventListener('change', function () {
                    const file = fileInput.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            img.src = e.target.result; // Tasvirni yangilash
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        });

        function deleteImage(imagePath, button) {
            const container = button.closest('.image-container');
            const checkbox = container.querySelector('.hidden-checkbox');
            checkbox.checked = true; // Rasimni o'chirish uchun belgilang
            container.style.display = 'none'; // Rasimni yashirish
        }

    </script>
    <script>
        function initializeRemoveVariant() {
            document.querySelectorAll('.remove-variant').forEach(function (button) {
                button.addEventListener('click', function () {
                    const variantElement = this.closest('.product-form');
                    const variantId = variantElement.querySelector('input[name="deleted_variants[]"]').value;

                    // If the variant ID is present, send an AJAX request to delete it from the database
                    if (variantId) {
                        fetch(`/variants/${variantId}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                            .then(response => {

                                const userConfirmed = confirm('Вы уверены, что хотите удалить?');

                                if (userConfirmed) {
                                    // Foydalanuvchi tasdiqlagan bo'lsa, variantni o\'chirish
                                    if (response.ok) {

                                        variantElement.remove(); // Variantni DOM dan o'chirish
                                    } else {
                                        alert('Ошибка при удалении варианта');
                                    }
                                } else {
                                    alert('Удаление отменено');
                                }

                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Error deleting variant');
                            });
                    } else {
                        // If no ID, simply remove from DOM
                        variantElement.remove();
                    }
                });
            });
        }

        // Add new variant
        document.getElementById('add-more').addEventListener('click', function () {
            const newVariant = document.createElement('div');
            newVariant.classList.add('row', 'px-4', 'pb-2', 'product-form');
            newVariant.innerHTML = `
                                        <div class="form-group pb-3 col-md-4">
                                            <label for="storage">Место хранения:</label>
                                            <select class="form-control" name="storage[]">
                                                <option value="null">Null</option>
                                                <option value="2/32GB">2/32 GB</option>
                                                <option value="2/64GB">2/64 GB</option>
                                                <option value="3/64GB">3/64 GB</option>
                                                <option value="4/64GB">4/64 GB</option>
                                                <option value="4/128GB">4/128 GB</option>
                                                <option value="6/128GB">6/128 GB</option>
                                                <option value="8/128GB">8/128 GB</option>
                                                <option value="6/256GB">6/256 GB</option>
                                                <option value="8/256GB">8/256 GB</option>
                                                <option value="12/512GB">12/512 GB</option>
                                                <option value="12/1TB">12/1 TB</option>
                                                <option value="16/1TB">16/1 TB</option>
                                            </select>
                                        </div>
                                        <div class="form-group pb-3 col-md-4">
                                            <label for="price">Цена:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price[]" >
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-4">
                                            <label for="discount_price">Скидочная цена:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="discount_price[]" >
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>

                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_6">Цена за 6 месяцев:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price_6[]" >
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_12">Цена за 12 месяцев:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price_12[]" >
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_24">Цена за 24 месяца:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price_24[]">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                          <div class="form-group pb-3 col-md-3">
                                            <label for="price_24">SKU:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="sku[]">
                                                <span class="input-group-text">#</span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="deleted_variants[]" >
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-danger btn-sm remove-variant">Удалить</button>
                                        </div>
    `;
            document.getElementById('product-forms').appendChild(newVariant);

            // Re-initialize remove functionality for new variants
            initializeRemoveVariant();
        });

        // Initialize remove functionality for existing variants
        initializeRemoveVariant();


    </script>
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .image-container img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            cursor: pointer;
        }

        .delete-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .hidden-input {
            display: none;
        }
    </style>

@endsection
