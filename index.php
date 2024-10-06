<<<<<<< HEAD
=======

<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
>>>>>>> b05076734ad600877ae0b4045fef4cc35f916a50
<?php 
include_once 'config/session.php';
Session::init();

if (isset($_GET['role']))
{
    $role = $_GET['role'];
    if ($role == "customer")
    {
        Session::checkSession();
        include_once 'common/header.php';
        include_once("views/user/sidebar.php");
        include_once 'routes/Homeroute.php';
        include_once 'common/footer.php';
<<<<<<< HEAD

        //include_once 'common/footer.php';

    }
=======
    }

>>>>>>> b05076734ad600877ae0b4045fef4cc35f916a50
    else if ($role == "admin")
    {
        Session::checkSession();
        include_once 'routes/Adminroute.php';
    }
}
else{
    if (isset($_GET['in']))
    {
        include_once 'routes/Sessionroute.php';
    }
    else{
        include_once 'Controllers/LoginController.php';
    }
}

<<<<<<< HEAD
?>
=======
?>
>>>>>>> b05076734ad600877ae0b4045fef4cc35f916a50
