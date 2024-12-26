@extends('layouts.page')
@section('content')
    <main class="container">
        <div class="my-4">
            <div class="d-flex align-items-center gap-3">
                <a href="/" class="text-grey fw-bold text-lowercase fs-14">Главная страница / <span class="text-dark">Корзина</span></a>
            </div>
            <hr />
        </div>
        <div class="row mb-5">
            <div class="col-lg-9 pe-lg-4">
                <div class="d-flex align-items-center gap-1 justify-content-between pb-2 border-bottom-dashed">
                    <h1 class="fw-normal">Корзина</h1>
                </div>
                <div class="orders container">
                    @foreach($cartProducts as $cartItem)
                        <div id="item-{{ $cartItem['id'] }}" class="row align-items-center justify-content-between border-bottom-dashed pe-3">
                            <div class="col-lg-6 d-flex align-items-center gap-3">
                                <img class="orderImage" src="{{ asset('storage/' . $cartItem['image']) }}" alt="{{ $cartItem['name'] }}" />
                                <div class="d-flex flex-column gap-1">
                                    <h5 class="hover-orange fs-sm-14">{{ $cartItem['name'] }}</h5>
                                    <div class="fs-sm-12">Артикул: {{ $cartItem['sku'] ?? 'N/A' }}</div> <!-- Assuming SKU exists -->
                                </div>
                            </div>
                            <div class="col-lg-2 d-flex align-items-center justify-content-end gap-1 fs-sm-12">
                                <div class="circle bg-success rounded-circle"></div>
                                <div class="text-nowrap">В наличии</div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column align-items-end gap-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <button
                                            onclick="updateQuantity({{ $cartItem['id'] }}, -1)"
                                            id="decrement-{{ $cartItem['id'] }}"
                                            class="decrement border-0 rounded-circle bg-history d-flex align-items-center justify-content-center"
                                            {{ $cartItem['quantity'] <= 1 ? 'disabled' : '' }}>
                                            <i class="fa-solid fa-minus fs-sm-12"></i>
                                        </button>

                                        <div class="count" data-value="{{ $cartItem['quantity'] }}">{{ $cartItem['quantity'] }}</div>

                                        <button
                                            onclick="updateQuantity({{ $cartItem['id'] }}, 1)"
                                            id="increment-{{ $cartItem['id'] }}"
                                            class="increment border-0 rounded-circle bg-history d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-plus fs-sm-12"></i>
                                        </button>

                                    </div>
                                    <h5 class="fw-bold text-nowrap price">
                                        @if($cartItem['discount_price'])
                                            {{ number_format($cartItem['discount_price'] * $cartItem['quantity'], 0, '.', ' ') }}
                                        @else
                                            {{ number_format($cartItem['price'] * $cartItem['quantity'], 0, '.', ' ') }}
                                        @endif
                                        сум
                                    </h5>
                                </div>
                                <div style="height: 50px" class="d-flex align-items-center gap-4">
                                    <div class="icon-wrapper">
                                        <i class="fa-regular fa-heart text-orange fs-24"></i>
                                        <i class="fa-solid fa-heart text-orange fs-24"></i>
                                    </div>
                                    <button style="border:none" onclick="removeFromCart({{ $cartItem['id'] }})"><img src="/assets/icons/x-mark.svg" alt="Remove" /></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3">
                <div class="orderSum bg-darkgrey rounded p-3 position-sticky">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4>Ваш заказ</h4>
                        <small>Товаров: {{ count($cartProducts) }}</small> <!-- Number of items in the cart -->
                    </div>
                    <hr class="my-4 text-history" />
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <div class="text-dark">Скидка</div>
                        <h6 class="m-0 fw-bold">0 сум</h6> <!-- Assuming there's no discount for now -->
                    </div>
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <div class="text-dark">Итоговая сумма:</div>
                        <h6 class="m-0 fw-bold price">{{ number_format($totalPrice, 0, '.', ' ') }} сум</h6> <!-- Final total price -->
                    </div>
                    <hr class="my-4 text-history" />
                    <button class="btn-orange rounded w-100">Оформить заказ</button>
                </div>
            </div>
            <script>
                function updateQuantity(productId, change) {
                    $.ajax({
                        url: '/update-cart',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: productId,
                            change: change
                        },
                        success: function (response) {
                            if (response.success) {
                                const updatedItem = response.updated_item;
                                const totalAmount = response.total_amount; // To'liq umumiy narxni hisoblash

                                // Mahsulot miqdorini yangilash
                                $('#item-' + updatedItem.id + ' .count').text(updatedItem.quantity);

                                // Mahsulotning umumiy narxini yangilash
                                $('#item-' + updatedItem.id + ' .price').text(
                                    new Intl.NumberFormat('ru-RU').format(updatedItem.total_price) + ' сум'
                                );

                                // Umumiy summani yangilash
                                $('.orderSum h6:last').text(
                                    new Intl.NumberFormat('ru-RU').format(totalAmount) + ' сум'
                                );

                                // Kamaytirish tugmasini boshqarish
                                const decrementButton = $('#item-' + updatedItem.id + ' .decrement');
                                decrementButton.prop('disabled', updatedItem.quantity <= 1);
                            }
                        },
                        error: function (xhr) {
                            alert('Xatolik yuz berdi: ' + xhr.responseText);
                        }
                    });
                }


                // Remove mahsulot funksiyasi
                function removeFromCart(productId) {
                    $.ajax({
                        url: '/remove-from-cart',
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: productId
                        },
                        success: function (response) {
                            if (response.success) {
                                // Mahsulotni ro'yxatdan olib tashlash
                                $('#item-' + productId).remove();

                                // Umumiy summani yangilash
                                $('.orderSum h6:last').text(
                                    new Intl.NumberFormat('ru-RU').format(response.total_amount) + ' сум'
                                );

                                // Tovarlar sonini yangilash
                                $('.badge-position').text(response.cart.length);
                            }
                        },
                        error: function (xhr) {
                            alert('Xatolik yuz berdi: ' + xhr.responseText);
                        }
                    });
                }

            </script>
        </div>
    </main>
@endsection
