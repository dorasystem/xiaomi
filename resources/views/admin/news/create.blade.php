@extends('layouts.admin')

@section('content')
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
        @csrf

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Создать новость</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Новости</li>
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
                                    <h5 class="card-title">Детали новости</h5>
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
                                                    <label for="title_{{ $lang }}">Заголовок ({{ strtoupper($lang) }}):</label>
                                                    <input type="text" class="form-control" id="title_{{ $lang }}" name="title_{{ $lang }}"
                                                           value="{{ old('title_' . $lang, $news->{'title_' . $lang} ?? '') }}" required>
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="description_{{ $lang }}">Oписание ({{ strtoupper($lang) }}):</label>
                                                    <div id="descriptionEditor_{{ $lang }}" style="height:200px;">{!! old('description_' . $lang, $news->{'description_' . $lang} ?? '') !!}</div>
                                                    <input type="hidden" id="description_{{ $lang }}" name="description_{{ $lang }}" value="{{ old('description_' . $lang, $news->{'description_' . $lang} ?? '') }}">
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="content_{{ $lang }}">Контент ({{ strtoupper($lang) }}):</label>
                                                    <div id="editor_{{ $lang }}" style="height:200px;">{!! old('content_' . $lang, $news->{'content_' . $lang} ?? '') !!}</div>
                                                    <input type="hidden" id="text_{{ $lang }}" name="content_{{ $lang }}" value="{{ old('content_' . $lang, $news->{'content_' . $lang} ?? '') }}">
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
                                    <h5 class="card-title">Изображение новости</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="image">Изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="date">Дата:</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label>
                                            <input type="checkbox" id="status" name="status" value="popular">
                                            Popular
                                        </label>
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
        var editor{{ ucfirst($lang) }} = new Quill('#editor_{{ $lang }}', { theme: 'snow' ,
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }], // Sarlavhalar
                    ['bold', 'italic', 'underline', 'strike'], // Matn stilizatsiyasi
                    [{ 'color': [] }, { 'background': [] }], // 📌 **Matn rangi va fon rangi**
                    [{ 'script': 'sub' }, { 'script': 'super' }], // Yuqori va pastki indeks
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }], // Ro‘yxatlar
                    [{ 'indent': '-1' }, { 'indent': '+1' }], // Ichki joylashuv
                    [{ 'direction': 'rtl' }], // Matn yo‘nalishi
                    [{ 'align': [] }], // Matnni joylash
                    ['blockquote', 'code-block'], // Quote va kod bloki
                    ['link'], // Havola qo‘shish
                    ['clean'] // Tozalash
                ]
            } });
        var descriptionEditor{{ ucfirst($lang) }} = new Quill('#descriptionEditor_{{ $lang }}', { theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }], // Sarlavhalar
                    ['bold', 'italic', 'underline', 'strike'], // Matn stilizatsiyasi
                    [{ 'color': [] }, { 'background': [] }], // 📌 **Matn rangi va fon rangi**
                    [{ 'script': 'sub' }, { 'script': 'super' }], // Yuqori va pastki indeks
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }], // Ro‘yxatlar
                    [{ 'indent': '-1' }, { 'indent': '+1' }], // Ichki joylashuv
                    [{ 'direction': 'rtl' }], // Matn yo‘nalishi
                    [{ 'align': [] }], // Matnni joylash
                    ['blockquote', 'code-block'], // Quote va kod bloki
                    ['link'], // Havola qo‘shish
                    ['clean'] // Tozalash
                ]
            }  });
        @endforeach

        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
            document.getElementById('text_{{ $lang }}').value = editor{{ ucfirst($lang) }}.root.innerHTML;
            document.getElementById('description_{{ $lang }}').value = editor{{ ucfirst($lang) }}.root.innerHTML;
            @endforeach
        }
    </script>
@endsection
