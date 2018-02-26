<?php
$st_name = $_POST['stname'];
$st_id = $_POST['stid'];
$st_book = $_POST['bookname'];
$st_author = $_POST['authorname'];

$connection = mysqli_connect("localhost","root","","library")
or die("Error " . mysqli_error($connection));

$sql_query = "INSERT INTO book_order (st_name,st_id,book_name,author_name) VALUES ('$st_name','$st_id','$st_book','$st_author')";


if (mysqli_query($connection, $sql_query)) {
    echo "You  Ordered Successfully";
} else {
    echo "Error: " . $sql_query . "<br>" . mysqli_error($connection);
}
mysqli_close($connection);
?>
