<?php
include_once "config/core.php";
 
$page_title="Patient Form";
 
$require_login=true;
include_once "login_checker.php";
 
include_once 'layout_head.php';
 
echo "<div class='col-lg-12'>";
?>

<ul style="font-size: 20px;" class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link active" href='page1.php'>Questions</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href='JSmithform.php'>Patient File</a>
  </li>
</ul>

<div style="margin-left: 15%" class="row">
 <div id="page-wrap">
 	<img src="images/JSmith_form.png">
 	
 </div>
</div>

<?php
include 'layout_foot.php';
?>
