# Hướng dẫn Tính Năng Giỏ Hàng (Shopping Cart)

## Mô tả
Hệ thống giỏ hàng cho phép người dùng:
- Thêm sản phẩm vào giỏ hàng
- Xóa sản phẩm khỏi giỏ hàng
- Cập nhật số lượng sản phẩm
- Xem danh sách giỏ hàng
- Xóa toàn bộ giỏ hàng

## Cấu trúc tệp được tạo

### 1. Models (app/Models/)
- `Product.php` - Model sản phẩm
- `Cart.php` - Model giỏ hàng
- `CartItem.php` - Model mục giỏ hàng

### 2. Migrations (database/migrations/)
- `2025_12_05_000001_create_products_table.php` - Bảng sản phẩm
- `2025_12_05_000002_create_carts_table.php` - Bảng giỏ hàng
- `2025_12_05_000003_create_cart_items_table.php` - Bảng mục giỏ hàng

### 3. Controllers (app/Http/Controllers/)
- `CartController.php` - Xử lý logic giỏ hàng

### 4. Routes (routes/api.php)
API endpoints:
- `POST /api/cart/add` - Thêm sản phẩm vào giỏ hàng
- `GET /api/cart` - Lấy giỏ hàng hiện tại
- `POST /api/cart/remove` - Xóa sản phẩm khỏi giỏ hàng
- `POST /api/cart/update-quantity` - Cập nhật số lượng
- `POST /api/cart/clear` - Xóa toàn bộ giỏ hàng

### 5. Frontend JavaScript (public/frontend/asset/js/)
- `cart.js` - Class CartManager để quản lý giỏ hàng từ phía client

### 6. Views (resources/views/User/components/)
- `product-card.blade.php` - Component hiển thị sản phẩm với nút "Thêm vào giỏ hàng"

## Các bước triển khai

### Bước 1: Chạy migrations
```bash
php artisan migrate
```

### Bước 2: Thêm CSRF Token vào Layout Chính
Thêm dòng này vào trong tag `<head>` của file layout chính (resources/views/layouts/app.blade.php hoặc file tương tự):
```html
<meta name="csrf-token" content="{{ csrf_token() }}">
```

### Bước 3: Import Cart.js vào Trang
Thêm vào cuối file Blade view hoặc layout:
```html
<script src="{{ asset('frontend/asset/js/cart.js') }}"></script>
```

### Bước 4: Sử dụng Product Card Component
Trong trang hiển thị sản phẩm, sử dụng component:
```blade
@include('User.components.product-card', ['product' => $product])
```

Hoặc nếu có nhiều sản phẩm:
```blade
@forelse($products as $product)
    @include('User.components.product-card', ['product' => $product])
@empty
    <p>Không có sản phẩm</p>
@endforelse
```

## Sử dụng Cart Manager từ JavaScript

### Thêm sản phẩm vào giỏ hàng:
```javascript
cartManager.addToCart(productId, quantity);
```

### Lấy giỏ hàng hiện tại:
```javascript
const cart = await cartManager.getCart();
console.log(cart);
```

### Xóa sản phẩm:
```javascript
cartManager.removeFromCart(cartItemId);
```

### Cập nhật số lượng:
```javascript
cartManager.updateQuantity(cartItemId, newQuantity);
```

### Xóa toàn bộ giỏ hàng:
```javascript
cartManager.clearCart();
```

## Database Schema

### Bảng: products
```
- id (primary key)
- name (string)
- description (text, nullable)
- price (decimal)
- quantity (integer)
- category (string, nullable)
- image (string, nullable)
- status (string, default: 'active')
- created_at
- updated_at
```

### Bảng: carts
```
- id (primary key)
- user_id (foreign key, nullable)
- session_id (string, nullable)
- total_price (decimal)
- created_at
- updated_at
```

### Bảng: cart_items
```
- id (primary key)
- cart_id (foreign key)
- product_id (foreign key)
- quantity (integer)
- price (decimal)
- created_at
- updated_at
```

## Tính năng bổ sung

### Kiểm tra số lượng sản phẩm
Hệ thống tự động kiểm tra xem số lượng sản phẩm trong kho có đủ không trước khi thêm vào giỏ.

### Tính toán tổng giá
Hệ thống tự động tính toán tổng giá của giỏ hàng dựa trên giá sản phẩm và số lượng.

### Session-based và User-based Cart
- Nếu người dùng chưa đăng nhập, giỏ hàng được lưu dựa trên session_id
- Nếu người dùng đã đăng nhập, giỏ hàng được liên kết với user_id

### Thông báo người dùng
Hệ thống sử dụng notification toast để thông báo các thao tác thành công hoặc lỗi.

## Ghi chú
- Các request API yêu cầu CSRF Token
- Tất cả các input được validate trên server
- Giỏ hàng được lưu trữ trong cơ sở dữ liệu (không phải localStorage)
