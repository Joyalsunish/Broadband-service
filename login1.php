<?php
include_once 'connection.php';
error_reporting(E_ALL);
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    echo "ïnside post";
    $username=$_POST['username'];
    $password=$_POST['password'];
    echo $username;
    echo $password;
 $sql="select * from login where email='".$username."' and password='".$password."'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
    if($row["usertype"]=="admin")
    {
        $_SESSION['username']=$name;
        header("location:admin_dashboard.html");
    }
    
        

    elseif($row["usertype"]=="user")
    {
        $sql="select user_id from user_reg where email='".$username."' and password='".$password."'";
        $result=mysqli_query($data,$sql);
        $row=mysqli_fetch_array($result);
        $_SESSION['userid']=$row["user_id"];
       
        header("location:customerdashboard.php");
        
    }
    else
    {
        session_start();
        //echo "invalid usernme or password";
        $message="Invalid username or password";
        $_SESSION['loginMessage']=$message;
        header("location:login1.php");
    }
}
else{
    echo "post failed";
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Glassmorphism Login</title>
  <link rel="stylesheet" href="css/login1style.css">

</head>

<body style="background-image: url('img/homepage3.jpg');background-repeat: no-repeat;background-size: cover;">
    <section class="container">
        <div class="login-container">
            <!-- <div class="circle circle-one"></div> -->
            <div class="form-container">
                <h1 class="opacity">LOGIN</h1>
                <form method="POST" action="login1.php">
                    <input type="text" name="username" placeholder="EMAIL" >
                    <input type="password" name="password" placeholder="PASSWORD" >
                    <input type="submit" value="LOGIN">
            
                <div class="register-forget opacity">
                    <a href="register.php">Register</a>
                    <a href="">Forget password?</a>
                </div>
                </form>
            </div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>