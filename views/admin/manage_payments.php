<link rel='stylesheet' href="/assets/css/manage_user.css">
<main>
    <h1>Quản lý thanh toán</h1>
    <section class="user-table-section">
        <h2>Danh sách giao dịch</h2>
        <form action="index.php?role=admin&manage=payment&action=update" method="POST">
        <a href="index.php?role=admin&manage=payment&action=revenue" class="button">Doanh thu</a>
        <a href="index.php?role=admin&manage=payment&action=paymentStatistics" class="button">Thống kê</a>
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
                            <td><?php echo $row['payment_method']; ?></td>

                            <td><select name = "payment_status">
                                <option value="Đang xử lý giao dịch" <?php if($row['payment_status'] == 'Đang xử lý giao dịch') echo 'selected'; ?>>Đang xử lý giao dịch</option>
                                <option value="Thanh toán thành công" <?php if($row['payment_status'] == 'Thanh toán thành công') echo 'selected'; ?>>Thanh toán thành công	</option>
                                <option value="Thanh toán thất bại" <?php if($row['payment_status'] == 'Thanh toán thất bại') echo 'selected'; ?>>Thanh toán thất bại</option>
                            </select></td>

                            <td><?php echo $row['payment_time']; ?></td>
                            <td><?php echo $row['amount']; ?></td>

                            <td style="width: 300px;">
                                <!-- Nút Sửa thay vì nút gửi chung -->
                                <button type="submit" name="submit" value="<?php echo $row['payment_id']; ?>" class="button">Xác nhận trạng thái</button>
                                <a href="index.php?role=admin&manage=payment&action=delete&id=<?php echo $row['payment_id'];?>" class="button">Xóa</a>
                                <a href="index.php?role=admin&manage=order&action=detail&id=<?php echo $row['order_id'];?>" class="button">Xem chi tiết</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
        <br>
        <?php 
        include_once "models/Payment.php";
        $paymentModel = new Payment();
        $totalPayments = $paymentModel->getTotalPayments();
        ?>
        <h2>Tổng doanh thu: <?php echo number_format($totalPayments); ?> VNĐ</h2>

        <a href="index.php?role=admin" class="button">Trở về</a>
    </section>
</main>
