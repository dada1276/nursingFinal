<?php
error_reporting(E_ALL);
 
// start php session
session_start();
  
$home_url="http://192.168.64.2/au-nursing-sim-1/";
 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
$records_per_page = 10;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>