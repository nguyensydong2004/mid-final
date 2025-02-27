# 📚 Web Giới Thiệu và Đánh Giá Sách

## 📖 Giới thiệu
Đây là một nền tảng giúp người dùng khám phá, đánh giá sách và chia sẻ nhận xét với cộng đồng. Người dùng có thể duyệt qua nhiều thể loại sách khác nhau, đọc mô tả chi tiết và xem đánh giá từ những người đọc khác.

## 🚀 Tính năng chính

### 🔹 **Người dùng**
- Xem danh sách sách theo mô tả, tác giả và các tiêu chí khác.
- Xem thông tin giới thiệu của từng cuốn sách.
- Đánh giá sách bằng cách để lại nhận xét và xếp hạng sao.
- Cập nhật hồ sơ cá nhân (profile).
- Đăng xuất khỏi hệ thống.

### 🔸 **Admin**
- Thêm, chỉnh sửa hoặc xóa sách trong danh mục.
- Quản lý đánh giá và bình luận của người dùng.
- Cập nhật hồ sơ cá nhân của admin.
- Đăng xuất khỏi hệ thống.

### 🔧 Yêu cầu hệ thống
- PHP >= 8.2
- Composer
- Laravel >= 11

## 🔑 Quyền truy cập
- **Người dùng**: Xem sách, đánh giá, cập nhật profile.
- **Admin**: Quản lý sách, đánh giá, bình luận, cập nhật profile.

## 📜 API Routes
| Method  | Endpoint             | Mô tả                          |
|---------|----------------------|--------------------------------|
| GET     | /books               | Lấy danh sách sách            |
| GET     | /books/{id}          | Lấy chi tiết một cuốn sách    |
| POST    | /reviews             | Đánh giá sách                 |
| GET     | /profile             | Xem thông tin cá nhân         |
| PUT     | /profile             | Cập nhật thông tin cá nhân    |
| POST    | /admin/books         | Thêm sách (admin)             |
| PUT     | /admin/books/{id}    | Cập nhật thông tin sách       |
| DELETE  | /admin/books/{id}    | Xóa sách                      |

## 📌 Sơ đồ cấu trúc/chức năng

### 1. Các thành phần chính:
- **HomeController**: Quản lý trang chủ và thông tin sách.
- **AccountController**: Quản lý tài khoản người dùng (đăng ký, đăng nhập, hồ sơ, đổi mật khẩu).
- **BookController**: Quản lý sách (CRUD, chỉ dành cho admin).
- **ReviewController**: Quản lý đánh giá sách (CRUD, chỉ dành cho admin và người dùng đã đăng nhập).

### 2. Phân quyền:
- **Khách (guest)**:
  - Truy cập trang chủ, xem chi tiết sách.
  - Đăng ký và đăng nhập.
- **Người dùng đã đăng nhập (auth)**:
  - Xem, cập nhật hồ sơ cá nhân.
  - Đăng xuất.
  - Đổi mật khẩu.
  - Quản lý đánh giá của chính mình.
- **Admin (check-admin middleware)**:
  - Quản lý sách (tạo, chỉnh sửa, xóa).
  - Quản lý tất cả đánh giá.

## 📌 Sơ đồ tuần tự
- Đăng ký tài khoản
(asset/Picture1.png)
- Đăng nhập tài khoản
(asset/Picture2.png)
- Đăng xuất
(asset/Picture3.png)
- Quản lý sách (Admin)
(asset/Picture4.png)
- Viết đánh giá sách
(asset/Picture5.png)

## 📌 Liên hệ
Nếu có bất kỳ vấn đề nào, vui lòng liên hệ qua email **nguyensydong21112004@gmail.com**

