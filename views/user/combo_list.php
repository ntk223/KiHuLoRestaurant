<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combo</title>
    <link rel="stylesheet" href="assets/css/main0.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<div class="combo-container">
    <h1>Danh sách Combo</h1>
    <div class="combo-list">
        <?php if (!empty($result)): ?>
            <?php foreach ($result as $combo): ?>
                <div class="combo-item">
                    <img src="<?= $combo['image_url'] ?>" alt="<?= $combo['combo_name'] ?>" />
                    <h2><?= $combo['combo_name'] ?></h2>
                    <p><?= $combo['description'] ?></p>
                    <p><strong>Giá:</strong> <?= number_format($combo['price'], 0, ',', '.') ?> VND</p>
                    <a href="index.php?role=customer&page=comboDetail&id=<?= $combo['combo_id'] ?>" class="btn">Chi tiết</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Hiện chưa có combo nào được hiển thị.</p>
        <?php endif; ?>
    </div>
</div>
