<!DOCTYPE html>
<html lang="vi">
<head>
    @include('User.parts.head')
</head>
<body class="login">



{{-- TOAST THÀNH CÔNG --}}
@if(session('success'))
    <div id="toast-success">
        {{ session('success') }}
    </div>
@endif

<main>
    <section class="auth-wrapper">

        {{-- LOGO --}}
        <div class="auth-logo">
            <img src="{{ asset('frontend/asset/images/logo.png') }}" alt="Logo">
        </div>

        <h2>Đăng nhập</h2>

        {{-- LỖI --}}
        @if(session('error'))
            <div class="auth-error">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/dangnhap') }}">
            @csrf

            <div class="auth-group">
                <input type="email" name="email" placeholder="Email"
                       value="{{ old('email') }}" required>
            </div>

            <div class="auth-group">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>

            <div class="auth-extra">
                <label>
                    <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                </label>
                <a href="#">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="auth-btn">
                Đăng nhập
            </button>
        </form>

        <div class="auth-link">
            Chưa có tài khoản?
            <a href="{{ url('/dangki') }}">Đăng ký</a>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toast = document.getElementById('toast-success');
    if (toast) {
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.5s ease';
            setTimeout(() => toast.remove(), 500);
        }, 3000);
    }
});
</script>

</body>
</html>
