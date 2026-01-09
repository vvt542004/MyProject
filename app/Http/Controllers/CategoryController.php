<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
class CategoryController extends Controller
{
    // Trang thêm danh mục
    public function index()
    {
        return view('Admin.Dmucadd');
    }

    // Lưu danh mục
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                                 ->store('categories', 'public');
        }

        Category::create([
            'name'  => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.Dmucadd')
            ->with('success', 'Thêm danh mục thành công');
    }
    // Trang danh sách danh mục
public function list()
{
    $categories = Category::orderBy('id', 'asc')->get();
    // hoặc đơn giản hơn:
    // $categories = Category::all();

    return view('Admin.Dmuc', compact('categories'));
}
// xem sản phẩm theo danh mục
 public function showProducts($id)
{
    // $id lúc này chính là tên dòng xe: 718, 911, Cayenne...
    $category = Category::findOrFail($id);

    $products = Product::where('category', $category->name)->get();

    return view('Admin.DmucSP', compact('category', 'products'));
}
    // form sửa
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.Dmucedit', compact('category'));
    }

    // cập nhật
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')
                                       ->store('categories', 'public');
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories')
                         ->with('success', 'Cập nhật thành công');
    }

    // xóa
   public function destroy($id)
{
    $category = Category::findOrFail($id);

    // (tuỳ chọn) xóa ảnh trong storage
    if ($category->image && \Storage::disk('public')->exists($category->image)) {
        \Storage::disk('public')->delete($category->image);
    }

    $category->delete();

    return redirect()
        ->route('admin.categories')
        ->with('success', 'Đã xóa danh mục thành công');
}



}