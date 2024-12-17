<link rel="stylesheet" href="assets/css/manage_user.css">
<main>
    <h1>Chi tiết đơn hàng</h1>
    <section class="user-table-section">
        <h2>Khách hàng: <?php echo htmlspecialchars($username ?? ''); ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
                 $total = 0;
                 if ($orderDetail) {
                     while ($row = $orderDetail->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo number_format($row['price'], 0, ',', '.') . ' VNĐ'; ?></td>
                        </tr>
                <?php 
                        $total += $row['price'] * $row['quantity'];
                        $username = $row['username'];
                     }
                 } else { ?>
                     <tr>
                         <td colspan="3">Không có chi tiết đơn hàng nào!</td>
                     </tr>
                 <?php } ?>
            </tbody>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Tên combo</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
                 $total1 = 0;
                 while ($orderDetailCombo&&$row = $orderDetailCombo->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['combo_name'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['price_each'];?></td>
                </tr>
                <?php $total1 += $row['price_each'] * $row['quantity']; }?>
            </tbody>
        </table>
        <h2 colspan="3">Tổng tiền: <?php echo $total1 + $total; ?></h2>

        <a href="index.php?role=customer&page=order" class="button">Trở về</a>
    </section>
</main>