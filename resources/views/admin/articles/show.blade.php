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

            <div class="card m-4">
                <div class="card-header">
                    <h6>Информация о статье</h6>
                </div>
                <div class="container">
                    <div class="card-body">
                        <div class="row">
                            <div class="row mb-3">
                                <strong class="col-sm-3">Сарлавҳа (UZ):</strong>
                                <div class="col-sm-9">{{ $article->title_uz }}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Заголовок (RU):</strong>
                                <div class="col-sm-9">{{ $article->title_ru }}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Title (EN):</strong>
                                <div class="col-sm-9">{{ $article->title_en }}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Slug (UZ):</strong>
                                <div class="col-sm-9">{{ $article->getSlugByLanguage('uz') }}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Slug (RU):</strong>
                                <div class="col-sm-9">{{ $article->getSlugByLanguage('ru') }}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Slug (EN):</strong>
                                <div class="col-sm-9">{{ $article->getSlugByLanguage('en') }}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Тавсиф (UZ):</strong>
                                <div class="col-sm-9">{!! $article->description_uz !!}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Описание (RU):</strong>
                                <div class="col-sm-9">{!! $article->description_ru !!}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Description (EN):</strong>
                                <div class="col-sm-9">{!! $article->description_en !!}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Content (UZ):</strong>
                                <div class="col-sm-9">{!! $article->content_uz !!}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Контент (RU):</strong>
                                <div class="col-sm-9">{!! $article->content_ru !!}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Content (EN):</strong>
                                <div class="col-sm-9">{!! $article->content_en !!}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Сана:</strong>
                                <div class="col-sm-9">{!! \Carbon\Carbon::parse($article->date)->format('d.m.Y') !!}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Статус:</strong>
                                <div class="col-sm-9">{!! $article->status ? 'Активный' : 'Неактивный' !!}</div>
                            </div>
                            <div class="row mb-3">
                                <strong class="col-sm-3">Изображение:</strong>
                                <div class="col-sm-9">
                                    <img class="img-fluid rounded-3" width="250px"
                                        src="{{ asset('storage/' . $article->image) }}" alt="Article Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
