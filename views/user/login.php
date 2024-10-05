  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/KiHuLoRestaurant/assets/css/login.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lora:wght@400&display=swap"
      rel="stylesheet"
    />
    <title>Log in</title>
  </head>
  <body>
    <form action="#" method="POST">
      <div class="registration-form">
        <h2 class="font-effect-shadow-multiple" style="font-size: 35px">
          <strong>Log in</strong>
        </h2>
        <div class="form-group">
          <label for="email">Email:</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Plese enter your email"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Plese enter your password"
            required
          />
        </div>
        <div class="radio-option">
          <form action="#">
            Sign up as:
            <input type="radio" id="user" name="role" value="Customer" required />
            <label for="user">User</label>
            <input type="radio" id="admin" name="role" value="Seller" required />
            <label for="admin">Admin</label>
          </form>
        </div>
        <p>Bạn chưa có tài khoản?</p>
        <p>Đăng ký ngay <span><a href="index.php?role=customer&page=register" id="gotoregister">tại đây</a></span></p>
        <div class="form-group">
          <button type="submit" id="submit">Submit</button>
        </div>
      </div>
    </form>
  </body>
</html>