<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết</title>
    <link rel='stylesheet' href="assets/css/Manage_user.css">
    </head>
<body>
    <table>
        <thead>
            <tr>
                <th>Tên món</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            $discount = 0;
            while ($result&& $row = $result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row['item_name']?></td>
                    <td><img src="<?php echo $row['image_url']?>" alt="image" width="100px"></td>
                    <td>
                        <form action="index.php?role=admin&manage=combo&action=updateitem&item_id=<?php echo $row['combo_item_id'] ?>&id=<?php echo $_GET['id']?>" method="post">
                            <input type="number" name="quantity" value="<?php echo $row['quantity']?>" min="1">
                            <input type="submit" value="Cập nhật">
                        </form>
                    </td>
                    <td><?php echo $row['price']?></td>
                    <td><a href="index.php?role=admin&manage=combo&action=deleteitem&item_id=<?php echo $row['combo_item_id'] ?>&id=<?php echo $_GET['id']?>">Xóa</a></td>
                </tr>
                <?php $total += $row['price'] * $row['quantity']; 
                    $discount = $row['discount'];?>
                <?php }/* Ở đây sẽ là vòng lặp PHP để hiển thị chi tiết combo */ 
                $total = $total*(1 - $discount/100)?>
            </tbody>
            <?php echo "<tr><td colspan='3'>Tổng cộng</td><td>$total</td></tr>"; ?>
    </table>
    
    <div>
    <h3>Thêm món</h3>
    <form action="index.php?role=admin&manage=combo&action=additem&id=<?php echo $_GET['id']?>" method="post">
        <label for="item">Món ăn</label>
        <select name="item" id="item">
            <?php 
            include_once 'models/MenuItem.php';
            $item = new MenuItem();
            $result = $item->getMenuItem();

            while ($row = $result->fetch_assoc()){
            ?>
                <option value="<?php echo $row['item_id']?>"><?php echo $row['item_name']?></option>
            <?php } ?>
        </select>
        <label for="quantity">Số lượng</label>
        <input type="number" name="quantity" id="quantity">
        <input type="submit" value="Thêm">
    </div>
    <a href="index.php?role=admin&manage=combo" class="button">Trở về</a>
</body>
</html>