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
    <h1>Bấm vào mã đơn hàng để xem chi tiết:</h1>
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
            <td>
                <a href="index.php?role=customer&page=order&action=detail&id=<?php echo $row['order_id']; ?>">
                    <?php echo $row['order_id']; ?>
                </a>
            </td>
            <td><?php echo $row['order_time']; ?></td>
            <td><?php echo number_format($row['total']); ?> VNĐ</td>
            <td>
            <?php echo $row['order_status']; ?>
                <div style="width: 5px;"></div>
                <?php if ($row['order_status'] == "Đang xử lý"): ?>
    <!-- Nút Hủy đơn hàng -->
                    <form action="index.php?role=customer&page=order&action=cancel" method="POST" onsubmit="return confirmCancel();" style="display: inline;">
                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                        <button type="submit">Hủy đơn hàng</button> <!-- Không thêm class mới -->
                    </form>
                <?php endif; ?>

            </td>
        </tr>
    <?php } 
    }?>
</tbody>

    </table>    
</body>
        </main>
</html>
<script>
    function confirmCancel() {
        return confirm("Bạn có chắc chắn muốn hủy đơn hàng này không?");
    }
</script>
