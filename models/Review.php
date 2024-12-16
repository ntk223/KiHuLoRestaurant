<?php
include_once 'config/database.php';
class Review {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getReviews() {
        $query = "SELECT u.username, mi.item_name, r.review_text, r.rating, r.review_date, r.review_id
            FROM reviews r
            JOIN users u ON u.user_id = r.customer_id
            JOIN menuitems mi ON mi.item_id = r.item_id";
        $res = $this->db->Select($query);
        if (  $res ) {
            return $res;
        } else {
            return false;
        }
    }

    public function ReviewDetail($id) {
        $query = "SELECT 
        u.username, u.phone, 
        p.product_name, p.price, 
        r.review_content, r.review_time
        FROM reviews r
        JOIN users u ON r.user_id = u.user_id
        JOIN products p on p.product_id = r.product_id
        WHERE r.review_id = '$id'";

        $result = $this->db->Select($query);
        if (  $result ) {
            return $result;
        } else {
            return false;
        }
    }

    public function deleteReview($id) {
        $query = "DELETE FROM reviews WHERE review_id = '$id'";
        $result = $this->db->Delete($query);
        return $result;
    }


    //Thống kê món ăn được nhiều đánh giá
    public function getMostFoodReview() {
        $query = "SELECT 
        m.item_name, 
        COUNT(r.review_id) AS total_reviews, 
        ROUND(AVG(r.rating), 2) AS avg_rating 
    FROM menuitems m
    LEFT JOIN reviews r ON m.item_id = r.item_id
    GROUP BY m.item_id
    HAVING total_reviews > 0
    ORDER BY total_reviews DESC;";
        $result = $this->db->Select($query);
        if ($result)
        {
            return $result;
        }
        return false;
    }

    //Thống kê người dùng tích cực đánh giá
    public function getMostCustomerReview() {
        $query = "SELECT 
        u.username, 
        COUNT(r.review_id) AS total_reviews, 
        ROUND(AVG(r.rating), 2) AS avg_rating 
    FROM users u
    LEFT JOIN reviews r ON u.user_id = r.customer_id
    GROUP BY u.user_id
    HAVING total_reviews > 0
    ORDER BY total_reviews DESC;";
        $result = $this->db->Select($query);
        if ($result)
        {
            return $result;
        }
        return false;
    }

    // Lấy tất cả các review của món ăn theo item_id
    public function getReviewsByItemId($item_id)
    {
        $query = "SELECT * FROM reviews WHERE item_id = :item_id ORDER BY review_date DESC";
        $stmt = $this->db->Select($query);
        $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     // Thêm review mới vào cơ sở dữ liệu
     public function getReviewsByItem($item_id)
     {
         // Truy vấn lấy các review của món ăn từ bảng reviews
         $query = "SELECT * FROM reviews
                     JOIN users ON reviews.customer_id = users.user_id
                      WHERE item_id = '$item_id'";
         $result = $this->db->Select($query);
         if ($result) return $result;
         else return false;
     }

     public function addReview($item_id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rating = $_POST['rating'];
        $review_text = $_POST['review_text'];
        $customer_id = $_SESSION['user_id']; // Giả sử người dùng đã đăng nhập

        // Thêm review vào cơ sở dữ liệu thông qua ReviewController
        $query = "INSERT INTO reviews (customer_id, item_id, rating, review_text) VALUES ('$customer_id', '$item_id', '$rating', '$review_text')";
        $result = $this->db->Insert($query);
        // Sau khi thêm review, chuyển hướng về trang chi tiết món ăn để hiển thị review mới
        header("Location: index.php?role=customer&page=review&item_id=" . $item_id);
        exit(); // Quan trọng, tránh lỗi khi chuyển hướng
    }
}



}
?>