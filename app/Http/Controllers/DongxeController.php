<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class DongxeController extends Controller
{
        public function dongxe()
    {
        $products = product::orderBy('id', 'asc')->take(43)->get();
        return view('User.Dongxe.Dongxe', [
            'products' => $products
        ]);
    }
    // Dong xe
    public function dongxe718()
    {
        $products = product::orderBy('id', 'asc')->take(6)->get();
        return view('User.Dongxe.Dongxe718', [
            'products' => $products
        ]);
    }
    public function dongxe911()
    {
        $products = product::orderBy('id', 'asc')->take(16)->get();
        return view('User.Dongxe.Dongxe911', [
            'products' => $products
        ]);
    }
    public function dongxetaycan()
    {
        $products = product::orderBy('id', 'asc')->take(26)->get();
        return view('User.Dongxe.DongxeTaycan', [
            'products' => $products
        ]);
    }
       public function dongxepana()
    {
        $products = product::orderBy('id', 'asc')->take(28)->get();
        return view('UserDongxe.Dongxepana', [
            'products' => $products
        ]);
    }
        public function dongxemacan()
    {
        $products = product::orderBy('id', 'asc')->take(36)->get();
        return view('User.Dongxe.Dongxemacan', [
            'products' => $products
        ]);
    }
        public function dongxecayne()
    {
        $products = product::orderBy('id', 'asc')->take(43)->get();
        return view('User.Dongxe.Dongxecayne', [
            'products' => $products
        ]);
    }

}
