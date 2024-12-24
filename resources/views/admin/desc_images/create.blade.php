@extends('layouts.admin')

@section('content')
    <form action="{{ route('desc-images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center justify-content-between w-100">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Добавить описание изображений для продукта</h5>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
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
                                    <h5 class="card-title">Добавление изображения для продукта</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div id="dynamic-images">
                                        <div class="form-group">
                                            <label>Изображение</label>
                                            <input type="file" name="images[image][]" class="form-control" required />
                                            <label for="description_uz">Описание (uz)</label>
                                            <textarea name="images[description_uz][]" class="form-control" placeholder="Описание на уз" rows="3"></textarea>
                                            <label for="description_ru">Описание (ru)</label>
                                            <textarea name="images[description_ru][]" class="form-control" placeholder="Описание на ру" rows="3"></textarea>
                                            <label for="description_en">Описание (en)</label>
                                            <textarea name="images[description_en][]" class="form-control" placeholder="Описание на англ" rows="3"></textarea>
                                        </div>

                                        <!-- Render additional image fields dynamically in the backend -->
                                        @foreach (old('images.image', []) as $index => $image)
                                            <div class="form-group">
                                                <input type="file" name="images[image][]" class="form-control" required />
                                                <textarea name="images[description_uz][]" class="form-control" placeholder="Tavsif (uz)" rows="3"></textarea>
                                                <textarea name="images[description_ru][]" class="form-control" placeholder="Tavsif (ru)" rows="3"></textarea>
                                                <textarea name="images[description_en][]" class="form-control" placeholder="Tavsif (en)" rows="3"></textarea>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" id="add-more" class="btn btn-secondary mt-3">Добавить</button>
                                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 pb-5">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Добавление изображения для продукта</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="product_id">Продукт:</label>
                                        <select id="product_id" name="product_id" class="form-control" required>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name_ru }}</option>
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
            const newField = `
            <div class="form-group mt-3">
                <label>Изображение</label>
                <input type="file" name="images[image][]" class="form-control" required />
                <label for="description_uz">Описание (uz)</label>
                <textarea name="images[description_uz][]" class="form-control" placeholder="Описание на уз" rows="3"></textarea>
                <label for="description_ru">Описание (ru)</label>
                <textarea name="images[description_ru][]" class="form-control" placeholder="Описание на ру" rows="3"></textarea>
                <label for="description_en">Описание (en)</label>
                <textarea name="images[description_en][]" class="form-control" placeholder="Описание на англ" rows="3"></textarea>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', newField);
        });
    </script>
@endsection
