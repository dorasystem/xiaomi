@extends('layouts.admin')

@section('content')
    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать заказ</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Заказы</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Детали заказа</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="first_name">Имя:</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $order->first_name) }}" required>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="last_name">Фамилия:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $order->last_name) }}" required>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $order->email) }}" required>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="phone">Телефон:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $order->phone) }}" required>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="message">Сообщение:</label>
                                        <textarea class="form-control" id="message" name="message" rows="4">{{ old('message', $order->message) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Товары в заказе</h5>
                                </div>
                                <div class="card-body p-4">
                                    @foreach ($order->orderItems as $item)
                                        <div class="form-group pb-3">
                                            <label>Продукт:</label>
                                            <p class="form-control-plaintext">{{ $item->product->name_ru }}</p>
                                        </div>
                                        <div class="form-group pb-3">
                                            <label>Количество:</label>
                                            <input type="number" class="form-control" name="items[{{ $item->id }}][quantity]" value="{{ old('items.' . $item->id . '.quantity', $item->quantity) }}" required>
                                        </div>
                                        <div class="form-group pb-3">
                                            <label>Цена:</label>
                                            <input type="text" class="form-control" name="items[{{ $item->id }}][price]" value="{{ old('items.' . $item->id . '.price', $item->price) }}" required>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
@endsection

