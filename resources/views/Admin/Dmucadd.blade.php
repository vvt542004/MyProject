<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.parts.head')
</head>
@if(session('success'))
    <div id="toast-success">
        ✅ {{ session('success') }}
    </div>
@endif
<body>

<section>
    <div class="admin_all">

        {{-- LEFT --}}
        <div class="admin_left">
            @include('Admin.parts.admin_left')
        </div>

        {{-- RIGHT --}}
        <div class="admin_right">

            {{-- HEADER --}}
            <div class="admin-right-header">
                @include('Admin.parts.admin_right_header')
            </div>

            <main>
                <div class="admin_right_text">
                    <h1>Thêm danh mục</h1>
                </div>
<div class="category-container">

    <form action="{{ route('admin.category.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="category-form">
        @csrf

        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text"
                   name="name"
                   placeholder="Nhập tên danh mục"
                   required>
        </div>

        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn-submit">
            ➕ Thêm danh mục
        </button>
    </form>
</div>


            </main>

        </div>
    </div>
</section>

<script src="{{ asset('backend/admin/js/style.js') }}"></script>
</body>
</html>
