<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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
            return response()->json(['success' => false, 'message' => 'Mahsulot yoki Variant topilmadi']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity']++;
        } else {
            $nameField = "name_{$lang}";
            $discountedPrice = $variant->discount_price ?? $variant->price;

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
            'message' => 'Mahsulot savatga qo\'shildi',
            'cart_count' => $cartCount
        ]);
    }
    public function cart()
    {
        $cart = session()->get('cart', []);
        $products = Product::all();
        $variants = Variant::all();
        $cartProducts = [];
        $totalPrice = 0;
        $totalDiscount = 0;

        foreach ($cart as $cartItem) {
            $product = $products->where('id', $cartItem['id'])->first();
            $variant = $variants->where('id', $cartItem['variant_id'])->first();

            if ($product && $variant) {
                $cartItem['name'] = $product->{'name_' . app()->getLocale()};
                $cartItem['price'] = $variant->price; // Add price
                $cartItem['discount_price'] = $variant->discount_price ?: null; // If discount_price is 0, set it to null
                $cartItem['image'] = $product->image;

                // Hisoblash: Chegirma yoki Asosiy narx
                $itemPrice = $cartItem['discount_price'] ?? $cartItem['price']; // If discount_price is null, use price
                $totalPrice += $itemPrice * $cartItem['quantity'];

                // Chegirmani hisoblash
                if ($cartItem['discount_price']) {
                    $totalDiscount += ($cartItem['price'] - $cartItem['discount_price']) * $cartItem['quantity'];
                }

                $cartProducts[] = $cartItem;
            }
        }

        return view('pages.cart', compact('cartProducts', 'totalPrice', 'totalDiscount'));
    }


    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        $total_amount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return response()->json([
            'success' => true,
            'total_amount' => $total_amount,
            'cart' => $cart,
            'cart_count' => count($cart),
        ]);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->change;

            if ($cart[$request->id]['quantity'] <= 0) {
                unset($cart[$request->id]);
            } else {
                $cart[$request->id]['total_price'] = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];
            }

            session()->put('cart', $cart);
        }

        $total_amount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return response()->json([
            'success' => true,
            'updated_item' => $cart[$request->id] ?? null,
            'total_amount' => $total_amount,
        ]);
    }
    public function toggleFavorite(Request $request)
    {
        $favorites = session()->get('favorites', []);

        $productId = $request->id;


        if (in_array($productId, $favorites)) {
            $favorites = array_filter($favorites, fn($id) => $id != $productId);
            $message = 'Mahsulot sevimlilardan olib tashlandi!';
        } else {
            $favorites[] = $productId;
            $message = 'Mahsulot sevimlilarga qo\'shildi!';
        }

        session()->put('favorites', $favorites);

        return response()->json([
            'success' => true,
            'message' => $message,
            'favorites_count' => count($favorites), // Yangilangan favoritlar soni
        ]);
    }

    public function favorites()
    {
        $lang = app()->getLocale();
        $favorites = session()->get('favorites', []);
        $products = Product::whereIn('id', $favorites)->get(); // Faqat sevimli mahsulotlar
        return view('pages.favorites', compact('products', 'lang'));
    }
    public function toggleCompare(Request $request)
    {
        $compares = session()->get('compares', []);

        $productId = $request->id;

        if (in_array($productId, $compares)) {
            $compares = array_filter($compares, fn($id) => $id != $productId);
            $message = 'Mahsulot Taqqoslashdan olib tashlandi!';
        } else {
            $compares[] = $productId;
            $message = 'Mahsulot Taqqoslash qo\'shildi!';
        }

        session()->put('compares', $compares);

        return response()->json([
            'success' => true,
            'message' => $message,
            'compares_count' => count($compares), // Yangilangan Taqqoslash soni
        ]);
    }

    public function compare()
    {
        $lang = app()->getLocale();
        $compares = session()->get('compares', []);
        $products = Product::whereIn('id', $compares)->get();
        return view('pages.compare', compact('products', 'lang'));
    }

}
