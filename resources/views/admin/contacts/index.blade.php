@extends('layouts.admin')
@section('title', 'Список контактов')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список контактов</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Контакты</li>
                    </ul>
                </div>
            </div>
            <div class="main-content">

                <!-- Contacts Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Контакты</h5>
                    </div>
                    <div class="table-responsive mb-2" style="overflow-x: auto;">
                        <table class="table">
                            <thead class="">
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Email</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Адрес</th>
                                <th scope="col">Facebook</th>
                                <th scope="col">Instagram</th>
                                <th scope="col">Telegram</th>
                                <th scope="col">Youtube</th>
                                <th scope="col">LinkedIn</th>
                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contacts as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        @if ($item->facebook)
                                            <a href="{{ $item->facebook }}" target="_blank">Facebook</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->instagram)
                                            <a href="{{ $item->instagram }}" target="_blank">Instagram</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->telegram)
                                            <a href="{{ $item->telegram }}" target="_blank">Telegram</a>
                                        @else
                                            —
                                        @endif
                                    </td><td>
                                        @if ($item->youtube)
                                            <a href="{{ $item->youtube }}" target="_blank">Youtube</a>
                                        @else
                                            —
                                        @endif
                                    </td><td>
                                        @if ($item->linkedin)
                                            <a href="{{ $item->lnkedin }}" target="_blank">LinkedIn</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('contacts.edit', $item->id) }}"
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
                    @if ($contacts->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент контакты отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
