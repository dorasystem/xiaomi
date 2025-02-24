<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            'product_id' => $validated['product_id'],
            'quantity' => 1,
            'price' => $validated['product_price'],
            'total' => $validated['product_price'],
        ]);

        // ✅ Telegramga xabar jo‘natish
        $apiKey = "7538620633:AAH1UhziRkCXnTDXRKB9kgPh-IPDm_z5tY8"; // API Key
        $chatId = "7422505676"; // Telegram Chat ID

        $message = "<b>🛍 Yangi Buyurtma</b>\n\n";
        $message .= "👤 <b>Ism:</b> " . $validated['first_name'] . "\n";
        $message .= "📞 <b>Telefon:</b> " . $validated['phone'] . "\n";
        $message .= "🛒 <b>Mahsulot:</b> " . $validated['product_name'] . "\n";
        $message .= "💰 <b>Narx:</b> " . number_format($validated['product_price'], 2) . " so'm\n";
        if (!empty($validated['product_image'])) {
            $message .= "🖼 <b>Rasm:</b> " . $validated['product_image'] . "\n";
        }
        $message .= "<b>📅 Sana:</b> " . now()->format('Y-m-d H:i') . "\n";

        Http::post("https://api.telegram.org/bot{$apiKey}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML',
        ]);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Операция выполнена успешно!');
    }

    public function storeForm(Request $request)
    {
        $response = Http::asForm()->post('https://api.hcaptcha.com/siteverify', [
            'secret' => 'ES_1e8062b055cd4afc980041144cfddb9f',
            'response' => $request->input('h-captcha-response'),
        ]);

        $data = $response->json();

        if (!$data['success']) {
            return back()->withErrors(['captcha' => 'Captcha tasdiqlanmadi!']);
        }
        // Validate the request data
        $validated = $request->all();

        // Create the new order record
        $order = Order::create([
            'first_name' => $validated['first_name'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message']  ?? null,
            'product' => $validated['product'] ?? null,
        ]);
        // ✅ 3. Telegramga xabar jo‘natish
        $apiKey = "7538620633:AAH1UhziRkCXnTDXRKB9kgPh-IPDm_z5tY8"; // API Key
        $chatId = "7422505676"; // Telegram Chat ID

        $message = "<b>📩 Yangi Xabar</b>\n\n";
        $message .= "👤 <b>Foydalanuvchi:</b> " . $validated['first_name'] . "\n";
        $message .= "📞 <b>Telefon:</b> " . $validated['phone'] . "\n";
        $message .= "📝 <b>Xabar:</b> \n" . nl2br(e($validated['message'])) . "\n";
        $message .= "<b>📅 Sana:</b> " . now()->format('Y-m-d H:i') . "\n";

        Http::post("https://api.telegram.org/bot{$apiKey}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML',
        ]);


        return redirect()->back()->with('success', 'Операция выполнена успешно!');
    }


    public function productsStore(Request $request)
    {

        // ✅ 1. So‘rovni tekshirish (Validatsiya)
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'cart_items' => 'required|json', // JSON formatdagi savat ma’lumotlari
        ]);

        // ✅ 2. JSON dan massivga o‘girish
        $cartItems = json_decode($validated['cart_items'], true);


        // ✅ 3. Buyurtmani bazaga saqlash
        $order = Order::create([
            'first_name' => $validated['first_name'],
            'phone' => $validated['phone'],
        ]);

        // ✅ 4. Mahsulotlar ro‘yxatini yaratish va hisoblash
        $orderItemsText = ""; // Telegramga yuboriladigan mahsulotlar matni
        $totalAmount = 0; // Umumiy summa hisoblash

        foreach ($cartItems as $cartItem) {
            $price = $cartItem['discount_price'] ?? $cartItem['price']; // Chegirma bo‘lsa, uni ishlatish
            $total = $cartItem['quantity'] * $price;
            $totalAmount += $total; // Umumiy narxni yig‘ish

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem['id'] ?? null,
                'quantity' => $cartItem['quantity'],
                'price' => $price,
                'total' => $total,
                'sku' => $cartItem['sku'] ?? null,
            ]);

            // 📝 Telegram xabari uchun mahsulot tafsilotlari (SKU qo‘shildi)
            $orderItemsText .= "📌 <b>" . ($cartItem['name'] ?? 'Noma’lum Mahsulot') . "</b>\n";
            $orderItemsText .= "🔖 SKU: " . ($cartItem['sku'] ?? 'Noma’lum') . "\n"; // SKU qo‘shildi
            $orderItemsText .= "💰 Narx: " . number_format($price, 0, '.', ' ') . " UZS\n";
            $orderItemsText .= "📦 Miqdor: " . $cartItem['quantity'] . " ta\n\n";
        }


        // ✅ 5. Savatchani tozalash (Barcha ma’lumotlar bazaga yozilgandan keyin)
        session()->forget('cart');

        // ✅ 6. Telegramga xabar jo‘natish
        $apiKey = "7538620633:AAH1UhziRkCXnTDXRKB9kgPh-IPDm_z5tY8"; // API Key
        $chatId = "7422505676"; // Telegram Chat ID

        $message = "<b>🛒 Yangi Buyurtma</b>\n\n";
        $message .= "👤 <b>Ism:</b> " . $validated['first_name'] . "\n";
        $message .= "📞 <b>Telefon:</b> " . $validated['phone'] . "\n\n";
        $message .= "🛍 <b>Buyurtma Tafsilotlari:</b>\n" . $orderItemsText;
        $message .= "💳 <b>Umumiy summa:</b> " . number_format($totalAmount, 0, '.', ' ') . " UZS\n";
        $message .= "<b>📅 Sana:</b> " . now()->format('Y-m-d H:i') . "\n";

        Http::post("https://api.telegram.org/bot{$apiKey}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML',
        ]);

        // ✅ 7. Muvaffaqiyatli xabar bilan qaytish
        return redirect()->back()->with('success', __('home.order_received'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit',compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,processing,completed,cancelled',
        ]);

        $order->status = $validated['status'];
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Статус заказа успешно обновлён.');
    }
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно удалён.');
    }
}
