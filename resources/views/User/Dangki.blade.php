<!DOCTYPE html>
<html lang="vi">
<head>
    @include('User.parts.head')
</head>

<body class="login">

<main>
    <section class="auth-wrapper">

        {{-- LOGO --}}
        <div class="auth-logo">
            <img src="{{ asset('frontend/asset/images/logo.png') }}" alt="Logo">
        </div>

        <h2>Đăng ký tài khoản</h2>

        {{-- LỖI VALIDATE --}}
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
                <input type="text" name="name" placeholder="Họ và tên"
                       value="{{ old('name') }}" required>
            </div>

            <div class="auth-group">
                <input type="email" name="email" placeholder="Email"
                       value="{{ old('email') }}" required>
            </div>

            <div class="auth-group">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>

            <div class="auth-group">
                <input type="password" name="password_confirmation"
                       placeholder="Nhập lại mật khẩu" required>
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

</body>
</html>
