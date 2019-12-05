<?php
include_once "config/core.php";
 
$page_title="Choose One Case To Explore";
 
$require_login=true;
include_once "login_checker.php";
 
include_once 'layout_head.php';
 
echo "<div class='col-md-12'>";
 
    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    if($action=='login_success'){
        echo "<div class='alert alert-info'>";
            echo "<strong>Hi " . $_SESSION['firstname'] . ", welcome back!</strong>";
        echo "</div>";
    }
 
    else if($action=='already_logged_in'){
        echo "<div class='alert alert-info'>";
            echo "<strong>You are already logged in.</strong>";
        echo "</div>";
    }
 
    echo "<div class='allCases'>";
        echo "<form class='choose_case' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'><br>";

            echo "<a href='page1.php'> <img class='profile-img' src='images/photo3.jpeg'></a>";
            echo "<a href='#'> <img class='profile-img' src='images/JohnSmith.png'></a>";
            echo "<a href='#'> <img class='profile-img' src='images/Avatar2.png'></a>";
            
        echo "</form>";
       
echo "</div>";
 
include 'layout_foot.php';
?>