<?php
$products = \App\Models\Product::all();
?>

<div class="swiper-wrapper">
    @foreach ($products as $product)
        @php
            $cheapestVariant = $product->variants->sortBy('price')->first();
        @endphp
        <div class="swiper-slide product shadow-sm position-relative rounded">
            <div class=" ">
                <div class="position-absolute like d-flex flex-column gap-3 justify-content-end">
                    <i class="fa-regular fa-heart fs-4 hover-orange ps-1"></i>
                    <svg class="hover-svg" width="30" height="20" viewBox="0 0 102 92" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="11" height="92" rx="2" fill="#000" />
                        <rect x="23" y="22" width="11" height="70" rx="2" fill="#000" />
                        <rect x="46" y="45" width="11" height="47" rx="2" fill="#000" />
                        <rect x="69" y="23" width="11" height="69" rx="2" fill="#000" />
                        <rect x="91" y="45" width="11" height="47" rx="2" fill="#000" />
                    </svg>
                </div>
                <a href="{{ route('single.product', $product->slug) }}" class="">

                    <img class="w-100 pb-4 productImage p-4" src="{{ asset('storage/' . $product->image) }}"
                        alt="" />
                </a>
                <div class="d-flex flex-column justify-content-between product-text p-4 rounded-bottom">
                    <div class="d-flex align-items-end gap-3 pt-2">
                        @if ($cheapestVariant->discount_price)
                            <div class="fw-bold ">{{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                                UZS
                            </div>
                            <del class="text-grey">
                                <small>{{ number_format($cheapestVariant->price, 0, ',', ' ') }} UZS</small>
                            </del>
                        @else
                            <div class="fw-bold">{{ number_format($cheapestVariant->price, 0, ',', ' ') }}
                                UZS
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('single.product', $product->slug) }}">
                        <div class="productName fw-bold"> {{ \Str::words($product->name_uz, 3) }}</div>
                    </a>
                    <a href="{{ route('single.product', $product->slug) }}">
                        <p class="text-grey"> {!! \Str::words($product->description_uz, 15) !!}</p>
                    </a>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <span
                            class="small bg-transparent px-0">{{ number_format($cheapestVariant->discount_price, 0, ',', ' ') }}
                            UZS <span class="text-orange">за наличные</span></span>
                        <span class="px-2 productmonth-border small text-grey">from
                            {{ number_format($cheapestVariant->price_12, 0, ',', ' ') }} UZS/month</span>
                    </div>

                    <div class="d-flex gap-4 mt-3">
                        <button class="border-orange bg-transparent rounded p-1 px-3">
                            <img src="/assets/icons/shopping-cart.svg" alt="" />
                        </button>
                        <button data-bs-toggle="modal" data-bs-target="#largeModal"
                            class="btn-orange rounded w-100 d-flex align-items-center gap-2 justify-content-center">
                            <span>@lang('home.buy_now')</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
