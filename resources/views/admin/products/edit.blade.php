@extends('layouts.admin')

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
        @csrf
        @method('PUT')  <!-- This is important for update requests in Laravel -->

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
                        <button type="submit" class="btn btn-primary">Обновить</button>
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
                                                    <label for="name_{{ $lang }}">Заголовок ({{ strtoupper($lang) }}):</label>
                                                    <input type="text" class="form-control" id="name_{{ $lang }}" name="name_{{ $lang }}"
                                                           value="{{ old('name_' . $lang, $product->{'name_' . $lang}) }}" required>
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="description_{{ $lang }}">Описание ({{ strtoupper($lang) }}):</label>
                                                    <div id="descriptionEditor_{{ $lang }}" style="height:200px;">{!! old('description_' . $lang, $product->{'description_' . $lang}) !!}</div>
                                                    <input type="hidden" id="description_{{ $lang }}" name="description_{{ $lang }}" value="{{ old('description_' . $lang, $product->{'description_' . $lang}) }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Дополнительно</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="image">Изображение Подарок:</label>
                                        <input type="file" class="form-control" id="image" name="gift_image">
                                        @if ($product->gift_image)
                                            <img src="{{ asset('storage/' . $product->gift_image) }}" alt="gift image" class="img-thumbnail mt-2" width="100">
                                        @endif
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="gift_name">Подарок название:</label>
                                        <input type="text" class="form-control" id="gift_name" name="gift_name" value="{{ old('gift_name', $product->gift_name) }}">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="category_id">Категория:</label>
                                        <select id="category_id" name="category_id" class="form-control" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name_ru }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="slug">Slug:</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" required>
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
        var descriptionEditor{{ ucfirst($lang) }} = new Quill('#descriptionEditor_{{ $lang }}', { theme: 'snow' });
        @endforeach

        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
            document.getElementById('description_{{ $lang }}').value = descriptionEditor{{ ucfirst($lang) }}.root.innerHTML;
            @endforeach
        }
    </script>
@endsection
