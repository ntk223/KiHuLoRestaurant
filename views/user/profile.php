<link rel="stylesheet" href="assets/css/profile.css" />
    <div class="profile">
        <h1>Cập nhật hồ sơ</h1>
        <form>
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" value = <?php echo $_SESSION['username']; ?> required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value = <?php echo $_SESSION['email'];?> required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" value =<?php echo $_SESSION['phone'];?> required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" value=<?php echo $_SESSION['address'];?>>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type = 'text' id="password" name="password" value =<?php echo $_SESSION['password'];?> required>
            </div>
            <div class="form-group">
                <button type="submit" name = 'submit'>Lưu thay đổi</button>
            </div>
        </form>
    </div>
</body>
</html>
