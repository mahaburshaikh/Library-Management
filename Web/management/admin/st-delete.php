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

$statement = $db->prepare("DELETE FROM student WHERE serial_id=?");
$statement->execute(array($id));

header("location: student.php")
?>

