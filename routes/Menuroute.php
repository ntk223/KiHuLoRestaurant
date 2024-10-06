<?php
include_once 'controllers/MenuController.php';
$menu = new MenuController();
$category_id = isset($_GET['cate']) ? $_GET['cate'] : 'all';
if ($category_id == 'all')
{
    header ("Location: index.php?role=customer&page=index");
}
else
{
    $menu->ItembyCategory($category_id);
}
?>