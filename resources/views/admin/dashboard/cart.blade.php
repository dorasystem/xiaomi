@extends('layouts.admin')
<x-slot:title>Cart</x-slot:title>


@section('content')
    <main class="nxl-container">
        <!-- introBannerHolder -->
        <section class="introBannerHolder d-flex w-100 bgCover"
                 style="background-image: url(/assets/images/b-bg7.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
                        <h1 class="headingIV fwEbold playfair mb-4">{{__('lan.my_cart')}}</h1>
                        <ul class="list-unstyled breadCrumbs d-flex justify-content-center">
                            <li class="mr-sm-2 mr-1"><a href="/">{{__('lan.home')}}</a></li>
                            <li class="mr-sm-2 mr-1">/</li>
                            <li class="mr-sm-2 mr-1"><a href="{{route('products.index')}}">{{__('lan.store')}}</a></li>
                            <li class="mr-sm-2 mr-1">/</li>
                            <li class="active">{{__('lan.my_cart')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- cartHolder -->
        <div class="cartHolder container pt-xl-21 pb-xl-24 py-lg-20 py-md-16 py-10">
            <form action="{{ route('checkout') }}" method="POST" class="couponForm mb-md-0 mb-5 " >
                @csrf
                <div class="row mb-3">
                    <!-- table-responsive -->
                    <div class="col-12 table-responsive mb-lg-20 mb-md-16 mb-5" style=" margin-bottom: 50px !important;">
                        <!-- cartTable -->
                        <table class="table cartTable mb-xl-22">
                            <thead>
                            <tr>
                                <th scope="col" class="text-uppercase fwEbold border-top-0">{{__('lan.product_name')}}</th>
                                <th scope="col" class="text-uppercase fwEbold border-top-0">{{__('lan.price')}}</th>
                                <th scope="col" class="text-uppercase fwEbold border-top-0">{{__('lan.product_count')}}</th>
                                <th scope="col" class="text-uppercase fwEbold border-top-0">{{__('lan.total_price')}}</th>
                                <th scope="col" class="text-uppercase fwEbold border-top-0">{{__('lan.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <tr class="align-items-center" data-id="{{ $id }}">
                                        <!-- Mahsulot rasmi va nomi -->
                                        <td class="d-flex align-items-center border-top-0 border-bottom px-0 py-6">
                                            <div class="imgHolder">
                                                <img src="{{asset('storage/'.$details['image'])}}"
                                                     alt="{{ $details['name'] }}" class="img-fluid">
                                            </div>
                                            <span class="title pl-2"><a href="#">{{ $details['name'] }}</a></span>
                                        </td>
                                        <!-- Mahsulot narxi -->
                                        <td class="fwEbold border-top-0 border-bottom px-0 py-6 price">{{ $details['price'] }}
                                            $
                                        </td>
                                        <!-- Mahsulot sonini kiritish joyi -->
                                        <td class="border-top-0 border-bottom px-0 py-6">
                                            <input type="number" class="quantity" data-id="{{ $id }}"
                                                   value="{{ $details['quantity'] }}" min="1">
                                        </td>
                                        <!-- Mahsulotning umumiy narxi -->
                                        <td class="fwEbold border-top-0 border-bottom px-0 py-6">
                                            <span class="total">{{ $details['price'] * $details['quantity'] }} $</span>
                                        </td>
                                        <!-- Mahsulotni o'chirish -->
                                        <td class="border-top-0 border-bottom px-0 py-6">
                                            <a href="javascript:void(0);"
                                               class="fas fa-times float-right remove-from-cart"
                                               data-id="{{ $id }}"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">{{__('lan.your_shopping_cart_is_empty')}}</td>
                                </tr>
                                <tr>
                                    <td>               <a class="btn btnTheme w-100 fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4"  href="{{route('products.index')}}" class="md-round d-block py-2 px-2">{{__('lan.go_to_the_store')}}</a>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <p>
                        </p>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center text-center">
                    <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="name" class="fwEbold text-uppercase d-block mb-1">{{__('lan.enter_your_name')}}</label>
                                <input type="text"  name="name" id="name" class="form-control m-auto" required>
                            </div>
                    </div>
                    <div class="col-12">
                            <div class="form-group mb-4">
                                <label for="tel_number" class="fwEbold text-uppercase d-block mb-1">{{__('lan.your_phone_number')}}</label>
                                <input type="text" name="tel_number" id="tel_number" class="form-control m-auto" required>
                            </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between">
                            <strong class="txt fwEbold text-uppercase mb-1" >{{__('lan.total_price')}}</strong>
                            <strong class="price fwEbold text-uppercase mb-1"><span id="totalAmount">{{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart', []))) }} $</span></strong>
                        </div>
                        <button type="submit"
                           class="btn btnTheme w-100 fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4">
                            {{__('lan.proceed_to_checkout')}}</button>
                    </div>
                </div>
            </form>


        </div>
        <div class="container mb-lg-24 mb-md-16 mb-10">
            <!-- subscribeSecBlock -->
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                // Mahsulot miqdorini o'zgartirish
                $('.quantity').on('change', function () {
                    var id = $(this).data('id');
                    var quantity = $(this).val();
                    var price = parseFloat($(this).closest('tr').find('.price').text().replace('$', ''));

                    // Mahsulotning umumiy narxini yangilash
                    var total = price * quantity;
                    $(this).closest('tr').find('.total').text(total.toFixed(2) + ' $');

                    // Jami narxni yangilash
                    updateTotal();
                });

                // Jami narxni hisoblash funksiyasi
                function updateTotal() {
                    var totalAmount = 0;
                    $('.total').each(function () {
                        totalAmount += parseFloat($(this).text().replace('$', ''));
                    });
                    $('#totalAmount').text(totalAmount.toFixed(2) + ' $');
                }
            });

            $(document).ready(function () {
                // Mahsulotni savatdan o'chirish
                $('.remove-from-cart').on('click', function () {
                    let id = $(this).data('id');
                    $.ajax({
                        url: '{{ route("removeFromCart") }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        success: function (response) {
                            if (response.success) {
                                $('tr[data-id="' + id + '"]').remove();
                                $('#totalAmount').text(response.total + ' $');
                                window.location.reload()

                            }
                        }
                    });
                });
            });
        </script>

    </main>

@endsection
