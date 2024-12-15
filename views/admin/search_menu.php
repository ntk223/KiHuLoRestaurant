<form action="index.php?role=admin&manage=menu&action=search" method='POST'>
    <label for="menu_id">ID:</label>
    <input type="text" id="menu_id" name="item_id" placeholder="Nhập ID">
    
    <label for="menu_name">Tên:</label>
    <input type="text" id="menu_name" name="item_name" placeholder="Nhập tên">
    
    <label for="menu_price">Giá:</label>
    <input type="text" id="menu_price" name="price" placeholder="Nhập giá">
    
    <label for="category_id">Loại:</label>
    <select id="category_id" name="category_id">
        <option value="">Tất cả</option>
        <option value="1">Món chính</option>
        <option value="2">Khai vị</option>
        <option value="3">Nước uống</option>
        <option value="4">Tráng miệng</option>
    </select>
    
    <button type="submit" class="button">Tìm kiếm</button>    

</form>