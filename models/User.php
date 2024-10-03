 <?php
require_once "config/database.php";
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function createUser($username, $password, $email, $phone, $address)
    {
        $query = "INSERT INTO users (username, password, email, phone, address, role) VALUES ('$username', '$password', '$email', '$phone', '$address', 'customer')";
        $result = $this->db->Insert($query);
        echo "User created successfully";
        return $result;
    }
    public function checkUserExist($username, $email)
    {
        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = $this->db->Select($query);
        if ( $result == null) {
            return false;
        }
        return true;
    }
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->db->Select($query);
        return $result;
    }
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->db->Select($query);
        return $result;
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->db->Select($query);
        if ( $result == null) {
            return false;
        }
        return true;
    }

}
 ?>
