@extends('layouts.admin')

@section('content')
    <form action="{{ route('warranty.update') }}" method="POST" class="needs-validation" onsubmit="updateEditorContent()">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать гарантию</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Гарантия</li>
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
                        <div class="col-lg-12">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Детали гарантии</h5>
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
                                                    <label for="title_{{ $lang }}">Название ({{ strtoupper($lang) }}):</label>
                                                    <input type="text" class="form-control" id="title_{{ $lang }}" name="title_{{ $lang }}" value="{{ old('title_' . $lang, $warranty->{'title_' . $lang}) }}" required>
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="content_{{ $lang }}">Контент ({{ strtoupper($lang) }}):</label>
                                                    <div id="editor_{{ $lang }}" style="height:200px;">{!! old('content_' . $lang, $warranty->{'content_' . $lang}) !!}</div>
                                                    <input type="hidden" id="content_{{ $lang }}" name="content_{{ $lang }}">
                                                </div>
                                            </div>
                                        @endforeach
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
        var editor{{ ucfirst($lang) }} = new Quill('#editor_{{ $lang }}', { theme: 'snow' });
        editor{{ ucfirst($lang) }}.root.innerHTML = `{!! old('content_' . $lang, $warranty->{'content_' . $lang}) !!}`;

        @endforeach

        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
            document.getElementById('content_{{ $lang }}').value = editor{{ ucfirst($lang) }}.root.innerHTML;
            @endforeach
        }
    </script>


@endsection
