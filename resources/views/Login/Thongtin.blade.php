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

        <h2>Thông tin cá nhân</h2>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="profile-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/ttuser') }}" enctype="multipart/form-data">
            @csrf

            {{-- AVATAR --}}
            <div class="profile-avatar">
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}">
                @else
                    <i class="fa-solid fa-user"></i>
                @endif
            </div>

            <div class="auth-group">
                <input type="file" name="avatar">
            </div>

            {{-- NAME --}}
            <div class="auth-group">
                <input
                    type="text"
                    name="name"
                    value="{{ Auth::user()->name }}"
                    placeholder="Họ tên"
                    required
                >
            </div>

            {{-- EMAIL --}}
            <div class="auth-group">
                <input
                    type="email"
                    value="{{ Auth::user()->email }}"
                    disabled
                >
            </div>

            {{-- PASSWORD --}}
            <div class="auth-group">
                <input
                    type="password"
                    name="password"
                    placeholder="Mật khẩu mới (nếu đổi)"
                >
            </div>

            <div class="auth-group">
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Xác nhận mật khẩu"
                >
            </div>

            <button type="submit" class="auth-btn">
                Cập nhật hồ sơ
            </button>
            <a href="{{ url('/') }}" class="auth-btn auth-btn-back">
                Quay lại trang chủ
            </a>
        </form>

    </section>
</main>

</body>
</html>
