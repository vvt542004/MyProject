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

        <main style="padding:30px;">
            <h1>Chi tiết đơn hàng #{{ $order->id }}</h1>

            <!-- ===== THÔNG TIN KHÁCH HÀNG ===== -->
         <div class="order-info-card">
    <h3>📋 Thông tin khách hàng</h3>

    <div class="order-info-grid">
        <div>
            <span>Họ tên</span>
            <strong>{{ $order->customer_name }}</strong>
        </div>

        <div>
            <span>Số điện thoại</span>
            <strong>{{ $order->phone }}</strong>
        </div>

        <div>
            <span>Email</span>
            <strong>{{ $order->email ?? 'Không có' }}</strong>
        </div>

        <div>
            <span>Địa chỉ</span>
            <strong>{{ $order->address }}</strong>
        </div>

        <div>
            <span>Trạng thái</span>
            @if($order->status === 'pending')
                <span class="status-badge pending">Chưa duyệt</span>
            @else
                <span class="status-badge approved">Đã duyệt</span>
            @endif
        </div>
    </div>
</div>


            <!-- ===== DANH SÁCH SẢN PHẨM ===== -->
            <div class="order-box">
                <h3>Sản phẩm đã mua</h3>

                <table class="table_dm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ number_format($item->price,0,',','.') }} VNĐ</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                {{ number_format($item->price * $item->quantity,0,',','.') }} VNĐ
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h3 style="text-align:right;margin-top:15px;">
                    Tổng tiền:
                    <span style="color:#e11d48;">
                        {{ number_format($order->total_price,0,',','.') }} VNĐ
                    </span>
                </h3>
            </div>

            <a href="{{ url('/admin_dhang') }}" class="btn-back">
                ← Quay lại danh sách
            </a>
        </main>

    </div>
</div>
</section>
<script src="{{ asset('backend/admin/js/style.js') }}"></script>
</body>
</html>
