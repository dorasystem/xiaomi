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
                        <form action="{{ route('products.index') }}" method="GET">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Qidirish..."
                                class="form-control">
                        </form>

                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Изображение</th>
                                    <th scope="col">Название</th>

                                    <th scope="col" class="text-end">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Image"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td>{{ \Str::words($product->name_uz) }}</td>
                                        <td class="text-end">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="avatar-text avatar-md">
                                                    <i class="feather feather-edit"></i>
                                                </a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0 bg-transparent js-delete-btn" type="submit"
                                                        onclick="return confirm('Вы действительно хотите удалить этот продукт?')">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                            title="Удалить">
                                                            <i class="feather-trash-2"></i>
                                                        </a>
                                                    </button>
                                                </form>
                                                <form action="{{ route('products.duplicate', $product->id) }}"
                                                    method="POST" style="display:none;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning">Dubl</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <hr>
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-center pagination">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
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
    <style>
        .pagination{
            margin-left: 30%
        }
        /* ---------------- Light mode (default) ---------------- */
        .pagination .page-link {
            background-color: #ffffff !important;
            /* oq fon */
            border: 1px solid #dee2e6 !important;
            color: #0d6efd !important;
        }

        .pagination .page-item:hover .page-link {
            background-color: #e9ecef !important;
        }

        .pagination .page-item.active .page-link {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
            color: #ffffff !important;
        }

        .pagination .page-item.disabled .page-link {
            background-color: #ffffff !important;
            border-color: #dee2e6 !important;
            color: #6c757d !important;
            pointer-events: none;
        }

        /* ---------------- Dark mode (app-skin-dark class bilan) ---------------- */
        html.app-skin-dark .pagination .page-link {
            background-color: #000000 !important;
            /* qora fon */
            border-color: #444 !important;
            color: #a8c4ff !important;
        }

        html.app-skin-dark .pagination .page-item:hover .page-link {
            background-color: #1a1a1a !important;
        }

        html.app-skin-dark .pagination .page-item.active .page-link {
            background-color: #3d6df8 !important;
            border-color: #3d6df8 !important;
            color: #ffffff !important;
        }

        html.app-skin-dark .pagination .page-item.disabled .page-link {
            background-color: #000000 !important;
            border-color: #444 !important;
            color: #555 !important;
        }
    </style>
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
