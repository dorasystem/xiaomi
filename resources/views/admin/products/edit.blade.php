@extends('layouts.admin')

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
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
                                            <a href="#uzContent" class="nav-link active" data-bs-toggle="tab" data-bs-target="#uzContent">O'zbekcha</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#enContent" class="nav-link" data-bs-toggle="tab" data-bs-target="#enContent">English</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#ruContent" class="nav-link" data-bs-toggle="tab" data-bs-target="#ruContent">Русский</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        @foreach (['uz', 'en', 'ru'] as $lang)
                                            <div class="tab-pane fade show {{ $lang == 'uz' ? 'active' : '' }}" id="{{ $lang }}Content">
                                                <div class="form-group pb-3">
                                                    <label for="name_{{ $lang }}">Название ({{ strtoupper($lang) }}):</label>
                                                    <input type="text" class="form-control" id="name_{{ $lang }}" name="name_{{ $lang }}"
                                                           value="{{ old('name_' . $lang, $product->{'name_' . $lang}) }}" required>
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="description_{{ $lang }}">Описание ({{ strtoupper($lang) }}):</label>
                                                    <textarea class="form-control" id="description_{{ $lang }}" name="description_{{ $lang }}" rows="5">{{ old('description_' . $lang, $product->{'description_' . $lang}) }}</textarea>
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
                                                    <option value="null" {{ $price->storage == 'null' ? 'selected' : '' }}>Null</option>
                                                    <option value="2/32GB" {{ $price->storage == '2/32GB' ? 'selected' : '' }}>2/32 GB</option>
                                                    <option value="4/64GB" {{ $price->storage == '4/64GB' ? 'selected' : '' }}>4/64 GB</option>
                                                    <option value="6/128GB" {{ $price->storage == '6/128GB' ? 'selected' : '' }}>6/128 GB</option>
                                                    <option value="8/256GB" {{ $price->storage == '8/256GB' ? 'selected' : '' }}>8/256 GB</option>
                                                    <option value="12/512GB" {{ $price->storage == '12/512GB' ? 'selected' : '' }}>12/512 GB</option>
                                                </select>
                                            </div>
                                            <div class="form-group pb-3 col-md-4">
                                                <label for="price">Цена:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price[]" value="{{ $price->price }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-4">
                                                <label for="discount_price">Скидочная цена:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="discount_price[]" value="{{ $price->discount_price }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-3">
                                                <label for="price_3">Цена за 3 месяца:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price_3[]" value="{{ $price->price_3 }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-3">
                                                <label for="price_6">Цена за 6 месяцев:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price_6[]" value="{{ $price->price_6 }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-3">
                                                <label for="price_12">Цена за 12 месяцев:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price_12[]" value="{{ $price->price_12 }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="form-group pb-3 col-md-3">
                                                <label for="price_24">Цена за 24 месяца:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price_24[]" value="{{ $price->price_24 }}">
                                                    <span class="input-group-text">UZS</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="hidden" name="deleted_variants[]" value="{{ $price->id ?? '' }}">
                                                <button type="button" class="btn btn-danger btn-sm remove-variant">Удалить</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add-more" class="btn btn-primary mt-3">Добавить ещё</button>
                                <script>
                                    // Function to initialize the delete functionality for variants
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
                                                <option value="4/64GB">4/64 GB</option>
                                                <option value="6/128GB">6/128 GB</option>
                                                <option value="8/256GB">8/256 GB</option>
                                                <option value="12/512GB">12/512 GB</option>
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
                                            <label for="price_3">Цена за 3 месяца:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="price_3[]" >
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
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name_ru }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="color_ru">Цвет RU:</label>
                                        <select class="form-control" id="color_ru" name="color_ru">
                                            <option value="null" {{ old('color_ru', $product->color_ru) == 'null' ? 'selected' : '' }}>Null</option>
                                            <option value="red" {{ old('color_ru', $product->color_ru) == 'red' ? 'selected' : '' }}>Красный</option>
                                            <option value="green" {{ old('color_ru', $product->color_ru) == 'green' ? 'selected' : '' }}>Зеленый</option>
                                            <option value="blue" {{ old('color_ru', $product->color_ru) == 'blue' ? 'selected' : '' }}>Синий</option>
                                            <option value="black" {{ old('color_ru', $product->color_ru) == 'black' ? 'selected' : '' }}>Черный</option>
                                            <option value="brown" {{ old('color_ru', $product->color_ru) == 'brown' ? 'selected' : '' }}>Коричневый</option>
                                        </select>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="image">Первое изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid mt-2">
                                        @endif
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="images">Дополнительные изображения:</label>
                                        <input type="file" class="form-control" id="images" name="images[]" multiple>

                                        @php
                                            // Agar $product->images string bo'lsa, uni array ga aylantiring
                                            $images = is_string($product->images) ? json_decode($product->images) : $product->images;
                                        @endphp

                                        @foreach($images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="Additional Image" class="img-fluid mt-2" width="100">
                                        @endforeach
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="has_gift">Подарок имеется:</label>
                                        <input type="checkbox" class="" id="has_gift" name="has_gift" value="1" {{ old('has_gift', $product->has_gift) ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-group pb-3 gift-fields {{ old('has_gift', $product->has_gift) ? 'd-block' : 'd-none' }}">
                                        <label for="gift_name">Подарок название:</label>
                                        <input type="text" class="form-control" id="gift_name" name="gift_name" value="{{ old('gift_name', $product->gift_name) }}">
                                    </div>

                                    <div class="form-group pb-3 gift-fields {{ old('has_gift', $product->has_gift) ? 'd-block' : 'd-none' }}">
                                        <label for="gift_image">Изображение Подарок:</label>
                                        <input type="file" class="form-control" id="gift_image" name="gift_image">
                                        @if ($product->gift_image)
                                            <img src="{{ asset('storage/' . $product->gift_image) }}" alt="Gift Image" class="img-fluid mt-2">
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

    <script>
        @foreach (['uz', 'en', 'ru'] as $lang)
        var descriptionEditor{{ ucfirst($lang) }} = new Quill('#descriptionEditor_{{ $lang }}', { theme: 'snow' });
        @endforeach

        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
            document.getElementById('description_{{ $lang }}').value = descriptionEditor{{ ucfirst($lang) }}.root.innerHTML;
            @endforeach
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the checkbox and gift fields
            const giftCheckbox = document.getElementById('has_gift');
            const giftFields = document.querySelectorAll('.gift-fields');

            // Function to toggle gift fields visibility
            function toggleGiftFields() {
                if (giftCheckbox.checked) {
                    giftFields.forEach(function(field) {
                        field.classList.remove('d-none');
                        field.classList.add('d-block');
                    });
                } else {
                    giftFields.forEach(function(field) {
                        field.classList.remove('d-block');
                        field.classList.add('d-none');
                    });
                }
            }

            // Initialize visibility on page load
            toggleGiftFields();

            // Add event listener to toggle visibility when checkbox changes
            giftCheckbox.addEventListener('change', toggleGiftFields);
        });
    </script>

@endsection
