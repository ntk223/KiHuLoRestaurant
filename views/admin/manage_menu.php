<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Menu</title>
    <link rel="stylesheet" href="assets/css/manage_menu.css"> <
</head>
<body>

    <header>
        <h1>Quản lý Menu</h1>
    </header>

    <section class="menu-table-section">
        <a href="index.php?action=add_menu_item" class="button">Thêm món ăn mới</a>

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
                <tr>
                    <td>1</td>
                    <td>Bruschetta</td>
                    <td>Món chính</td>  
                    <td>Ngon vờ lờ lun.</td>
                    <td>50,000 VND</td>
                    <td>Còn bán</td>
                    <td><img src="#" alt="Bruschetta" width="80"></td>
                    <td>
                        <a href="#" class="button ">Xem</a>
                        <a href="#" class="button ">Sửa</a>
                        <a href="#" class="button " onclick="return confirm('Bạn có chắc chắn muốn xóa món ăn này?');">Xóa</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

</body>
</html>
