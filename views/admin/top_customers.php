<link rel="stylesheet" href="assets/css/tableview.css">
    <h1>Top Khách Hàng</h1>

        <table >
            <thead>
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền mua</th>
                    <th>Số lần mua hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php include_once "models/User.php";
                $user = new User();
                $result = $user->getTopCustomers();
                while ($row = $result->fetch_assoc()) { ?>

                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['total_purchase']; ?></td>
                        <td><?php echo $row['total_buy']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
