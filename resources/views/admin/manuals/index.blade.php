@extends('layouts.admin')
@section('title', 'Руководства')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Руководства</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Главная</a></li>
                        <li class="breadcrumb-item">Руководства</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('manuals.create') }}" class="btn btn-primary">Добавить руководство</a>
                </div>
            </div>
            <div class="main-content">

                <!-- Manuals Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Руководства</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Название (RU)</th>
                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($manuals as $manual)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $manual->name_ru }}</td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('manuals.edit', $manual->id) }}" class="avatar-text avatar-md">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <form action="{{ route('manuals.destroy', $manual->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent js-delete-btn" type="submit" onclick="return confirm('Вы уверены, что хотите удалить это руководство?')">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Удалить">
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
                    @if ($manuals->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент руководств нет.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
