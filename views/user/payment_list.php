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
    <h2>Giao dịch</h2>
    <table class="order-table">
        <thead>
            <tr>
                <th>Mã giao dịch</th>
                <th>Mã đơn hàng</th>
                <th>Phương thức thanh toán</th>
                <th>Số tiền</th>
                <th>Trạng thái</th>
                <th>Thanh toán</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result) {
                while ($row = $result->fetch_assoc()) { 
            ?>
                <tr>
                    <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['payment_status']; ?></td>
                    <td>
                        <?php if ($row['payment_status'] == 'Thanh toán thành công') { ?>
                            <?php echo $row['payment_time']; ?>
                        <?php } else if ($row['payment_status'] == 'Đã hủy') { ?>
                            <?php echo 'Đã hủy'; ?>
                        <?php } else { ?>
                            <!-- Form thanh toán -->
                            <form action="index.php?role=customer&page=payment&action=confirm" method="POST">
                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                <input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
                                
                                <input type="text" name="money" placeholder="Nhập số tiền thanh toán">
                                <button type="submit" name="submit">Thanh toán</button>
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php 
                } 
            } 
            ?>
        </tbody>
    </table>
</body>
</main>
</html>
