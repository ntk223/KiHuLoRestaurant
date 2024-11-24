<?php include_once "models/Delivery.php";
$deli = new Delivery(); ?>
<link rel="stylesheet" href="assets/css/tableview.css">
<h1>Thời gian giao hàng trung bình của shipper</h1>
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
        <?php $avgDeliveryTime = $deli->getAverageDeliveryTime();
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
            <th>Shipper Name</th>
            <th>Total Deliveries</th>
            <th>Successful Deliveries</th>
            <th>Success Rate</th>
        </tr>
    </thead>
    <tbody>
        <?php $successShipperRate = $deli->getSuccessShip();
            while ($row = $successShipperRate->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['shipper_name']); ?></td>
                <td><?php echo $row['total_deliveries']; ?></td>
                <td><?php echo $row['successful_deliveries']; ?></td>
                <td><?php echo $row['success_rate']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>