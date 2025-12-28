<!DOCTYPE html>
<html lang="en">
<head>
    @include('User.parts.head')
</head>

<body>

<main>
    <section class="auth-wrapper">
        <h2>Đăng ký tài khoản</h2>

        {{-- Hiển thị lỗi validate --}}
        @if ($errors->any())
            <div class="auth-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ url('/dangki') }}">
            @csrf

            <div class="auth-group">
                <input
                    type="text"
                    name="name"
                    placeholder="Họ và tên"
                    value="{{ old('name') }}"
                    required
                >
            </div>

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

            <div class="auth-group">
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Nhập lại mật khẩu"
                    required
                >
            </div>

            <button type="submit" class="auth-btn">
                Đăng ký
            </button>
        </form>

        <div class="auth-link">
            Đã có tài khoản?
            <a href="{{ url('/dangnhap') }}">Đăng nhập</a>
        </div>
    </section>
</main>

<script src="{{ asset('frontend/asset/js/script.js') }}"></script>
</body>
</html>
