
    <?php
    include_once "../config/core.php";

    include_once '../objects/user.php';
    include_once "../libs/php/utils.php";
     
    // check if logged in as admin
    include_once "login_checker.php";
    include '../config/database.php';

     
    // set page title
    $page_title="REGISTRATION FORM";
     
    // include page header HTML
    include 'layout_head.php';

    echo "<div class='col-md-12'>";

    if($_POST){
     
        $database = new Database();
        $db = $database->getConnection();
     
        $user = new User($db);

        $utils = new Utils();
     
        //$user->email=$_POST['email'];
        $user->username=$_POST['username'];

        if($user->usernameExists()){
            echo "<div class='alert alert-danger'>";
                echo "The username you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
            echo "</div>";
        }
        
        else{
            $user->firstname=$_POST['firstname'];
            $user->lastname=$_POST['lastname'];
            $user->email=$_POST['email'];
            $user->password=$_POST['password'];
            $user->access_level='Customer';
            $user->status=1;
             
            if($user->create()){
             
                echo "<div class='alert alert-info'>";
                    echo "Successfully registered. <a href='{$home_url}login.php'>Click here for Home Page</a>.";
                echo "</div>";
             
                $_POST=array();
             
            }else{
                echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
            }
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

     
        <table class='table table-responsive'>
     
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
                    <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to Admin Home Page</a>
                </td>
            </tr>
     
        </table>
    </form>
<?php
include_once "layout_foot.php";
?>
          