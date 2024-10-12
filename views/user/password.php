<?php ob_start(); ?>
<link rel="stylesheet" href="assets/css/profile.css" />
<link rel="stylesheet" href="assets/css/main0.css" />
<main>
    <div class="profile">
        <h1>Đổi mật khẩu</h1>
        <form method = 'POST' action = "">
            <div class="form-group">
                <label for="oldpassword">Mật khẩu hiện tại:</label>
                <input type = 'text' id="oldpassword" name="password" required>
            </div>
            <div class="form-group">
                <label for="newpassword">Mật khẩu mới:</label>
                <input type = 'text' id="newpassword" name="newpassword" placeholder="Nhập mật khẩu mới" required>
            </div>
            <div class="form-group">
                <label for="confirmpassword">Xác nhận mật khẩu mới:</label>
                <input type='text' id="confirmpassword" name="confirmpassword" placeholder="Xác nhận lại mật khẩu của bạn" required>
            </div>
            <div class="form-group">
                <button type="submit" name = 'submit'>Lưu thay đổi</button>
            </div>
        </form>
    </div>
</main>