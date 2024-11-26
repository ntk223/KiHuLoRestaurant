<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá món ăn</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<body>
    <?php if ($result) { ?>
        <table>
            <tr>
                <th>Tên khách hàng</th>
                <th>Rating</th>
                <th>Đánh giá</th>
                <th>Ngày đánh giá</th>
            </tr>
            <?php            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['rating'] . "</td>";
                echo "<td>" . $row['review_text'] . "</td>";
                echo "<td>" . $row['review_date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php } else echo "Chưa có đánh giá."?>

    <a href="index.php?role=admin&manage=menu">Trở về</a>


</body>
</html>