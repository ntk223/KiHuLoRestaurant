<main>
    <section class="form-section">
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="item_id" name="item_id" value="1"> 

            <label for="item_name">Tên món ăn:</label>
            <input type="text" id="item_name" name="item_name" value="Tên món ăn hiện tại" required> 

            <label for="category">Danh mục món ăn:</label>
            <select id="category_name" name="category_name" required>
                <option value="">-- CHỌN DANH MỤC --</option>
                <option value="1" selected>Món chính</option>
                <option value="2">Món khai vị</option>
                <option value="3">Đồ uống</option>
            </select>

            <label for="description">Mô tả món ăn:</label>
            <textarea id="description" name="description" rows="4">Mô tả hiện tại của món ăn...</textarea>

            <label for="price">Giá món ăn (VND):</label>
            <input type="number" id="price" name="price" value="100000" step="0.01" min="0" required>

            <label for="available">Còn bán:</label>
            <select id="available" name="available">
                <option value="1" selected>Có</option>
                <option value="0">Không</option>
            </select>

            <label for="image">Hình ảnh món ăn:</label>
            <input type="file" id="image" name="image_url" accept="image/*">

            <a href="#" class="button">Lưu thay đổi</a>
        </form>
        </form>
    </section>

</main>
