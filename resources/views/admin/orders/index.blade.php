@extends('layouts.admin')
@section('title', 'Список заказов')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список заказов</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Заказы</li>
                    </ul>
                </div>
            </div>
            <div class="main-content">

                <!-- Orders Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Заказы</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Имя клиента</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Message</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Продукты</th>
                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td> {{ \Illuminate\Support\Str::words($order->message, 5) }}</td>
                                    <td width="100px">
                                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                                <option value="new" {{ $order->status === 'new' ? 'selected' : '' }}>Новый</option>
                                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>В процессе</option>
                                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Завершён</option>
                                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Отменён</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Название</th>
                                                <th>Количество</th>
                                                <th>Цена</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td>{{ \Illuminate\Support\Str::words($item->product->name_ru, 5) }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ number_format($item->price, 2) }} сум</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent js-delete-btn" type="submit" onclick="return confirm('Вы действительно хотите удалить этот заказ?')">
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
                    @if ($orders->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент заказы отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
