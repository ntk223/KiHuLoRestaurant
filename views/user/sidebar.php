<link rel="stylesheet" href="assets/css/sidebar.css" />
<div class="sidebar">
        <ul>
            <?php $cate = isset($_GET['cate']) ? $_GET['cate']:"" ;
            $color = "style='background-color: #f8a853;color: #fff;'" ?>
            <li <?php echo ($cate == "")? $color:"" ?>><a href="index.php?role=customer&page=menu&cate=all">Tất cả</a>
            </li>
            <li <?php echo ($cate == "1")? $color:"" ?>><a href="index.php?role=customer&page=menu&cate=1">Món chính</a></li>
            <li <?php echo ($cate == "2")? $color:"" ?>><a href="index.php?role=customer&page=menu&cate=2">Khai vị</a></li> 
            <li <?php echo ($cate == "3")? $color:"" ?>><a href="index.php?role=customer&page=menu&cate=3">Nước uống</a></li>
            <li <?php echo ($cate == "4")? $color:"" ?>><a href="index.php?role=customer&page=menu&cate=4">Tráng miệng</a></li>

        </ul>
</div>