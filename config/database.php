<?php
// define("DB_HOST", "localhost");
// define("DB_USER", "root");
// define("DB_PASS", "");
// define("DB_NAME", "restaurant");
Class Database{
    private $host;
    private $user;
    private $password;
    private $dbname;
    private $port;
    private $conn;

    public function __construct() {
        $this->host = "autorack.proxy.rlwy.net";  // Host từ Railway
        $this->user = "root";                     // User từ Railway
        $this->password = "xXHGsINEWUgsKzujRDButPPfLyfXvndN";   // Mật khẩu từ Railway
        $this->dbname = "railway";                // Database name từ Railway
        $this->port = 12546;                      // Port từ Railway
        $this->connectDB();
    }

    public function connectDB() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    // read or select data
    public function Select($query)
    {
        $result = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if ($result->num_rows > 0 ) return $result;
        else return false;
    }

    // insert data
    public function Insert($query)
    {
        $insert_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        // neu dung tra ve true
        if ($insert_row) return $insert_row;
        else return false;
    }
    // update data
    public function Update($query)
    {
        $update_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        // tra ve gia tri khac 0
        if ($update_row) return $update_row;
        else return false;
    }
    // delete data
    public function Delete($query)
    {
        $delete_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if ( $delete_row) return $delete_row;
        else return false;
    }

    public function Query($sql, $params = []) {
        try {
            // Prepare the statement
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Lỗi chuẩn bị truy vấn: " . $this->conn->error);
            }
    
            // Bind parameters if provided
            if ($params) {
                $types = str_repeat('s', count($params)); // Assume all parameters are strings for simplicity
                $stmt->bind_param($types, ...$params);
            }
    
            // Execute the query
            $stmt->execute();
    
            // Check if it’s a SELECT query
            if (stripos(trim($sql), 'SELECT') === 0) {
                $result = $stmt->get_result();
                if (!$result) {
                    throw new Exception("Lỗi thực thi truy vấn: " . $stmt->error);
                }
                return $result; // Return the result set
            } else {
                // For INSERT, UPDATE, DELETE
                return $stmt->affected_rows; // Return number of affected rows
            }
        } catch (Exception $e) {
            echo "Có lỗi xảy ra: " . $e->getMessage();
            return false;
        }
    }
    
}
?>
