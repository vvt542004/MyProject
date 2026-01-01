<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\AdminNewOrderMail;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
  public function store(Request $request)
{
    $cart = session()->get('cart');

    if (!$cart || count($cart) == 0) {
        return redirect()->back();
    }
    $request->validate([
        'customer_name'  => 'required|string|max:255',
        'phone'          => 'required|string|max:20',
        'address'        => 'required|string',
        'payment_method' => 'required|in:cod,bank,momo',
    ]);
    // 1️⃣ TẠO ĐƠN HÀNG (PHẢI CÓ TRƯỚC)
    $order = Order::create([
        'customer_name'  => $request->customer_name,
        'phone'          => $request->phone,
        'email'          => $request->email,
        'address'        => $request->address,
        'total_price'    => $request->total_price,
        'payment_method' => $request->payment_method,
        'status'         => 'pending',
    ]);

    // 2️⃣ LƯU SẢN PHẨM
    foreach ($cart as $product_id => $item) {
        OrderItem::create([
            'order_id'     => $order->id,
            'product_id'   => $product_id,
            'product_name' => $item['name'],
            'price'        => $item['price_vnd'],
            'quantity'     => $item['quantity'],
        ]);
    }

    // 3️⃣ GỬI MAIL CHO ADMIN 
Mail::to(config('mail.from.address'))
    ->send(new AdminNewOrderMail($order));

    // 4️⃣ XÓA GIỎ HÀNG
    session()->forget('cart');

    return redirect()->back()
        ->with('success', '🎉 Gửi đơn hàng thành công!');
}
    
}


