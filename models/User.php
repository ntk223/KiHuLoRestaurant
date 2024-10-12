<?php
require_once "config/database.php";
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE user_id = '$id'";
        $result = $this->db->Select($query);

        return $result->fetch_assoc();
    }
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->db->Select($query);
        return $result;
    }
    public function checkUserExist($username, $email)
    {
        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = $this->db->Select($query);
        if ($result && $result -> num_rows > 0)
        {
            return true;
        }
        return false;
    }
    public function add()
    {
        if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['role'])) 
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            if ( $this->checkUserExist($username, $email) == true) {
                echo "User already exists";
                header('Location:index.php?role=admin&manage=customer&action=add');
            }
            else{
                $query = "INSERT INTO users (username, password, email, phone, address, role) VALUES ('$username', '$password', '$email', '$phone', '$address', '$role')";
                $result = $this->db->Insert($query);
                header('Location:index.php?role=admin&manage=customer');
            }
        }
    }
    public function delete()
    {
        if ( isset($_GET['id'])) 
        {
            $id = $_GET['id'];
            $query = "DELETE FROM users WHERE user_id = '$id'";
            $result = $this->db->Delete($query);
            header('Location:index.php?role=admin&manage=customer');
        }
    }
    public function update()
    {
        if (isset($_POST['submit'])) 
        {
            $id = $_GET['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $query = "UPDATE users SET username = '$username', password = '$password', email = '$email', phone = '$phone', address = '$address', role = '$role' WHERE user_id = '$id'";
            $result = $this->db->Update($query);
            header('Location:index.php?role=admin&manage=customer');
        }
    }
    public function updateProfile(){
        if (isset($_POST['submit'])) 
        {
            $id = $_SESSION['user_id'];
            $username = $_POST['username'];
            //$password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            //$role = $_POST['role'];
            $query = "UPDATE users SET username = '$username', email = '$email', phone = '$phone', address = '$address' WHERE user_id = '$id'";
            $result = $this->db->Update($query);
            Session::set('username' ,  $username);
            Session::set('phone' ,  $phone);
            //Session::set('role',  $role);
            Session::set('email',  $email);
            Session::set('address',  $address);
            //Session::set('password',  $password);
            header('Location:index.php?role=customer&page=profile');
            ob_end_flush();
        }
    }

}
?>