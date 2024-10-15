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
                        <th>Hành động</th> <!-- Thêm cột cho nút Xóa -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ( $result){
                    $total = 0;
                    while ($row = $result->fetch_assoc()) { 
                        $item_total = $row['price'] * $row['quantity'];
                        $total += $item_total;
                    ?>
                        <tr>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><input type="number" value="<?php echo $row['quantity']; ?>" min="1" class="quantity-input"></td>
                            <td><?php echo number_format($row['price']); ?> VNĐ</td>
                            <td class="item-total"><?php echo number_format($item_total); ?> VNĐ</td>
                            <td style="width: 220px;"><a href="#"><button class="confirn_food">Xác nhận</button> </a> <a href="#"><button class="delete_food">Xóa</button></a></td> <!-- Nút Xóa -->
                        </tr>
                    <?php } 
                    }?>
                </tbody>
            </table>
        </div>
        <div class="cart-total">
            <h3>Tổng tiền: <span id="total"><?php echo number_format($total); ?> VNĐ</span></h3>
        </div>

        <!-- Nút Thanh toán -->
        <div class="checkout">
            <button class="checkout-btn">Thanh toán</button>
        </div>
        <div class="checkout">
            <button class="checkout-btn"><intput type = 'submit' name = 'submit'>Xác nhận</intput></button>
        </div>
    </div>
</main>

<script src="assets/js/cart.js"></script>
