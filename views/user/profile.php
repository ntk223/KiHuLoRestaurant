<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ</title>
</head>
<?php ob_start(); ?>
<table>Hồ sơ</table>
<link rel="stylesheet" href="assets/css/profile.css" />
<link rel="stylesheet" href="assets/css/main0.css" />
<main>
    <div class="profile">
        <h1>Hồ sơ của bạn</h1>
        <form method = 'POST' action = "">
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
            <!-- dang bug dong nay -->
            <div class="form-group">
                <button type="submit" name = 'submit'>Lưu thay đổi</button>
            </div>
        </form>
    </div>
</main>