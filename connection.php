
<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="broadband service";
$data=mysqli_connect($host,$user,$password,$db);
#checking connected or not
if($data===false)
{
    die("connection error");
}
else{
   // echo "success";
}
?>

