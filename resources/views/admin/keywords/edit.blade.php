@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Редактировать ключевое слово</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Ключевые слова</li>
                        <li class="breadcrumb-item active">Редактировать ключевое слово</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('keywords.index') }}" class="btn btn-secondary">Назад</a>
                </div>
            </div>

            <div class="main-content">
                <div class="card stretch">
                    <div class="card-header">
                        <h5 class="card-title">Редактировать ключевое слово</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('keywords.update', $keyword->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group pb-3">
                                <label for="key">Ключевое слово:</label>
                                <input type="text" class="form-control" id="key" name="key" value="{{ old('key', $keyword->key) }}" required>
                            </div>

                            @foreach (['uz', 'en', 'ru'] as $lang)
                                <div class="form-group pb-3">
                                    <label for="{{ $lang }}">Description ({{ strtoupper($lang) }}):</label>
                                    <input type="text" class="form-control" id="{{ $lang }}" name="{{ $lang }}"
                                           value="{{ old($lang, $keyword->$lang) }}" required>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
