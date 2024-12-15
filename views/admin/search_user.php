<form action="index.php?role=admin&manage=customer&action=search" method="POST">
    <!-- Hidden fields để điều hướng đúng -->
    <!-- <input type="hidden" name="action" value="search">
    <input type="hidden" name="role" value="seller">
    <input type="hidden" name="manage" value="customer"> -->
    
    <!-- Các bộ lọc -->
    <label for="user_id">ID:</label>
    <input type="text" id="user_id" name="user_id" placeholder="Nhập ID">
    
    <label for="username">Tên:</label>
    <input type="text" id="username" name="username" placeholder="Nhập tên">
    
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Nhập email">
    
    <label for="phone">Số điện thoại:</label>
    <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại">
    
    <label for="role">Vai trò:</label>
    <select id="role" name="role">
        <option value="">Tất cả</option>
        <option value="seller">Seller</option>
        <option value="customer">Khách hàng</option>
    </select>
    
    <button type="submit" class="button">Tìm kiếm</button>
</form>
