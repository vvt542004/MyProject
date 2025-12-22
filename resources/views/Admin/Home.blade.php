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
                        <h1>Danh Sách người dùng</h1>
                    </div>
                    <div class="admin_right_content">
                        <div class="sub_conten_1">
                            <ul>
                                <li><img src="{{asset('backend/admin/img/dv-bh5.jpg')}}" alt=""></li>
                                <li style="font-weight: bold;">MeoNgo</li>
                                <li>meongoo@gmail.com</li>
                                <li><button style="color: rgb(52, 225, 52);">USER</button></li>
                            </ul>
                            <hr style="margin-top: 24px; color: gray;">
                            <p><i style="font-size: 10px; color: red;" class="ri-circle-fill"></i><span>Chưa xác thực
                                    email</span><i class="ri-more-2-line"></i></p>


                        </div>
                        <div class="sub_conten_1" style="margin-left: 20px;">
                            <ul>
                                <li><img src="{{asset('backend/admin/img/dv-bh2.jpg')}}" alt=""></li>
                                <li style="font-weight: bold;">Viết Tuấn</li>
                                <li>Tuan@gmail.com</li>
                                <li><button style="color: red">ADMIN</button></li>
                            </ul>
                            <hr style="margin-top: 24px; color: gray;">
                            <p><i style="font-size: 10px; color: rgb(54, 218, 71);"
                                    class="ri-circle-fill"></i><span>Chưa xác thực
                                    email</span><i class="ri-more-2-line"></i></p>


                        </div>
                        <div class="sub_conten_1" style="margin-left: 20px;">
                            <ul>
                                <li><img src="{{asset('backend/admin/img/dv-bh6.jpg')}}" alt=""></li>
                                <li style="font-weight: bold;">Doremon</li>
                                <li>Doremon@gmail.com</li>
                                <li><button style="color: rgb(52, 225, 52);">USER</button></li>
                            </ul>
                            <hr style="margin-top: 24px; color: gray;">
                            <p><i style="font-size: 10px; color: red;" class="ri-circle-fill"></i><span>Chưa xác thực
                                    email</span><i class="ri-more-2-line"></i></p>
                        </div>
                         <div class="sub_conten_1" style="margin-left: 20px;">
                            <ul>
                                <li><img src="{{asset('backend/admin/img/dv-bh4.jpg')}}" alt=""></li>
                                <li style="font-weight: bold;">Chongoo</li>
                                <li>Chongoo@gmail.com</li>
                                <li><button style="color: rgb(52, 225, 52);">USER</button></li>
                            </ul>
                            <hr style="margin-top: 24px; color: gray;">
                            <p><i style="font-size: 10px; color: red;" class="ri-circle-fill"></i><span>Chưa xác thực
                                    email</span><i class="ri-more-2-line"></i></p>
                        </div>

                    </div>
                </main>

            </div>
        </div>

    </section>




</body>
<script src="{{asset('backend/admin/js/style.js')}}"></script>
</html>