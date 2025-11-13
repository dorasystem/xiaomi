@extends('layouts.admin')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" novalidate
        class="needs-validation" onsubmit="updateEditorContent()">
        @csrf

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Создать продукт</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Продукты</li>
                        </ul>
                        description_ru
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
                                                    <label for="code">Code</label>
                                                    <input type="text" class="form-control" id="code" name="code"
                                                        value="{{ old('code', $product->code ?? '') }}" required>
                                                </div>

                                                <div class="form-group pb-3">
                                                    <label for="name_{{ $lang }}">Заголовок
                                                        ({{ strtoupper($lang) }})
                                                        :</label>
                                                    <input type="text" class="form-control" id="name_{{ $lang }}"
                                                        name="name_{{ $lang }}" value="{{ old('name_' . $lang) }}"
                                                        required>
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="description_{{ $lang }}">Описание
                                                        ({{ strtoupper($lang) }})
                                                        :</label>
                                                    <div id="descriptionEditor_{{ $lang }}" style="height:200px;">
                                                        {!! old('description_' . $lang) !!}</div>
                                                    <input type="hidden" id="description_{{ $lang }}"
                                                        name="description_{{ $lang }}"
                                                        value="{{ old('description_' . $lang) }}">
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="content_{{ $lang }}">Характеристики
                                                        ({{ strtoupper($lang) }}):</label>
                                                    <div id="contentEditor_{{ $lang }}" style="height:200px;">
                                                        {!! old('content_' . $lang) !!}</div>
                                                    <input type="hidden" id="content_{{ $lang }}"
                                                        name="content_{{ $lang }}"
                                                        value="{{ old('content_' . $lang) }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="product-forms">
                                    <div class="row px-4 pb-2 product-form">
                                        <div class="form-group pb-3 col-md-4">
                                            <label for="storage">Место хранения:</label>
                                            <select class="form-control" id="storage" name="storage[]">
                                                <option value="null">Null</option>
                                                <option value="2/32GB">2/32 GB</option>
                                                <option value="2/64GB">2/64 GB</option>
                                                <option value="4/64GB">4/64 GB</option>
                                                <option value="3/64GB">3/64 GB</option>
                                                <option value="4/128GB">4/128 GB</option>
                                                <option value="6/128GB">6/128 GB</option>
                                                <option value="8/128GB">8/128 GB</option>
                                                <option value="6/256GB">6/256 GB</option>
                                                <option value="8/256GB">8/256 GB</option>
                                                <option value="12/256GB">12/256 GB</option>
                                                <option value="12/512GB">12/512 GB</option>
                                                <option value="12/1TB">12/1 TB</option>
                                                <option value="16/1TB">16/1 TB</option>
                                            </select>
                                        </div>
                                        <div class="form-group pb-3 col-md-4">
                                            <label for="price">Цена:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price[]" value="">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-4">
                                            <label for="discount_price">Скидочная цена:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="discount_price[]"
                                                    value="">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>


                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_6">Цена за 6 месяцев:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price_6[]"
                                                    value="">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_12">Цена за 12 месяцев:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price_12[]"
                                                    value="">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_24">Цена за 24 месяца:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price_24[]"
                                                    value="">
                                                <span class="input-group-text">UZS</span>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3 col-md-3">
                                            <label for="price_24">SKU:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="sku[]"
                                                    value="">
                                                <span class="input-group-text">#</span>
                                            </div>
                                        </div>
                                    </div>
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
                                                <option value="{{ $category->id }}">{{ $category->name_ru }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Popular checkbox -->
                                    <div class="form-check pb-3">
                                        <input type="checkbox" id="popular" name="popular" class="form-check-input"
                                            {{ old('popular', $product->popular ?? false) ? 'checked' : '' }}>
                                        <label for="popular" class="form-check-label">Популярный продукт</label>
                                    </div>
                                    <div class="form-check pb-3">
                                        <input type="checkbox" id="discount_status" name="discount_status"
                                            class="form-check-input"
                                            {{ old('discount_status', $product->discount_status ?? false) ? 'checked' : '' }}>
                                        <label for="discount_status" class="form-check-label">Скидка на продукт</label>
                                    </div>
                                    <div class="form-check pb-3">
                                        <input type="checkbox" id="recommend_status" name="recommend_status"
                                            class="form-check-input"
                                            {{ old('recommend_status', $product->recommend_status ?? false) ? 'checked' : '' }}>
                                        <label for="recommend_status" class="form-check-label">Recommend на
                                            продукт</label>
                                    </div>


                                    <div class="form-group pb-3">
                                        <label for="color_ru">Цвет RU:</label>
                                        <select class="form-control" id="color_ru" name="color_ru">
                                            <option value="Null" {{ old('color_ru') == 'Null' ? 'selected' : '' }}>Null
                                            </option>
                                            <option value="Red" {{ old('color_ru') == 'Red' ? 'selected' : '' }}>
                                                Красный</option>
                                            <option value="White" {{ old('color_ru') == 'White' ? 'selected' : '' }}>
                                                Белый</option>
                                            <option value="Green" {{ old('color_ru') == 'Green' ? 'selected' : '' }}>
                                                Зелёный</option>
                                            <option value="Grey" {{ old('color_ru') == 'Grey' ? 'selected' : '' }}>Серый
                                            </option>
                                            <option value="Blue" {{ old('color_ru') == 'Blue' ? 'selected' : '' }}>Синий
                                            </option>
                                            <option value="Black" {{ old('color_ru') == 'Black' ? 'selected' : '' }}>
                                                Черный</option>
                                            <option value="Brown" {{ old('color_ru') == 'Brown' ? 'selected' : '' }}>
                                                Коричневый</option>
                                            <option value="Aurora Purple"
                                                {{ old('color_ru') == 'Aurora Purple' ? 'selected' : '' }}>Aurora Purple
                                            </option>
                                            <option value="Ocean Blue"
                                                {{ old('color_ru') == 'Ocean Blue' ? 'selected' : '' }}>Ocean Blue</option>
                                            <option value="Lavender Purple"
                                                {{ old('color_ru') == 'Lavender Purple' ? 'selected' : '' }}>Lavender
                                                Purple</option>
                                            <option value="Frost Blue"
                                                {{ old('color_ru') == 'Frost Blue' ? 'selected' : '' }}>Frost Blue</option>
                                            <option value="Midnight Black"
                                                {{ old('color_ru') == 'Midnight Black' ? 'selected' : '' }}>Midnight Black
                                            </option>
                                            <option value="Lite Blue"
                                                {{ old('color_ru') == 'Lite Blue' ? 'selected' : '' }}>Lite Blue</option>
                                            <option value="Lite Pink"
                                                {{ old('color_ru') == 'Lite Pink' ? 'selected' : '' }}>Lite Pink</option>
                                            <option value="Sage Green"
                                                {{ old('color_ru') == 'Sage Green' ? 'selected' : '' }}>Sage Green</option>
                                            <option value="Starry Blue"
                                                {{ old('color_ru') == 'Starry Blue' ? 'selected' : '' }}>Starry Blue
                                            </option>
                                            <option value="Clover Green"
                                                {{ old('color_ru') == 'Clover Green' ? 'selected' : '' }}>Clover Green
                                            </option>
                                            <option value="Dreamy Purple"
                                                {{ old('color_ru') == 'Dreamy Purple' ? 'selected' : '' }}>Dreamy Purple
                                            </option>
                                            <option value="Sandy Gold"
                                                {{ old('color_ru') == 'Sandy Gold' ? 'selected' : '' }}>Sandy Gold</option>
                                            <option value="Pearl Pink"
                                                {{ old('color_ru') == 'Pearl Pink' ? 'selected' : '' }}>Pearl Pink</option>
                                            <option value="Sky Blue"
                                                {{ old('color_ru') == 'Sky Blue' ? 'selected' : '' }}>Sky Blue</option>
                                            <option value="Dark Gray"
                                                {{ old('color_ru') == 'Dark Gray' ? 'selected' : '' }}>Dark Gray</option>
                                            <option value="Light Gray"
                                                {{ old('color_ru') == 'Light Gray' ? 'selected' : '' }}>Light Gray</option>
                                            <option value="Mint Green"
                                                {{ old('color_ru') == 'Mint Green' ? 'selected' : '' }}>Mint Green</option>
                                            <option value="Mist Blue"
                                                {{ old('color_ru') == 'Mist Blue' ? 'selected' : '' }}>Mist Blue</option>
                                            <option value="Gold" {{ old('color_ru') == 'Gold' ? 'selected' : '' }}>Gold
                                            </option>
                                            <option value="Gravity Gray"
                                                {{ old('color_ru') == 'Gravity Gray' ? 'selected' : '' }}>Gravity Gray
                                            </option>
                                            <option value="Aurora Green"
                                                {{ old('color_ru') == 'Aurora Green' ? 'selected' : '' }}>Aurora Green
                                            </option>
                                            <option value="Graphite Gray"
                                                {{ old('color_ru') == 'Graphite Gray' ? 'selected' : '' }}>Graphite Gray
                                            </option>
                                            <option value="Moonlight Silver"
                                                {{ old('color_ru') == 'Moonlight Silver' ? 'selected' : '' }}>Moonlight
                                                Silver</option>
                                        </select>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="image">Первое изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="images">Дополнительные изображения:</label>
                                        <input type="file" class="form-control" id="images" name="images[]"
                                            multiple>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="gift_name">Подарок название UZ:</label>
                                        <input type="text" class="form-control" id="gift_name_uz" name="gift_name_uz"
                                            value="{{ old('gift_name_uz') }}">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="gift_name">Подарок название RU:</label>
                                        <input type="text" class="form-control" id="gift_name_ru" name="gift_name_ru"
                                            value="{{ old('gift_name_ru') }}">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="gift_name">Подарок название EN:</label>
                                        <input type="text" class="form-control" id="gift_name_en" name="gift_name_en"
                                            value="{{ old('gift_name_en') }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="image">Изображение Подарок:</label>
                                        <input type="file" class="form-control" id="image" name="gift_image">
                                    </div>


                                    {{--                                    <div class="form-group pb-3"> --}}
                                    {{--                                        <label for="slug">Slug:</label> --}}
                                    {{--                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required> --}}
                                    {{--                                    </div> --}}
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
                        [{
                            'header': [1, 2, 3, false]
                        }], // Sarlavhalar
                        ['bold', 'italic', 'underline', 'strike'], // Matn stilizatsiyasi
                        [{
                            'color': []
                        }, {
                            'background': []
                        }], // 📌 **Matn rangi va fon rangi**
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }], // Yuqori va pastki indeks
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }], // Ro‘yxatlar
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }], // Ichki joylashuv
                        [{
                            'direction': 'rtl'
                        }], // Matn yo‘nalishi
                        [{
                            'align': []
                        }], // Matnni joylash
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
                        [{
                            'header': [1, 2, 3, false]
                        }], // Sarlavhalar
                        ['bold', 'italic', 'underline', 'strike'], // Matn stilizatsiyasi
                        [{
                            'color': []
                        }, {
                            'background': []
                        }], // 📌 **Matn rangi va fon rangi**
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }], // Yuqori va pastki indeks
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }], // Ro‘yxatlar
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }], // Ichki joylashuv
                        [{
                            'direction': 'rtl'
                        }], // Matn yo‘nalishi
                        [{
                            'align': []
                        }], // Matnni joylash
                        ['blockquote', 'code-block'], // Quote va kod bloki
                        ['link'], // Havola qo‘shish
                        ['clean'] // Tozalash
                    ]
                }
            });
        @endforeach

        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
                document.getElementById('description_{{ $lang }}').value = descriptionEditor{{ ucfirst($lang) }}
                    .root.innerHTML;
            @endforeach
            @foreach (['uz', 'en', 'ru'] as $lang)
                document.getElementById('content_{{ $lang }}').value = contentEditor{{ ucfirst($lang) }}.root
                    .innerHTML;
            @endforeach
        }


        document.getElementById('add-more').addEventListener('click', function() {
            // Select the first form group to clone
            const formGroup = document.querySelector('.product-form');
            // Clone the form group
            const clone = formGroup.cloneNode(true);

            // Clear the input values in the cloned form group
            const inputs = clone.querySelectorAll('input');
            inputs.forEach(input => input.value = '');

            // Append the cloned form group to the container
            document.getElementById('product-forms').appendChild(clone);
        });
    </script>
@endsection
