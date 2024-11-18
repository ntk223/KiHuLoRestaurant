<?php
include_once 'controllers/ReviewController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$reviewController = new ReviewController();
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
        echo "This is delete page";
        break;
    default:
        echo "Page not found 123";
        break;
}
?>