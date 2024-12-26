@extends('layouts.page')

@section('content')

<main class="main-content ">
    <div class="container my-5">
        <div class="row g-4">
            <!-- Form Section -->
            <div class="col-md-8">
                <div class="form-section">
                    <h4 class="text-orange"> Введите данные получателя заказа</h4>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">Имя*</label>
                                <input type="text" class="form-control focus_none py-2" id="firstName" placeholder="Введите ваше имя" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Фамилия*</label>
                                <input type="text" class="form-control focus_none py-2" id="lastName" placeholder="Введите вашу фамилию" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Телефон*</label>
                                <input type="tel" class="form-control focus_none py-2" id="phone" placeholder="Введите ваш телефон" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">E-Mail*</label>
                                <input type="email" class="form-control focus_none py-2" id="email" placeholder="Введите ваш email" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Order Summary -->
            <div class="col-md-4">
                <div class="order-summary">
                    <h5 class="text-orange">Ваш заказ</h5>
                    <div class="d-flex align-items-start mb-3">
                        <img src="https://via.placeholder.com/80" alt="Product Image">
                        <div class="ms-3">
                            <p class="mb-1">Телевизор Xiaomi Mi TV A Pro 55" 2025 L55MA-SRU</p>
                            <p class="fw-bold">1 679 р.</p>
                        </div>
                    </div>
                    <ul>
                        <li class="d-flex justify-content-between">
                            <span>Стоимость 1 товара:</span>
                            <span>1 679 р.</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Бонусы к зачислению:</span>
                            <span>16.79</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Доставка:</span>
                            <span>Бесплатно</span>
                        </li>
                    </ul>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Итого к оплате:</span>
                        <span>1 679 р.</span>
                    </div>
                    <button type="submit" class="btn btn-orange rounded w-100 mt-2">Оформить заказ</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .form-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            font-weight: bold;
            color: #ff5722;
            margin-bottom: 20px;
        }
        .order-summary {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .order-summary img {
            width: 80px;
            height: auto;
            border-radius: 8px;
        }
        .order-summary h5 {
            font-weight: bold;
        }
        .order-summary ul {
            padding: 0;
        }
        .order-summary ul li {
            list-style: none;
            margin-bottom: 10px;
        }
        .btn-primary {
            width: 100%;
            font-weight: bold;
        }
        .btn-success {
            width: 100%;
            font-weight: bold;
        }
    </style>
</main>

@endsection
