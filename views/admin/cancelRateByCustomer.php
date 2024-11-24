<link rel="stylesheet" href="assets/css/tableview.css">
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
    <?php include_once "models/User.php";
                $user = new User();
                $result = $user->getCancelRateByCustomer();
                while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['total_orders']; ?></td>
                <td><?php echo $row['cancelled_orders']; ?></td>
                <td><?php echo $row['cancel_rate']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
