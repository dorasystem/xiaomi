@extends('layouts.admin')
@section('title', 'Детали варианта')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Детали варианта</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('variants.index') }}">Варианты</a></li>
                        <li class="breadcrumb-item active">Детали варианта</li>
                    </ul>
                </div>
            </div>
            <div class="main-content">

                <!-- Variant Details -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Информация о варианте</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <strong>Продукт:</strong>
                                    <p>{{ $variant->product->name_uz ?? 'Без продукта' }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Место хранения:</strong>
                                    <p>{{ $variant->storage }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>RAM:</strong>
                                    <p>{{ $variant->ram }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Цена:</strong>
                                    <p>{{ $variant->price }} UZS</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Цвет:</strong>
                                    <p>{{ $variant->color }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <strong>Изображение:</strong>
                                    @if ($variant->image)
                                        <img src="{{ asset('storage/' . $variant->image) }}" alt="{{ $variant->product->name_uz }}" class="img-fluid">
                                    @else
                                        <p>Изображение не доступно</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('variants.index') }}" class="btn btn-secondary">Назад</a>
                        <a href="{{ route('variants.edit', $variant->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('variants.destroy', $variant->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Вы действительно хотите удалить этот вариант?')">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
