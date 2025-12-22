<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('User.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price_display" => $product->price_display,
                "price_vnd" => $product->price_vnd,
                "main_image" => $product->main_image,
                "quantity" => $request->quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', '✓ Thêm sản phẩm thành công');

    }

public function remove($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return back();
}

public function update(Request $request, $id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = (int) $request->quantity;
        session()->put('cart', $cart);
    }

    return response()->json(['success' => true]);
}


}
