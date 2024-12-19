<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
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
        return view('dashboard.cart', compact('cart'));
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
    public function checkout(Request $request)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->back()->with('error', 'Savatchangiz bo\'sh.');
        }
        $order = Order::create([
            'tel_number' => $request->tel_number,
            'name' => $request->name,
            'total_amount' => array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart)),
            'status' => 'new'
        ]);
        foreach ($cart as $id => $details) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price']
            ]);
        }
        session()->forget('cart');
        session()->flash('order_success', 'Buyurtmangiz qabul qilindi, tez orada aloqaga chiqamiz.');
        return redirect()->route('home')->with('success', 'Buyurtma muvaffaqiyatli saqlandi.');
    }
}
