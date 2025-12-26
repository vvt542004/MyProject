<!DOCTYPE html>
<html lang="en">
<head>
    @include('User.parts.head')
</head>

<body>

@include('User.parts.header')

<main>
    <section class="auth-wrapper">
        <h2>Đăng ký tài khoản</h2>

        <form>
            <div class="auth-group">
                <input type="text" placeholder="Họ và tên">
            </div>

            <div class="auth-group">
                <input type="email" placeholder="Email">
            </div>

            <div class="auth-group">
                <input type="password" placeholder="Mật khẩu">
            </div>

            <div class="auth-group">
                <input type="password" placeholder="Nhập lại mật khẩu">
            </div>

            <button type="button" class="auth-btn">Đăng ký</button>
        </form>

        <div class="auth-link">
            Đã có tài khoản?
            <a>Đăng nhập</a>
        </div>
    </section>


   <!--Contact-->
        <section class="car-contact">
            <div class="car-contact-conten">
                <div class="car-contact-conten-left">
                    <p>Thông tin liên lạc:</p>
                    <p>STORECAR Việt Nam</p>
                    <p>Liên hệ chúng tôi: Viettuannger@gmail.com</p>
                    <p>Dịch vụ khách hàng: Storecar54@gmail.com</p>
                    <p>Các trung tâm của store</p>
                    <p>Trung tâm store TP.Hà Nội</p>
                    <p>Trung tâm store TP.Hồ Chí Minh</p>
                    <p>Trung tâm store TP.Sài Gòn</p>
                </div>
                <div class="car-contact-conten-right">
                    <div class="car-contact-conten-right-one">
                        <button><i class="ri-share-fill"></i> Chia sẻ trang</button>

                    </div>
                    <div class="car-contact-conten-right-two">
                        <p>Kết nối với Store</p>

                    </div>
                    <div class="car-contact-conten-right-three">
                        <div class="car-contact-conten-right-three-subset">
                            <i class="ri-facebook-fill"></i>

                        </div>
                        <div class="car-contact-conten-right-three-subset">
                            <i class="ri-youtube-line"></i>

                        </div>
                        <div class="car-contact-conten-right-three-subset">
                            <i class="ri-instagram-line"></i>

                        </div>

                    </div>

                </div>
            </div>
        </section>

    <!--car-end-->
    <section class="car-end">
        <div class="car-end-text-one">
            <p><i class="ri-store-line"></i>Store Việt Nam 2025</p>
        </div>
        <div class="car-end-text-two">
            <p><u>Chính sách quyền riêng tư </u></p>
        </div>
    </section>
    </main>
    <!--car-end-->

<script src="{{ asset('frontend/asset/js/script.js') }}"></script>
</body>
</html>
