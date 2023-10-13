<?php
include_once'connection.php';
if(isset($_POST['register']))
{
    $username=$_POST['name'];
    $email=$_POST['emails'];echo "<br>";
    $password=$_POST['password'];echo "<br>";
    $phonenumber=$_POST['number'];echo "<br>";
    $place=$_POST['place'];echo "<br>";

    $aadharno=$_POST['aadharno'];echo "<br>";
    $housename=$_POST['housename'];echo "<br>";
    $pincode=$_POST['pincode'];echo "<br>";
    $sql="insert into user_reg(name,ph_no,email,password,place,aadhar_no,house_name,pincode) values('$username','$phonenumber','$email','$password','$place','$aadharno','$housename','$pincode')";
    $result=mysqli_query($data,$sql);
    
}
?>
