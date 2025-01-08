@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">
                            Полезные статьи - Просмотр
                        </h5>
                    </div>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('articles.index') }}" class="btn btn-primary">Назад</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h6>Информация о статье</h6>
                </div>
                <div class="container">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Сарлавҳа (UZ):</strong>
                                    <p>{{ $article->title_uz }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Заголовок (RU):</strong>
                                    <p>{{ $article->title_ru }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Title (EN):</strong>
                                    <p>{{ $article->title_en }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Slug (UZ):</strong>
                                    <p>{{ $article->getSlugByLanguage('uz') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Slug (RU):</strong>
                                    <p>{{ $article->getSlugByLanguage('ru') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Slug (EN):</strong>
                                    <p>{{ $article->getSlugByLanguage('en') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Тавсиф (UZ):</strong>
                                    <p>{{ $article->description_uz }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Описание (RU):</strong>
                                    <p>{{ $article->description_ru }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Description (EN):</strong>
                                    <p>{{ $article->description_en }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Content (UZ):</strong>
                                    <p>{{ $article->content_uz }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Контент (RU):</strong>
                                    <p>{{ $article->content_ru }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Content (EN):</strong>
                                    <p>{{ $article->content_en }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Сана:</strong>
                                    <p>{{ $article->date }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Статус:</strong>
                                    <p>{{ $article->status ? 'Активный' : 'Неактивный' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <strong>Изображение:</strong>
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
