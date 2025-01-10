@extends('layouts.admin')

@section('content')
    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" novalidate
        class="needs-validation" onsubmit="updateEditorContent()">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать Блог</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Блог</li>
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
                                    <h5 class="card-title">Детали Блог</h5>
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
                                                    <label for="title_{{ $lang }}">Заголовок
                                                        ({{ strtoupper($lang) }}):</label>
                                                    <input type="text" class="form-control"
                                                        id="title_{{ $lang }}" name="title_{{ $lang }}"
                                                        value="{{ old('title_' . $lang, $blog->{'title_' . $lang}) }}"
                                                        required>
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="description_{{ $lang }}">Oписание
                                                        ({{ strtoupper($lang) }}):</label>
                                                    <div id="descriptionEditor_{{ $lang }}" style="height:200px;">
                                                        {!! old('description_' . $lang, $blog->{'description_' . $lang}) !!}</div>
                                                    <input type="hidden" id="description_{{ $lang }}"
                                                        name="description_{{ $lang }}">
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="content_{{ $lang }}">Контент
                                                        ({{ strtoupper($lang) }}):</label>
                                                    <div id="editor_{{ $lang }}" style="height:200px;">
                                                        {!! old('content_' . $lang, $blog->{'content_' . $lang}) !!}</div>
                                                    <input type="hidden" id="text_{{ $lang }}"
                                                        name="content_{{ $lang }}">
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
                                    <h5 class="card-title">Изображение Блог</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="date">Дата:</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="{{ old('date', $blog->date ? \Carbon\Carbon::parse($blog->date)->format('Y-m-d') : '') }}">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="image">Изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Current Image"
                                                class="img-thumbnail mt-2" width="200">
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="">
                                        <div class="form-group pb-3">
                                            <input type="file" name="images[]" id="images" class="form-control"
                                                multiple>
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="mb-3">Текущие изображения:</label>
                                            <div class="d-flex flex-wrap gap-2">
                                                @if ($blog->images)
                                                    @foreach ($blog->images as $key => $image)
                                                        <div class="image-preview position-relative"
                                                            style="width: 100px; height: 100px; overflow: hidden; border: 1px solid #ccc; margin-right: 10px;">
                                                            <img src="{{ asset('storage/' . $image) }}" alt="image"
                                                                style="width: 100%; height: 100%; object-fit: cover;">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                                onclick="deleteImage('{{ $image }}', this)">X</button>
                                                            <input type="hidden" name="existing_images[]"
                                                                value="{{ $image }}">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
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
        function deleteImage(imagePath, button) {
            const parentDiv = button.closest('.image-preview');
            parentDiv.remove();

            // Yashirin input orqali o'chirilayotgan rasmni backendga yuborish
            const deleteInput = document.createElement('input');
            deleteInput.type = 'hidden';
            deleteInput.name = 'delete_images[]';
            deleteInput.value = imagePath;
            document.querySelector('form').appendChild(deleteInput);
        }

        @foreach (['uz', 'en', 'ru'] as $lang)
            var editor{{ ucfirst($lang) }} = new Quill('#editor_{{ $lang }}', {
                theme: 'snow'
            });
            var descriptionEditor{{ ucfirst($lang) }} = new Quill('#descriptionEditor_{{ $lang }}', {
                theme: 'snow'
            });
            editor{{ ucfirst($lang) }}.root.innerHTML = `{!! old('content_' . $lang, $blog->{'content_' . $lang}) !!}`;
            descriptionEditor{{ ucfirst($lang) }}.root.innerHTML = `{!! old('description_' . $lang, $blog->{'description_' . $lang}) !!}`;
        @endforeach

        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
                document.getElementById('text_{{ $lang }}').value = editor{{ ucfirst($lang) }}.root.innerHTML;
                document.getElementById('description_{{ $lang }}').value = editor{{ ucfirst($lang) }}.root
                    .innerHTML;
            @endforeach
        }
    </script>
@endsection
