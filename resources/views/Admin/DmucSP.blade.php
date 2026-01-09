<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.parts.head')
    <style>
        .table_dm img {
            width: 80px;
            border-radius: 6px;
        }
    </style>
</head>

<body>
<section>
    <div class="admin_all">

        <!-- LEFT -->
        <div class="admin_left">
            @include('Admin.parts.admin_left')
        </div>

        <!-- RIGHT -->
        <div class="admin_right">

            <div class="admin-right-header">
                @include('Admin.parts.admin_right_header')
            </div>

            <main>
                <div class="admin_right_text">
                    <h1>
                        Sản phẩm thuộc dòng xe:
                        <span style="color:#while">{{ $category->name }}</span>
                    </h1>
                </div>

                <div class="admin_dm">
                    <div class="admin_dm_conten">

                        {{-- Thông báo --}}
                        @if(session('success'))
                            <p style="color:green">{{ session('success') }}</p>
                        @endif
                        @if(session('error'))
                            <p style="color:red">{{ session('error') }}</p>
                        @endif

                        <table class="table_dm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                </tr>
                            </thead>

                            <tbody>
                            @forelse ($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ $product->name }}</td>

                                    <td>
                                        {{ $product->price_display ?? number_format($product->price_vnd, 0, ',', '.') . ' VNĐ' }}
                                    </td>

                                    <td>
                                        @if($product->main_image)
                                            <img src="{{ asset($product->main_image) }}">
                                        @else
                                            <span>Không có ảnh</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align:center">
                                        Dòng xe này chưa có sản phẩm
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <a href="{{ route('admin.categories') }}"
                           class ="DM_back">
                            Quay lại 
                        </a>

                    </div>
                </div>
            </main>

        </div>
    </div>
</section>
</body>

<script src="{{ asset('backend/admin/js/style.js') }}"></script>
</html>
