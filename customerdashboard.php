<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Dashboard</title>
<link rel="stylesheet" href="customerstyle.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
  <div id="sidebar">
    <ul>
      <li><a href="index.html">Home</a></li><br>
      <li><a href="customerdashboard.php">View plan</a></li><br>
      <li><a href="changeplan.php">Change plan</a></li><br>
      <li><a href="feedback.php"> Feedback</a></li><br>
      <li><a href="payment.php">Payment</a></li><br>
      <li><a href="editprofile.php">Edit profile</a></li><br>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  <div id="content">
    <h1>PLANS</h1>
  

  <div class="row" style="padding-bottom:20px;"> 
  

    <?php
      include_once('connection.php');
        $sql="SELECT p.*,d.* FROM plan p join duration d on p.D_id=d.D_id";
        $result=mysqli_query($data,$sql);?>
        
                <?php while($row=mysqli_fetch_array($result)){?>
                  <div class="col-md-6">
                    <div class="card" id="card">
                    <div class="plan-title"><h1>₹<?php echo $row['amount'] ;?></h1></div> 
                    
        <div class="plan-title">Plan name:<?php echo $row['plan_name'] ;?></div>

        <div class="data_type">Validity:<?php echo $row['D_name'] ;?></div>
        <div class="data_type">Data Type:<?php echo $row['data_type'] ;?></div>
        <div class="data_limit_value">Data Limit Value:<?php echo $row['data_limit_value'] ;?></div>
        <div class="plan_speed">Plan Speed (Mbps):<?php echo $row['plan_speed'] ;?></div>  
        <form method='POST' action='payment.php'><input type='hidden' name='plan_id' value="<?php echo $row['plan_id'];?>">
        <input type='submit' name="<?php echo $row['plan_id'];?>"value='select plan'></form> 
        <!-- <button class="btn btn-info">Select Plan</button> -->
        </div><br></div><br>
              <?php  }?>
       
    </div></div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>