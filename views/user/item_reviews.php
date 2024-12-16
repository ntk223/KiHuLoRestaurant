<?php if ($reviews->num_rows > 0) { ?>
    <br><br><br><br><br><br>
    <h2>Review cho món ăn</h2>
    <ul>
        <?php while ($review = $reviews->fetch_assoc()) { ?>
            <li>
                <p><strong>Người dùng:</strong> <?php echo $review['username']; ?></p>
                <p><strong>Đánh giá:</strong> <?php echo $review['rating']; ?> sao</p>
                <p><strong>Nhận xét:</strong> <?php echo $review['review_text']; ?></p>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p>Chưa có review cho món ăn này.</p>
<?php } ?>

<!-- Form thêm review mới -->
<form action="index.php?role=customer&page=review&action=add&item_id=<?php echo $_GET['item_id']; ?>" method="POST">
    <label for="rating">Đánh giá:</label>
    <select name="rating" id="rating">
        <option value="1">1 sao</option>
        <option value="2">2 sao</option>
        <option value="3">3 sao</option>
        <option value="4">4 sao</option>
        <option value="5">5 sao</option>
    </select><br>
    
    <label for="comment">Nhận xét:</label>
    <textarea name="review_text" id="comment" rows="4"></textarea><br>
    
    <button type="submit" name="submit">Gửi review</button>
</form>
