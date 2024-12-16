<header>
<link rel="stylesheet" href="assets/css/headerandfooter.css" />
<link rel="stylesheet" href="assets/css/menu.css"/>

<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
      <div class="name_web">
        <h2 class="font-effect-shadow-multiple">KiHuLo</h2>
        <h2 class="font-effect-shadow-multiple">Restaurant</h2>
      </div>
      <div class="contact">
        <a href="https://www.facebook.com/">
          <img src="assets/images/facebook.png" alt="icon facebook" />
        </a>
        <a href="https://www.instagram.com/">
          <img src="assets/images/instagram.png" alt="icon instagram" />
        </a>
        <a href="https://www.youtube.com/">
          <img src="assets/images/youtube.png" alt="icon youtube" />
        </a>
      </div>
      <div class="search-bar">
        <?php include_once "searchbar.php"; ?>
      </div>
      <div class="users">
        <div class="users-info">
          <img src="assets/images/user-img.png" alt="user-img" />
          <p class="user-name"><?php echo $_SESSION['username']; ?></p>
          
          <div class="setting-user">
            <a href="index.php?role=customer&page=profile">Thông tin</a>
            <a href="index.php?role=customer&page=password">Đổi mật khẩu</a>
            <a href="index.php?in=logout">Đăng xuất</a>
          </div>
        </div>
      </div>
      <?php include("views/user/navbar.php");?>
</header>