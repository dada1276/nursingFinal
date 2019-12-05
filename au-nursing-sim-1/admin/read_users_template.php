<?php
echo "<a href='create.php' class='btn btn-primary m-b-1em create-user-admin'>Create New USER</a><br>";
?>


<?php



$conn = mysqli_connect("localhost", "root", "", "php_login_system");

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 1) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into users (id,username,firstname,lastname,email,password, access_level, access_code, status)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "')";
            $result = mysqli_query($conn, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
<script src="jquery-3.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

        $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
</head>

<body>    
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
        <div class="row">

            <form style="font-size: 30px" class="form-horizontal" action='index.php' method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                    <label style="font-size: 30px;" class="col-md-4">Upload Class Roster</label> <input style="font-size: 20px" type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn btn-primary btn-submit">UPLOAD</button>
                </div>

            </form>

        </div>
               <?php
            $sqlSelect = "SELECT * FROM users";
            $result = mysqli_query($conn, $sqlSelect);
            
            if (mysqli_num_rows($result) > 0) {
                ?>
            
<?php
                
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    
              
                    <?php
                }
                ?>
             
        <?php } ?>
    </div>

</body>

</html>



<?php 

// display the table if the number of users retrieved was greater than zero
if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
    // table headers
    echo "<tr>";
        echo "<th>User Name</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email</th>";
    
        echo "<th>Action</th>";

    echo "</tr>";
 
    // loop through the user records
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        // display user details
        echo "<tr>";
            echo "<td>{$username}</td>";
            echo "<td>{$firstname}</td>";
            echo "<td>{$lastname}</td>";
            echo "<td>{$email}</td>";
       
            echo "<td class='crud_actions'>";

            echo "<a href='read.php?id={$id}' class='btn btn-info m-r-1em view'>View</a>";

            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em update'>Update</a>"; 
            
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger delete'>Delete</a>";

            echo"</td>";
        echo "</tr>";
        }
 
    echo "</table>";
 
    $page_url="read_users.php?";
    $total_rows = $user->countAll();
 
    // actual paging buttons
    include_once 'paging.php';

}
?>

