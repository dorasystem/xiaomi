@extends('layouts.admin')
@section('title', 'Список магазинов')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список магазинов</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Магазины</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('stores.create') }}" class="btn btn-primary">Добавить магазин</a>
                </div>
            </div>
            <div class="main-content">

                <!-- Stores Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Магазины</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="">
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Название (РУ)</th>
                                <th scope="col">Адрес (РУ)</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($stores as $store)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $store->title_ru }}</td>
                                    <td>{{ $store->address_ru }}</td>
                                    <td>{{ $store->phone_1 }}</td>
                                    <td>{{ $store->email }}</td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('stores.edit', $store->id) }}"
                                               class="avatar-text avatar-md">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent js-delete-btn" type="submit" onclick="return confirm('Вы уверены, что хотите удалить этот магазин?')">
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
                    @if ($stores->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент магазины отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
