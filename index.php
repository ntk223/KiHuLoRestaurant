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
    $role = isset($_GET['role']) ? $_GET['role']:"";
    if ( $role != null ) $page = $role;
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
        include "views/user/login.php";
        break;
    }
    ?>
  </body>
</html>