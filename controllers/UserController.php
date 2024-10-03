<?php 
require_once "models/User.php";
class UserController
{
    public function register()
    {
        include "views/user/register.php";
        if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])) 
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $user = new User();
            if ( $user->checkUserExist($username, $email) == true) {
                echo "User already exists";
                return ;
                //header ("Location: index.php");
            }
            $user->createUser($username, $password, $email, $phone, $address);
        }
    }
    public function login()
    {
        include "views/user/login.php";
        if ( isset($_POST['email']) && isset($_POST['password'])) 
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User();
            if ( $user->login($email, $password) == false) {
                echo "Login failed";
                return ;
            }
            echo "Login successfully";
        }
    }
}
?>