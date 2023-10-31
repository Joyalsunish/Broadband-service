<?php
include_once 'connection.php';
session_start();
$user_id=$_SESSION['userid'];	
echo $user_id;    
echo "inside";
if(isset($_POST['plan'])){
$planid=$_POST['plan'];
echo "$planid";
$sql = "UPDATE connection SET plan_id ='".$planid."' where user_id = '".$user_id."'";
$rslt=mysqli_query($data,$sql);
}
else{
    echo "outside isset";
}
?>