<?php ob_start(); ?>
<link rel="stylesheet" href="assets/css/profile.css" />
<link rel="stylesheet" href="assets/css/main0.css" />
<main>
    <div class="profile">
        <h1>Đổi mật khẩu</h1>
        <form method = 'POST' action = "">
            <div class="form-group">
                <label for="oldpassword">Mật khẩu hiện tại:</label>
                <input type = 'text' id="oldpassword" name="password" value =<?php echo $_SESSION['password'];?> required>
            </div>
            <div class="form-group">
                <label for="newpassword">Mật khẩu mới:</label>
                <input type = 'text' id="newpassword" name="apassword" placeholder="Nhập mật khẩu mới" value =<?php echo $_SESSION['password']."s";?> >
            </div>
            <div class="form-group">
                <label for="confirmpassword">Xác nhận mật khẩu mới:</label>
                <input type='text' id="confirmpassword" name="bpassword" placeholder="Xác nhận lại mật khẩu của bạn" value=<?php echo $_SESSION['password']."s";?> >
            </div>
            <div class="form-group">
                <button type="submit" name = 'submit'>Lưu thay đổi</button>
            </div>
        </form>
    </div>
</main>