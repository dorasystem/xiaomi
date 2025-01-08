@extends('layouts.admin')
@section('title', 'Список ключевых слов')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список ключевых слов</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Ключевые слова</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('keywords.create') }}" class="btn btn-primary">Добавить ключевое слово</a>
                </div>
            </div>
            <div class="main-content">

                <!-- Keywords Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Ключевые слова</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Ключевое слово</th>
                                <th scope="col">Title (RU)</th>
                                <th scope="col">Title (UZ)</th>
                                <th scope="col">Title (EN)</th>
                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($keywords as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->key }}</td>
                                    <td>{{ $item->ru }}</td>
                                    <td>{{ $item->uz }}</td>
                                    <td>{{ $item->en }}</td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('keywords.edit', $item->id) }}" class="avatar-text avatar-md">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <form action="{{ route('keywords.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent js-delete-btn" type="submit" onclick="return confirm('Вы уверены, что хотите удалить этот ключевое слово?')">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Удалить" aria-label="Удалить">
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
                    @if ($keywords->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент ключевых слов нет.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
