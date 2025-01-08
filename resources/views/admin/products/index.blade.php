@extends('layouts.admin')
@section('title', 'Список продуктов')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список продуктов</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Продукты</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Добавить продукт</a>
                </div>
            </div>
            <div class="main-content">

                <!-- Products Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Продукты</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Название</th>

                                <th scope="col" class="text-end">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Str::words($product->name_uz, 3) }}</td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('products.show', $product->id) }}" class="avatar-text avatar-md me-2">
                                                <i class="feather feather-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="avatar-text avatar-md">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent js-delete-btn" type="submit" onclick="return confirm('Вы действительно хотите удалить этот продукт?')">
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
                    @if ($products->isEmpty())
                        <div class="card-body">
                            <p class="text-center">На данный момент продукты отсутствуют.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
    <script>
        function addToCart(productId) {
            $.ajax({
                url: `/add-to-cart/${productId}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    updateCartCount(response.cart_count);
                },
                error: function(xhr) {
                    alert('Xatolik yuz berdi: ' + xhr.responseText);
                }
            });
        }

        function updateCartCount(count) {
            document.getElementById('cart-count').innerText = count;
        }

    </script>
@endsection
