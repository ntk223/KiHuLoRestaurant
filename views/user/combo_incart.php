<link rel="stylesheet" href="assets/css/main0.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
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
        if ($combo_result) { // $combo_result chứa dữ liệu combo
            while ($row = $combo_result->fetch_assoc()) { 
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

<div>
    <h3>Tổng tiền: <?php echo number_format($combo_total); ?> VNĐ</h3>
</div>

