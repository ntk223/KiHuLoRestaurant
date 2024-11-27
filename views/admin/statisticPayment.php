<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê thanh toán</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>

<link rel="stylesheet" href="assets/css/tableview.css">
</head>
<?php include_once "models/Payment.php"; 
$payment = new Payment(); ?>
<body>
<button id="exportExcel">Tải file Excel</button>

<!-- Thống kê phương thức thanh toán -->
    <h1>Thống kê phương thức thanh toán</h1>
    <table>
    <thead>
            <tr>
                <th>Phương thức thanh toán</th>
                <th>Số lượng giao dịch</th>
                <th>Tỷ lệ phần trăm</th>
                <th>Tổng tiền giao dịch</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = $payment->getPaymentMethodStats();
            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['payment_method']; ?></td>
                        <td><?php echo $row['method_count']; ?></td>
                        <td><?php echo $row['method_percentage']; ?></td>
                        <td><?php echo number_format($row['total_amount']); ?> VNĐ</td>
                    </tr>
            <?php } 
            } else { ?>
                <tr><td colspan="4">Không có dữ liệu</td></tr>
            <?php } ?>
        </tbody>
    </table>
    
<!-- Thống kê doanh thu theo tháng -->
    <h1>Thống kê doanh thu theo tháng</h1>
    <table>
    <thead>
            <tr>
                <th>Tháng</th>
                <th>Năm</th>
                <th>Số lần thanh toán</th>
                <th>Tổng doanh thu</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = $payment->getPaymentMonth();
            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['month']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['total_order']; ?></td>
                        <td><?php echo number_format($row['total_revenue']); ?> VNĐ</td>
                    </tr>
            <?php } 
            } else { ?>
                <tr><td colspan="4">Không có dữ liệu</td></tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Thống kê thời gian bán chạy trong ngày -->
    <h1>Thống kê thời gian bán chạy trong ngày</h1>
    <table>
    <thead>
            <tr>
                <th>Thời gian</th>
                <th>Số đơn được thanh toán</th>
                <th>Tổng doanh thu</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = $payment->getMostRenueTime();
            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['time_period']; ?></td>
                        <td><?php echo $row['sumTime']; ?></td>
                        <td><?php echo number_format($row['total_revenue']); ?> VNĐ</td>
                    </tr>
            <?php } 
            } else { ?>
                <tr><td colspan="3">Không có dữ liệu</td></tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php?role=admin&manage=payment">Trở về</a>
</body>
</html>
<script src="assets/js/fileExcel.js"></script>