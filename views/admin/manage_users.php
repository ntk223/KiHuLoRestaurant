<link rel= 'stylesheet' href="assets/css/manage_user.css">
<main>
    
    <!-- Bảng người dùng hiện có -->
    <section class="user-table-section">
        <a href="index.php?role=admin&manage=customer&action=add" class="button">Thêm người dùng</a>

        <h2>Danh sách người dùng</h2>
        <form action="#" method="POST">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Vai trò</th>
                    <th>Ngày đăng ký</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                 <?php while ($row = $result->fetch_assoc()){?>
                <tr></tr>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['role'];?></td>
                    <td><?php echo $row['registration_date'];?></td>
                    <td>
                    <a href="index.php?role=admin&manage=customer&action=update&id=<?php echo $row['user_id']?>" class="button">Sửa</a>
                    <a href="index.php?role=admin&manage=customer&action=delete&id=<?php echo $row['user_id']?>" class="button"
                    onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này?');">Xóa</a>
                    </td>
                <?php }?>
            </tbody>
        </table>
        </form>
        <br>
        <a href="index.php?role=admin" class="button">Trở về</a>

    </section>

                 </main>
