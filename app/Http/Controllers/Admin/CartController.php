<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            if ($product->discount) {
                $discountedPrice = $product->price - ($product->price * $product->discount->percentage / 100);
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $discountedPrice,
                    'image' => $product->image,
                    'quantity' => 1
                ];
            } else {
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => 1
                ];
            }
        }
        session()->put('cart', $cart);
        return response()->json(['cart_count' => count($cart), 'message' => 'Product added to cart']);
    }
    public function cart()
    {
//        dd('salom');
        $cart = session()->get('cart', []); // Savatdagi barcha mahsulotlarni oladi
        return view('admin.dashboard.cart', compact('cart'));
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
