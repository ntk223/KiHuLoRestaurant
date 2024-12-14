<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple" />
    <link rel="stylesheet" href="assets/css/dashboard.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

</head>
<body>
<div class="container">
    <div></div>
    <div class="sidebar">
    <?php include_once "common/headerAD.php";
          include_once "models/MenuItem.php"; 
          include_once "models/Payment.php";
          $menu = new MenuItem();
          $payment = new Payment();
    ?>
        <h2 class="sidebar-title">DASH BOARD</h2>
        <ul>
        <li><a href="index.php?role=admin&manage=customer"><i class="fas fa-users"></i><b>QUẢN LÍ NGƯỜI DÙNG</b></a></li>
        <li><a href="index.php?role=admin&manage=menu"><i class="fas fa-utensils"></i><b>QUẢN LÍ THỰC ĐƠN</b></a></li>
        <li><a href="index.php?role=admin&manage=order"><i class="fas fa-receipt"></i><b>QUẢN LÍ ĐƠN HÀNG</b></a></li>
        <li><a href="index.php?role=admin&manage=delivery"><i class="fas fa-truck"></i><b>QUẢN LÍ GIAO HÀNG</b></a></li>
        <li><a href="index.php?role=admin&manage=payment"><i class="fas fa-credit-card"></i><b>QUẢN LÍ THANH TOÁN</b></a></li>
        <li><a href="index.php?role=admin&manage=review"><i class="fas fa-star"></i><b>QUẢN LÍ ĐÁNH GIÁ</b></a></li>
        <li><a href="index.php" class="">ĐĂNG XUẤT</a></li>
        </ul>
    </div>
    <div>
        <h1>KiHuLo Restaurant</h1>
        <h2>Giới thiệu</h2>
        <p>Quản lý</p>
        <ul>
            <li>Nguyễn Trung Kiên</li>
            <li>Đặng Tuấn Long</li>
            <li>Nguyễn Nhất Huy</li>
        </ul>
        <h2>Thống kê chung</h2>
        <h3>Tổng doanh thu</h3>
        <p>
            <?php echo $payment->total() . " VNĐ";?>
        </p>
        <h3>Đánh giá trung bình</h3>
        <p>
            <?php echo $menu->avgRating()."/5";?>
        </p>
        
        <h2>Liên hệ</h2>
        <p>Địa chỉ: Trường đại học Công nghệ - Đại học Quốc gia Hà Nội</p>
    </div>

</div>
</body>
</html>