<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple" />
    <link rel="stylesheet" href="assets/css/dashboard.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

</head>
<body>
<div class="container">
    <div></div>
    <div class="sidebar">
    <?php include_once "common/headerAD.php"; ?>

        <h2 class="sidebar-title">DASH BOARD</h2>
        <ul>
        <li><a href="index.php?role=admin&manage=customer"><i class="fas fa-users"></i><b>QUẢN LÍ NGƯỜI DÙNG</b></a></li>
        <li><a href="index.php?role=admin&manage=menu"><i class="fas fa-utensils"></i><b>QUẢN LÍ THỰC ĐƠN</b></a></li>
        <li><a href="index.php?role=admin&manage=order"><i class="fas fa-receipt"></i><b>QUẢN LÍ ĐƠN HÀNG</b></a></li>
        <li><a href="index.php?role=admin&manage=delivery"><i class="fas fa-truck"></i><b>QUẢN LÍ GIAO HÀNG</b></a></li>
        <li><a href="index.php?role=admin&manage=payment"><i class="fas fa-credit-card"></i><b>QUẢN LÍ THANH TOÁN</b></a></li>
        <li><a href="index.php?role=admin&manage=review"><i class="fas fa-star"></i><b>QUẢN LÍ ĐÁNH GIÁ</b></a></li>
        </ul>
    </div>
    <h1>// thong ke doanh thu va  gioi thieu nha hang</h1>

</div>
</body>
</html>