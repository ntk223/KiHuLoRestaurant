<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combo</title>
    <link rel="stylesheet" href="assets/css/main0.css">
    <link rel="stylesheet" href="assets/css/combo_list.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<main>
<div class="combo-container">
    <h1>Danh sách Combo</h1>
    <br>
    <div class="combo-list">
        <?php if (!empty($result)): ?>
            <?php foreach ($result as $combo): 
                ?>
                <div class="combo-item">
                    <h2><?= $combo['combo_name'] ?></h2>
                    <p><?= $combo['description'] ?></p>
                    <?php $cb = new Combo();
                    $items = $cb->getComboById($combo['combo_id']);
                    $price = 0;
                    foreach ($items as $item) {
                        echo $item['item_name'] . ' x' . $item['quantity'] . '<br>';
                        
                        $price += $item['price'] * $item['quantity'];
                    }
                    echo 'Giá: ' . number_format($price * (1 - $combo['discount']/100)) . 'VNĐ';
                    ?>
                    <form action="index.php?role=customer&page=cart&action=addCombo&id=<?php echo $row['item_id']; ?>" method="POST">
                    <li>
                        Số lượng: 
                        <input type="number" name="quantity" min="1" value="1" class="quantity-input" />
                    </li>
                    <button title="Đi đến giỏ hàng" class="add-to-cart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Hiện chưa có combo nào được hiển thị.</p>
        <?php endif; ?>
    </div>
</div>
