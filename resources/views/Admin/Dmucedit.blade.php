<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.parts.head')
    <style>
        .form-box {
            max-width: 500px;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }

        .form-box label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
        }

        .form-box input {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .form-box button {
            padding: 8px 18px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: #fff;
            cursor: pointer;
        }

        .form-box button:hover {
            background: #1e40af;
        }

        .preview-img {
            margin-bottom: 15px;
        }

        .preview-img img {
            width: 120px;
            border-radius: 6px;
        }
    </style>
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
                    <h1>Sửa danh mục</h1>
                </div>

                <div class="admin_dm">
                    <div class="admin_dm_conten">
                        <div class="form-box">

                            <form action="{{ route('admin.category.update', $category->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Tên danh mục -->
                                <label>Tên danh mục</label>
                                <input type="text"
                                       name="name"
                                       value="{{ old('name', $category->name) }}"
                                       required>

                                <!-- Ảnh hiện tại -->
                                <div class="preview-img">
                                    <label>Ảnh hiện tại</label><br>
                                    @if($category->image)
                                        <img src="{{ asset('storage/'.$category->image) }}">
                                    @else
                                        <span>Không có ảnh</span>
                                    @endif
                                </div>

                                <!-- Ảnh mới -->
                                <label>Chọn ảnh mới (nếu muốn đổi)</label>
                                <input type="file" name="image">

                                <!-- Nút -->
                                <button type="submit">💾 Cập nhật</button>
                                <a href="{{ route('admin.categories') }}"
                                   style="margin-left:10px">
                                    ← Quay lại
                                </a>
                            </form>

                        </div>
                    </div>
                </div>

            </main>

        </div>
    </div>
</section>
</body>
</html>
