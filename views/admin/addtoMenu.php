<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm món ăn vào Menu</title>
    <link rel="stylesheet" href="assets/css/addtoMenu.css"> 
</head>
<body>

    <header>
        <h1>Thêm món ăn mới</h1>
    </header>

    <section class="form-section">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="item_name">Tên món ăn:</label>
            <input type="text" id="item_name" name="item_name" required>

            <label for="category">Danh mục món ăn:</label>
            <select id="category" name="category_id" required>
                <option value="">-- CHỌN DANH MỤC --</option>
                <option value="1">Món chính</option>
                <option value="2">Món khai vị</option>
                <option value="3">Đồ uống</option>
                <option value="4">Tráng miệng</option>
            </select>

            <label for="description">Mô tả món ăn:</label>
            <textarea id="description" name="description" rows="4" placeholder="Nhập mô tả món ăn..."></textarea>

            <label for="price">Giá món ăn (VND):</label>
            <input type="number" id="price" name="price" step="0.01" min="0" required>

            <label for="available">Còn bán:</label>
            <select id="available" name="available">
                <option value="1" selected>Có</option>
                <option value="0">Không</option>
            </select>

            <label for="image">Hình ảnh món ăn:</label>
            <input type="file" id="image" name="image_url" accept="image/*">

            <button type="submit" name = 'submit' class="button">Thêm món ăn</button>
        </form>
    </section>

</body>
</html>
