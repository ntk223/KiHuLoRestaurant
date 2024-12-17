<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="assets/css/main0.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>

<main>
<body class="table-page">
    <table class="order-table">
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
            if ($result) {
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
        </main>
</html>