<?php ob_start(); ?>
<link rel="stylesheet" href="assets/css/profile.css" />
<link rel="stylesheet" href="assets/css/main0.css" />
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<main>
    <div class="profile">
        <h1>Đổi mật khẩu</h1>
        <form method="POST" action="" id="passwordForm">

        <div class="form-group">
            <label for="oldpassword">Mật khẩu hiện tại:</label>
            <input type="text" id="oldpassword" name="password" placeholder="Nhập mật khẩu hiện tại">
        </div>
        <div class="form-group">
            <label for="newpassword">Mật khẩu mới:</label>
            <input type="text" id="newpassword" name="newpassword" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="form-group">
            <label for="confirmpassword">Xác nhận mật khẩu mới:</label>
            <input type="text" id="confirmpassword" name="confirmpassword" placeholder="Xác nhận lại mật khẩu của bạn">
        </div>

        <!-- Thêm div để hiển thị thông báo lỗi -->
        <div id="error-message" style="color: red;margin: bottom 10px;"></div>
        
        <div class="form-group">
            <button type="submit" name="submit">Lưu thay đổi</button>
        </div>
    </form>
    </div>
</main>
<script src="assets/js/password.js"></script>