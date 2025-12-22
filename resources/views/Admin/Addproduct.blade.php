<!DOCTYPE html>
<html lang="vi">
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
                        <h1>Thêm Sản Phẩm Mới</h1>
                    </div>

                    <div class="success-message" id="successMsg">
                        ✓ Sản phẩm đã được thêm thành công!
                    </div>

                    <div class="error-message" id="errorMsg">
                        ✗ Có lỗi xảy ra, vui lòng kiểm tra lại!
                    </div>

                    <form id="addProductForm" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- THÔNG TIN CƠ BẢN -->
                        <div class="form-section">
                            <div class="form-section-title">📋 Thông Tin Cơ Bản</div>

                            <div class="form-group">
                                <label for="name">Tên Sản Phẩm <span class="required">*</span></label>
                                <input type="text" id="name" name="name" required placeholder="VD: 718 Boxster S">
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="slug">Slug (URL) <span class="required">*</span></label>
                                    <input type="text" id="slug" name="slug" required placeholder="VD: 718-boxster-s">
                                    <p class="help-text">Tự động tạo từ tên nếu để trống</p>
                                </div>

                                <div class="form-group">
                                    <label for="category">Dòng Xe <span class="required">*</span></label>
                                    <select id="category" name="category" required>
                                        <option value="">-- Chọn dòng xe --</option>
                                        <option value="718">718</option>
                                        <option value="911">911</option>
                                        <option value="Panamera">Panamera</option>
                                        <option value="Cayenne">Cayenne</option>
                                        <option value="Macan">Macan</option>
                                        <option value="Taycan">Taycan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Mô Tả Ngắn</label>
                                <input type="text" id="subtitle" name="subtitle" placeholder="VD: Giá tiêu chuẩn 4.880.000.000 VNĐ">
                            </div>

                            <div class="form-group">
                                <label for="description">Mô Tả Chi Tiết</label>
                                <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm chi tiết..."></textarea>
                            </div>
                        </div>

                        <!-- THÔNG TIN GIÁ -->
                        <div class="form-section">
                            <div class="form-section-title">💰 Thông Tin Giá</div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="price_vnd">Giá (VNĐ) <span class="required">*</span></label>
                                    <input type="number" id="price_vnd" name="price_vnd" required placeholder="VD: 4880000000">
                                    <p class="help-text">Nhập số tiền (không có dấu chấm)</p>
                                </div>

                                <div class="form-group">
                                    <label for="price_display">Giá Hiển Thị (Định Dạng)</label>
                                    <input type="text" id="price_display" name="price_display" placeholder="VD: 4.880.000.000 VNĐ">
                                    <p class="help-text">Sẽ tự động tạo từ Giá VNĐ nếu để trống</p>
                                </div>
                            </div>
                        </div>

                        <!-- THÔNG SỐ KỸ THUẬT -->
                        <div class="form-section">
                            <div class="form-section-title">⚙️ Thông Số Kỹ Thuật</div>

                            <div class="form-row-3">
                                <div class="form-group">
                                    <label for="power_ps">Công Suất (PS)</label>
                                    <input type="number" id="power_ps" name="power_ps" placeholder="VD: 350">
                                </div>

                                <div class="form-group">
                                    <label for="power_kw">Công Suất (kW)</label>
                                    <input type="number" id="power_kw" name="power_kw" placeholder="VD: 257">
                                </div>

                                <div class="form-group">
                                    <label for="power">Công Suất (Text)</label>
                                    <input type="text" id="power" name="power" placeholder="VD: 257 kW (350 PS)">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="torque_nm">Mô Men Xoắn (Nm)</label>
                                    <input type="number" id="torque_nm" name="torque_nm" placeholder="VD: 420">
                                </div>

                                <div class="form-group">
                                    <label for="acceleration_sec">Tăng Tốc 0-100 km/h (giây)</label>
                                    <input type="number" id="acceleration_sec" name="acceleration_sec" step="0.1" placeholder="VD: 4.4">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="top_speed_kmh">Tốc Độ Tối Đa (km/h)</label>
                                    <input type="number" id="top_speed_kmh" name="top_speed_kmh" placeholder="VD: 285">
                                </div>

                                <div class="form-group">
                                    <label for="consumption_l_per_100km">Tiêu Thụ Kết Hợp (L/100km)</label>
                                    <input type="number" id="consumption_l_per_100km" name="consumption_l_per_100km" step="0.01" placeholder="VD: 9.56">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="spec_note">Ghi Chú Kỹ Thuật</label>
                                <textarea id="spec_note" name="spec_note" placeholder="Nhập ghi chú bổ sung về kỹ thuật..."></textarea>
                            </div>
                        </div>

                        <!-- KÍCH THƯỚC -->
                        <div class="form-section">
                            <div class="form-section-title">📏 Kích Thước</div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="length_mm">Chiều Dài (mm)</label>
                                    <input type="number" id="length_mm" name="length_mm" placeholder="VD: 4379">
                                </div>

                                <div class="form-group">
                                    <label for="height_mm">Chiều Cao (mm)</label>
                                    <input type="number" id="height_mm" name="height_mm" placeholder="VD: 1280">
                                </div>
                            </div>
                        </div>

                        <!-- HÌNH ẢNH -->
                        <div class="form-section">
                            <div class="form-section-title">🖼️ Hình Ảnh</div>

                            <div class="form-group">
                                <label for="main_image">Ảnh Chính (Hình Bìa)</label>
                                <input type="file" id="main_image" name="main_image" accept="image/*">
                                <p class="help-text">Định dạng: JPG, PNG (Kích thước tối đa: 5MB)</p>
                                <div class="image-preview" id="mainImagePreview"></div>
                            </div>

                            <div class="form-group">
                                <label for="gallery">Thư Viện Ảnh (Gallery)</label>
                                <input type="file" id="gallery" name="gallery[]" multiple accept="image/*">
                                <p class="help-text">Chọn nhiều ảnh. Định dạng: JPG, PNG</p>
                                <div id="galleryPreview"></div>
                            </div>
                        </div>

                        <!-- KHOẢNG TỒN KHO & TRẠNG THÁI -->
                        <div class="form-section">
                            <div class="form-section-title">📦 Kho & Trạng Thái</div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="stock">Số Lượng Tồn Kho</label>
                                    <input type="number" id="stock" name="stock" value="0" min="0" placeholder="VD: 5">
                                </div>

                                <div class="form-group">
                                    <label>Trạng Thái</label>
                                    <div class="radio-group">
                                        <label style="margin: 0; font-weight: normal;">
                                            <input type="radio" name="is_active" value="1" checked> Kích Hoạt
                                        </label>
                                        <label style="margin: 0; font-weight: normal;">
                                            <input type="radio" name="is_active" value="0"> Ẩn
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- NÚT HÀNH ĐỘNG -->
                        <div class="form-section">
                            <div class="button-group">
                                <button type="reset" class="btn-reset">🔄 Xóa Tất Cả</button>
                                <a href="{{ route('admin.product') }}" class="btn btn-back">← Quay Lại</a>
                                <button type="submit" class="btn-submit">💾 Thêm Sản Phẩm</button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </section>

    <script>
        // Auto-generate slug from name
        document.getElementById('name').addEventListener('change', function() {
            const slug = this.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            document.getElementById('slug').value = slug;
        });

        // Auto-format price display
        document.getElementById('price_vnd').addEventListener('change', function() {
            const price = parseInt(this.value);
            if (!isNaN(price)) {
                const formatted = price.toLocaleString('vi-VN') + ' VNĐ';
                document.getElementById('price_display').value = formatted;
            }
        });

        // Preview main image
        document.getElementById('main_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('mainImagePreview').innerHTML =
                        '<img src="' + event.target.result + '" alt="Preview">';
                };
                reader.readAsDataURL(file);
            }
        });

        // Preview gallery images
        document.getElementById('gallery').addEventListener('change', function(e) {
            const galleryPreview = document.getElementById('galleryPreview');
            galleryPreview.innerHTML = '';

            Array.from(e.target.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    galleryPreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</body>
</html>
<script src="{{asset('backend/admin/js/style.js')}}"></script>