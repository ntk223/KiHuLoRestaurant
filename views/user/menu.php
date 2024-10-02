<body>
    <?php while ($row = $result->fetch_assoc()){?>
    <table>
        <tr>
            <td><?php echo $row['item_name'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['category_id'];?></td>
            <td><img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['item_name']; ?>" style="width:100px;height:100px;"></td>
        </tr>
    </table>


    <?php } ?>
</body>
</html>