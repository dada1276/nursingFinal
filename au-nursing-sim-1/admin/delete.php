<?php

include_once "../config/core.php";

include_once '../objects/user.php';
include_once "../libs/php/utils.php";
include_once "../config/database.php";

 
$require_login=true;
include_once "login_checker.php";

 // include page header HTML
include 'layout_head.php';
 
try {
 
	$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
    // delete query
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);
     
    if($stmt->execute()){
        header('Location: index.php?action=deleted');
    }else{
        die('Unable to delete record.');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}

include_once 'layout_foot.php';
?>