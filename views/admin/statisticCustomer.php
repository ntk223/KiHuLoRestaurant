<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê người dùng</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>

<link rel="stylesheet" href="assets/css/tableview.css">
</head>
</html>
<body>
<button id="exportExcel">Tải file Excel</button>   
<!-- In ra top khách hàng trả nhiều tiên nhất và số lần mua hàng -->
<h1>Top Khách Hàng</h1> 

<table >
    <thead>
        <tr>
            <th>Tên khách hàng</th>
            <th>Tổng tiền mua</th>
            <th>Số lần mua hàng</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($topCustomer) {
        while ($row = $topCustomer->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['total_purchase']; ?></td>
                <td><?php echo $row['total_buy']; ?></td>
            </tr>
            <?php } 
            } else { ?>
                <tr><td colspan="3">Không có dữ liệu</td></tr>
            <?php } ?>
    </tbody>
</table>

<!-- Tỷ lệ đơn hàng bị hủy theo khách hàng -->
<h1>Tỷ lệ đơn hàng bị hủy theo khách hàng</h1>

<table>
    <thead>
        <tr>
            <th>Tên khách hàng</th>
            <th>Tổng đơn hàng</th>
            <th>Đơn hàng bị hủy</th>
            <th>Tỷ lệ hủy (%)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($cancelRateByCustomer) {
                while ($row = $cancelRateByCustomer->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['total_orders']; ?></td>
                <td><?php echo $row['cancelled_orders']; ?></td>
                <td><?php echo $row['cancel_rate']; ?></td>
            </tr>
            <?php } 
            } else { ?>
                <tr><td colspan="4">Không có dữ liệu</td></tr>
            <?php } ?>
    </tbody>
</table>


<!-- Tỷ lệ đơn hàng bị boom theo khách hàng -->
<h1>Tỷ lệ đơn hàng bị boom theo khách hàng</h1>

<table>
    <thead>
        <tr>
            <th>Tên khách hàng</th>
            <th>Tổng đơn hàng đã đặt</th>
            <th>Tổng đơn hàng bị boom</th>
            <th>Tỷ lệ boom hàng (%)</th>
        </tr>
    </thead>
    <tbody>
    <?php 
            if ($boomRateByCustomer) {
                while ($row = $boomRateByCustomer->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['total_orders']; ?></td>
                        <td><?php echo $row['boom_orders']; ?></td>
                        <td><?php echo number_format($row['boom_rate']); ?> VNĐ</td>
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
