<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="assets/css/main0.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<main>
    <div class="container">
        <div style="margin: 20px 20px;">
        <h1 style="font-family: 'Dancing Script', cursive;font-size:50px">Giỏ hàng của bạn :</h1>
        </div>
        <div class="cart-items">
            <table>
                <thead>
                    <tr>
                        <th>Tên món</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo number_format($row['price']); ?></td>
                            <td><?php echo number_format($row['price'] * $row['quantity']); ?></td>
                            <?php $total = $row['total'];?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="cart-total">
    <h3>Tổng tiền: <span id="total">
        <?php 
        echo number_format($total);
        ?>
    </span></h3>
</div>

        <!-- Nút Thanh toán -->
        <div class="checkout">
            <button class="checkout-btn">Thanh toán</button>
        </div>
    </div>
</main>
