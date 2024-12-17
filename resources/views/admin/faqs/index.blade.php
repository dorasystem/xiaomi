@extends('layouts.admin')
@section('title', 'FAQ Ro‘yxati')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Часто задаваемые вопросы</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Часто задаваемые вопросы</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('faqs.create') }}" class="btn btn-primary">Добавить новый часто задаваемый вопрос</a>
                </div>
            </div>
            <div class="main-content">

                <!-- FAQ Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Часто задаваемые вопросы</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="">
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Вопрос (UZ)</th>
                                <th scope="col">Вопрос (RU)</th>
                                <th scope="col">Вопрос (EN)</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($faqs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->question_uz }}</td>
                                    <td>{{ $item->question_ru }}</td>
                                    <td>{{ $item->question_en }}</td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('faqs.edit', $item->id) }}"
                                               class="avatar-text avatar-md">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <form action="{{ route('faqs.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent js-delete-btn" type="submit" onclick="return confirm('Ushbu savolni o‘chirishni xohlaysizmi?')">
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
                    @if ($faqs->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент вопросов и ответов нет.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
