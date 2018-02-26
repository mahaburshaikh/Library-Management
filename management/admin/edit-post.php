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
    header("location:view-post.php");
} else {
    $id = $_REQUEST['id'];
}
?>

<?php
if (isset($_POST['form1'])) {

    try {
        if (empty($_POST['book_name'])) {
            throw new Exception("book name can not be empty");
        }
        if (empty($_POST['author_name'])) {
            throw new Exception("author name  can not be empty");
        }
        if (empty($_POST['faculty'])) {
            throw new Exception("faculty  can not be empty");
        }
        if (empty($_POST['dept'])) {
            throw new Exception("dept can not be empty");
        }



        

            $statement = $db->prepare("UPDATE book SET book_name=?,author_name=?,faculty=?,dept=? WHERE book_id=?");
            $statement->execute(array($_POST['book_name'], $_POST['author_name'], $_POST['faculty'], $_POST['dept'], $id));
            
            $success_message = "post is updated successfully";
        }

  
     catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>



<?php
$statement = $db->prepare("SELECT * FROM book WHERE book_id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $book_name = $row['book_name'];
    $author_name = $row['author_name'];
    $faculty = $row['faculty'];
    $dept = $row['dept'];
}
?>



<?php include ("header.php"); ?>
<h2>Edit post</h2>

<?php
if (isset($error_message)) {
    echo "<div class='error'>" . $error_message . "</div>";
}
if (isset($success_message)) {
    echo "<div class='success'>" . $success_message . "</div>";
}
?>

<form action="edit-post.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
   <!-- <input type="hidden" name="id" value="<?php echo $id; ?>">--->
    <table class="tbl1">
        <tr> <td>book name</td> </tr>
        <tr> <td><input class="long" type="text" name="book_name" value="<?php echo $book_name; ?>" ></td></tr>
        <tr> <td>author name</td> </tr>
        <tr> <td><input class="long" type="text" name="author_name" value="<?php echo $author_name; ?>" ></td></tr>
        <tr> <td>faculty</td> </tr>
        <tr> <td><input class="long" type="text" name="faculty" value="<?php echo $faculty; ?>" ></td></tr>
        <tr> <td>department</td> </tr>
        <tr> <td><input class="long" type="text" name="dept" value="<?php echo $dept; ?>" ></td></tr>
      
        <tr>
            <td><input type="submit" value="UPDATE" name="form1"></td>
        </tr>
    </table>
</form>

<?php include ("footer.php"); ?>
    
