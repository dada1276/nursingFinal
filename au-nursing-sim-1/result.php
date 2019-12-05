<?php
include_once "config/core.php";
 
$page_title="Game Prototype";
 
$require_login=true;
include_once "login_checker.php";
 
include_once 'layout_head.php';
 
echo "<div class='col-md-12'>";
?>

<!--<div class="game_proto">
    <img style="margin-left: 25%;" src="images/hospital.jpg">
  </div>-->
<!--
<div class="game_proto">
<img style="margin-left: 35%" src="images/hospital.jpg" width="500" height="500" alt="Planets" usemap="#planetmap">

<map name="planetmap">
  <area class="arm" shape="rect" coords="050,180,160,280" title="click here" onclick="image1(this)">
  <p id="demo"></p>
  <area class="chest" shape="rect" coords="150,150,200,200" title="click here" onclick="image2(this)">
  <area class="chest" shape="rect" coords="220,230,270,300" title="click here" onclick="image3(this)">
-->
<!--
  <area class="chest" shape="rect" coords="150,150,200,200" title="click here" href="index.php">
  <area class="chest" shape="rect" coords="220,230,270,300" title="click here" href="index.php">
-->
<!--
</map>
</div>

<script type="text/javascript">
function image1(img) {
    var src = img.src;

if (confirm("Do you want to do TB skin test?")) {
    txt = "You said yes";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}


function image2(img) {
    var src = img.src;

if (confirm("Do you want to do Chest x-ray?")) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}

function image3(img) {
    var src = img.src;

if (confirm("Wnat to do both chest x-ray and skin TB test?")) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}

</script>
-->

<div class="row">

    <div class="column">
        <h1 style="text-align: center;"></h1> <br>

        <img src="images/hospital.jpg">
      </div>

      
      <div class="column">
        
        <div id="page-wrap">

        <h1>Select an intervention</h1><br>
        
        <form action="page2.php" method="post" id="quiz">
        
            <ol style="font-size: 25px;">
                <li>
                    <h3>What do you recommend for this patient?</h3>
                    
                    <div>
                        <input type="radio" name="int-question-1-answers" id="int-question-1-answers-A" value="A" />
                        <label for="int-question-1-answers-A"> TB skin test </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="int-question-1-answers" id="int-question-1-answers-B" value="B" />
                        <label for="int-question-1-answers-B"> Chest x-ray </label>
                    </div>

                     <div>
                        <input type="radio" name="int-question-1-answers" id="int-question-1-answers-D" value="C" />
                        <label for="int-question-1-answers-B"> TB skin test and chest x-ray  </label>
                    </div>

                     <div>
                        <input type="radio" name="int-question-1-answers" id="int-question-1-answers-D" value="D" />
                        <label for="int-question-1-answers-B"> Nothing needed at this time </label>
                    </div>

                    
                </li>
                
                <li>
                    <h3>What does the result reveal? </h3>
                    
                    <div>
                        <input type="radio" name="int-question-2-answers" id="int-question-2-answers-A" value="A" />
                        <label for="int-question-2-answers-A"> TB skin test -- Result: Negative </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="int-question-2-answers" id="int-question-2-answers-B" value="B" />
                        <label for="int-question-2-answers-B"> Chest x-ray -- Result: Negative </label>
                    </div>

                       <div>
                        <input type="radio" name="int-question-2-answers" id="int-question-2-answers-C" value="C" />
                        <label for="int-question-2-answers-B"> TB skin test and chest x-ray -- Result: Both Negative) </label>
                    </div>

                </li>
                
                <li>
                
                    <h3>The Patient Has? </h3>
                    
                    <div>
                        <input type="radio" name="int-question-3-answers" id="int-question-3-answers-A" value="A" />
                        <label for="int-question-3-answers-A"> Active TB </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="int-question-3-answers" id="int-question-3-answers-B" value="B" />
                        <label for="int-question-3-answers-B"> Latent TB </label>
                    </div>

                     <div>
                        <input type="radio" name="int-question-3-answers" id="int-question-3-answers-C" value="C" />
                        <label for="int-question-3-answers-B"> No exposure to TB </label>
                    </div>
                
                </li>
            
            </ol> <br>
            
           <button style="margin-left: 50%;" type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-triangle-right"></span> NEXT
            </button>
        
        </form>
    
    </div>
</div>

    
       <form style=" margin-left: 75%;" action="page1.php" method="post" id="quiz">
          <button action="index.php" type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-triangle-left"></span> BACK
            </button>
      </form>

</div>

<!--<div id="page-wrap">
		<h1></h1>
		
        <?php

            $answer1 = $_POST['question-1-answers'];
            $answer2 = $_POST['question-2-answers'];
            $answer3 = $_POST['question-3-answers'];
            $answer4 = $_POST['question-4-answers'];
            $answer5 = $_POST['question-5-answers'];

            $totalCorrect = 0;
            
            if ($answer1 == "B") { $totalCorrect++; }
            if ($answer2 == "B") { $totalCorrect++; }
            if ($answer3 == "B") { $totalCorrect++; }
            if ($answer4 == "A") { $totalCorrect++; }
            if ($answer5 == "B") { $totalCorrect++; }
            
           //echo "<div id='results'>$totalCorrect / 5 correct</div>";

            $percent = ($totalCorrect/5) * 100;
            //echo "<div id='results'>$percent %</div>";


        ?>
	</div>-->
    
<?php
include 'layout_foot.php';
?>