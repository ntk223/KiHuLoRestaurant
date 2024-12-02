<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê món ăn</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>

<link rel="stylesheet" href="assets/css/tableview.css">
</head>
<main>
<h1 style="text-align: center;">Thống kê</h1>
    <table>
        <thead>
            <tr >
                <th>Loại món</th>
                <th>Số lượng món</th>
                <th>Phần trăm loại món ăn</th>
            </tr>
        </thead>
        <tbody>
            <?php include_once "models/MenuItem.php";
            $menuItem = new MenuItem();
            $result = $menuItem->statisticCategory();
            while ($row = $result->fetch_assoc()) { ?>

                <tr>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['num_of_item']; ?></td>
                    <td><?php echo $row['rate']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h1 style="text-align: center;">Thống kê Món Ăn</h1>
    <table>
        <thead>
            <tr>
                <th>Tên món</th>
                <th>Số lượng đã bán</th>
                <th>Đánh giá trung bình</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $menuItem->statisticItem();
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['total_sales']; ?></td>
                    <td><?php echo $row['avg_rating']; ?></td>
                </tr>
            <?php } ?>
    </table>
</main>

<a href="index.php?role=admin&manage=menu">Trở về</a>
