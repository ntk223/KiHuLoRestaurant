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
                        <th colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    $cart_id = -1;
                    if ( $result){
                    while ($row = $result->fetch_assoc()) { 
                        $item_total = $row['price'] * $row['quantity'];
                        $total += $item_total;
                        $cart_id = $row['cart_id'];
                    ?>

                        <tr>
                            <td><?php echo $row['item_name']; ?></td>
                            <form action="index.php?role=customer&page=cart&cid=<?php echo $row['cart_id']; ?>&action=update&id=<?php echo $row['item_id']?>" method="POST">
                            <td><input type="number" name = "quantity" value="<?php echo $row['quantity']; ?>" min="1" class="quantity-input"></td>
                                <td><?php echo number_format($row['price']); ?> VNĐ</td>
                                <td class="item-total"><?php echo number_format($item_total); ?> VNĐ</td>
                                <td style="width: 220px;">
                                <button type = 'submit' class="confirn_food">Xác nhận</button>
                                </td>
                            </form>
                            <td>
                             <a href="index.php?role=customer&page=cart&cid=<?php echo $row['cart_id']; ?> &action=delete&id=<?php echo $row['item_id']?>"><button class="delete_food">Xóa</button></a>
                            </td> <!-- Nút Xóa -->
                        </tr>
                    <?php } 
                    }?>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Tên Combo</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng cộng</th>
                        <th colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Tổng tiền cho tất cả combo
                    $combo_total = 0;
                    if ($combo_result) { // $combo_result chứa dữ liệu combo
                        while ($row = $combo_result->fetch_assoc()) { 
                            $cart_id = $row['cart_id'];
                            $combo_item_total = $row['price_each'] * $row['quantity'];
                            $combo_total += $combo_item_total;
                    ?>
                        <tr>
                            <!-- Tên combo -->
                            <td><?php echo $row['combo_name']; ?></td>
                            
                            <!-- Form cập nhật số lượng combo -->
                            <form action="index.php?role=customer&page=cart&cid=<?php echo $row['cart_id']; ?>&action=updatecombo&id=<?php echo $row['combo_id']; ?>" method="POST">
                                <td>
                                    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1" class="quantity-input">
                                </td>
                                <!-- Đơn giá -->
                                <td><?php echo number_format($row['price_each']); ?> VNĐ</td>
                                
                                <!-- Tổng cộng -->
                                <td class="item-total"><?php echo number_format($combo_item_total); ?> VNĐ</td>
                                
                                <!-- Nút cập nhật -->
                                <td style="width: 220px;">
                                    <button type="submit" class="confirn_food">Xác nhận</button>
                                </td>
                            </form>
                            
                            <!-- Nút xóa combo -->
                            <td>
                                <a href="index.php?role=customer&page=cart&cid=<?php echo $row['cart_id']; ?>&action=deletecombo&id=<?php echo $row['combo_id']; ?>">
                                    <button class="delete_food">Xóa</button>
                                </a>
                            </td>
                        </tr>
                    <?php } 
                    } ?>
                </tbody>
            </table>

    </div>
</div>
        <div class="checkout">
            <div class="total">
                <h2>Tổng cộng: <?php echo number_format($total + $combo_total); ?> VNĐ</h2>
            </div>
            <div class="checkout-button">
                <a href="index.php?role=customer&page=order&action=create&cid=<?php echo $cart_id?>&total=<?php echo $total+$combo_total ?>">
                    <button class="checkout-btn">Thanh toán</button></a>
            </div>
        </div>


    </div>
</main>


<!-- <script src="assets/js/cart.js"></script> -->
