<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê đánh giá</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>

<link rel="stylesheet" href="assets/css/tableview.css">
</head>
</html>
<?php include_once "models/Review.php"; 
$review = new Review(); ?>
<body>
<button id="exportExcel">Tải file Excel</button>
<!-- Thống kê món ăn có nhiều lượt review nhất -->
    <h1>Thống kê món ăn được nhiều quan tâm</h1>
    <table>
    <thead>
            <tr>
                <th>Tên món ăn</th>
                <th>Tổng lượt review</th>
                <th>Điểm đánh giá trung bình</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($mostFoodReview) {
                while ($row = $mostFoodReview->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['total_reviews']; ?></td>
                        <td><?php echo $row['avg_rating']; ?></td>
                    </tr>
            <?php } 
            } else { ?>
                <tr><td colspan="3">Không có dữ liệu</td></tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Thống kê người dùng tích cực đánh giá -->
    <h1>Thống kê người dùng thường xuyên đánh giá</h1>
    <table>
    <thead>
            <tr>
                <th>Tên người dùng</th>
                <th>Tổng lượt review</th>
                <th>Điểm đánh giá trung bình</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($mostCusReview) {
                while ($row = $mostCusReview->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['total_reviews']; ?></td>
                        <td><?php echo $row['avg_rating']; ?></td>
                    </tr>
            <?php } 
            } else { ?>
                <tr><td colspan="3">Không có dữ liệu</td></tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php?role=admin&manage=review">Trở về</a>
</body>

<script src="assets/js/fileExcel.js"></script>