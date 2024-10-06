<?php
include_once 'views/user/register.php';
require_once 'config/database.php';
require_once 'config/session.php';

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $db = new Database();
    $query = "SELECT * FROM users WHERE email = '$email' AND phone = '$phone' AND username = '$username'";
    $result = $db->Select($query);
    if ($result && $result -> num_rows > 0)
    {
        echo "User already exists";
        header ('Location: index.php?in=register');
        return ;
    }
    else{
        $query = "INSERT INTO users (username, password, email, phone, address, role) VALUES ('$username', '$password', '$email', '$phone', '$address', 'customer')";
        $result = $db->Insert($query);
        header ('Location: index.php?in=login');
    }
}
?>