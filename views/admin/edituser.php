<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa người dùng</title>
    <link rel="stylesheet" href="assets/css/edituser.css">
</head>
<body>

    <header>
        <h1>Chỉnh sửa thông tin người dùng</h1>
    </header>

    <!-- Form chỉnh sửa người dùng -->
    <section class="form-section">
        <form action="index.php?action=edit_user&id=1" method="POST">
            <label for="name">Tên người dùng:</label>
            <input type="text" id="name" name="username" value="Nguyễn Văn A" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="nguyenvana@example.com" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Để trống nếu không muốn thay đổi mật khẩu">

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" value="0123456789">

            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" rows="4">123 Đường ABC, Quận XYZ</textarea>

            <label for="role">Vai trò:</label>
            <select id="role" name="role" required>
                <option value="Customer" selected>Customer</option>
                <option value="Seller">Seller</option>
                <option value="Admin">Admin</option>
            </select>

            <a href="#" class="button" onclick="submitForm()">Cập nhật</a>
        </form>
    </section>

</body>
</html>
