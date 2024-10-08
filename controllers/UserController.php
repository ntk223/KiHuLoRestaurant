<?php 
require_once "models/User.php";
class UserController
{
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function logout()
    {
        Session::destroy();
    }
    public function getUserlist()
    {
        $result = $this->user->getAllUsers();
        include_once "views/admin/manage_users.php";
    }

    public function addUser()
    {
        include_once "views/admin/adduser.php";
        $this->user->add();
    }
    public function deleteUser()
    {
        $this->user->delete();
    }
    public function updateUser()
    {
        $user_inf = $this->user->getUserById((int)$_GET['id']);
        include_once "views/admin/edituser.php";
        $this->user->update();
    }
    public function updateProfileUser(){
        include_once "views/user/profile.php";
        $this->user->updateProfile();
    }
}
?>