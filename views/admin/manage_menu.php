<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Menu</title>
    <link rel="stylesheet" href="assets/css/manage_menu.css">
</head>
<body>

    <header>
        <h1>Quản lý Menu</h1>
    </header>

    <section class="menu-table-section">
        <a href="index.php?role=admin&manage=menu&action=add" class="button">Thêm món ăn mới</a>

        <h2>Danh sách món ăn</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên món ăn</th>
                    <th>Danh mục</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $cate = array("", "Món chính", "Món khai vị", "Nước uống","Tráng miệng");
                while ($row = $result->fetch_assoc()){
                ?>
                    <tr>
                    
                        <td><?php echo $row['item_id']?></td>
                        <td><?php echo $row['item_name']?></td>
                        <td><?php echo $cate[(int)$row['category_id']]?></td>
                        <td><?php echo $row['description']?></td>
                        <td><?php echo $row['price']?></td>
                        <td><?php echo $row['available']?></td>
                        <td><img src=<?php echo $row['image_url']?> alt=<?php echo $row['item_name']?> width="80"></td>
                        <td>
                        <a href="#" class="button ">Xem</a>
                        <a href="#" class="button ">Sửa</a>
                        <a href="index.php?role=admin&manage=menu&action=delete&id=<?php echo $row['item_id']?>" class="button " onclick="return confirm('Bạn có chắc chắn muốn xóa món ăn này?');">Xóa</a>
                        </td>
                    </tr>

                <?php } ?>
                
            </tbody>
        </table>
        <br>
        <a href="index.php?role=admin" class="button">Trở về</a>

    </section>

</body>
</html>
