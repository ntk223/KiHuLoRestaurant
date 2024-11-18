<main>
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .form-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .form-section form {
            display: flex;
            flex-direction: column;
        }

        .form-section label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-section input[type="text"],
        .form-section input[type="number"],
        .form-section select,
        .form-section textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 100%;
        }

        .form-section input[type="file"] {
            margin-bottom: 15px;
        }

        .form-section .button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .form-section .button:hover {
            background-color: #0056b3;
        }
    </style>
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
        <a href="index.php?role=admin&manage=menu" class="button">Trở về</a>
    </section>

</main>
