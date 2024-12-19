<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <link rel="stylesheet" href="assets/css/main0.css">
    <link rel="stylesheet" href="assets/css/review.css" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php if ($reviews->num_rows > 0) { ?>
    <br><br><br><br><br><br><br>
    <h1>Review cho món ăn</h1>
    <ul class="review-list">
        <?php while ($review = $reviews->fetch_assoc()) { ?>
            <li>
                <p><strong>Người dùng:</strong> <?php echo $review['username']; ?></p>
                <p><strong>Đánh giá:</strong> 
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <span style="color: <?php echo $i <= $review['rating'] ? '#fbab00' : '#ccc'; ?>;">★</span>
                    <?php } ?>
                </p>
                <p><strong>Nhận xét:</strong> <?php echo $review['review_text']; ?></p>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p style="text-align: center; color: #fbab00;">Chưa có review cho món ăn này.</p>
<?php } ?>

<!-- Form thêm review mới -->
<form class="review-form" action="index.php?role=customer&page=review&action=add&item_id=<?php echo $_GET['item_id']; ?>" method="POST">
    <label for="rating">Đánh giá:</label>
    <div class="star-rating">
        <input type="radio" id="star5" name="rating" value="5" required /><label for="star5">★</label>
        <input type="radio" id="star4" name="rating" value="4" required /><label for="star4">★</label>
        <input type="radio" id="star3" name="rating" value="3" required /><label for="star3">★</label>
        <input type="radio" id="star2" name="rating" value="2" required /><label for="star2">★</label>
        <input type="radio" id="star1" name="rating" value="1" required /><label for="star1">★</label>
    </div>
    
    <label for="comment">Nhận xét:</label>
    <textarea name="review_text" id="comment" rows="4" placeholder="Viết nhận xét của bạn..."></textarea>
    
    <button type="submit" name="submit">Gửi review</button>
</form>
</body>