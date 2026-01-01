                <p><a href="{{ url('/') }}">
                   <img src="{{ asset('backend/admin/img/logo.png') }}" alt="Admin Logo">
                </a></p>
                <a href="http://127.0.0.1:8000/admin_dashboard" style="text-decoration: none; color: inherit;">
    <p style="font-size: 20px; font-family: 'Arial Narrow'; margin-left: 40px;">
        <i class="ri-home-6-line"></i> Thống kê
    </p>
</a>

                <!-- <p style=" font-size: 24px; font-family: 'Arial Narrow'; color: black; margin-left: 10px;">Quản lý</p> -->
                <ul class="menu">
                    <li class="dropdown">
                        <div class="menu-title"><i class="ri-user-3-line"></i> Người dùng <i
                                class="ri-arrow-down-s-line"></i></div>
                        <ul class="submenu">
                            <li><a href="http://127.0.0.1:8000/admin_Qlnd"><i style="margin-right: 10px;"
                                        class="ri-list-unordered"></i>Danh sách</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <div class="menu-title"><i class="ri-function-line"></i> Danh mục <i
                                 class="ri-arrow-down-s-line"></i></div>
                        <ul class="submenu">
                            <li><a href="http://127.0.0.1:8000/admin_dmuc"><i style="margin-right: 10px;"
                                        class="ri-list-unordered"></i>Danh sách</a></li>
                            <a href=" http://127.0.0.1:8000/admin_Dmucadd" style="text-decoration: none; color: inherit;">
                            <li>
                                <i style="margin-right: 10px;" class="ri-add-large-line"></i>
                                 Thêm mới
                            </li>
                            </a>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <div class="menu-title"><i class="ri-database-2-line"></i> Sản phẩm <i
                                class="ri-arrow-down-s-line"></i></div>
                        <ul class="submenu">
                            <li><a href="http://127.0.0.1:8000/admin_product"><i style="margin-right: 10px;"
                                        class="ri-list-unordered"></i>Danh sách</a></li>
                            <li><a href="{{ route('products.create') }}"><i style="margin-right: 10px;" class="ri-add-large-line"></i>Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <div class="menu-title"><i class="ri-shopping-bag-line"></i> Đơn hàng <i
                                class="ri-arrow-down-s-line"></i></div>
                        <ul class="submenu">
                            <li><a href="http://127.0.0.1:8000/admin_dhang"><i style="margin-right: 10px;"
                                        class="ri-list-unordered"></i>Danh sách</a></li>
                        </ul>
                    </li>
                </ul>