<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/menu.css">
<main>
  <div class="menu">
    <div style="width : 100%">
      <h1 style="margin: 10px;">
        <?php if(isset($_GET['cate'])){
          if($_GET['cate'] == 'all') echo 'Tất cả';
          elseif($_GET['cate'] == 1) echo 'Món chính';
          elseif($_GET['cate'] == 2) echo 'Món khai vị';
          elseif($_GET['cate'] == 3) echo 'Nước uống';
          else echo 'Tráng miệng';
        }else echo 'Tất cả';?>  
        :
      </h1>
</div>
  <?php while ($row = $result->fetch_assoc()){?>
      <div class="food">
      <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['item_name']; ?>" style="width:200px;height:170px;">
      <ul>
          <li>Tên món: <?php echo $row['item_name'];?></li>
          <li>Giá: <?php echo $row['price'];?> VNĐ</li>
          <li>Loại: <?php if($row['category_id'] == 1) echo 'Món chính';
                          elseif($row['category_id'] == 2) echo 'Món khai vị';
                          elseif($row['category_id'] == 3) echo 'Nước uống';
                          else echo 'Tráng miệng';?></li>
          <li>
            Số lượng: 
            <input type="number" name="quantity" min="1" value="1" class="quantity-input"/>
        </li>
          <li>Bấm để thêm vào giỏ hàng</li>
      </ul>
      </div>
    <?php } ?>
</div>
</main>
