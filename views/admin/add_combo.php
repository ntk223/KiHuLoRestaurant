<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm combo</title>
</head>
<body>
    <form action="index.php?role=admin&manage=combo&action=add" method="post">
        <label for="combo_name">Tên combo</label>
        <input type="text" name="combo_name" id="combo_name" required>
        <label for="discount">Giảm giá</label>
        <input type="number" name="discount" id="discount" required>
        <label for="description">Mô tả</label>
        <input type="text" name="description" id="description" required>
        <input type="submit" value="Thêm">
    </form>
    <a href="index.php?role=admin&manage=combo" class="button">Trở về</a>
</body>
</html>