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
                    <h1>Danh Sách Sản Phẩm</h1>
                </div>

                <div class="admin_dm">

                    {{-- HEADER --}}
                    <div class="admin_dm_header">
                        <ul>
                            <li>
                                Show
                                <select id="entryCountSelect">
                                    <option value="16">16</option>
                                    <option value="32">32</option>
                                    <option value="64">64</option>
                                    <option value="All">All</option>
                                </select>
                                entries
                            </li>

                            <li>
                                Search:
                                <input type="text" placeholder="">
                            </li>

                            <li style="float:right; list-style:none;">
                                <a href="{{ route('products.create') }}" class="btn btn-primary">
                                    + Thêm sản phẩm
                                </a>
                            </li>
                        </ul>
                    </div>

                    <hr style="margin-top: 5px;">

                    {{-- TABLE --}}
                    <div class="admin_dm_conten">
                        <table class="table_dm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><i class="ri-arrow-up-down-line"></i> Tên</th>
                                <th><i class="ri-arrow-up-down-line"></i> Ảnh</th>
                                <th><i class="ri-arrow-up-down-line"></i> Giá</th>
                                <th><i class="ri-arrow-up-down-line"></i> Số lượng</th>
                                <th><i class="ri-arrow-up-down-line"></i> Danh mục</th>
                                <th><i class="ri-arrow-up-down-line"></i> Chi tiết</th>
                                <th><i class="ri-arrow-up-down-line"></i> Thao tác</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    {{-- TÊN --}}
                                    <td>{{ $product->name }}</td>

                                    {{-- ẢNH --}}
                                    <td>
                                        @if ($product->main_image)
                                            <img src="{{ asset($product->main_image) }}" width="100" alt="product">
                                        @else
                                            <span>Không có ảnh</span>
                                        @endif
                                    </td>

                                    {{-- GIÁ --}}
                                    <td>
                                        {{ number_format($product->price_vnd, 0, ',', '.') }} VNĐ
                                    </td>

                                    {{-- SỐ LƯỢNG --}}
                                    <td>{{ $product->stock }}</td>

                                    {{-- DANH MỤC --}}
                                    <td>{{ $product->category }}</td>

                                    {{-- TRẠNG THÁI --}}
                                    <td style="font-size: 20px;
                                    color: {{ $product->is_active ? 'rgb(60,233,60)' : 'red' }}">
                                   <a href="{{ route('products.view', $product->id) }}" 
                                   style="color: inherit; text-decoration: none; cursor: pointer;">
                                   @if ($product->is_active)
                                       <i class="ri-eye-fill"></i>
                                   @else
                                       <i class="ri-eye-close-fill"></i>
                                   @endif
                                   </a>
                                    </td>

                                    {{-- THAO TÁC --}}
                                    <td>

                                        {{-- Edit --}}
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            <i class="ri-edit-line"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('products.destroy', $product->id) }}" 
                                              method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"
                                                    style="background:none; border:none;">
                                                <i class="ri-delete-bin-line" style="color:red;"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>

                </div>

            </main>
        </div>
    </div>
</section>

<script src="{{ asset('backend/admin/js/style.js') }}"></script>

</body>
</html>
