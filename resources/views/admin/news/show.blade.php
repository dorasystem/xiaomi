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

            <div class="card m-4">
                <div class="">
                    <div class="card-header">
                        <h6>Информация о новостях</h6>
                    </div>
                </div>
                <div class="container">
                    <div class="card-body">
                        <div class="row mb-3">
                            <strong class="col-sm-3">Сарлавҳа (UZ):</strong>
                            <div class="col-sm-9">{!! $news->title_uz !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Заголовок (RU):</strong>
                            <div class="col-sm-9">{!! $news->title_ru !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Title (EN):</strong>
                            <div class="col-sm-9">{!! $news->title_en !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Slug (UZ):</strong>
                            <div class="col-sm-9">{!! $news->getSlugByLanguage('uz') !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Slug (RU):</strong>
                            <div class="col-sm-9">{!! $news->getSlugByLanguage('ru') !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Slug (EN):</strong>
                            <div class="col-sm-9">{!! $news->getSlugByLanguage('en') !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Тавсиф (UZ):</strong>
                            <div class="col-sm-9">{!! $news->description_uz !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Описание (RU):</strong>
                            <div class="col-sm-9">{!! $news->description_ru !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Description (EN):</strong>
                            <div class="col-sm-9">{!! $news->description_en !!}</div>

                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Content (UZ):</strong>
                            <div class="col-sm-9">{!! $news->content_uz !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Контент (RU):</strong>
                            <div class="col-sm-9">{!! $news->content_ru !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Content (EN):</strong>
                            <div class="col-sm-9">{!! $news->content_en !!}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Сана:</strong>
                            <div class="col-sm-9">{{ \Carbon\Carbon::parse($news->date)->format('d.m.Y') }}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Статус:</strong>
                            <div class="col-sm-9">{{ $news->status ? 'Активный' : 'Неактивный' }}</div>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-sm-3">Изображение:</strong>
                            <div class="col-sm-9">
                                <img width="250px" src="{{ asset('storage/' . $news->image) }}" alt="News Image"
                                    class="img-fluid rounded-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
