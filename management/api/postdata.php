<?php
echo "Connected";
$st_name = $_POST['stname'];
$st_id = $_POST['stid'];
$st_reg = $_POST['streg'];
$st_fac = $_POST['stfac'];
$st_add = $_POST['stadd'];
$username=$_POST['username'];
$password=$_POST['password'];

$connection = mysqli_connect("localhost","root","","library")
or die("Error " . mysqli_error($connection));

$sql_query = "INSERT INTO student (st_name,st_id,st_reg,st_fac,st_add,username,password) VALUES ('$st_name','$st_id','$st_reg','$st_fac','$st_add','$username',$password)";


if (mysqli_query($connection, $sql_query)) {
    echo "You are Registered";
} else {
    echo "Error: " . $sql_query . "<br>" . mysqli_error($connection);
}
mysqli_close($connection);
?>
