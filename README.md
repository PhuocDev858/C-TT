# 🏍️ Website Quản Lý Xe Máy B2C

> Hệ thống quản lý bán xe máy trực tuyến được xây dựng bằng PHP Laravel và MySQL

## 📖 Mô tả dự án

Website bán xe máy B2C (Business to Customer) với đầy đủ tính năng quản lý sản phẩm, đơn hàng, khách hàng và hệ thống authentication hoàn chỉnh.

## 🚀 Tính năng chính

### 👥 **Dành cho khách hàng (Frontend)**
- 🏠 Trang chủ với banner carousel và sản phẩm nổi bật
- 🔍 Xem danh sách sản phẩm với bộ lọc và tìm kiếm
- 📱 Giao diện responsive, thân thiện với mobile
- 🔐 Đăng ký, đăng nhập, quản lý hồ sơ
- 📋 Xem lịch sử đơn hàng

### 🎛️ **Dành cho quản trị viên (Backend)**
- 📊 Dashboard tổng quan
- 🏷️ Quản lý danh mục sản phẩm
- 🏭 Quản lý thương hiệu
- 🏍️ Quản lý sản phẩm (CRUD)
- 👤 Quản lý khách hàng
- 📦 Quản lý đơn hàng
- 👨‍💼 Quản lý người dùng

## 🛠️ Công nghệ sử dụng

- **Backend**: Laravel 11.x
- **Frontend**: Bootstrap 5, HTML5, CSS3, JavaScript
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Icons**: Font Awesome
- **Carousel**: Owl Carousel

## 📁 Cấu trúc thư mục

```
C-TT/
├── BE-QLXM/              # Backend API (Laravel)
├── fe-admin-quanlyxe/    # Frontend Admin & Client (Laravel Fullstack)
└── README.md
```

## ⚙️ Cài đặt và chạy dự án

### 1. Clone repository
```bash
git clone https://github.com/PhuocDev858/C-TT.git
cd C-TT/fe-admin-quanlyxe
```

### 2. Cài đặt dependencies
```bash
composer install
npm install
```

### 3. Cấu hình database
```bash
cp .env.example .env
php artisan key:generate
```

Chỉnh sửa file `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qlxm
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Chạy migration và seeder
```bash
php artisan migrate
php artisan db:seed
```

### 5. Khởi động server
```bash
php artisan serve
```

Truy cập: `http://127.0.0.1:8000`

## 📱 Screenshots & Demo

- **Trang chủ**: Banner carousel + sản phẩm nổi bật
- **Trang sản phẩm**: Lọc theo danh mục, thương hiệu, tìm kiếm
- **Admin Dashboard**: Quản lý toàn diện hệ thống
- **Authentication**: Đăng nhập/đăng ký với UI đẹp

## 👨‍💻 Tác giả

**PhuocDev858**
- GitHub: [@PhuocDev858](https://github.com/PhuocDev858)

## 📄 License

Dự án được phát hành dưới giấy phép [MIT License](https://opensource.org/licenses/MIT).

---

Được xây dựng với ❤️ bằng Laravel Framework
