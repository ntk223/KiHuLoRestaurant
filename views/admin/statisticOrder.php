<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê đơn hàng</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>

<link rel="stylesheet" href="assets/css/tableview.css">
</head>
<body>
<button id="exportExcel">Tải file Excel</button>
<!-- Thống kê món ăn được gọi lại bởi 1 khách hàng -->
    <h1>Thống kê món ăn ưa thích của từng khách hàng</h1>
    <table>
        <tr>
            <th>Tên khách hàng</th>
            <th>Tên món</th>
            <th>Số lần gọi lại món</th>
        </tr>
        <tbody>
            <?php if ($favouriteFood) {
            while($row = $favouriteFood->fetch_assoc()){?>
            <tr></tr>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['item_name'];?></td>
                <td><?php echo $row['repeat_orders'];?></td>
            <?php }
            } else {?> 
            <tr><td colspan="3">Không có dữ liệu</td></tr>
            <?php }?>
        </tbody>

    </table>

    <h1>Thống kê trạng thái món ăn</h1>
    <table>
        <tr>
            <th>Trạng thái</th>
            <th>Số món có trạng thái</th>
            <th>Phần trăm</th>
        </tr>
        <tbody>
            <?php if ($orderStatusStatistics) {
            while($row = $orderStatusStatistics->fetch_assoc()){?>
            <tr></tr>
                <td>
                    <?php 
                        echo (!empty($row['order_status'])) ? $row['order_status'] : 'Chưa xác định đặt'; 
                    ?>
                </td>
                <td><?php echo $row['total_orders'];?></td>
                <td><?php echo $row['percentage'];?>%</td>
            <?php }
            } else {?> 
            <tr><td colspan="3">Không có dữ liệu</td></tr>
            <?php }?>
        </tbody>

    </table>
    <a href="index.php?role=admin&manage=order">Trở về</a>
</body>
</html>