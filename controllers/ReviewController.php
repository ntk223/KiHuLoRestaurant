<?php
include_once 'models/Review.php';

class ReviewController {
    private $review;

    public function __construct() {
        $this->review = new Review();
    }

    public function getAllReviews() {
        $result = $this->review->getReviews();
        include_once "views/admin/manage_review.php";
    }

    public function reviewDetail() {
        $id = $_GET['id'];
        $result = $this->review->ReviewDetail($id);
        include_once "views/admin/reviewdetail.php";
    }

    public function deleteReview() {
        $id = $_GET['id'];
        $result = $this->review->deleteReview($id);
        if ($result) {
            header("Location: index.php?role=admin&manage=review");
        } else {
            echo "Error";
        }
    }

    //Thống kê review
    public function statisticReview() {
        $mostFoodReview = $this->review->getMostFoodReview();
        $mostCusReview = $this->review->getMostCustomerReview();
        include_once "views/admin/statisticReview.php";
    }

    public function getReviewsByItemId($item_id)
    {
        return $this->review->getReviewsByItemId($item_id);
    }

    public function addReview()
    {
        $item_id = isset($_GET['item_id']) ? $_GET['item_id'] : null;
        $this->review->addReview($item_id);
    }


    public function ItemReviews()
    {
        // Lấy item_id từ URL
        $item_id = isset($_GET['item_id']) ? $_GET['item_id'] : null;
        
        if ($item_id) {
            // Lấy review của món ăn từ model
            $reviews = $this->review->getReviewsByItem($item_id); // Phương thức lấy reviews từ DB
            include "views/user/item_reviews.php"; // Gọi view để hiển thị reviews
        } else {
            echo "Không tìm thấy món ăn!";
        }
    }
} 
?>