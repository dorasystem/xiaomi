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
    public function cart()
    {
        $lang = app()->getLocale();
        $categories = Category::paginate(10);
        $cart = session()->get('cart', []);
        $products = Product::all();
        $variants = Variant::all();
        $cartProducts = [];
        $totalPrice = 0;
        $totalDiscount = 0;
        $discountedTotal = 0;

        foreach ($cart as $cartItem) {
            $product = $products->where('id', $cartItem['id'])->first();
            $variant = $variants->where('id', $cartItem['variant_id'])->first();

            if ($product && $variant) {
                $cartItem['name'] = $product->{'name_' . app()->getLocale()};
                $cartItem['price'] = $variant->price;
                $cartItem['discount_price'] = $variant->discount_price !== null && $variant->discount_price > 0
                    ? $variant->discount_price
                    : null;
                $cartItem['image'] = $product->image;

                $totalPrice += $cartItem['price'] * $cartItem['quantity'];

                if ($cartItem['discount_price']) {
                    $totalDiscount += ($cartItem['price'] - $cartItem['discount_price']) * $cartItem['quantity'];
                }

                $itemPrice = $cartItem['discount_price'] ?? $cartItem['price'];
                $discountedTotal += $itemPrice * $cartItem['quantity'];

                $cartProducts[] = $cartItem;
            }
        }

        return view('pages.cart', compact('cartProducts', 'totalPrice', 'totalDiscount', 'discountedTotal', 'categories', 'lang'));
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

        return redirect()->route('cart')->with('success', __('Cart has been cleared.'));
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
                $cart[$request->id]['total_price'] = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];
            }

            session()->put('cart', $cart);
        }

        foreach ($cart as $item) {
            $totalDiscount += ($item['price'] - ($item['discount_price'] ?? $item['price'])) * $item['quantity'];
            $discountedTotal += ($item['discount_price'] ?? $item['price']) * $item['quantity'];
        }

        return response()->json([
            'success' => true,
            'updated_item' => [
                'id' => $cart[$request->id]['id'],
                'quantity' => $cart[$request->id]['quantity'],
                'price' => $cart[$request->id]['price'],
                'discount_price' => $cart[$request->id]['discount_price'] ?? null,
                'total_price' => $cart[$request->id]['total_price'],
            ],
            'total_amount' => $discountedTotal,
            'total_discount' => $totalDiscount,
        ]);
    }
    public function toggleFavorite(Request $request)
    {
        $favorites = session()->get('favorites', []);

        $productId = $request->id;


        if (in_array($productId, $favorites)) {
            $favorites = array_filter($favorites, fn($id) => $id != $productId);
            $message = __('home.remove_favorites');
        } else {
            $favorites[] = $productId;
            $message = __('home.add_favorites');
        }

        session()->put('favorites', $favorites);

        return response()->json([
            'success' => true,
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
            $message = __('home.remove_compare');
        } else {
            $compares[] = $productId;
            $message = __('home.add_compare');
        }

        session()->put('compares', $compares);

        return response()->json([
            'success' => true,
            'message' => $message,
            'compares_count' => count($compares),
        ]);
    }

    public function compare()
    {
        $lang = app()->getLocale();
        $compares = session()->get('compares', []);
        $products = Product::whereIn('id', $compares)->get();
        $categories = Category::paginate(10);

        return view('pages.compare', compact('products', 'lang', 'categories'));
    }
}
