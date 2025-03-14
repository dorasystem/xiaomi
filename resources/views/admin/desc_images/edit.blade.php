@extends('layouts.admin')

@section('content')
    <form action="{{ route('desc-images.update', $descImage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать описание изображений</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('desc-images.index') }}">Изображения описания</a>
                            </li>
                            <li class="breadcrumb-item active">Редактировать</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
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
                        <div class="col-md-8 pb-5">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Редактирование изображения для продукта</h5>
                                </div>
                                <div class="card-body p-4" id="dynamic-images">

                                    <!-- Image Input Section -->
                                    <div class="form-group pb-3">
                                        <label for="image">Изображение:</label>
                                        <input type="file" class="form-control" name="image"
                                            value="{{ $descImage->image }}">
                                        @if ($descImage->image)
                                            <img src="{{ asset('storage/' . $descImage->image) }}" alt="Image"
                                                style="width: 100px; height: 100px; object-fit: cover; margin-top: 10px;">
                                        @endif
                                    </div>

                                    <!-- Description Fields for Different Languages -->
                                    <div class="form-group pb-3">
                                        <label for="description_uz">Описание на узбекском:</label>
                                        <textarea class="form-control" name="description_uz" rows="3">{{ $descImage->description_uz }}</textarea>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="description_ru">Описание на русском:</label>
                                        <textarea class="form-control" name="description_ru" rows="3">{{ $descImage->description_ru }}</textarea>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="description_en">Описание на английском:</label>
                                        <textarea class="form-control" name="description_en" rows="3">{{ $descImage->description_en }}</textarea>
                                    </div>

                                    <button type="button" id="add-more"
                                        class="btn btn-secondary mt-3 w-100">Добавить</button>
                                </div>
                                <div id=""></div>


                            </div>
                        </div>

                        <div class="col-md-4 pb-5">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Продукт:</h5>
                                </div>
                                <div class="card-body p-4 pb-0">
                                    <div class="form-group pb-3">
                                        <label for="product_id">Продукт:</label>
                                        <select id="product_id" name="product_id" class="form-control" required>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"
                                                    {{ $descImage->product_id == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name_ru }}</option>
                                            @endforeach
                                        </select>
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
        document.getElementById('add-more').addEventListener('click', function() {
            const container = document.getElementById('dynamic-images');
            const newIndex = container.children.length;

            const newField = `
            <div class="form-group mt-3">
                <label>Изображение</label>
                <input type="file" name="images[image][${newIndex}]" class="form-control" />
                <label for="description_uz">Описание (uz)</label>
                <textarea name="images[description_uz][${newIndex}]" class="form-control" rows="3"></textarea>
                <label for="description_ru">Описание (ru)</label>
                <textarea name="images[description_ru][${newIndex}]" class="form-control" rows="3"></textarea>
                <label for="description_en">Описание (en)</label>
                <textarea name="images[description_en][${newIndex}]" class="form-control" rows="3"></textarea>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', newField);
        });

        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                const imageId = this.dataset.id;
                fetch(`/images/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    }
                }).then(response => {
                    if (response.ok) {
                        this.parentElement.remove();
                    } else {
                        alert('Ошибка удаления изображения.');
                    }
                });
            });
        });
    </script>
@endsection
