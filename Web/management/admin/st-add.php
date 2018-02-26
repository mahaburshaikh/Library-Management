<?php
include("../config.php");
?>

<?php
if (isset($_POST['form1'])) {

    try {
         if (empty($_POST['st_name'])) {
            throw new Exception("Student name can not be empty");
        }
        if (empty($_POST['st_id'])) {
            throw new Exception("student id  can not be empty");
        }
        if (empty($_POST['st_reg'])) {
            throw new Exception("student registration  can not be empty");
        }
        if (empty($_POST['st_fac'])) {
            throw new Exception("faculty  name can not be empty");
        }
        if (empty($_POST['st_add'])) {
            throw new Exception("Address can not be empty");
        }
 
        $statement = $db->prepare("INSERT INTO student   
                (st_name,st_id,st_reg,st_fac,st_add) VALUES (?,?,?,?,?)");
        $statement->execute(array($_POST['st_name'],$_POST['st_id'],$_POST['st_reg'],$_POST['st_fac'],$_POST['st_add']));
        
        $success_message = "Post is inserted successfully."; 
        
    }
    catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>


<?php include ("header.php"); ?>
<h2 style="text-align: center;color:black;text-decoration:underline;text-size: 40px">Add New Student</h2>

 <?php
        if(isset($error_message)){echo "<div class='error'>". $error_message."</div>";}
        if(isset($success_message)){echo "<div class='success'>". $success_message."</div>";}
 ?>

<form action="" method="post" enctype="multipart/form-data">
    <table class="tbl1" style="margin-left: 250px">
        <tr> <td>Student Name</td> </tr>
        <tr> <td><input class="medium" type="text" name="st_name" ></td></tr>
        <tr> <td>Student Id</td> </tr>
        <tr> <td><input class="medium" type="text" name="st_id" ></td></tr>
        <tr> <td>Student Registration</td> </tr>
        <tr> <td><input class="medium" type="text" name="st_reg" ></td></tr>
        <tr> <td>Faculty</td> </tr>
        <tr> <td><input class="medium" type="text" name="st_fac" ></td></tr>
        <tr> <td>Address</td> </tr>
        <tr> <td><input class="medium" type="text" name="st_add" ></td></tr>


        <tr>
            <td><input style="background:buttonshadow" type="submit" value="SAVE" name="form1"></td>
        </tr>
    </table>
</form>

<?php include ("footer.php"); ?>
    

