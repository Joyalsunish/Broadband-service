<?php
include('connection.php');
if(isset($_GET['plan_id'])){
    $plan_id=$_GET['plan_id'];
    echo $plan_id;
}


$customer_id = $_SESSION['plan_id'];
//echo  "haaaa";
//echo $customer_id;
//$sql="select * from user_reg where user_id='".$customer_id."'";
//$result=mysqli_query($data,$sql);
//$row=mysqli_fetch_array($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "ïnside post";
    // Handle form submission and update the database with new values
    $plan_name = $_POST['planname'];
    echo $plan_name ;
    $amount=$_POST['amount'];
    echo $amount ;
    $D_id=$_POST['duration'];
    echo $D_id;
    $data_type=$_POST['data_type'];
    echo $data_type;
    $data_limit_value=$_POST['data_limit_value'];
    echo $data_limit_value;
    $plan_speed=$_POST['plan_speed'];
    echo $plan_speed;
    $update_sql = "UPDATE plan SET plan_name='$plan_name', amount='$amount', D_id='$D_id', data_type='$data_type', data_limit_value='$data_limit_value', plan_speed='$plan_speed'  WHERE plan_id= '".$plan_id."'";
    if ($result=mysqli_query($data,$update_sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $data->error;
    }
}
else{
    echo "outside";
}

$sql = "SELECT *  FROM plan  WHERE plan_id = '".$plan_id."'";
$result = $data->query($sql);

if ($result->num_rows > 0) {
    echo "Successfully	";
    $row = $result->fetch_assoc();
}


?>



<!DOCTYPE html>
<html>
<head>
    <title>Edit Broadband Plan - Admin</title>
</head>
<body>
<form action="editplan.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="planname">Plan Name:</label>
        <input type="text" name="planname" value="<?php echo $row['plan_name']; ?>"><br><br>

        <label for="D_id">Validity:</label>
        <input type="text" name="D_id" value="<?php echo $row['D_id']; ?>"><br><br>

        <label for="data_type">Data type:</label>
        <input type="text" name="data_type" value="<?php echo $row['data_type']; ?>"><br><br>

        <label for="data_limit_value">Data Limit Value:</label>
        <input type="text" name="data_limit_value" value="<?php echo $row['data_limit_value']; ?>"><br><br>

        <label for="plan_speed">Plan Speed (mbps):</label>
        <input type="text" name="plan_speed" value="<?php echo $row['plan_speed']; ?>"><br><br>

        <label for="amount">Price (₹):</label>
        <input type="text" name="amount" value="<?php echo $row['amount']; ?>"><br><br>

        <input type="submit" value="Update Plan">
    </form>
</body>
</html>
