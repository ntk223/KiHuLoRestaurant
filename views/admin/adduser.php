<link rel="stylesheet" href="assets/css/user.css">
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

        <button type="submit" name = "submit" value = "add">Thêm người dùng</button>
    </form>
</section>