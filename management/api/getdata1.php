<?php

$connection = mysqli_connect("localhost","root","","library")
or die("Error " . mysqli_error($connection));

$key = $_GET['dept'];

$sql = "select * from book where dept='$key';";
$result = mysqli_query($connection, $sql)
or die("Error in Selecting " . mysqli_error($connection));

while($row = mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}

echo json_encode($emparray);

mysqli_close($connection);

?>