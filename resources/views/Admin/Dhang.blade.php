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
                    <h1>Danh sách đơn hàng</h1>
                </div>

                <div class="admin_dm">
                    <div class="admin_dm_header">
                        <ul>
                            <li>
                                Show
                                <select>
                                    <option>16</option>
                                    <option>32</option>
                                    <option>64</option>
                                    <option>All</option>
                                </select>
                                entries
                            </li>
                            <li>
                                Search:
                                <input type="text" placeholder="">
                            </li>
                        </ul>
                    </div>

                    <hr style="margin-top:5px;">

                    <div class="admin_dm_conten">
                        <table class="table_dm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Sản phẩm mua</th>
                                    <th>Tổng tiền</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th>Chi tiết đơn hàng</th>
                                </tr>
                            </thead>
<tbody>
@if(isset($orders) && count($orders) > 0)
@foreach($orders as $index => $order)
<tr>
    <td>{{ $index + 1 }}</td>

    <td>{{ $order->customer_name }}</td>

    <td>{{ $order->phone }}</td>

    <td>
        @foreach($order->items as $item)
            <div>
                {{ $item->product_name }}
                <strong>x{{ $item->quantity }}</strong>
            </div>
        @endforeach
    </td>

    <td>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>

    <td style="max-width:220px;">{{ $order->address }}</td>

    <!-- ===== TRẠNG THÁI + ACTION ===== -->
    <td style="text-align:center;">

        @if($order->status === 'pending')
            <i class="ri-circle-fill" style="color:red;font-size:12px;"></i>
            <span>Chưa duyệt</span>

            <div style="margin-top:10px;">
                <form action="{{ url('/admin/order/'.$order->id.'/approve') }}"
                      method="POST" style="display:inline;">
                    @csrf
                    <button class="btn-approve">✔ Duyệt</button>
                </form>

                <form action="{{ url('/admin/order/'.$order->id.'/reject') }}"
                      method="POST" style="display:inline;">
                    @csrf
                    <button class="btn-reject">✖ Từ chối</button>
                </form>
            </div>

        @elseif($order->status === 'approved')
            <i class="ri-circle-fill" style="color:green;font-size:12px;"></i>
            <span>Đã duyệt</span>

        @elseif($order->status === 'rejected')
            <i class="ri-circle-fill" style="color:#dc2626;font-size:12px;"></i>
            <span>Đã từ chối</span>

        @else
            <i class="ri-circle-fill" style="color:gray;font-size:12px;"></i>
            <span>Không rõ</span>
        @endif

    </td>

    <!-- ===== ACTION ===== -->
    <td style="text-align:center; position: relative;">
        <div class="order-action">
            <i class="ri-more-fill action-btn"></i>

            <div class="order-dropdown">
                <a href="{{ url('/admin/order/'.$order->id) }}">
                    <i class="ri-eye-line"></i> Xem
                </a>

                <form action="{{ url('/admin/order/delete/'.$order->id) }}"
                      method="POST"
                      onsubmit="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="ri-delete-bin-line"></i> Xóa
                    </button>
                </form>
            </div>
        </div>
    </td>
</tr>
@endforeach
@else
<tr>
    <td colspan="8" style="text-align:center;padding:20px;">
        Chưa có đơn hàng nào
    </td>
</tr>
@endif
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
