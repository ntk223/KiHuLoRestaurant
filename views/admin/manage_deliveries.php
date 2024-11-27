<link rel='stylesheet' href="assets/css/manage_user.css">
<main>
    <h1>Quản lý giao hàng</h1>
    <a href="index.php?role=admin&manage=delivery&action=statisticDelivery" class="button">Thống kê</a>
    <section class="user-table-section">
        <h2>Danh sách giao hàng</h2>
        <form action="index.php?role=admin&manage=delivery&action=update" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Mã vận chuyển</th>
                        <th>Mã đơn hàng</th>
                        <th>Trạng thái giao hàng</th>
                        <th>Shipper</th>
                        <th>Phí vận chuyển</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['delivery_id']; ?></td>
                            <td>
                            <a href="index.php?role=admin&manage=order&action=detail&id=<?php echo $row['order_id'];?>" style="color: orange; text-decoration: underline;"><?php echo $row['order_id']."<br>Chi tiết"; ?></a>
                            
                            </td>
                            <td>
                                <select name="status">
                                    <option value="pending" <?php if($row['status'] == 'Đang xử lý') echo 'selected'; ?>>Đang xử lý</option>
                                    <option value="shipping" <?php if($row['status'] == 'Đang giao hàng') echo 'selected'; ?>>Đang giao hàng</option>
                                    <option value="success" <?php if($row['status'] == 'Giao hàng thành công') echo 'selected'; ?>>Giao hàng thành công</option>
                                    <option value="cancelled" <?php if($row['status'] == 'Đơn bị hủy') echo 'selected'; ?>>Đơn bị hủy</option>

                                </select>
                            </td>
                            <td><?php echo $row['shipper_id']; ?></td>

                            <td><?php echo $row['delivery_fee']; ?></td>
                            <td><?php echo $row['delivery_address']; ?></td>
                            <td><?php echo $row['delivery_time']; ?></td>
                            <td style="width: 300px;">
                                <!-- Nút Sửa thay vì nút gửi chung -->
                                <button type="submit" name="submit" value="<?php echo $row['delivery_id']; ?>" class="button">Xác nhận trạng thái</button>
                                <a href="index.php?role=admin&manage=delivery&action=delete&id=<?php echo $row['delivery_id'];?>" class="button">Xóa</a>
                                <a href="index.php?role=admin&manage=delivery&action=detail&id=<?php echo $row['delivery_id'];?>" class="button">Xem chi tiết</a>
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
