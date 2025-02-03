<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Vacancy;
use App\Models\Variant;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $lang = app()->getLocale();
        $product = Product::find($request->product_id);
        $variant = Variant::find($request->variant_id);

        if (!$product || !$variant) {
            return response()->json(['success' => false, 'message' => __('home.cart_message')]);
        }

        $cart = session()->get('cart', []);

        $discountedPrice = $variant->discount_price !== null && $variant->discount_price > 0
            ? $variant->discount_price
            : $variant->price;

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity']++;
        } else {
            $nameField = "name_{$lang}";

            $cart[$request->product_id] = [
                'id' => $product->id,
                'name' => $product->$nameField,
                'variant_id' => $variant->id,
                'storage' => $request->storage,
                'price' => $discountedPrice,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        $cartCount = count($cart);

        return response()->json([
            'success' => true,
            'message' => __('home.add_to_cart'),
            'cart_count' => $cartCount
        ]);
    }
    public function cart(Request $request)
    {
        $lang = app()->getLocale();
        $categories = Category::paginate(10);
        $cart = session()->get('cart', []);

        // Miqdorni yangilash (faqat AJAX so‘rov kelganda)
        if ($request->has('id') && isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->change;
            if ($cart[$request->id]['quantity'] < 1) {
                $cart[$request->id]['quantity'] = 1;
            }
            session()->put('cart', $cart);
        }

        // Faqat savatda bor mahsulotlarni olish
        $variantIds = collect($cart)->pluck('variant_id')->toArray();

        $productIds = collect($cart)->pluck('id')->toArray();

        $variants = Variant::whereIn('id', $variantIds)->get();

        $products = Product::whereIn('id', $productIds)->get();

        $cartProducts = [];
        $totalPrice = 0;
        $totalDiscount = 0;
        $discountedTotal = 0;
        $totalPrice6 = 0;
        $totalPrice12 = 0;
        $totalPrice24 = 0;

        foreach ($cart as $key => $cartItem) {
            $product = $products->where('id', $cartItem['id'])->first();
            $variant = $variants->where('id', $cartItem['variant_id'])->first();

            if ($product && $variant) {
                // Ma'lumotlarni yangilash
                $cartItem['name'] = $product->{'name_' . $lang};
                $cartItem['price'] = $variant->price;
                $cartItem['discount_price'] = $variant->discount_price > 0 ? $variant->discount_price : null;
                $cartItem['image'] = $product->image;
                $cartItem['sku'] = $variant->sku;

                // Umumiy narxni hisoblash
                $totalPrice += $cartItem['price'] * $cartItem['quantity'];
                if ($cartItem['discount_price']) {
                    $totalDiscount += ($cartItem['price'] - $cartItem['discount_price']) * $cartItem['quantity'];
                }
                $itemPrice = $cartItem['discount_price'] ?? $cartItem['price'];
                $discountedTotal += $itemPrice * $cartItem['quantity'];

                // 6, 12, 24 oylik narxlarni hisoblash
                $totalPrice6 += ($variant->price_6 ?? 0) * $cartItem['quantity'];
                $totalPrice12 += ($variant->price_12 ?? 0) * $cartItem['quantity'];
                $totalPrice24 += ($variant->price_24 ?? 0) * $cartItem['quantity'];

                $cartProducts[] = $cartItem;
            } else {
                unset($cart[$key]);
            }
        }

        session()->put('cart', $cart);

        return view('pages.cart', compact(
            'cartProducts', 'totalPrice', 'totalDiscount', 'discountedTotal', 'categories', 'lang',
            'totalPrice6', 'totalPrice12', 'totalPrice24'
        ));
    }



    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        $totalAmount = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $emptyCartHtml = view('partials.empty-cart')->render();

        return response()->json([
            'success' => true,
            'total_amount' => $totalAmount,
            'cart_count' => count($cart),
            'empty_cart_html' => $emptyCartHtml,
        ]);
    }
    public function removeAllCart()
    {
        session()->forget('cart');

        return redirect()->route('cart')->with('success', __('home.cartclear'));
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $totalDiscount = 0;
        $discountedTotal = 0;

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->change;

            if ($cart[$request->id]['quantity'] <= 0) {
                unset($cart[$request->id]);
            } else {
                $cart[$request->id]['total_price'] = $cart[$request->id]['quantity'] * ($cart[$request->id]['discount_price'] ?? $cart[$request->id]['price']);
            }

            session()->put('cart', $cart);
        }

        $totalQuantity = collect($cart)->sum('quantity');

        $totalPrice6 = 0;
        $totalPrice12 = 0;
        $totalPrice24 = 0;

        $variantIds = collect($cart)->pluck('variant_id')->toArray();
        $variants = Variant::whereIn('id', $variantIds)->get();

        foreach ($cart as $item) {
            $variant = $variants->where('id', $item['variant_id'])->first();
            $itemPrice = $item['discount_price'] ?? $item['price'];
            $totalDiscount += ($item['price'] - $itemPrice) * $item['quantity'];
            $discountedTotal += $itemPrice * $item['quantity'];

            if ($variant) {
                $totalPrice6 += ($variant->price_6 ?? 0) * $item['quantity'];
                $totalPrice12 += ($variant->price_12 ?? 0) * $item['quantity'];
                $totalPrice24 += ($variant->price_24 ?? 0) * $item['quantity'];
            }
        }

        return response()->json([
            'success' => true,
            'updated_item' => isset($cart[$request->id]) ? [
                'id' => $cart[$request->id]['id'],
                'quantity' => $cart[$request->id]['quantity'],
                'price' => $cart[$request->id]['price'],
                'discount_price' => $cart[$request->id]['discount_price'] ?? null,
                'total_price' => $cart[$request->id]['total_price'],
            ] : null,
            'total_quantity' => $totalQuantity, // ✅ Umumiy mahsulotlar soni
            'total_amount' => $discountedTotal,
            'total_discount' => $totalDiscount,
            'totalPrice6' => $totalPrice6,
            'totalPrice12' => $totalPrice12,
            'totalPrice24' => $totalPrice24
        ]);
    }


    public function toggleFavorite(Request $request)
    {
        $favorites = session()->get('favorites', []);
        $productId = $request->id;

        if (in_array($productId, $favorites)) {
            $favorites = array_filter($favorites, fn($id) => $id != $productId);
            $action = 'removed'; // ❌ O‘chirildi
            $message = __('home.remove_favorites');
        } else {
            $favorites[] = $productId;
            $action = 'added'; // ✅ Qo‘shildi
            $message = __('home.add_favorites');
        }

        session()->put('favorites', $favorites);

        return response()->json([
            'success' => true,
            'code' => 'favorite_status', // Umumiy status kodi
            'action' => $action, // Yangi action
            'message' => $message,
            'favorites_count' => count($favorites),
        ]);
    }


    public function favorites()
    {
        $lang = app()->getLocale();
        $favorites = session()->get('favorites', []);
        $products = Product::whereIn('id', $favorites)->get();
        $categories = Category::paginate(10);

        return view('pages.favorites', compact('products', 'lang', 'categories'));
    }
    public function toggleCompare(Request $request)
    {
        $compares = session()->get('compares', []);
        $productId = $request->id;

        if (in_array($productId, $compares)) {
            $compares = array_filter($compares, fn($id) => $id != $productId);
            $action = 'removed'; // ❌ O‘chirildi
            $message = __('home.remove_compare');
        } else {
            $compares[] = $productId;
            $action = 'added'; // ✅ Qo‘shildi
            $message = __('home.add_compare');
        }

        session()->put('compares', $compares);

        return response()->json([
            'success' => true,
            'code' => 'compare_status', // Umumiy status kodi
            'action' => $action, // Yangi action
            'message' => $message,
            'compares_count' => count($compares),
        ]);
    }


    // public function compare()
    // {
    //     $lang = app()->getLocale();
    //     $compares = session()->get('compares', []);
    //     $products = Product::whereIn('id', $compares)->get();
    //     $categories = Category::paginate(10);
    //     $groupedProducts = $products->groupBy('category_id');
    //     $groupedProducts = $products->groupBy('category_id');
    //     $categoriesWithProducts = $categories->map(function ($category) use ($groupedProducts) {
    //         return [
    //             'category' => $category,
    //             'products' => $groupedProducts->get($category->id, collect()),
    //         ];
    //     });
    //     return view('pages.compare', compact('products', 'lang', 'categories', 'categoriesWithProducts'));
    // }
    public function compare()
    {
        $lang = app()->getLocale();
        $compares = session()->get('compares', []);
        $products = Product::whereIn('id', $compares)->get();
        $groupedProducts = $products->groupBy('category_id');

        $categories = Category::whereIn('id', $groupedProducts->keys())->get();
        $allPategories = Category::paginate(10);
        // Kategoriyalarni mahsulotlar bilan birlashtirish
        $categoriesWithProducts = $categories->map(function ($category) use ($groupedProducts) {
            return [
                'category' => $category,
                'products' => $groupedProducts->get($category->id, collect()), // Mahsulotlarni olib kelish yoki bo'sh kolleksiya
            ];
        });

        return view('pages.compare', compact('categoriesWithProducts', 'lang', 'products', 'allPategories'));
    }
}
