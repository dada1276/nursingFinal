<?php
include_once "config/core.php";
 
$page_title="Answer to Proceed";
 
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

<style>
  .questions {
   font-size: 20px; 
   color: green;
  }
</style>

<div class="row">
      
      <div class="column">
        
        <div id="page-wrap">

        <h1>Select the important questions</h1><br>
        <ol>
            <li><p><label> Were you born or raised outside the USA?  <button onclick="myFunction1()">select</button> </label> </p> </li>
            <p class = "questions" id ="Q1"></p>
            <li><p><label> Have you ever had a positive TB test?  <button onclick="myFunction2()">select</button> </label> </p> </li>
            <p class = "questions" id ="Q2"></p>
            <li><p><label> Ever had a chest x-ray for TB?  <button onclick="myFunction3()">select</button> </label> </p> </li>
            <p class = "questions" id ="Q3"></p>
            <li><p><label> Do you have a condition or take a medicine that weakens the immune system?  <button onclick="myFunction4()">select</button> </label> </p> </li>
            <p class = "questions" id ="Q4"></p>
            <li><p><label> Are you currently pregnant?   <button onclick="myFunction5()">select</button> </label> </p> </li>
            <p class = "questions" id ="Q5"></p>
            <li><p><label> Have you ever been sick with or treated for TB?  <button onclick="myFunction6()">select</button> </label> </p> </li>
            <p class = "questions" id ="Q6"></p>
            <li><p><label> Have you ever lived or worked in a refugee camp, homeless shelter or jail?  <button onclick="myFunction7()">select</button> </label> </p> </li>
            <p class = "questions" id ="Q7"></p>
            <li><p><label> Have you ever been a healthcare worker? <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>


            <li><p><label> Have you ever traveled to the developing world and had close contact with the local population? <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you had an unexplained cough lasting longer than 3 weeks? <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you had an unexplained fever? <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you had hemoptysis?  <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you had unexplained weight loss? <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you had a poor appetite? <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you had night sweats?<button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you been experiencing fatigue?   <button>select</button></label></p> </li>
            <li><p><label> Are you a current close contact of a person known or suspected to have TB? <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Do you use illicit drugs?  <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you been to a public pool in the last 6 months?<button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Have you eaten any unpasteurized food products? <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
            <li><p><label> Would you be able to provide a 3-day food history?  <button>select</button></label></p> </li>
            <li><p><label> Have you experienced hematuria?  <button onclick="myFunction()">select</button> </label> </p> </li>
            <p class = "questions" id = "no"></p>
        </ol>
        
            
            <form action="result.php" method="post" id="quiz">

            <!--<input type="submit" value="NEXT" class="submitbtn" />-->
            <button style="margin-left: 50%;" type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-triangle-right"></span> NEXT
            </button>
        
        </form>
    
    </div>
</div>

      
      <div style="" class="column">
        <h1 style="text-align: center;">Patient info</h1> <br>
        <img style="width: 400px; margin-left: 40px" src="images/johndoe.png">
      </div>

       <form style=" margin-left: 75%;" action="index.php" method="post" id="quiz">
          <button action="index.php" type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-triangle-left"></span> BACK
            </button>
      </form>

      <script>
      function myFunction1() {
        document.getElementById("Q1").innerHTML = "Patient: No";
      }

      function myFunction2() {
        document.getElementById("Q2").innerHTML = "Patient: No";
      }

      function myFunction3() {
        document.getElementById("Q3").innerHTML = "Patient: No";
      }

      function myFunction4() {
        document.getElementById("Q4").innerHTML = "Patient: No";
      }

      function myFunction5() {
        document.getElementById("Q5").innerHTML = "Patient: No";
      }

      function myFunction6() {
        document.getElementById("Q6").innerHTML = "Patient: No";
      }

       function myFunction7() {
        document.getElementById("Q7").innerHTML = "Patient: Yes, a homeless shelter";
      }
      </script>

</div>


<?php
include 'layout_foot.php';
?>