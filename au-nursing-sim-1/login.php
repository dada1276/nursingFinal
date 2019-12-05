<?php
   include_once "config/core.php";
    
   $page_title = "Login";
    
   $require_login=false;
   include_once "login_checker.php";
    
   $access_denied=false;
    
   if($_POST){

   include_once "config/database.php";
   include_once "objects/user.php";
    
   // get database connection
   $database = new Database();
   $db = $database->getConnection();
    
   $user = new User($db);
    /*<!--- ---->*/

    // check if email and password are in the database
    $user->username=$_POST['username'];
     
    $username_exists = $user->usernameExists();
     
    if ($username_exists && password_verify($_POST['password'], $user->password) && $user->status==1){
     
        // if it is, set the session value to true
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['access_level'] = $user->access_level;
        $_SESSION['firstname'] = htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8') ;
        $_SESSION['lastname'] = $user->lastname;
     
        // if access level is 'Admin', redirect to admin section
        if($user->access_level=='Admin'){
            header("Location: {$home_url}admin/index.php?action=login_success");
        }
     
        // else, redirect only to 'Customer' section
        else{
            header("Location: {$home_url}index.php?action=login_success");
        }
    }
     
    // if username does not exist or password is wrong
    else{
        $access_denied=true;
    }
    } 



    /*<!---- ---->
   // check if email and password are in the database
   $user->email=$_POST['email'];
    
   $email_exists = $user->emailExists();
    
   if ($email_exists && password_verify($_POST['password'], $user->password) && $user->status==1){
    
       // if it is, set the session value to true
       $_SESSION['logged_in'] = true;
       $_SESSION['user_id'] = $user->id;
       $_SESSION['access_level'] = $user->access_level;
       $_SESSION['firstname'] = htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8') ;
       $_SESSION['lastname'] = $user->lastname;
    
       // if access level is 'Admin', redirect to admin section
       if($user->access_level=='Admin'){
           header("Location: {$home_url}admin/index.php?action=login_success");
       }
    
       // else, redirect only to 'Customer' section
       else{
           header("Location: {$home_url}index.php?action=login_success");
       }
   }
    
   // if username does not exist or password is wrong
   else{
       $access_denied=true;
   }
   
*/
   include_once "layout_head.php";
    
   echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
    
   $action=isset($_GET['action']) ? $_GET['action'] : "";
    
   if($action =='not_yet_logged_in'){
       echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
   }

   else if($action=='please_login'){
       echo "<div class='alert alert-info'>
           <strong>Please login to access the page.</strong>
       </div>";
   }

   else if($action=='email_verified'){
       echo "<div class='alert alert-success'>
           <strong>Your email address have been validated.</strong>
       </div>";
   }

   if($access_denied){
       echo "<div class='alert alert-danger margin-top-40' role='alert'>
           Access Denied.<br /><br />
           Your username or password maybe incorrect
       </div>";
   }
       echo "<div class='account-wall'>";
           echo "<div id='my-tab-content' class='tab-content'>";
               echo "<div class='tab-pane active' id='login'>";
                  // echo "<img class='profile-img' src='images/login-icon.png'>";
                   echo "<h2 class = 'h2_login'> LOGIN </h2>";
                   echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'><br>";
                       echo "<input type='text' name='username' class='form-control' placeholder='Username' required autofocus /><br>";
                       echo "<input type='password' name='password' class='form-control' placeholder='Password' required /> <br>"; 
                       echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Log In' />";
                   echo "</form>";
               echo "</div>";
           echo "</div>";
       echo "</div>";
    
   echo "</div>";
    
   include_once "layout_foot.php";
   ?>