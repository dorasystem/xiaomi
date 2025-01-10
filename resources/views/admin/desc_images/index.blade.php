@extends('layouts.admin')

@section('title', 'Список изображений и описаний')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список изображений и описаний</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Изображения и описания</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('desc-images.create') }}" class="btn btn-primary">Добавить описание изображений</a>
                </div>
            </div>

            <div class="main-content">
                <!-- Desc Images Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Изображения и описания</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Изображение</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col" class="">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($descImages as $descImage)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $descImage->image) }}" alt="Image"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <p>{{ \Illuminate\Support\Str::words($descImage->description_ru ?? '', 8, '...') }}
                                            </p>
                                        </td>

                                        <td class="">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('desc-images.edit', $descImage->id) }}"
                                                    class="avatar-text avatar-md">
                                                    <i class="feather feather-edit"></i>
                                                </a>
                                                <form action="{{ route('desc-images.destroy', $descImage->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="avatar-text avatar-md">
                                                        <button class="border-0 bg-transparent js-delete-btn" type="submit"
                                                            onclick="return confirm('Вы действительно хотите удалить это изображение?')">
                                                            <i class="  feather-trash-2"></i>
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

                    @if ($descImages->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент изображения и описания отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
