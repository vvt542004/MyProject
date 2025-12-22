<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.parts.head')
</head>

<body>

<section>
    <div class="admin_all">
        <div class="admin_left">
            @include('Admin.parts.admin_left')
        </div>

        <div class="admin_right">
            <div class="admin-right-header">
                @include('Admin.parts.admin_right_header')
            </div>

            <main>

                <div class="admin_right_text">
                    <h1>Chỉnh sửa sản phẩm</h1>
                </div>

                <div class="admin_dm">

                    <form action="{{ route('products.update', $product->id) }}" 
                          method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- TÊN --}}
                        <div class="form-group mt-3">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ $product->name }}" required>
                        </div>

                        {{-- SLUG --}}
                        <div class="form-group mt-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control"
                                   value="{{ $product->slug }}" required>
                        </div>

                        {{-- DANH MỤC --}}
                        <div class="form-group mt-3">
                            <label>Danh mục</label>
                            <input type="text" name="category" class="form-control"
                                   value="{{ $product->category }}" required>
                        </div>

                        {{-- GIÁ --}}
                        <div class="form-group mt-3">
                            <label>Giá (VNĐ)</label>
                            <input type="number" name="price_vnd" class="form-control"
                                   value="{{ $product->price_vnd }}" required>
                        </div>

                        {{-- SỐ LƯỢNG --}}
                        <div class="form-group mt-3">
                            <label>Số lượng</label>
                            <input type="number" name="stock" class="form-control"
                                   value="{{ $product->stock }}">
                        </div>

                        {{-- TRẠNG THÁI --}}
                        <div class="form-group mt-3">
                            <label>Trạng thái</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $product->is_active ? 'selected' : '' }}>Hiển thị</option>
                                <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Ẩn</option>
                            </select>
                        </div>

                        {{-- ẢNH CHÍNH --}}
                        <div class="form-group mt-3">
                            <label>Ảnh chính hiện tại</label><br>

                            @if ($product->main_image)
                                <img src="{{ asset($product->main_image) }}" width="150" class="mb-2">
                            @endif

                            <input type="file" name="main_image" class="form-control mt-2">
                        </div>

                        {{-- GALLERY --}}
                        <div class="form-group mt-3">
                            <label>Ảnh chi tiết</label><br>

                            @if ($product->gallery)
                                @foreach (json_decode($product->gallery) as $img)
                                    <img src="{{ asset($img) }}" width="100" style="margin-right: 5px;">
                                @endforeach
                            @endif

                            <input type="file" name="gallery[]" class="form-control mt-2" multiple>
                        </div>

                        {{-- NÚT LƯU --}}
                        <div style="text-align: right; margin-top: 25px;">
                            <button type="submit"
                                style="
                                    background: red !important;
                                    color: #fff !important;
                                    padding: 10px 20px;
                                    border-radius: 6px;
                                    border: none !important;
                                    font-size: 16px;
                                    cursor: pointer;
                                ">
                                Lưu thay đổi
                            </button>
                        </div>

                    </form>

                </div>

            </main>

        </div>
    </div>
</section>

</body>
</html>
