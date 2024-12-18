<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao hàng</title>
    <link rel="stylesheet" href="assets/css/main0.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>

<main>
<body>
    <h1>Thông tin giao hàng:</h1>
    <table class="order-table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Địa chỉ</th>
                <th>Phí vận chuyển</th>
                <th>Trạng thái</th>
                <th>Thời gian giao hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ( $result){
            while ($row = $result->fetch_assoc()) { 
            ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['delivery_address']; ?></td>
                    <td><?php echo $row['delivery_fee']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php if($row['status'] == 'Giao hàng thành công') echo $row['delivery_time']; ?></td>
                </tr>
            <?php } 
            }?>
        </tbody>
    </table>
</body>
</main>
</html>