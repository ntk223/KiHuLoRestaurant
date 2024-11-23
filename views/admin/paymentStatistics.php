<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <link rel="stylesheet" href="assets/css/tableview.css">
</head>
<body>
    <h1>Thống kê Phương Thức Thanh Toán</h1>
    <table>
        <thead>
            <tr>
                <th>Phương thức thanh toán</th>
                <th>Số lượng</th>
                <th>Tỷ lệ (%)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($data) {
                while ($row = $data->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['payment_method']; ?></td>
                        <td><?php echo $row['method_count']; ?></td>
                        <td><?php echo $row['method_percentage']; ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="3">Không có dữ liệu</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>