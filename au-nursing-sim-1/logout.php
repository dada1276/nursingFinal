<?php
include_once "config/core.php";
 
session_destroy();
  
header("Location: {$home_url}login.php");
?>