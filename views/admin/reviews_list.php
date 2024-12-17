<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê người dùng</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<link rel="stylesheet" href="assets/css/tableview.css">
<button id="exportExcel">Tải file Excel</button>
<h2>Danh sách đánh giá cho món: <?php echo $menuItem['item_name']; ?></h2>
<table>
    <tr>
        <th>Người dùng</th>
        <th>Bình luận</th>
        <th>Đánh giá</th>
        <th>Ngày đánh giá</th>
    </tr>
    <?php while ($row = $reviews->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['review_text']; ?></td>
        <td><?php echo $row['rating']; ?>★</td>
        <td><?php echo $row['review_date']; ?></td>
    </tr>
    <?php } ?>
</table>

<script src="assets/js/fileExcel.js"></script>

<a href="index.php?role=admin&manage=menu">Trở về</a>
