@extends('layouts.admin')
@section('title', 'Редактирование переводов')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="main-content">
                <h2>Редактирование переводов</h2>

                @if(session('success'))
                    <!-- Сообщение об успешном сохранении перевода -->
                    <div class="alert alert-success">{{ session('success') }}</div>

                    <!-- Скрипт для показа модального окна -->
                    <script>
                        window.onload = function () {
                            $('#successModal').modal('show'); // Открытие модального окна
                            setTimeout(function () {
                                location.reload(); // Обновление страницы через 3 секунды
                            }, 3000);
                        };
                    </script>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Выбор языка и файла -->
                <form method="GET" action="{{ route('translations.index') }}">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Выберите язык</label>
                            <select name="local" class="form-control  text-white" style="background-color: #1b2436!important;">
                                <option value="uz" {{ $local == 'uz' ? 'selected' : '' }}>O‘zbekcha</option>
                                <option value="ru" {{ $local == 'ru' ? 'selected' : '' }}>Русский</option>
                                <option value="en" {{ $local == 'en' ? 'selected' : '' }}>English</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Выберите файл</label>
                            <select name="file" class="form-control text-white" style="background-color: #1b2436!important;">
                                <option value="messages" {{ $file == 'messages' ? 'selected' : '' }}>messages.php
                                </option>
                                <option value="footer" {{ $file == 'footer' ? 'selected' : '' }}>footer.php</option>
                                <option value="home" {{ $file == 'home' ? 'selected' : '' }}>home.php</option>
                            </select>
                        </div>

                        <div class="col-md-4 mt-2">
                            <button type="submit" class="btn btn-primary mt-4">Просмотр</button>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 30%">Текущий текст</th>
                        <th style="width: 30%">Новый текст</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($translations as $key => $value)
                        <tr>
                            <td style="word-wrap: break-word;">{{ $value }}</td>
                            <td>
                                <form method="POST" action="{{ route('translations.update') }}">
                                    @csrf
                                    <input type="hidden" name="local" value="{{ $local }}">
                                    <input type="hidden" name="file" value="{{ $file }}">
                                    <input type="hidden" name="key" value="{{ $key }}">

                                    <textarea name="value" class="form-control" rows="3">{{ $value }}</textarea>

                                    <button type="submit" class="btn btn-success mt-2">Сохранить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Модальное окно -->
    <div id="successModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Перевод обновлён!</h5>
                </div>
                <div class="modal-body">
                    <p>Подождите 3 секунды, чтобы изменения вступили в силу...</p>
                </div>
            </div>
        </div>
    </div>

@endsection
