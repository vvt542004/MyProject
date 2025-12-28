<!DOCTYPE html>
<html lang="en">
<head>
    @include('User.parts.head')

    <style>
        #toast-success {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: #fff;
            padding: 14px 20px;
            border-radius: 6px;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            animation: slideIn 0.4s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>

{{-- ✅ TOAST GÓC PHẢI --}}
@if(session('success'))
    <div id="toast-success">
        {{ session('success') }}
    </div>
@endif

<main>
    <section class="auth-wrapper">
        <h2>Đăng nhập</h2>

        {{-- Thông báo lỗi đăng nhập --}}
        @if(session('error'))
            <div class="auth-error">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/dangnhap') }}">
            @csrf

            <div class="auth-group">
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="auth-group">
                <input
                    type="password"
                    name="password"
                    placeholder="Mật khẩu"
                    required
                >
            </div>

            <div class="auth-extra">
                <label>
                    <input type="checkbox" name="remember">
                    Ghi nhớ đăng nhập
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

<script src="{{ asset('frontend/asset/js/script.js') }}"></script>

{{-- ✅ JS đặt CUỐI để toast tự mất --}}
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
