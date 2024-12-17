<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
</head>
<body>
    <br><br><br><br><br><br><br><br>
    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            if ( $result){
            while ($row = $result->fetch_assoc()) { 
            ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['order_time']; ?></td>
                    <td><?php echo $row['total']; ?></td>
                    <td><?php echo $row['order_status']; ?></td>
                </tr>
            <?php } 
            }?>
        </tbody>
    </table>    

</body>
</html>