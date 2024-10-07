<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa món ăn</title>
    <link rel="stylesheet" href="assets/css/editMenu.css"> 
</head>
<body>

    <header>
        <h1>Chỉnh sửa món ăn</h1>
    </header>

    <section class="form-section">
        <form action="#" method="POST" enctype="multipart/form-data">
            <label for="item_name">Tên món ăn:</label>
            <input type="text" id="item_name" name="item_name" value="<?php echo htmlspecialchars($result['item_name']); ?>" required>
            <label for="category">Danh mục món ăn:</label>
            <select id="category_name" name="category_id" required>
                <?php $default_category = $result['category_id']; ?>
                <option value="">-- CHỌN DANH MỤC --</option>
                <option value="1" <?php echo ($default_category == "1") ? 'selected' : ''; ?>>Món chính</option>
                <option value="2" <?php echo ($default_category == "2") ? 'selected' : ''; ?>>Món khai vị</option>
                <option value="3" <?php echo ($default_category == "3") ? 'selected' : ''; ?>>Đồ uống</option>
                <option value="4" <?php echo ($default_category == "4") ? 'selected' : ''; ?>>Tráng miệng</option>
            </select>

            <label for="description">Mô tả món ăn:</label>
            <textarea id="description" name="description" rows="4"><?php echo $result['description']?></textarea>

            <label for="price">Giá món ăn (VND):</label>
            <input type="number" id="price" name="price" value=<?php echo $result['price']?> step="0.01" min="0" required>

            <label for="available">Còn bán:</label>
            <select id="available" name="available">
                <option value="1" selected>Có</option>
                <option value="0">Không</option>
            </select>

            <label for="image">Hình ảnh món ăn:</label>
            <input type="file" id="image" name="image_url" accept="image/*">

            <input type="submit" name="submit" class = "button" value="Cập nhật">
        </form>
        </form>
    </section>

</body>
</html>
