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

public function addReview($customer_id, $item_id, $rating, $review_text)
{
    return $this->review->addReview($customer_id, $item_id, $rating, $review_text);
}

} 

?>