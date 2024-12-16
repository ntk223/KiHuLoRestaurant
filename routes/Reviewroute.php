<?php
include_once 'controllers/ReviewController.php';

$role = isset($_GET['role']) ? $_GET['role'] : 'customer';
$reviewController = new ReviewController();
if ($role == 'customer') {
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    switch ($action) {
        case 'index':
            $reviewController->ItemReviews();
            break;
        case 'detail':
            $reviewController->reviewDetail();
            break;
        case 'add':
            $reviewController->addReview();
            break;
        case 'update':
            $reviewController->updateReview();
            break;
        case 'delete':
            $reviewController->deleteReview();
            break;
        default:
            echo "Page not found";
            break;
    }
} 
else {
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    switch ($action) {
        case 'index':
            $reviewController->getAllReviews();
            break;
        case 'detail':
            $reviewController->reviewDetail();
            break;
        case 'update':
            break;
        case 'delete':
            $reviewController->deleteReview();
            break;
        case 'reviewStatistics':
            $reviewController->statisticReview();
            break;
        default:
            echo "Page not found 123";
            break;
    }
}

?>