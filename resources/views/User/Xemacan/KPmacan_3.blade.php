<!DOCTYPE html>
<html lang="en">

<head>
   @include('User.parts.head')
</head>

<body>
    @include('User.parts.header')
    <!--Dich vu-->
    <section class="Dv-slider">
        <img src="{{asset('frontend/asset/images/kp_mc_3_1.jpg')}}" alt="">
    </section>
    <section class="newcar-overhead" style="height: 80px;">


        <div class="overhead-menu">
            <p><i class="ri-menu-line"></i></p>
            <div class="dropdown-menu">
                <div class="menu-item"><a href="http://127.0.0.1:8000/">Trang chủ</a><span  style="margin-left: 196px;"><i class="ri-arrow-up-wide-line"></i></span></div>
                <div class="menu-item"><a href="http://127.0.0.1:8000/dongxe">Về đầu trang</a><span  style="margin-left: 180px;"><i class="ri-arrow-up-wide-line"></i></span></div>

            </div>
        </div>

    </section>

   @include('User.Xemacan.main')

    <!--car-end-->
    <section class="car-end">
        <div class="car-end-text-one">
            <p><i class="ri-store-line"></i>Store Việt Nam 2025</p>
        </div>
        <div class="car-end-text-two">
            <p><u>Chính sách quyền riêng tư </u></p>
        </div>
    </section>
 <script src="{{asset('frontend/asset/js/dongxe.js')}}"></script>