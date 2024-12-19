@extends('layouts.admin')
@section('title', 'Список новостей')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список Полезные статьи </h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Полезные статьи </li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('articles.create') }}" class="btn btn-primary">Добавить Полезные статьи </a>
                </div>
            </div>
            <div class="main-content">

                <!-- News Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Полезные статьи </h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="">
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Заголовок (РУ)</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Изображение</th>
                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($articles as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title_ru }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title_en }}" width="50" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('articles.show', $item->id) }}"
                                               class="avatar-text avatar-md">
                                                <i class="feather feather-eye"></i>
                                            </a>
                                            <a href="{{ route('articles.edit', $item->id) }}"
                                               class="avatar-text avatar-md">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <form action="{{ route('articles.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent js-delete-btn" type="submit"  onclick="return confirm('Ushbu faoliyatni o‘chirishni xohlaysizmi?')">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="O'chirish" aria-label="O'chirish">
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
                    @if ($articles->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент Полезные статьи отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
