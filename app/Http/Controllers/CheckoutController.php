<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $cart = session()->get('cart');

        if (!$cart || count($cart) == 0) {
            return redirect()->back();
        }

        // Tạo đơn hàng
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'address'       => $request->address,
            'total_price'   => $request->total_price,
            'payment_method'=> 'COD',
            'status'        => 'pending',
        ]);

        // Lưu sản phẩm trong đơn
        foreach ($cart as $product_id => $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $product_id,
                'product_name' => $item['name'],
                'price'        => $item['price_vnd'],
                'quantity'     => $item['quantity'],
            ]);
        }

        // Xóa giỏ hàng
        session()->forget('cart');

        // ✅ CHỈ SỬA CHỖ NÀY
        return redirect()->back()
            ->with('success', '🎉 Gửi đơn hàng thành công!');
    }
}
