@extends('layouts.admin')
@section('title', 'Просмотр продукта')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Детали продукта</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Продукты</a></li>
                        <li class="breadcrumb-item">Детали продукта</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
                </div>
            </div>
            <div class="main-content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Информация о продукте</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Image -->

                            <!-- Details -->
                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Название:</th>
                                        <td>{{ $product->name_uz }}</td>
                                    </tr>
                                    <tr>
                                        <th>Описание:</th>
                                        <td>{!! (($product->description_uz)) !!}</td>
                                    <tr>
                                        <th>Подарок:</th>
                                        <td>{{ $product->gift_name ?? 'Не указан' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата создания:</th>
                                        <td>{{ $product->created_at->format('d.m.Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Последнее обновление:</th>
                                        <td>{{ $product->updated_at->format('d.m.Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Изображение:</th>
                                        <td>
                                            <div class="col-md-4 text-center">
                                                @if ($product->gift_image)
                                                    <img src="{{ asset('storage/' . $product->gift_image) }}"
                                                        alt="{{ $product->gift_name }}" class="img-thumbnail"
                                                        style="max-width: 100%;">
                                                @else
                                                    <p class="text-muted">Изображение отсутствует</p>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer row">
                        <div class="col-sm-6">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger w-100"
                                    onclick="return confirm('Вы действительно хотите удалить этот продукт?')">Удалить</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
