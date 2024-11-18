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

}

?>