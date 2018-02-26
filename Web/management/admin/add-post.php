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
if (isset($_POST['form1'])) {

    try {
        if(empty($_POST['book_name'])){
            throw new Exception("Book name can not be empty");
        }
        if(empty($_POST['author_name'])){
            throw new Exception("author name can not be empty");
        }
        if(empty($_POST['faculty'])){
            throw new Exception("faculty name can not be empty");
        }
        if(empty($_POST['dept'])){
            throw new Exception("Department name can not be empty");
        }
 
        $statement = $db->prepare("INSERT INTO book   
                (book_name,author_name,faculty,dept) VALUES (?,?,?,?)");
        $statement->execute(array($_POST['book_name'],$_POST['author_name'],$_POST['faculty'],$_POST['dept']));
        
        $success_message = "Post is inserted successfully."; 
        
    }
    catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>


<?php include ("header.php"); ?>
<h2>Add New book</h2>

 <?php
        if(isset($error_message)){echo "<div class='error'>". $error_message."</div>";}
        if(isset($success_message)){echo "<div class='success'>". $success_message."</div>";}
 ?>

<form action="" method="post" enctype="multipart/form-data">
    <table class="tbl1">
        <tr> <td>Name</td> </tr>
        <tr> <td><input class="long" type="text" name="book_name" ></td></tr>
        <tr> <td>Author</td> </tr>
        <tr> <td><input class="long" type="text" name="author_name" ></td></tr>
        <tr> <td>Faculty</td> </tr>
        <tr> <td><input class="long" type="text" name="faculty" ></td></tr>
        <tr> <td>Department</td> </tr>
        <tr> <td><input class="long" type="text" name="dept" ></td></tr>


        <tr>
            <td><input type="submit" value="SAVE" name="form1"></td>
        </tr>
    </table>
</form>

<?php include ("footer.php"); ?>
    
