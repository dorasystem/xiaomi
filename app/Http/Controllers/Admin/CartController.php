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
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'required|exists:variants,id',
            'storage' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($request->product_id);
        $variant = Variant::find($request->variant_id);

        if (!$product || !$variant) {
            return response()->json(['success' => false, 'message' => 'Product or Variant not found']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity']++;
        } else {
            $cart[$request->product_id] = [
                'id' => $product->id,
                'name' => $product->name,
                'variant_id' => $variant->id,
                'storage' => $request->storage,
                'price' => $request->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    public function cart()
    {
        $cart = session()->get('cart', []); // Savatdagi barcha mahsulotlarni oladi
        return view('pages.cart', compact('cart'));
    }
    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $total = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, session()->get('cart', [])));
            return response()->json([
                'success' => true,
                'total' => $total
            ]);
        }
        return response()->json(['success' => false]);
    }
    public function favorites()
    {
        return view('pages.favorites');
    }

}
