<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combo</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Combo</th>
                <th>Giảm giá</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($row = $result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row['combo_id']?></td>
                    <td><?php echo $row['combo_name']?></td>
                    <td><?php echo $row['discount']."%"?></td>
                    <td><?php echo $row['description']?></td>
                    <td>
                    <a href="index.php?role=admin&manage=combo&action=update&id=<?php echo $row['combo_id']?>" class="button ">Sửa</a>
                    <a href="index.php?role=admin&manage=combo&action=delete&id=<?php echo $row['combo_id']?>" class="button "
                     onclick="return confirm('Bạn có chắc chắn muốn xóa combo này?');">Xóa</a>
                     <a href="index.php?role=admin&manage=combo&action=detail&id=<?php echo $row['combo_id']?>" class="button ">Xem chi tiết</a>

                    </td>
                </tr>
                <?php }/* Ở đây sẽ là vòng lặp PHP để hiển thị danh sách combo */ ?>
            </tbody>
    </table>

    <a href="index.php?role=admin&manage=menu" class="button">Trở về</a>
</body>
</html>