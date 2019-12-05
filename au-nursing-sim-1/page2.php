<?php
include_once "config/core.php";
 
$page_title="Result";
 
$require_login=true;
include_once "login_checker.php";
 
include_once 'layout_head.php';
 
echo "<div class='col-md-12'>";
?>


<div id="page-wrap">
        <h1>90%</h1>
      <!--  
        <?php


            $answer1a = $_POST['int-question-1-answers'];
            $answer2a = $_POST['int-question-2-answers'];
            $answer3a = $_POST['int-question-3-answers'];

            $totalCorrect1 = 0;
            
            if ($answer1a == "A") { $totalCorrect1++; }
            if ($answer2a == "A") { $totalCorrect1++; }
            if ($answer3a == "C") { $totalCorrect1++; }
            
            //echo "<div id='results'>$totalCorrect1 / 3 correct</div>";


        ?>-->

    </div>

    <?php
include 'layout_foot.php';
?>