<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_image' => 'nullable|url',
            'product_id' => 'required|integer|exists:products,id', // Validate product_id
        ]);


        // Create the order
        $order = Order::create([
            'first_name' => $validated['first_name'],
            'phone' => $validated['phone'],
        ]);

        // Add the product as an order item
        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $validated['product_id'], // Now using the correct product_id
            'quantity' => 1, // Default to 1 for now
            'price' => $validated['product_price'],
            'total' => $validated['product_price'],
        ]);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Операция выполнена успешно!');
    }

    public function storeForm(Request $request)
    {
        // Validate the request data
        $validated = $request->all();

        // Create the new order record
        $order = Order::create([
            'first_name' => $validated['first_name'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message']  ?? null,
            'product' => $validated['product'] ?? null,
        ]);


        return redirect()->back()->with('success', 'Операция выполнена успешно!');
    }
    public function productsStore(Request $request)
    {

        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'cart_items' => 'required|json',  // Ensure cart_items is a valid JSON
        ]);


        // Decode cart_items from JSON
        $cartItems = json_decode($validated['cart_items'], true);


        // Create the order
        $order = Order::create([
            'first_name' => $validated['first_name'],
            'phone' => $validated['phone'],
        ]);

        // Loop through the cart items and create order items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem['id'] ?? null,
                'quantity' => $cartItem['quantity'], // Default to 1
                'price' => $cartItem['price'] ?? $cartItem['discount_price'],
                'total' => $cartItem['total_price'] ?? $cartItem['quantity'] * $cartItem['price'] ?? $cartItem['quantity'] * $cartItem['discount_price'],
            ]);
        }

        // Redirect or return success message
        return redirect()->back()->with('success', 'Операция выполнена успешно!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,processing,completed,cancelled',
        ]);

        $order->status = $validated['status'];
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Статус заказа успешно обновлён.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно удалён.');
    }
}
