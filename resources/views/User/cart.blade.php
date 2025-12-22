<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.parts.head')
</head>

<body>
@include('User.parts.header')

<section class="slider">
    <div class="slider-items">
        @for($i = 1; $i <= 6; $i++)
            <div class="slider-item">
                <img src="{{ asset('frontend/asset/images/slider'.$i.'.jpg') }}" alt="">
            </div>
        @endfor
    </div>
    <div class="slider-arrow">
        <i class="ri-arrow-right-wide-line"></i>
        <i class="ri-arrow-left-wide-line"></i>
    </div>
    <div class="slider-dots"></div>
</section>

@php
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price_vnd'] * $item['quantity'];
    }
@endphp
@if(session('success'))
    <div id="success-popup">
        {{ session('success') }}
    </div>
@endif
<main class="cart-page" style="padding:40px;">
    <h1 style="text-align:center;margin-bottom:30px;">Giỏ hàng của bạn</h1>

@if(!$cart || count($cart) == 0)
    <p style="text-align:center;">Giỏ hàng trống.</p>
@else

<div class="cart-wrapper">

    <!-- ===== CỘT TRÁI: GIỎ HÀNG (KHÔNG FORM CHECKOUT) ===== -->
    <div class="cart-box">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên xe</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tạm tính</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart as $id => $product)
                <tr>
                    <td>
                        <img src="{{ asset($product['main_image']) }}" class="cart-img">
                    </td>

                    <td>{{ $product['name'] }}</td>

                    <td>{{ number_format($product['price_vnd'],0,',','.') }} VNĐ</td>

                    <!-- ✅ UPDATE SỐ LƯỢNG BẰNG JS -->
                    <td>
                        <input type="number"
                               min="1"
                               value="{{ $product['quantity'] }}"
                               onchange="updateQty({{ $id }}, this.value)">
                    </td>

                    <td>
                        {{ number_format($product['price_vnd'] * $product['quantity'],0,',','.') }} VNĐ
                    </td>

                    <!-- ✅ FORM DELETE ĐỘC LẬP -->
                    <td>
                       <form action="{{ route('cart.remove',$id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-delete">✕</button>
</form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ url('/') }}" class="btn-back">← Tiếp tục mua xe</a>
    </div>

    <!-- ===== CỘT PHẢI: CHECKOUT (FORM RIÊNG) ===== -->
    <div class="cart-box">
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <h3>Thông tin khách hàng</h3>

            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" name="customer_name" required>
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email">
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <textarea name="address" rows="3" required></textarea>
            </div>

            <input type="hidden" name="total_price" value="{{ $total }}">

            <div class="total-row">
                <span>Tổng tiền</span>
                <strong>{{ number_format($total,0,',','.') }} VNĐ</strong>
            </div>

            <button type="submit" class="btn-checkout">
                💳 Gửi đơn hàng
            </button>
        </form>
    </div>

</div>
@endif
</main>
<style>
#success-popup {
    position: fixed;
    top: 30px;
    right: 30px;
    background: #22c55e;
    color: #fff;
    padding: 15px 25px;
    border-radius: 8px;
    font-weight: 600;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    z-index: 9999;
    opacity: 1;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("success-popup");

    if (popup) {
        setTimeout(() => {
            popup.style.opacity = "0";
            popup.style.transform = "translateX(30px)";
            popup.style.transition = "all 0.5s ease";

            setTimeout(() => {
                popup.remove();
            }, 500);
        }, 3000);
    }
});
</script>


<script>
function updateQty(id, qty) {
    fetch("{{ url('/cart/update') }}/" + id, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ quantity: qty })
    })
    .then(res => res.json())
    .then(() => location.reload())
    .catch(() => alert("Lỗi cập nhật số lượng"));
}
</script>

<script src="{{ asset('frontend/asset/js/script.js') }}"></script>
</body>
</html>
