<?php
ob_start(); // Bắt đầu output buffering
?>
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/menu.css">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
<main>
  <div class="menu">
    <div style="width : 100%">
      <h1>
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
<?php while ($result && $row = $result->fetch_assoc()) { ?>
            <div class="food">
            <a href="index.php?role=customer&page=review&item_id=<?php echo $row['item_id']; ?>" title="Đi đến review món ăn này">
                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['item_name']; ?>" style="width:200px;height:170px;">
                <ul>
                    <li>Tên món: <span style="font-family: 'Dancing Script', cursive;font-size:23px"><?php echo $row['item_name']; ?></span></li>
                    <li>Giá: <?php echo number_format((int)$row['price'], 0, '', '.'); ?> VNĐ</li>
                    <li>Loại: 
                        <?php 
                        if($row['category_id'] == 1) echo 'Món chính';
                        elseif($row['category_id'] == 2) echo 'Món khai vị';
                        elseif($row['category_id'] == 3) echo 'Nước uống';
                        else echo 'Tráng miệng'; 
                        ?>
                    </li>
            </a>
                    <form action="index.php?role=customer&page=cart&action=add&id=<?php echo $row['item_id']; ?>" method="POST">
                    <li>
                        Số lượng: 
                        <input type="number" name="quantity" min="1" value="1" class="quantity-input" />
                    </li>
                    <button title="Đi đến giỏ hàng" class="add-to-cart">Thêm vào giỏ hàng</button>
                    </form>
                    <a href="index.php?role=customer&page=review&item_id=<?php echo $row['item_id']; ?>" title="Đi đến review món ăn này">
                      <button class="add-to-cart">Đánh giá</button>
</a>
                </ul>
            </div>
<?php } ?>

</div>
</main>
</body>
<?php
ob_end_flush(); // Gửi tất cả output ra trình duyệt sau khi PHP hoàn thành
?>