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
        $orders = Order::all();
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
        return redirect()->back(); // Or wherever you want to redirect
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
