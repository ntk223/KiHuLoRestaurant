<link rel= 'stylesheet' href="assets/css/manage_user.css">
<main>
    <h1>Chi tiết giao hàng</h1>
    <section class="user-table-section">
        <h2></h2>
        <form action="#" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại khách hàng</th>
                    <th>Tên người giao hàng</th>
                    <th>Số điện thoại người giao hàng</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>Thời gian giao hàng</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
                 while ($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['shipper_name'];?></td>
                    <td><?php echo $row['shipper_phone'];?></td>
                    <td><?php echo $row['delivery_address'];?></td>
                    <td><?php echo $row['delivery_time'];?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </form>
        <br>
        <a href="index.php?role=admin&manage=order" class="button">Trở về</a>

    </section>
</main>
