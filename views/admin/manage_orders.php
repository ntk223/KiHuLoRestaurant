<link rel='stylesheet' href="assets/css/Manage_user.css">
<main>
    <h1>Quản lý đơn hàng</h1>
    <section class="user-table-section">
        <a href="index.php?role=admin&manage=order&action=statistic" class = "button">Thống kê</a>
        <h2>Danh sách đơn hàng</h2>
        <form action="index.php?role=admin&manage=order&action=update" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Mã khách hàng</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $orders->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['customer_id']; ?></td>
                            <td>
                                <select name="order_status">
                                    <option value="processing" <?php if($row['order_status'] == 'Đang xử lý đơn hàng') echo 'selected'; ?>>Đang xử lý đơn hàng</option>
                                    <option value="confirmed" <?php if($row['order_status'] == 'Đơn hàng đã xác nhận') echo 'selected'; ?>>Đơn hàng đã xác nhận</option>
                                    <option value="cancelled" <?php if($row['order_status'] == 'Đã hủy') echo 'selected'; ?>>Đã hủy</option>
                                </select>
                            </td>
                            <td><?php echo $row['order_time']; ?></td>
                            <td style="width: 300px;">
                                <!-- Nút Sửa thay vì nút gửi chung -->
                                <button type="submit" name="submit" value="<?php echo $row['order_id']; ?>" class="button">Xác nhận trạng thái</button>
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
