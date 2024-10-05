<?php
include_once 'views/user/login.php';
require_once 'config/database.php';
require_once 'config/session.php';

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $db = new Database();
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND role = '$role'";
    $result = $db->Select($query);
    if ($result && $result -> num_rows > 0)
    {
        Session::set('login', true);
        Session::set('username' , $email);
        if ($role == "Customer")
        {
            header('Location: index.php?role=customer&page=index');
        }
        else if ($role == "Seller")
        {
            header('Location: index.php?role=admin&page=index');
        }
    }
    else{
        header ('Location: index.php?in=login');
    }
}
?>