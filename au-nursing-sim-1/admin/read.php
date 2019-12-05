        <?php

        include_once "../config/core.php";

        include_once '../objects/user.php';
        include_once "../libs/php/utils.php";
         
        $require_login=true;
        include_once "login_checker.php";

         
        // set page title
        $page_title="View Info";
         
        // include page header HTML
        include 'layout_head.php';


        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
         
        include '../config/database.php';
         
        try {
            $query = "SELECT id, username, firstname, lastname, email FROM users WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare( $query );
         
            $stmt->bindParam(1, $id);
         
            $stmt->execute();
         
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];

        }
         
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
        ?>
 

        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td class="columns-for-updates">User Name</td>
                <td><?php echo htmlspecialchars($username, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td class="columns-for-updates">First Name</td>
                <td><?php echo htmlspecialchars($firstname, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td class="columns-for-updates">Last Name</td>
                <td><?php echo htmlspecialchars($lastname, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td class="columns-for-updates">EMAIL</td>
                <td><?php echo htmlspecialchars($email, ENT_QUOTES);  ?></td>
            </tr>

            <tr>
                <td class="columns-for-updates"></td>
                <td>
                    <a href='index.php' class='btn btn-danger'>Back to Admin Home Page</a>
                </td>
            </tr>
        </table>
 
<?php
include_once "layout_foot.php";
?>