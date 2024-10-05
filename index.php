
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Home</title>
  </head>
  <body>
    <?php include("common/header.php");?>
    <main>
    <?php include("views/user/sidebar.php");
        include "controllers/MenuController.php";
        $menuController = new MenuController();
        $menuController->Menulist();?>
    </main>
    <?php include("common/footer.php");?>
  </body>
</html>

