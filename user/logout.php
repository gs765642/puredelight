<?php
session_start();
$response = [];
$status = false;
if (isset($_SESSION['useremail']) && isset($_SESSION['user_id'])) {
    unset($_SESSION['useremail']);
    unset($_SESSION['user_id']);
    $status = true;
}
if ($status) {
    $response['status'] = true;
    $response['error'] = "logout Succes";
    header('location:/puredelight/login');
} else {
    $response['status'] = false;
    $response['error'] = "Unable To Logout";
    header('location:/puredelight/login');
}
