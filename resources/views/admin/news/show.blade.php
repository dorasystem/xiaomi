@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">
                            Янгиликлар - Просмотр
                        </h5>
                    </div>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('news.index') }}" class="btn btn-primary">Назад</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="d-flex">
                    <div class="card-header">
                        <h6>Информация о новостях</h6>
                    </div>
                </div>
                <div class="container">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Сарлавҳа (UZ):</strong>
                                    <p>{{ $news->title_uz }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Заголовок (RU):</strong>
                                    <p>{{ $news->title_ru }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Title (EN):</strong>
                                    <p>{{ $news->title_en }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Slug (UZ):</strong>
                                    <p>{{ $news->getSlugByLanguage('uz') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Slug (RU):</strong>
                                    <p>{{ $news->getSlugByLanguage('ru') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Slug (EN):</strong>
                                    <p>{{ $news->getSlugByLanguage('en') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Тавсиф (UZ):</strong>
                                    <p>{{ $news->description_uz }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Описание (RU):</strong>
                                    <p>{{ $news->description_ru }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Description (EN):</strong>
                                    <p>{{ $news->description_en }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Content (UZ):</strong>
                                    <p>{{ $news->content_uz }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Контент (RU):</strong>
                                    <p>{{ $news->content_ru }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Content (EN):</strong>
                                    <p>{{ $news->content_en }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Сана:</strong>
                                    <p>{{ $news->date }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Статус:</strong>
                                    <p>{{ $news->status ? 'Активный' : 'Неактивный' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Изображение:</strong>
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="News Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
