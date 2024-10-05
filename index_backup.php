<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
  </head>
  <body>
    
    <?php 
    $page = isset($_GET['page']) ? $_GET['page']:"";
    switch ($page) {
      case 'customer':
        include "routes/UserRoute.php";
        break;
      case 'admin':
        include "controllers/AdminController.php";
        $adminController = new AdminController();
        $adminController->register();
        break;
      default:
        echo "<a href='index.php?page=customer&manage=register' class='href'>dang ky </a>";
        echo "<br>";
        echo "<a href='index.php?page=admin' class='href'> dang nhap</a>" ;
        include "views/user/login.php";
        break;
    }
    ?>
  </body>
</html>