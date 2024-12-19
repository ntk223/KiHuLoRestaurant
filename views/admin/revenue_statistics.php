<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê doanh thu</title>
    <link rel="stylesheet" href="assets/css/tableview.css">
</head>
<body>
    <h1>Thống kê doanh thu</h1>

    <form method="post" action="index.php?role=admin&manage=payment&action=revenue">
        <label for="start_date">Từ ngày:</label>
        <input type="date" id="start_date" name="start_date" required>
        
        <label for="end_date">Đến ngày:</label>
        <input type="date" id="end_date" name="end_date" required>

        <button type="submit">Thống kê</button>
    </form>

    <?php if (isset($revenueData)) { ?>
        <?php if (!empty($revenueData['daily_revenue'])) { ?>
            <h2>Tổng doanh thu: <?php echo number_format($revenueData['total_revenue']); ?> VNĐ</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($revenueData['daily_revenue'] as $date => $revenue) { ?>
                        <tr>
                            <td><?php echo $date; ?></td>
                            <td><?php echo number_format($revenue); ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>Không có doanh thu trong khoảng thời gian đã chọn.</p>
        <?php } ?>
    <?php } ?>
    <a href="index.php?role=admin&manage=payment">Trở về</a>
</body>
</html>
