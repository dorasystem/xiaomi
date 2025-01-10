@extends('layouts.admin')
@section('title', 'Список категорий')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список категорий</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Категории</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Добавить категорию</a>
                </div>
            </div>
            <div class="main-content">

                <!-- Categories Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Категории</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Изображение</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col" class="text-end">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="Image"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td>{{ $category->name_ru }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($category->description_ru, 50) !!}</td>
                                        <td class="text-end">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('categories.show', $category->id) }}"
                                                    class="avatar-text avatar-md me-2">
                                                    <i class="feather feather-eye"></i>
                                                </a>
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="avatar-text avatar-md">
                                                    <i class="feather feather-edit"></i>
                                                </a>
                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0 bg-transparent js-delete-btn" type="submit"
                                                        onclick="return confirm('Вы действительно хотите удалить эту категорию?')">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                            title="Удалить">
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
                    @if ($categories->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент категории отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
