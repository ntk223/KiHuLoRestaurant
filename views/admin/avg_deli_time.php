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
        <?php include_once "models/Delivery.php";
                $deli = new Delivery();
                $result = $deli->getAverageDeliveryTime();
         while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['shipper_name']; ?></td>
                <td><?php echo $row['sum_ship']; ?></td>
                <td><?php echo $row['time_ship']; ?></td>
                <td><?php echo $row['avg_time']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>