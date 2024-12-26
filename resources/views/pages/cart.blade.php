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
                                        <div class="fs-sm-12">Артикул: {{ $cartItem['sku'] ?? 'N/A' }}</div>
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
                            <small>Товаров: {{ count($cartProducts) }}</small>
                        </div>
                        <hr class="my-4 text-history" />
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <div class="text-dark">Скидка</div>
                            <h6 class="m-0 fw-bold">0 сум</h6>
                        </div>
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <div class="text-dark">Итоговая сумма:</div>
                            <h6 class="m-0 fw-bold price">{{ number_format($totalPrice, 0, '.', ' ') }} сум</h6>
                        </div>
                        <hr class="my-4 text-history" />

                        <!-- Single button for all products -->
                        <button type="button" class="btn-orange rounded w-100" data-bs-toggle="modal" data-bs-target="#largeModal">
                            Оформить заказ
                        </button>
                    </div>
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
    </main>
    <!-- Modal -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content px-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="largeModalLabel">Instant Purchase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body application_modal row">
                    <form id="formProduct" method="POST" action="{{ route('orders.products.store') }}" class="col-lg-4 order-lg-1 order-2">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full name*</label>
                            <input type="text" class="form-control focus_none" id="name" name="first_name" placeholder="Enter your name" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Phone number*</label>
                            <input type="text" class="form-control focus_none" id="email" name="phone" placeholder="+998 (90) 123-45-67" />
                        </div>

                        <!-- Hidden fields for all product details -->
                        <input type="hidden" name="cart_items" id="cart_items">
                        <button type="submit" class="btn-orange rounded w-100 mb-3">Send</button>
                    </form>


                    <!-- Product details for modal -->
                    <div class="col-lg-8 order-lg-2 order-1">
                        <div class="d-flex flex-column  h-100" id="modal-products-list">
                            <!-- Dynamic list of products will be inserted here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var cartItems = @json($cartProducts); // PHPdan JS ga cartItems yuborilgan

        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('largeModal');

            modal.addEventListener('show.bs.modal', function (event) {
                // Modaldagi mahsulotlar ro'yxatini tozalash
                const modalProductsList = document.getElementById('modal-products-list');
                modalProductsList.innerHTML = '';

                // cartItems array bo'ylab aylanish va mahsulotlarni modalga qo'shish
                cartItems.forEach(function(cartItem) {
                    const productDiv = document.createElement('div');
                    productDiv.classList.add('d-flex', 'justify-content-between', 'mb-3');

                    const productName = cartItem.name;
                    const productNameShortened = productName.split(' ').slice(0, 5).join(' ');

                    // Mahsulotni HTMLga joylash
                    productDiv.innerHTML = `
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('storage') }}/${cartItem.image}" alt="${cartItem.name}" class="img-thumbnail" style="width: 50px; height: 50px;">
                        <span>${productNameShortened}</span>
                    </div>
                    <div class="mt-3">
                        ${new Intl.NumberFormat('ru-RU').format(cartItem.discount_price)} сум
                    </div>
                `;
                    modalProductsList.appendChild(productDiv);
                });
            });

            // Form yuborilishi oldidan cartItems'ni console'ga chiqarish
            const form = document.querySelector('#formProduct');
            form.addEventListener('submit', function() {
                console.log(cartItems);  // cartItems qiymatini tekshirish uchun
                document.getElementById('cart_items').value = JSON.stringify(cartItems); // JSON formatida yuborish
            });
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if(session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4CAF50",
                stopOnFocus: true,
                className: "toast-success",
                animation: "fade",
                offset: {
                    x: 30,
                    y: 50
                }
            }).showToast();
        </script>
    @endif


@endsection
