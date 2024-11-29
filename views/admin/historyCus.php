<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử người dùng</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>

<link rel="stylesheet" href="assets/css/tableview.css">
</head>
</html>
<body>
<button id="exportExcel">Tải file Excel</button>

<!-- Tỷ lệ đơn hàng bị boom theo khách hàng -->
<h1>Lịch sử</h1>

<table>
    <thead>
        <tr>
            <th>Tên khách hàng</th>
            <th>Mã đặt hàng</th>
            <th>Thời gian order</th>
            <th>Món</th>
            <th>Tổng tiền thanh toán</th>
        </tr>
    </thead>
    <tbody>
    <?php 
            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_time']; ?></td>
                        <td><?php echo $row['items']; ?></td>
                        <td><?php echo number_format($row['total_amount']); ?> VNĐ</td>
                    </tr>
            <?php } 
            } else { ?>
                <tr><td colspan="4">Không có dữ liệu</td></tr>
            <?php } ?>
    </tbody>
</table>
</body>

<script src="assets/js/fileExcel.js"></script>

<a href="index.php?role=admin&manage=customer">Trở về</a>
