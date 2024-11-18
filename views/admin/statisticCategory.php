<main>
<h1 style="text-align: center;">Thống kê Loại Món Ăn</h1>
    <table>
        <thead>
            <tr style="background-color: #f2f2f2; font-weight: bold;">
                <th>Loại món</th>
                <th>Số lượng món</th>
                <th>Phần trăm loại món ăn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td style="text-align: center;"><?= $row['Loại món'] ?></td>
                    <td style="text-align: center;"><?= $row['Số lượng món'] ?></td>
                    <td style="text-align: center;"><?= $row['Phần trăm loại món ăn'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
