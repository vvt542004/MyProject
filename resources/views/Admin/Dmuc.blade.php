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
                        <h1>Danh Sách danh mục</h1>
                    </div>
                    <div class="admin_dm">
                        <div class="admin_dm_header">
                            <ul>
                                <li>
                                    Show
                                    <select id="entryCountSelect">
                                        <option value="16">16</option>
                                        <option value="32">32</option>
                                        <option value="64">64</option>
                                        <option value="All">All</option>
                                    </select>
                                    entries
                                </li>
                                <li>Search:<input type="text" placeholder=""></li>
                            </ul>
                        </div>
                        <hr style="margin-top: 5px; ">
                        <div class="admin_dm_conten">
                            <table class="table_dm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="ri-arrow-up-down-line"></i> Tên danh mục</th>
                                        <th><i class="ri-arrow-up-down-line"></i> Hình ảnh</th>
                                        <th><i class="ri-arrow-up-down-line"></i> Trạng thái</th>
                                        <th><i class="ri-arrow-up-down-line"></i> Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>718</td>
                                        <td><img src="{{asset('backend/admin/img/dx-718-2.png')}}" alt="" width="100"></td>
                                        <td style="color: rgb(60, 233, 60); font-size: 20px;"><i
                                                class="ri-eye-fill"></i></td>
                                        <td><i class="ri-more-fill"></i></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>911</td>
                                        <td><img src="{{asset('backend/admin/img/dx-911-9.png')}}" alt="" width="100"></td>
                                        <td style="color: rgb(60, 233, 60); font-size: 20px;"><i
                                                class="ri-eye-fill"></i></td>
                                        <td><i class="ri-more-fill"></i></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Taycan</td>
                                        <td><img src="{{asset('backend/admin/img/dx-taycan3.png')}}" alt="" width="100"></td>
                                        <td style="color: rgb(60, 233, 60); font-size: 20px;"><i
                                                class="ri-eye-fill"></i></td>
                                        <td><i class="ri-more-fill"></i></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Panamera</td>
                                        <td><img src="{{asset('backend/admin/img/dx-pm2.png')}}" alt="" width="100"></td>
                                        <td style="color: rgb(60, 233, 60); font-size: 20px;"><i
                                                class="ri-eye-fill"></i></td>
                                        <td><i class="ri-more-fill"></i></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Macan</td>
                                        <td><img src="{{asset('backend/admin/img/dx-mc3.png')}}" alt="" width="100"></td>
                                        <td style="color: rgb(60, 233, 60); font-size: 20px;"><i
                                                class="ri-eye-fill"></i></td>
                                        <td><i class="ri-more-fill"></i></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Cayenne</td>
                                        <td><img src="{{asset('backend/admin/img/dx-ce5.png')}}" alt="" width="100"></td>
                                        <td style="color: rgb(60, 233, 60); font-size: 20px;"><i
                                                class="ri-eye-fill"></i></td>
                                        <td><i class="ri-more-fill"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>




                    </div>

                </main>

            </div>
        </div>

    </section>




</body>
<script src="{{asset('backend/admin/js/style.js')}}"></script>