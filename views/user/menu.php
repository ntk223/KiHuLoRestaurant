<link rel="stylesheet" href="assets/css/menu.css">
    <div class="menu">
    <?php while ($row = $result->fetch_assoc()){?>
        <div class="food">
        <ul>
            <li><img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['item_name']; ?>" style="widli:200px;height:150px;"></li>
            <li>Tên món: <?php echo $row['item_name'];?></li>
            <li>Giá: <?php echo $row['price'];?> VNĐ</li>
            <li>Loại: <?php if($row['category_id'] == 1) echo 'Món chính';
                            elseif($row['category_id'] == 2) echo 'Món khai vị';
                            elseif($row['category_id'] == 3) echo 'Nước uống';
                            else echo 'Tráng miệng';?></li>
        </ul>
        </div>
    <?php } ?>
    </div>