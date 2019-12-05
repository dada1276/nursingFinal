<?php
include_once "../config/core.php";
 
include_once "login_checker.php";
 
include_once '../config/database.php';
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
$page_title = "User Information";
 
// include page header HTML
include_once "layout_head.php";
 
echo "<div class='col-md-12'>";
 
    $stmt = $user->readAll($from_record_num, $records_per_page);
 
    $num = $stmt->rowCount();
 
    $page_url="read_users.php?";
 
    include_once "read_users_template.php";
 
echo "</div>";
 
include_once "layout_foot.php";
?>