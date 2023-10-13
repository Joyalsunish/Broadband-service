<?php
include_once'connection.php';
$flag=1;
$username="";
$pincodeerr=$passworderr=$numbererr=$mailerr=$nameerr=$aadharnoerr=" ";



if($_SERVER["REQUEST_METHOD"]=="POST") 
{
$flag=1;
$email=$_POST['emails'];echo "<br>";
$password=$_POST['password'];echo "<br>";
$phonenumber=$_POST['number'];echo "<br>";
$place=$_POST['place'];echo "<br>";

$aadharno=$_POST['aadharno'];echo "<br>";
$housename=$_POST['housename'];echo "<br>";
$pincode=$_POST['pincode'];echo "<br>";
$username=$_POST['name'];
$validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
if(empty($_POST['emails']))
{
    $mailerr="Please enter any data";
    $flag=0;
    echo "ïnside empty email";

}
else{
    if(!preg_match($validEmail,$email)){

    
    $mailerr="Please enter correct email format";
    $flag=0;}
}
if(empty($_POST['name']))
{
    $nameerr="Please enter any data";
    $flag=0;
}
else{
    if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name']))
    {
    $nameerr="Önly caharacters are allowed";
    $flag=0;
    }
}
if(empty($_POST['number']))
{
    $nameerr="Please enter any number";
    $flag=0;
}
else
{


if(!preg_match('/^[0-9]{10}+$/',$_POST['number'])) 
{
    $numbererr= "please enter Valid Phone Number";
    $flag=0;
}
}

if(empty($_POST['aadharno']))
{
    $aadharnoerr="Please enter any data";
    $flag=0;
} 
else{


    if(!preg_match('/^[0-9]{12}+$/', $_POST['aadharno'])) 
    {
    $aadharnoerr= " please enter Valid aadhar number";
    $flag=0;
    } 
}
if(empty($_POST['pincode']))
{
    $pincodeerr="Please enter any data";
    $flag=0;
}
else{

    if(!preg_match("/^[0-9]{6}+$/", $_POST['pincode'])) 
    {
    $pincodeerr= "Please enter Valid Pincode";
    $flag=0;
    } 
    }
echo $flag;

if($flag==1){

$usertype="user";
   
    $sql="insert into user_reg(name,ph_no,email,password,place,aadhar_no,house_name,pincode) values('$username','$phonenumber','$email','$password','$place','$aadharno','$housename','$pincode')";
    $result=mysqli_query($data,$sql);
    $sql="insert into login(email,password,usertype) values('$email','$password','$usertype')";
    $result=mysqli_query($data,$sql);
}}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodePen - Glassmorphism Regisration Form </title>
    <link rel="stylesheet" href="css/registerstyle.css">
</head>
<body style="background-image: url('img/homepge5.jpg');background-repeat: no-repeat;background-size: cover;">
    <div class="container">
    <header style="font-size:30px;">Registration</header>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="register" name="register" method="POST">
            <div class="form first">

                    <div class="fields">
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" placeholder="name" id="name" name="name" required  value="<?php echo $username;?>">
                            <span class="error"><?php echo $nameerr?></span>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="email" id="emails" name="emails" required value="<?php echo $email;?>">
                            <span class="error"><?php echo $mailerr?></span>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" placeholder="password"  id="password" name="password" required value="<?php echo $password;?>">
                            <span class="error"><?php echo $passworderr?></span>
                        </div> 

                        <div class="input-field">
                            <label>Phone Number</label>
                            <input type="number" placeholder="number" name="number" id="number" required value="<?php echo $phonenumber;?>">
                            <span class="error"><?php echo $numbererr?></span>
                        </div>

                        <div class="input-field">
                            <label>Place</label>
                            <input type="text"  placeholder="place" name="place" id="place" required value="<?php echo $place;?>">
                            <span class="error"><?php echo $placeerr?></span>
                        </div>

                        <div class="input-field">
                            <label>Aadhar no</label>
                            <input type="number" placeholder="Aadharno" name="aadharno" id="aadharno" required value="<?php echo $aadharno;?>">
                            <span class="error"><?php echo $aadharnoerr?></span>
                        </div>

                        <div class="input-field">
                            <label>House name</label>
                            <input type="text" placeholder="housename"  name="housename" id="housename" required value="<?php echo $housename;?>">
                            <span class="error"><?php echo $housenameerr?></span>
                        </div>

                        <div class="input-field">
                            <label>Pincode</label>
                            <input type="number" placehoder="Pincode"  name="pincode" id="pincode" required value="<?php echo $pincode;?>">
                            <span class="error"><?php echo $pincodeerr?></span>
                        </div>
                        <div class="input-field">
                            <button type="submit" name="register" id="register" style="margin-bottom: 600px;" >
                                <span class="btnText">Register</span>
                                <i class="uil uil-navigator">
                            </button>
                            
                        </div>
                       
                    </div> 
            </div>
           
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>