  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/KiHuLo Restaurant/assets/css/signup.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lora:wght@400&display=swap"
      rel="stylesheet"
    />
    <title>Sign up</title>
  </head>
  <body>
    <form action="" method="POST">
      <div class="registration-form">
        <h2 class="font-effect-shadow-multiple" style="font-size: 35px">
          <strong>SIGN UP</strong>
        </h2>
        <div class="form-group">
          <label for="name">Username:</label>
          <input
            type="text"
            id="name"
            name = "username"
            placeholder="Plese enter your username"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input
            type="password"
            id="password"
            name = "password"
            placeholder="Plese enter your password"
            required
          />
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input
            type="email"
            id="email"
            name = "email"
            placeholder="Plese enter your email"
            required
          />
        </div>
        <div class="form-group">
          <label for="phone">Your phone number:</label>
          <input
            type="tel"
            id="phone"
            name = "phone"
            placeholder="Plese enter your phone number"
            required
          />
        </div>
        <div class="form-group">
          <label for="address">Your address:</label>
          <input
            type="text"
            id="address"
            name = "address"
            placeholder="Plese enter your address"
            required
          />
        </div>
        <div class="radio-option">
          <form action="#">
            Sign up as:
            <input type="radio" id="user" name="role" value="user" required />
            <label for="user">User</label>
            <input type="radio" id="admin" name="role" value="admin" required />
            <label for="admin">Admin</label>
          </form>
        </div>
        <input type="hidden" id="registration-date" name="registration-date" />
        <div class="form-group">
          <button type="submit" name = "submit"><a href="#">Submit</a></button>
        </div>
      </div>
    </form>
  </body>
</html>

