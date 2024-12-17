@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Welcome Super Admin {{ auth()->user()->full_name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
{{--    <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">--}}
{{--        <li class="mr-2 overflow-hidden">--}}
{{--            <!-- Funktsiyaga product id uzatamiz -->--}}
{{--            <a href="javascript: void(0);" type="button" onclick="addToCart({{ $product->id }}, '{{ $product->name_uz }}', {{ $product->price }})" class="icon-cart d-block border-0"></a>--}}
{{--        </li>--}}
{{--        <li class="mr-2 overflow-hidden"><a href="{{route('product',$product->id)}}" class="icon-eye d-block"></a></li>--}}
{{--    </ul>--}}
{{--    <li class="mr-2 overflow-hidden"><a href="{{ route('addToCart', $product->id) }}" class="icon-cart d-block"></a></li>--}}
@endsection

