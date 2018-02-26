<?php
mysql_connect("localhost","root","");
mysql_select_db("library");

$ten = $_POST["TEN"];
$hinh =$_POST["HINH"];

$path = $ten.png";

$url = "http:/10.82.78.253//management/$path";

$qr = "INSERT INTO image (null,'$ten','$url')";

if(mysql_query($qr)){
file_put_contents($path,base64_decode($hinh));
} 
else{
echo "loi";
}
?>