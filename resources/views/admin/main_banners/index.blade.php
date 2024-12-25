@extends('layouts.admin')

@section('title', 'Список баннеров')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список баннеров</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Баннеры</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('main_banners.create') }}" class="btn btn-primary">Добавить баннер</a>
                </div>
            </div>

            <div class="main-content">
                <!-- Main Banners Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Баннеры</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Изображение 1</th>
                                <th scope="col">Изображение 2</th>
                                <th scope="col">Другие изображения</th>
                                <th scope="col" class="">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($mainBanners as $mainBanner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $mainBanner->image1) }}" alt="Image 1" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $mainBanner->image2) }}" alt="Image 2" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td>
                                        @foreach($mainBanner->images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="Additional Image" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('main_banners.edit', $mainBanner->id) }}" class="avatar-text avatar-md">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <form action="{{ route('main_banners.destroy', $mainBanner->id) }}" method="POST" style="display:inline;" >
                                                @csrf
                                                @method('DELETE')
                                                <div class="avatar-text avatar-md">
                                                    <button class="border-0 bg-transparent js-delete-btn" type="submit" onclick="return confirm('Вы действительно хотите удалить этот баннер?')">
                                                        <i class="feather feather-trash-2"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($mainBanners->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент баннеры отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
