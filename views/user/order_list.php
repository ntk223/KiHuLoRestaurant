<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
</head>
<body>
    <br><br><br><br><br><br><br><br>
    <table border="1" cellspacing="0" cellpadding="10">
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
                    <td><a href="index.php?role=customer&page=order&action=detail&id=<?php echo $row['order_id']; ?>"><?php echo $row['order_id']; ?></a></td>
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