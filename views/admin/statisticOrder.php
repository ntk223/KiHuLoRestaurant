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
    <h1>Thống kê đơn hàng</h1>
    <table>
        <tr>
            <th>Trạng thái</th>
            <th>Số lượng</th>
        </tr>
        <tbody>
            <?php while($row = $res->fetch_assoc()){?>
            <tr></tr>
                <td><?php echo $row['order_status'];?></td>
                <td><?php echo $row['total_orders'];?></td>
            <?php }?>
        </tbody>

    </table>
</body>
</html>