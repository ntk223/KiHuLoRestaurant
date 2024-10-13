<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="assets/css/main0.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>
<main>
    <div class="container">
        <div style="margin: 20px 20px;">
        <h1>Giỏ hàng của bạn</h1>
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
                </tbody>
            </table>
        </div>
        <div class="cart-total">
            <h3>Tổng tiền: <span id="total"></span></h3>
        </div>

        <!-- Nút Thanh toán -->
        <div class="checkout">
            <button class="checkout-btn">Thanh toán</button>
        </div>
    </div>
</main>
