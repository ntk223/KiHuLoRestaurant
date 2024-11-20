<?php
include_once 'config/Database.php';
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
}
?>