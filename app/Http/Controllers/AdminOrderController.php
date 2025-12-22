<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('Admin.Dhang', compact('orders'));
    }
}