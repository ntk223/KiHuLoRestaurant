<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br><br><br><br><br><br>
    <h2>Giao dịch</h2>
    <table border="1" cellspacing="0" cellpadding="10">
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
</html>
