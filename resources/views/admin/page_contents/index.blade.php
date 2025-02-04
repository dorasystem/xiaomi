@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список контента</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Главная</a></li>
                        <li class="breadcrumb-item">Контент</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch">
                            <div class="card-header">
                                <h5 class="card-title">Все страницы</h5>
                            </div>
                            <div class="card-body p-4">
                                <table class="table  table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Заголовок (Узбекский)</th>
                                        <th>Заголовок (Русский)</th>
                                        <th>Заголовок (Английский)</th>
                                        <th class="text-end">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contents as $key => $content)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $content->title_uz }}</td>
                                            <td>{{ $content->title_ru }}</td>
                                            <td>{{ $content->title_en }}</td>
                                            <td class="text-end">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('page_contents.edit', $content->id) }}"
                                                       class="avatar-text avatar-md">
                                                        <i class="feather feather-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
