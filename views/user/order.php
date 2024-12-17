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
<form action="index.php?role=customer&page=order&action=confirm" method="POST" class="order-confirm-form">
    <!-- Truyền các giá trị ẩn qua POST -->
    <input type="hidden" name="cid" value="<?php echo htmlspecialchars($_GET['cid']); ?>">
    <input type="hidden" name="total" value="<?php echo htmlspecialchars($_GET['total']); ?>">

    <label for="address">Địa chỉ:</label>
    <input type="text" id="address" name="address" required>

    <label for="payment_method">Phương thức thanh toán:</label>
    <select id="payment_method" name="payment_method" required>
        <option value="1">Tiền mặt</option>
        <option value="2">Thẻ tín dụng</option>
        <option value="3">Tài khoản ngân hàng</option>
    </select>

    <button type="submit" name="submit">Xác nhận đặt hàng</button>
</form>
</body>
</main>
</html>