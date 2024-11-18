<link rel= 'stylesheet' href="assets/css/manage_user.css">
<main>
    <h1>Chi tiết đơn hàng</h1>
    <section class="user-table-section">
        <h2></h2>
        <form action="#" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Só lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
                 $total = 0;
                 $username = "";
                 while ($row = $orderDetail->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['item_name'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['price'];?></td>
                </tr>
                <?php $username = $row['username'];
                $total += $row['price'] * $row['quantity'];
                }?>
                <tr>
                    <td colspan="3">Tổng tiền: <?php echo $total; ?></td>
                </tr>
                <tr>
                    <td colspan="3">Khách hàng: <?php echo $username; ?></td>
                </tr></tr>
            </tbody>
        </table>
        </form>
        <br>
        <a href="index.php?role=admin&manage=order" class="button">Trở về</a>

    </section>
</main>