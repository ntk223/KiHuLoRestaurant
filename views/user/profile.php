<link rel="stylesheet" href="assets/css/profile.css" />
<link rel="stylesheet" href="assets/css/main0.css" />
<main>
    <div class="profile">
        <h1>Cập nhật hồ sơ</h1>
        <form method = 'POST'>
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" value = "<?php echo htmlspecialchars($_SESSION['username']); ?>" required>
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
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars((string)$_SESSION['address']);?>">
            </div>
            <div class="form-group">
                <label for="oldpassword">Mật khẩu:</label>
                <input type = 'text' id="oldpassword" name="password" value =<?php echo $_SESSION['password'];?> required>
            </div>
            <div class="form-group">
                <label for="newpassword">Mật khẩu mới:</label>
                <input type = 'text' id="newpassword" name="newpassword" value =<?php echo $_SESSION['password'];?>>
            </div>
            <div class="form-group">
                <label for="confirmpassword">Xác nhận mật khẩu mới:</label>
                <input type = 'text' id="confirmpassword" name="confirmpassword" value =<?php echo $_SESSION['password'];?>>
            </div>

            <div class="form-group">
                <button type="submit" name = 'submit'>Lưu thay đổi</button>
            </div>
        </form>
    </div>
</main>
