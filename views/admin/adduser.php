<style>
    .adduser {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-section {
        display: flex;
        flex-direction: column;
    }

    .form-section h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-section label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-section input,
    .form-section textarea,
    .form-section select {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%;
    }

    .form-section .button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
    }

    .form-section .button:hover {
        background-color: #0056b3;
    }
</style>
<main>
    <main class ="adduser">
<section class="form-section">
    <h2>Thêm người dùng mới</h2>
    <form action="#" method="POST">
        <label for="name">Tên người dùng:</label>
        <input type="text" id="name" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone">

        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="address"></textarea>

        <label for="role">Vai trò:</label>
        <select id="role" name="role">
            <option value="Customer">Customer</option>
            <option value="Seller">Seller</option>
        </select>
        <input type="submit" name="submit" class="button" value="Thêm người dùng">
    </form>
    <a href="index.php?role=admin&manage=customer" class="button">Trở về</a>
</section>
</main>
</main>