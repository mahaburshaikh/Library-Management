<?php
ob_start();
session_start();
if($_SESSION['name']!='admin'){
    header('location:login.php');
}
?>
<?php
include("../config.php");
?>

<?php
if (!isset($_REQUEST['id'])) {
    header("location:student.php");
} else {
    $id = $_REQUEST['id'];
}
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



        

            $statement = $db->prepare("UPDATE student SET st_name=?,st_id=?,st_reg=?,st_fac=?,st_add=? WHERE serial_id=?");
            $statement->execute(array($_POST['st_name'], $_POST['st_id'], $_POST['st_reg'], $_POST['st_fac'],$_POST['st_add'], $id));
            
            $success_message = "post is updated successfully";
        }

  
     catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>



<?php
$statement = $db->prepare("SELECT * FROM student WHERE serial_id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $st_name = $row['st_name'];
    $st_id = $row['st_id'];
    $st_reg = $row['st_reg'];
    $st_fac = $row['st_fac'];
    $st_add = $row['st_add'];
}
?>



<?php include ("header.php"); ?>
<h2>Edit Student Form</h2>

<?php
if (isset($error_message)) {
    echo "<div class='error'>" . $error_message . "</div>";
}
if (isset($success_message)) {
    echo "<div class='success'>" . $success_message . "</div>";
}
?>

<form action="st-edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
   <!-- <input type="hidden" name="id" value="<?php echo $id; ?>">--->
    <table class="tbl1">
        <tr> <td>Student Name</td> </tr>
        <tr> <td><input class="long" type="text" name="st_name" value="<?php echo $st_name; ?>" ></td></tr>
        <tr> <td>Student Id</td> </tr>
        <tr> <td><input class="long" type="text" name="st_id" value="<?php echo $st_id; ?>" ></td></tr>
        <tr> <td>Student Registration</td> </tr>
        <tr> <td><input class="long" type="text" name="st_reg" value="<?php echo $st_reg; ?>" ></td></tr>
        <tr> <td>Faculty</td> </tr>
        <tr> <td><input class="long" type="text" name="st_fac" value="<?php echo $st_fac; ?>" ></td></tr>
        <tr> <td>Address</td> </tr>
        <tr> <td><input class="long" type="text" name="st_add" value="<?php echo $st_add; ?>" ></td></tr>
      
        <tr>
            <td><input type="submit" value="UPDATE" name="form1"></td>
        </tr>
    </table>
</form>

<?php include ("footer.php"); ?>
    
