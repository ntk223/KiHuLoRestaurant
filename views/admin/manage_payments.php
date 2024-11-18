<link rel='stylesheet' href="assets/css/manage_user.css">
<main>
    <h1>Quản lý đơn hàng</h1>
    <section class="user-table-section">
        <h2>Danh sách đơn hàng</h2>
        <form action="" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Mã giao dịch</th>
                        <th>Mã đơn hàng</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái giao dịch</th>
                        <th>Thời gian giao dịch</th>
                        <th>Số tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['payment_id']; ?></td>
                            <td><?php echo $row['order_id']; ?></td>
                            <td>
                                <select name="payment_method">
                                    <option value="processing" <?php if($row['payment_method'] == 'Tiền mặt') echo 'selected'; ?>>Tiền mặt</option>
                                    <option value="confirmed" <?php if($row['payment_method']== 'Thẻ tín dụng') echo 'selected'; ?>>Thẻ tín dụng</option>
                                    <option value="cancelled" <?php if($row['payment_method'] == 'Tài khoản ngân hàng') echo 'selected'; ?>>Tài khoản ngân hàng</option>
                                </select>
                            </td>
                            <td><?php echo $row['payment_status']; ?></td>

                            <td><?php echo $row['payment_time']; ?></td>
                            <td><?php echo $row['amount']; ?></td>

                            <td style="width: 300px;">
                                <!-- Nút Sửa thay vì nút gửi chung -->
                                <button type="submit" name="submit" value="<?php echo $row['payment_id']; ?>" class="button">Xác nhận trạng thái</button>
                                <a href="index.php?role=admin&manage=order&action=delete&id=<?php echo $row['order_id'];?>" class="button">Xóa</a>
                                <a href="index.php?role=admin&manage=order&action=detail&id=<?php echo $row['order_id'];?>" class="button">Xem chi tiết</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
        <br>
        <a href="index.php?role=admin" class="button">Trở về</a>
    </section>
</main>
