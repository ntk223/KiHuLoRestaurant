<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê giao hàng</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>

<link rel="stylesheet" href="assets/css/tableview.css">
</head>
</html>
<body>
<button id="exportExcel">Tải file Excel</button>
<?php 
include_once "models/Delivery.php"; 
$deli = new Delivery(); 
?>
<h1>Thống kê thời gian giao hàng trung bình của từng shipper</h1>
<table>
    <thead>
        <tr>
            <th>Tên shipper</th>
            <th>Số lượng đơn</th>
            <th>Tổng thời gian</th>
            <th>Thời gian trung bình</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $avgDeliveryTime = $deli->getAverageDeliveryTime();
        while ($row = $avgDeliveryTime->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['shipper_name']; ?></td>
                <td><?php echo $row['sum_ship']; ?></td>
                <td><?php echo $row['time_ship']; ?></td>
                <td><?php echo $row['avg_time']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h1>Tỉ lệ giao thành công của shipper</h1>
<table>
    <thead>
        <tr>
            <th>Tên shipper</th>
            <th>Số lượng đơn</th>
            <th>Số đơn thành công</th>
            <th>Tỉ lệ thành công</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $successShipperRate = $deli->getSuccessShip();
        while ($row = $successShipperRate->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['shipper_name']; ?></td>
                <td><?php echo $row['total_deliveries']; ?></td>
                <td><?php echo $row['successful_deliveries']; ?></td>
                <td><?php echo $row['success_rate']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h1>Thống kê trạng thái giao hàng</h1>
<table id="dataTable">
    <thead>
        <tr>
            <th>Trạng thái</th>
            <th>Số lượng đơn của trạng thái</th>
            <th>Tỉ lệ đơn của trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $statusShip = $deli->getStatusShip();
        while ($row = $statusShip->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['total_deliveries']; ?></td>
                <td><?php echo $row['status_percentage']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
<script src="assets/js/fileExcel.js"></script>
<a href="index.php?role=admin&manage=delivery">Trở về</a>
