@extends('layouts.admin')
@section('title', 'О нас')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">О нас</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">О нас</li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <!-- О нас Таблица -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">О нас</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="">
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Заголовок (UZ)</th>
                                <th scope="col">Заголовок (RU)</th>
                                <th scope="col">Заголовок (EN)</th>
                                <th scope="col">Описание (RU)</th>
                                <th scope="col">Изображение</th>
                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($abouts as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title_uz }}</td>
                                    <td>{{ $item->title_ru }}</td>
                                    <td>{{ $item->title_en }}</td>
                                    <td>{!! $item->description_ru !!}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title_en }}" width="50" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('abouts.edit', $item->id) }}"
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
                    @if ($abouts->isEmpty())
                        <div class="card-body">
                            <p class="text-center">Данных о нас нет.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
