<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;
use App\Mail\OrderApprovedMail;
use App\Mail\OrderRejectedMail;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('Admin.Dhang', compact('orders'));
    }

    public function destroy($id)
    {
    $order = Order::findOrFail($id);
    $order->delete();
    return redirect()->back()->with('success', 'Đã xóa đơn hàng');
    }

    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);

        return view('Admin.Dhangshow', compact('order'));
    }

    //email xac nhan
    public function approve($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'approved';
    $order->save();

    if ($order->email) {
        Mail::to($order->email)->send(new OrderApprovedMail($order));
    }

    return redirect()->back()->with('success', 'Đã duyệt đơn hàng');
}
// email tu choi
public function reject($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'rejected';
    $order->save();

    if ($order->email) {
        Mail::to($order->email)->send(new OrderRejectedMail($order));
    }

    return redirect()->back()->with('success', 'Đã từ chối đơn hàng');
}

}