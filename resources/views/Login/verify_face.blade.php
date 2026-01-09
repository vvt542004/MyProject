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

        <h2>Xác thực khuôn mặt</h2>

        <p style="text-align:center; color:#666; margin-bottom:15px;">
            Vui lòng nhìn thẳng vào camera để xác thực
        </p>

        {{-- LỖI --}}
        <div id="face-error" class="auth-error" style="display:none;">
            Xác thực thất bại, vui lòng thử lại
        </div>

        {{-- CAMERA --}}
        <div class="auth-group" style="text-align:center;">
            <video id="video" width="260" height="200" autoplay
                   style="border-radius:12px; border:2px solid #ddd;"></video>
            <canvas id="canvas" width="260" height="200" style="display:none;"></canvas>
        </div>

        <button id="verifyBtn" class="auth-btn">
            Xác thực
        </button>

        <div class="auth-link">
            <a href="{{ url('/dangnhap') }}">← Quay lại đăng nhập</a>
        </div>

    </section>
</main>

<script>
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const btn = document.getElementById('verifyBtn');
const errorBox = document.getElementById('face-error');

/* 🎥 Mở webcam */
navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => video.srcObject = stream)
    .catch(() => {
        errorBox.style.display = 'block';
        errorBox.innerText = 'Không thể mở camera';
    });

/* 📸 Chụp ảnh + gửi server */
btn.onclick = async () => {
    btn.innerText = 'Đang xác thực...';
    btn.disabled = true;

    const ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    const image = canvas.toDataURL('image/jpeg');

    const res = await fetch("{{ route('admin.face.verify.post') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ image })
    });

    const data = await res.json();

if (data.status === 'ok') {
    const toast = document.getElementById('toast-success');
    toast.style.display = 'block';

    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transition = 'opacity 0.5s ease';
    }, 2500);

    setTimeout(() => {
        window.location.href = data.redirect;
    }, 3000);
}

};
</script>

</body>
<div id="toast-success" style="display:none;">
    ✅ Xác thực thành công
</div>
<style>
#toast-success {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #22c55e;
    color: #fff;
    padding: 12px 20px;
    border-radius: 8px;
    font-size: 14px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    z-index: 9999;
}
</style>

</html>
