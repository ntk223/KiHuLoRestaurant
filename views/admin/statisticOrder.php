<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê đơn hàng</title>
</head>
<style>
    h1 {
    }
    table {
        margin: 0 auto;
        border-collapse: collapse;
        width: 50%;
    }
    th, td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
    a {
        text-decoration: none;
    }
    a:hover {
        color: red;
    }

</style>
<body>
    <h1>Thống kê đơn hàng</h1>
    <table>
        <tr>
            <th>Trạng thái</th>
            <th>Số lượng</th>
        </tr>
        <tbody>
            <?php while($row = $res->fetch_assoc()){?>
            <tr></tr>
                <td><?php echo $row['order_status'];?></td>
                <td><?php echo $row['total_orders'];?></td>
            <?php }?>
        </tbody>

    </table>
</body>
</html>