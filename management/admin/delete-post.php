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

$statement = $db->prepare("DELETE FROM book WHERE book_id=?");
$statement->execute(array($id));

header("location: view-post.php")
?>

