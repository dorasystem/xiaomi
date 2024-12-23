@extends('layouts.admin')

@section('content')
    <form action="{{ route('abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать информацию о компании</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">О компании</li>
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
                                    <h5 class="card-title">Детали информации</h5>
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
                                                    <label for="about_or_company_{{ $lang }}">About or Company ({{ strtoupper($lang) }}):</label>
                                                    <div id="about_{{ $lang }}" style="height:200px;">{!! old('about_or_company_' . $lang, $about->{'about_or_company_' . $lang}) !!}</div>
                                                    <input type="hidden" id="about_or_company_{{ $lang }}" name="about_or_company_{{ $lang }}">
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="description_{{ $lang }}">Описание ({{ strtoupper($lang) }}):</label>
                                                    <div id="descriptionEditor_{{ $lang }}" style="height:200px;">{!! old('description_' . $lang, $about->{'description_' . $lang}) !!}</div>
                                                    <input type="hidden" id="description_{{ $lang }}" name="description_{{ $lang }}">
                                                </div>
                                                <div class="form-group pb-3">
                                                    <label for="content_{{ $lang }}">Контент ({{ strtoupper($lang) }}):</label>
                                                    <div id="editor_{{ $lang }}" style="height:200px;">{!! old('content_' . $lang, $about->{'content_' . $lang}) !!}</div>
                                                    <input type="hidden" id="text_{{ $lang }}" name="content_{{ $lang }}">
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
                                    <h5 class="card-title">Изображение</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="image" style="font-weight: 900">описание изображения:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($about->image)
                                            <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="200">
                                        @endif
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="photo" style="font-weight: 900">контент изображения:</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                        @if ($about->photo)
                                            <img src="{{ asset('storage/' . $about->photo) }}" alt="Current Image" class="img-thumbnail mt-2" width="200">
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
        // Quill editorini barcha tillar uchun yaratish
        @foreach (['uz', 'en', 'ru'] as $lang)
        var aboutEditor{{ ucfirst($lang) }} = new Quill('#about_{{ $lang }}', { theme: 'snow' });
        var descriptionEditor{{ ucfirst($lang) }} = new Quill('#descriptionEditor_{{ $lang }}', { theme: 'snow' });
        var contentEditor{{ ucfirst($lang) }} = new Quill('#editor_{{ $lang }}', { theme: 'snow' });

        // Editorning mavjud qiymatini to'ldirish
        aboutEditor{{ ucfirst($lang) }}.root.innerHTML = `{!! old('about_or_company_' . $lang, $about->{'about_or_company_' . $lang}) !!}`;
        descriptionEditor{{ ucfirst($lang) }}.root.innerHTML = `{!! old('description_' . $lang, $about->{'description_' . $lang}) !!}`;
        contentEditor{{ ucfirst($lang) }}.root.innerHTML = `{!! old('content_' . $lang, $about->{'content_' . $lang}) !!}`;
        @endforeach

        // Form yuborilishidan oldin qiymatlarni yashirin inputlarga kiritish
        function updateEditorContent() {
            @foreach (['uz', 'en', 'ru'] as $lang)
            document.getElementById('about_or_company_{{ $lang }}').value = aboutEditor{{ ucfirst($lang) }}.root.innerHTML;
            document.getElementById('description_{{ $lang }}').value = descriptionEditor{{ ucfirst($lang) }}.root.innerHTML;
            document.getElementById('text_{{ $lang }}').value = contentEditor{{ ucfirst($lang) }}.root.innerHTML;
            @endforeach
        }
    </script>

@endsection
