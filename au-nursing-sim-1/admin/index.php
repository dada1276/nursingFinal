<?php
// core configuration
include_once "../config/core.php";
 
// check if logged in as admin
$require_login=true;
include_once "login_checker.php";

include_once '../objects/user.php';
include_once "../libs/php/utils.php";
 
include '../config/database.php';
 
// set page title
$page_title="User Information";
 
// include page header HTML
include 'layout_head.php';
 
    echo "<div class='col-md-12'>";
 
        $action = isset($_GET['action']) ? $_GET['action'] : "";
 
        if($action=='already_logged_in'){
            echo "<div class='alert alert-info'>";
                echo "<strong>You</strong> are already logged in.";
            echo "</div>";
        }
 
        else if($action=='logged_in_as_admin'){
            echo "<div class='alert alert-info'>";
                echo "<strong>You</strong> are logged in as admin.";
            echo "</div>";
        }


        //Deleting
        $action = isset($_GET['action']) ? $_GET['action'] : "";
         
        // if it was redirected from delete.php
        if($action=='deleted'){
            echo "<div class='alert alert-success'>Record was deleted.</div>";
        }
 
    echo "</div>";


    include_once '../config/database.php';
    include_once '../objects/user.php';
     
    $database = new Database();
    $db = $database->getConnection();
     
    $user = new User($db);
     
     
    echo "<div class='col-md-12'>";
     
        $stmt = $user->readAll($from_record_num, $records_per_page);
     
        $num = $stmt->rowCount();
     
        $page_url="read_users.php?";
     
        include_once "read_users_template.php";

     
    echo "</div>";
 
?>

<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
     
    var answer = confirm('Please Confirm to Delete');
    if (answer){
        window.location = 'delete.php?id=' + id;
    } 
}
</script>

<?php
include_once 'layout_foot.php';
?>