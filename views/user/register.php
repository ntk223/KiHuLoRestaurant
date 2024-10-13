  
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
    <link rel="stylesheet" href="assets/css/signup.css"/>
    <title>Sign up</title>
  </head>
  <body>
    <form action="/login" method="POST">
      <div class="registration-form">
        <h2 class="font-effect-shadow-multiple" style="font-size: 35px">
          <strong>SIGN UP</strong>
        </h2>
        <div class="form-group">
          <label for="name">Username:</label>
          <input
            type="text"
            name="username"
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
            name="password"
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
            name="email"
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
            name="phone"
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
            name="address"
            id="address"
            name = "address"
            placeholder="Plese enter your address"
            required
          />
        </div>
        <div class="form-group">
          <button type="submit" name = "submit">Submit</button>
        </div>
      </div>
    </form>
  </body>
</html>