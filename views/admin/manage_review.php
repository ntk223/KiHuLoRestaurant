<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reviews</title>
    <link rel='stylesheet' href="assets/css/manage_user.css">
</head>
<body>
    <div class="container">
        <h1>Quản lý đánh giá</h1>
        <table>
            <thead>
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Tên món ăn</th>
                    <th>Đánh giá</th>
                    <th>Rating</th>
                    <th>Ngày đánh giá</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['review_text']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td><?php echo $row['review_date']; ?></td>
                    <td>
                        <a href="index.php?role=admin&manage=review&action=delete&id=<?php echo $row['review_id']; ?>" 
                        onclick="return confirm('Bạn chắc chắn muốn xóa bình luận này?');">Xóa</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="index.php?role=admin" class="button">Trở về</a>
    </div>
</body>
</html>