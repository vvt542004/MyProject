<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.parts.head')
    <style>
        .info-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #e4e4e4;
        }
        .info-title {
            font-weight: bold;
            font-size: 17px;
            margin-bottom: 5px;
        }
        .readonly-input {
            background: #f2f2f2;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
    </style>
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
                    <h1>Xem chi tiết sản phẩm</h1>
                </div>

                <div class="admin_dm">

                    {{-- TÊN SẢN PHẨM --}}
                    <div class="info-box">
                        <div class="info-title">Tên sản phẩm:</div>
                        <div class="readonly-input">{{ $product->name }}</div>
                    </div>

                    {{-- SLUG --}}
                    <div class="info-box">
                        <div class="info-title">Slug:</div>
                        <div class="readonly-input">{{ $product->slug }}</div>
                    </div>

                    {{-- PHỤ ĐỀ --}}
                    <div class="info-box">
                        <div class="info-title">Phụ đề:</div>
                        <div class="readonly-input">{{ $product->subtitle }}</div>
                    </div>

                    {{-- DANH MỤC --}}
                    <div class="info-box">
                        <div class="info-title">Danh mục:</div>
                        <div class="readonly-input">{{ $product->category }}</div>
                    </div>

                    {{-- MÔ TẢ --}}
                    <div class="info-box">
                        <div class="info-title">Mô tả:</div>
                        <div class="readonly-input">{{ $product->description }}</div>
                    </div>

                    {{-- GIÁ --}}
                    <div class="info-box">
                        <div class="info-title">Giá (VNĐ):</div>
                        <div class="readonly-input">{{ number_format($product->price_vnd) }} đ</div>
                    </div>

                    {{-- HIỂN THỊ GIÁ --}}
                    <div class="info-box">
                        <div class="info-title">Giá hiển thị:</div>
                        <div class="readonly-input">{{ $product->price_display }}</div>
                    </div>

                    {{-- CÔNG SUẤT --}}
                    <div class="info-box">
                        <div class="info-title">Công suất:</div>
                        <div class="readonly-input">{{ $product->power }}</div>
                    </div>

                    <div class="info-box">
                        <div class="info-title">Công suất (PS):</div>
                        <div class="readonly-input">{{ $product->power_ps }}</div>
                    </div>

                    <div class="info-box">
                        <div class="info-title">Công suất (kW):</div>
                        <div class="readonly-input">{{ $product->power_kw }}</div>
                    </div>

                    {{-- MÔ-MEN XOẮN --}}
                    <div class="info-box">
                        <div class="info-title">Mô-men xoắn (Nm):</div>
                        <div class="readonly-input">{{ $product->torque_nm }}</div>
                    </div>

                    {{-- TĂNG TỐC --}}
                    <div class="info-box">
                        <div class="info-title">Tăng tốc (0-100km/h):</div>
                        <div class="readonly-input">{{ $product->acceleration_sec }} giây</div>
                    </div>

                    {{-- TỐC ĐỘ TỐI ĐA --}}
                    <div class="info-box">
                        <div class="info-title">Tốc độ tối đa:</div>
                        <div class="readonly-input">{{ $product->top_speed_kmh }} km/h</div>
                    </div>

                    {{-- MỨC TIÊU THỤ --}}
                    <div class="info-box">
                        <div class="info-title">Tiêu thụ nhiên liệu:</div>
                        <div class="readonly-input">{{ $product->consumption_l_per_100km }} L/100km</div>
                    </div>

                    {{-- THÔNG SỐ KHÁC --}}
                    <div class="info-box">
                        <div class="info-title">Ghi chú thông số:</div>
                        <div class="readonly-input">{{ $product->spec_note }}</div>
                    </div>

                    <div class="info-box">
                        <div class="info-title">Chiều dài (mm):</div>
                        <div class="readonly-input">{{ $product->length_mm }}</div>
                    </div>

                    <div class="info-box">
                        <div class="info-title">Chiều cao (mm):</div>
                        <div class="readonly-input">{{ $product->height_mm }}</div>
                    </div>

                    {{-- ẢNH CHÍNH --}}
                    <div class="info-box">
                        <div class="info-title">Ảnh chính:</div>
                        @if ($product->main_image)
                            <img src="{{ asset($product->main_image) }}" width="250" style="border-radius: 8px;">
                        @else
                            <div>Không có ảnh</div>
                        @endif
                    </div>

                    {{-- GALLERY --}}
                    <div class="info-box">
                        <div class="info-title">Ảnh chi tiết:</div>

                        @if ($product->gallery)
                            @foreach (json_decode($product->gallery, true) as $img)
                                <img src="{{ asset($img) }}" width="120" style="margin-right:10px; border-radius:6px;">
                            @endforeach
                        @else
                            <div>Không có ảnh chi tiết</div>
                        @endif
                    </div>

                    {{-- TRẠNG THÁI --}}
                    <div class="info-box">
                        <div class="info-title">Trạng thái:</div>
                        <div class="readonly-input">
                            {{ $product->is_active ? 'Hiển thị' : 'Ẩn' }}
                        </div>
                    </div>

                    {{-- NÚT QUAY LẠI --}}
                     <div style="text-align: right; margin-top: 30px;">
                        <a href="{{ route('admin.product') }}"
                           style="
                                background: #dc3545;
                                color: #fff !important;
                                padding: 10px 20px;
                                font-size: 16px;
                                border-radius: 6px;
                                text-decoration: none;
                                display: inline-block;
                                font-weight: 500;
                           ">
                            ← Quay lại
                        </a>
                    </div>

                </div>

            </main>

        </div>
    </div>
</section>

</body>
</html>
