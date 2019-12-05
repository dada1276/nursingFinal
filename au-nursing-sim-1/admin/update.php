<?php

include_once "../config/core.php";

include_once '../objects/user.php';
include_once "../libs/php/utils.php";
 
$require_login=true;
include_once "login_checker.php";

 
// set page title
$page_title="UPDATE INFORMATION";
 
// include page header HTML
include 'layout_head.php';

        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
         
        //include database connection
       include '../config/database.php';
                
               try {
                   $query = "SELECT id, firstname, lastname, email FROM users WHERE id = ? LIMIT 0,1";
                   $stmt = $con->prepare( $query );
                
                   $stmt->bindParam(1, $id);
                
                   $stmt->execute();
                
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                   $firstname = $row['firstname'];
                   $lastname = $row['lastname'];
                   $email = $row['email'];

               }
                
               catch(PDOException $exception){
                   die('ERROR: ' . $exception->getMessage());
               }
    

         
        // check if form was submitted
        if($_POST){
             
            try{
             
                // write update query
                // in this case, it seemed like we have so many fields to pass and 
                // it is better to label them and not use question marks
                $query = "UPDATE users 
                            SET firstname=:firstname, lastname=:lastname, email=:email 
                            WHERE id = :id";
         
                // prepare query for excecution
                $stmt = $con->prepare($query);
         
                // posted values
                $firstname=htmlspecialchars(strip_tags($_POST['firstname']));
                $lastname=htmlspecialchars(strip_tags($_POST['lastname']));
                $email=htmlspecialchars(strip_tags($_POST['email']));
         
                // bind the parameters
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':id', $id);
                 
                // Execute the query
                if($stmt->execute()){
                    echo "<div class='alert alert-success'>Record was updated.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
                }
                 
            }
             
            // show errors
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        }
    ?>
         
        <!--we have our html form here where new record information can be updated-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
            <table class='table table-hover table-responsive table-bordered update_page'>
                <tr>
                    <td class="columns-for-updates">First Name</td>
                    <td><input type='text' name='firstname' value="<?php echo htmlspecialchars($firstname, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td class="columns-for-updates">Last Name</td>
                    <td><textarea name='lastname' class='form-control'><?php echo htmlspecialchars($lastname, ENT_QUOTES);  ?></textarea></td>
                </tr>
                <tr>
                    <td class="columns-for-updates">E-Mail</td>
                    <td><input type='text' name='email' value="<?php echo htmlspecialchars($email, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td class="columns-for-updates"></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='index.php' class='btn btn-danger'>Back to Admin Home Page</a>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        include_once 'layout_foot.php';
        ?>
   