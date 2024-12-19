@extends('layouts.admin')
@section('title', 'Детали категории')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Детали категории</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Категории</a></li>
                        <li class="breadcrumb-item active">Детали</li>
                    </ul>
                </div>
            </div>
            <div class="main-content">

                <!-- Category Details -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Информация о категории</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Название:</strong> {{ $category->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Описание:</strong> {!! $category->description !!}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
                                        Редактировать
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Вы действительно хотите удалить эту категорию?')">
                                            Удалить
                                        </button>
                                    </form>
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Назад</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
