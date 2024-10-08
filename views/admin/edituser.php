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
        <form action="" method="POST">
            <label for="name">Tên người dùng:</label>
            <input type="text" id="name" name="username" value=<?php echo $user_inf['username']?> required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value=<?php echo $user_inf['email']?> required>

            <label for="password">Mật khẩu:</label>
            <input  id="password" name="password" value=<?php echo $user_inf['password']?>>

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" value=<?php echo $user_inf['phone']?>>

            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" rows="4"><?php echo $user_inf['address']?></textarea>

            <label for="role">Vai trò:</label>
            <select id="role" name="role" required>
                <option value="Customer" selected>Customer</option>
                <option value="Seller">Seller</option>
            </select>
            <input type="submit" name="submit" class = "button" value="Cập nhật">
        </form>
        <a href="index.php?role=admin&manage=customer" class="button">Trở về</a>

    </section>

</body>
</html>
