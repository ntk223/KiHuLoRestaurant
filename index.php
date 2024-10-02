<?php
include "common/header.php";

include "controllers/MenuController.php";
$menu = new MenuController();
$menu->Menulist();

//include "views/user/register.php";
include "common/footer.php";
?>