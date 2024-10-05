<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <link rel="stylesheet" href="assets/css/user.css"> 
</head>
<body>


    <header>
        <h1>Quản lý Người dùng</h1>
    </header>

    
    <section class="form-section">
        <h2>Thêm người dùng mới</h2>
        <form action="#" method="POST">
            <label for="name">Tên người dùng:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone">

            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address"></textarea>

            <label for="role">Vai trò:</label>
            <select id="role" name="role">
                <option value="Customer">Customer</option>
                <option value="Seller">Seller</option>
            </select>

            <button type="submit">Thêm người dùng</button>
        </form>
    </section>

    <!-- Bảng người dùng hiện có -->
    <section class="user-table-section">
        <h2>Danh sách người dùng</h2>
        <form action="#" method="POST">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Vai trò</th>
                    <th>Ngày đăng ký</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Đây sẽ là nơi dữ liệu người dùng được hiển thị -->
                <tr>
                    <td>1</td>
                    <td>Nguyen Nhat Huy</td>
                    <td>nguyennhathuy@example.com</td>
                    <td>0123456789</td>
                    <td>123 Đường ABC, Quận X, TP BN</td>
                    <td>Seller</td>
                    <td>2024-10-05</td>
                    <td>
                        <button>Sửa</button>
                        <button>Xóa</button>
                    </td>
                </tr>
                <!-- Thêm nhiều dòng khác với dữ liệu thực tế -->
            </tbody>
        </table>
        </form>
    </section>

</body>
</html>
