<link rel="stylesheet" href="assets/css/manage_menu.css">

    <main>

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
                    <tr>
                        <td>1</td>
                        <td>Bruschetta</td>
                        <td>Món chính</td>  
                        <td>Ngon vờ lờ lun.</td>
                        <td>50,000 VND</td>
                        <td>Còn bán</td>
                        <td><img src="#" alt="Bruschetta" width="80"></td>
                        <td>
                            <!-- Manage Menu Actions -->
                            <a href="#" class="button">Xem</a>
                            <a href="#" class="button">Sửa</a>
                            <a href="index.php?role=admin&manage=menu&action=delete&id=<?php echo $row['item_id']?>" class="button" onclick="return confirm('Bạn có chắc chắn muốn xóa món ăn này?');">Xóa</a>
                        </td>
                    </tr>

                    <!-- Các món ăn khác sẽ được lặp qua ở đây -->
                    <?php /* Ở đây sẽ là vòng lặp PHP để hiển thị danh sách món ăn */ ?>
                </tbody>
            </table>
            <br>
            <a href="index.php?role=admin" class="button">Trở về</a>
        </section>
    </main>


