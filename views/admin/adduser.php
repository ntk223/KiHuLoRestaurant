<link rel="stylesheet" href="assets/css/adduser.css">
<main>
    <main class ="adduser">
<section class="form-section">
    <h2>Thêm người dùng mới</h2>
    <form action="#" method="POST">
        <label for="name">Tên người dùng:</label>
        <input type="text" id="name" name="username" required>

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
        <input type="submit" name="submit" class="button" value="Thêm người dùng">
    </form>
    <a href="index.php?role=admin&manage=customer" class="button">Trở về</a>
</section>
</main>
</main>