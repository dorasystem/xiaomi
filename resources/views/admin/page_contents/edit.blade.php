@extends('layouts.admin')

@section('content')
    <form action="{{ route('page_contents.update', $pageContent->id) }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать контент</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Главная</a></li>
                            <li class="breadcrumb-item">Контент</li>
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
                        <div class="col-lg-8">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Детали контента</h5>
                                </div>
                                <div class="card-body p-4">
                                    <ul class="nav-tab-items-wrapper nav nav-justified invoice-overview-tab-item">
                                        @foreach (['uz', 'en', 'ru'] as $lang)
                                            <li class="nav-item">
                                                <a href="#{{ $lang }}Content" class="nav-link {{ $lang == 'uz' ? 'active' : '' }}" data-bs-toggle="tab">
                                                    {{ strtoupper($lang) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content pt-3">
                                        @foreach (['uz', 'en', 'ru'] as $lang)
                                            <div class="tab-pane fade show {{ $lang == 'uz' ? 'active' : '' }}" id="{{ $lang }}Content">
                                                <div class="form-group pb-3">
                                                    <label for="title_{{ $lang }}">Заголовок ({{ strtoupper($lang) }}):</label>
                                                    <input type="text" class="form-control" id="title_{{ $lang }}" name="title_{{ $lang }}" value="{{ old('title_' . $lang, $pageContent->{'title_' . $lang}) }}" required>
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="content_{{ $lang }}">Контент ({{ strtoupper($lang) }}):</label>
                                                    <div id="editor_{{ $lang }}" style="height:500px;">{!! old('content_' . $lang, $pageContent->{'content_' . $lang}) !!}</div>
                                                    <input type="hidden" id="content_{{ $lang }}" name="content_{{ $lang }}">
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
                                    <h5 class="card-title">Изображения контента</h5>
                                </div>
                                <div class="card-body p-4">
                                    @foreach (['uz', 'en', 'ru'] as $lang)
                                        <div class="form-group pb-3">
                                            <label for="image_{{ $lang }}">Изображение ({{ strtoupper($lang) }}):</label>
                                            <input type="file" class="form-control" id="image_{{ $lang }}" name="image_{{ $lang }}">
                                            @if ($pageContent->{'image_' . $lang})
                                                <img src="{{ asset('storage/' . $pageContent->{'image_' . $lang}) }}" alt="Текущее изображение" class="img-thumbnail mt-2" width="200">
                                            @endif
                                        </div>
                                    @endforeach
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
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'sub' }, { 'script': 'super' }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'align': [] }],
                    ['blockquote', 'code-block'],
                    ['link'],
                    ['clean']
                ]
            }
        });

        editor{{ ucfirst($lang) }}.root.innerHTML = `{!! old('content_' . $lang, $pageContent->{'content_' . $lang}) !!}`;
        @endforeach

        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
            document.getElementById('content_{{ $lang }}').value = editor{{ ucfirst($lang) }}.root.innerHTML;
            @endforeach
        }
    </script>
@endsection
