<<<<<<< HEAD
=======
<link rel="stylesheet" href="assets/css/menu.css">
>>>>>>> 0fb762c6f08391d9b762fa2d18db41171c53e69f
<body>
    <h1>Menu</h1>
    <table>
        <tr>
            <th>Item Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()){?>
        <tr>
            <td><?php echo $row['item_name'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['category_id'];?></td>
            <td><img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['item_name']; ?>" style="width:100px;height:100px;"></td>
        </tr>
        <?php } ?>
</table>
</body>