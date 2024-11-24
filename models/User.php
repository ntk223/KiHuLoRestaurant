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
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $query = "UPDATE users SET username = '$username', email = '$email', phone = '$phone', address = '$address' WHERE user_id = '$id'";
            $result = $this->db->Update($query);
            Session::set('username' ,  $username);
            Session::set('phone' ,  $phone);
            Session::set('email',  $email);
            Session::set('address',  $address);
            header('Location:index.php?role=customer&page=profile');
            ob_end_flush();
        }
    }
    public function updatePassword() {
        if (isset($_POST['submit'])) 
        {
            $id = $_SESSION['user_id'];
            $password = $_POST['password'];
            $new_pass = $_POST['newpassword'];
            $confirm_pass = $_POST['confirmpassword'];

            $check = $this->db->Select("SELECT * FROM users WHERE user_id = '$id' AND password = '$password'");
            if (!($check->num_rows > 0)) {
                $check  = false;
                header('Location:index.php?role=customer&page=password');
            }
            else{ 
                if ( $new_pass != $confirm_pass) {
                    echo "<p>Mật khẩu mới không trùng khớp</p>";
                    header('Location:index.php?role=customer&page=password');
                }
                else{
                    $query = "UPDATE users SET password = '$new_pass' WHERE user_id = '$id'";
                    $result = $this->db->Update($query);
                    header('Location:index.php?role=customer&page=profile');
                }
            }
            ob_end_flush();
        }
    }

    //Đưa ra khách hàng mua nhiều nhất
    public function getTopCustomers()
    {
        $sql = "SELECT
            u.username, 
            SUM(o.total) AS total_purchase,
            COUNT(o.customer_id) AS total_buy
        FROM users u
        LEFT JOIN orders o ON o.customer_id = u.user_id
        LEFT JOIN deliveries d ON o.order_id = d.order_id
        WHERE d.status = 'Giao hàng thành công'
        GROUP BY u.username
        HAVING total_buy > 0
        ORDER BY total_purchase DESC";
        return $this->db->Select($sql); // Kết nối với database
    }

    //Đưa ra khách hàng hủy nhiều nhất
    public function getCancelRateByCustomer()
    {
        $query = "SELECT 
            u.username,
            COUNT(o.order_id) AS total_orders,
            SUM(CASE WHEN o.order_status = 'Đã hủy' THEN 1 ELSE 0 END) AS cancelled_orders,
            CONCAT(ROUND(SUM(CASE WHEN o.order_status = 'Đã hủy' THEN 1 ELSE 0 END) / COUNT(o.order_id) * 100, 2), '%') AS cancel_rate
        FROM users u
        JOIN orders o ON o.customer_id = u.user_id
        GROUP BY u.username
        HAVING cancelled_orders > 0
        ORDER BY cancel_rate DESC";
        $result = $this->db->Select($query);

        if ($result->num_rows > 0)
        {
            return $result;
        }
        return false;
    }



}
?>