@extends('layouts.admin')
@section('title', 'Список вариантов')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список вариантов</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Варианты</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('variants.create') }}" class="btn btn-primary">Добавить вариант</a>
                </div>
            </div>
            <div class="main-content">

                <!-- Variants Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Варианты</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Продукт</th>
                                <th scope="col">Место хранения</th>
                                <th scope="col">RAM</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Цвет</th>
                                <th scope="col">Изображение</th>
                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($variants as $variant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $variant->product->name_uz ?? 'Без продукта' }}</td>
                                    <td>{{ $variant->storage }}</td>
                                    <td>{{ $variant->ram }}</td>
                                    <td>{{ $variant->price }} UZS</td>
                                    <td>{{ $variant->color_ru }}</td>
                                    <td>
                                        @if ($variant->image)
                                            <img src="{{ asset('storage/' . $variant->image) }}" alt="{{ $variant->product->name_uz }}" width="50" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('variants.show', $variant->id) }}"
                                               class="avatar-text avatar-md">
                                                <i class="feather feather-eye"></i>
                                            </a>
                                            <a href="{{ route('variants.edit', $variant->id) }}"
                                               class="avatar-text avatar-md">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <form action="{{ route('variants.destroy', $variant->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent js-delete-btn" type="submit" onclick="return confirm('Вы действительно хотите удалить этот вариант?')">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Удалить">
                                                        <i class="feather-trash-2"></i>
                                                    </a>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($variants->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент варианты отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
