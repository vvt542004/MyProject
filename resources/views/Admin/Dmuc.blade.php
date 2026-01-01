<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.parts.head')
</head>

<body>
<section>
    <div class="admin_all">

        <!-- LEFT -->
        <div class="admin_left">
            @include('Admin.parts.admin_left')
        </div>

        <!-- RIGHT -->
        <div class="admin_right">

            <div class="admin-right-header">
                @include('Admin.parts.admin_right_header')
            </div>

            <main>
                <div class="admin_right_text">
                    <h1>Danh sách danh mục</h1>
                </div>

                {{-- thông báo --}}
                @if(session('success'))
                    <p style="color:green">{{ session('success') }}</p>
                @endif
                @if(session('error'))
                    <p style="color:red">{{ session('error') }}</p>
                @endif

                <div class="admin_dm">
                    <div class="admin_dm_conten">
                        <table class="table_dm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th>Hình ảnh</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        <td>{{ $category->name }}</td>

                                        <td>
                                            @if($category->image)
                                                <img src="{{ asset('storage/' . $category->image) }}"
                                                     width="80"
                                                     style="border-radius:6px">
                                            @else
                                                <span>Không có ảnh</span>
                                            @endif
                                        </td>

<td>
    <div class="action-box">
        <i class="ri-more-fill action-icon"></i>

        <div class="action-menu">
            <a href="{{ route('admin.dmuc.products', $category->id) }}">Xem</a>

            <a href="{{ route('admin.category.edit', $category->id) }}">Sửa</a>

            <form action="{{ route('admin.category.destroy', $category->id) }}"
                  method="POST"
                  onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                @csrf
                @method('DELETE')
                <button type="submit">Xóa</button>
            </form>
        </div>
    </div>
</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align:center">
                                            Chưa có danh mục nào
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </main>

        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // mở menu khi click ...
    document.querySelectorAll('.action-icon').forEach(icon => {
        icon.addEventListener('click', function (e) {
            e.stopPropagation();

            // đóng menu khác
            document.querySelectorAll('.action-menu').forEach(menu => {
                if (menu !== this.nextElementSibling) {
                    menu.style.display = 'none';
                }
            });

            const menu = this.nextElementSibling;
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        });
    });

    // click ra ngoài thì đóng
    document.addEventListener('click', function () {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.style.display = 'none';
        });
    });

});
</script>

</body>

<script src="{{ asset('backend/admin/js/style.js') }}"></script>
</html>
