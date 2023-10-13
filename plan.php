<?php
include_once'connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST") 
{   
    $plan_name=$_POST['planname'];
    $amount=$_POST['amount'];
    $D_id=$_POST['duration'];
    
    $data_type=$_POST['data_type'];
    $data_limit_value=$_POST['data_limit_value'];
    $plan_speed=$_POST['plan_speed'];
    echo $amount;
    echo $plan_name;
    echo $D_id;

    $sql="insert into plan(plan_name,amount,D_id,data_type,data_limit_value,plan_speed) values('$plan_name','$amount','$D_id','$data_type','$data_limit_value','$plan_speed')";
    $result=mysqli_query($data,$sql);
    
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>
            Add plan
        </title> 
        <link rel="stylesheet" href="admin dashboard.css">
        <link rel="stylesheet" href="css/planstyle.css">
    </head>
    <body>
    <?php
    include('dash.html');
    ?>
    <div id="content">
        <style>
        body {
            background-color: #50D381;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
            </style>
    <form action="plan.php" method="post"/>
    <h2>Add plan</h2>
    <font class="f1"> plan name </font><input type="text" name="planname"><br><br>
    
    <label for="data_type">Data Type:</label>
            <select id="data_type" name="data_type" required>
                <option value="" disabled selected>Select a rating</option>
                <option value="Limited">Limited</option>
                <option value="Unlimited">Unlimited</option>
            </select><br><br>
    
    <font class="f1"> Data Limit Value :</font><input type="text" name="data_limit_value"><br><br>
    <font class="f1"> plan speed (Mbps) :</font><input type="text" name="plan_speed"><br><br>
    <form id="Add_plan" action="" method="POST">
                select duration:
                <?php
                $sql="SELECT * FROM duration";
                $result=mysqli_query($data,$sql);
                echo"<select name='duration'>";
                while($row=mysqli_fetch_array($result))
                {
                    echo"<option value='".$row['D_id']."'>".$row['D_name']."</option>";
                }
                echo"</select>";
                ?>
                <br><br>
    <font class="f1"> Amount :</font><input type="text" name="amount"><br><br>
    <!-- <font class="f1"> Description :</font><input type="text" name="description"><br><br> -->
        <input class="btn btn-primary" type="submit" value="Add_plan" name="Add_plan">
     
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>