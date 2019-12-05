<?php
include_once "config/core.php";
 
$page_title = "Register";
 
include_once "login_checker.php";
 
include_once 'config/database.php';
include_once 'objects/user.php';
include_once "libs/php/utils.php";
 
include_once "layout_head.php";
 
echo "<div class='col-md-12'>";

	if($_POST){
	 
	    $database = new Database();
	    $db = $database->getConnection();
	 
	    $user = new User($db);

	    $utils = new Utils();
	 
	    //$user->email=$_POST['email'];
	   	$user->username=$_POST['username'];
/*
	 //check for email duplication
	    if($user->emailExists()){
	        echo "<div class='alert alert-danger'>";
	            echo "The email you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
	        echo "</div>";
	    }
	 
	    else{
	       
	        $user->firstname=$_POST['firstname'];
	        $user->lastname=$_POST['lastname'];
	        $user->contact_number=$_POST['contact_number'];
	        $user->address=$_POST['address'];
	        $user->password=$_POST['password'];
	        $user->access_level='Customer';
	        $user->status=1;
	         
	        if($user->create()){
	         
	            echo "<div class='alert alert-info'>";
	                echo "Successfully registered. <a href='{$home_url}login.php'>Please login</a>.";
	            echo "</div>";
	         
	            $_POST=array();
	         
	        }else{
	            echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
	        }
	    }
*/
		// check if username already exists	    
	    if($user->usernameExists()){
	        echo "<div class='alert alert-danger'>";
	            echo "The username you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
	        echo "</div>";
	    }
	 
	    else{
	        $user->firstname=$_POST['firstname'];
	        $user->lastname=$_POST['lastname'];
	        //$user->contact_number=$_POST['contact_number'];
	        //$user->address=$_POST['address'];
	        $user->email=$_POST['email'];
	        $user->password=$_POST['password'];
	        $user->access_level='Customer';
	        $user->status=1;
	         
	        if($user->create()){
	         
	            echo "<div class='alert alert-info'>";
	                echo "Successfully registered. <a href='{$home_url}login.php'>Please login</a>.";
	            echo "</div>";
	         
	            $_POST=array();
	         
	        }else{
	            echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
	        }
	    }
	}

	?>
	<form action='register.php' method='post' id='register'>
	 
	    <table class='table table-responsive'>
	    	<h2 class="h2_login"> REGISTRATION FORM </h2>

	 		<tr>
	            <td class='width-30-percent'>User Name</td>
	            <td><input type='text' name='username' class='form-control' required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>

	        <tr>
	            <td class='width-30-percent'>First Name</td>
	            <td><input type='text' name='firstname' class='form-control' required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>
	 
	        <tr>
	            <td>Last Name</td>
	            <td><input type='text' name='lastname' class='form-control' required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>
	 
	        <!--<tr>
	            <td>Contact Number</td>
	            <td><input type='text' name='contact_number' class='form-control' required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>
	 
	        <tr>
	            <td>Address</td>
	            <td><textarea name='address' class='form-control' required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : "";  ?></textarea></td>
	        </tr>-->
	 
	        <tr>
	            <td>Email</td>
	            <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
	        </tr>
	 
	        <tr>
	            <td>Password</td>
	            <td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
	        </tr>
	 
	        <tr>
	            <td></td>
	            <td>
	                <button type="submit" class="btn btn-primary">
	                    <span class="glyphicon glyphicon-plus"></span> Register
	                </button>
	            </td>
	        </tr>
	 
	    </table>
	</form>
	<?php
 
echo "</div>";
 
include_once "layout_foot.php";
?>