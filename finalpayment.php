<?php

session_start();

include_once 'connection.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{   
    $flag=1;
    $userid=$_SESSION['userid'];
    $last_id=$_SESSION['connectionid'];
    echo"id";
    echo $last_id;
    $bank_name=$_POST['bank_name'];
    $card_type=$_POST['card_type'];
    $card_number=$_POST['card_number'];
    $amount=$_POST['amount'];
    echo"after connection insert";
    $date=date("y/m/d");
    echo "date";
    if(empty($_POST['card_number']))
    {
    $card_numbererr="Please enter any data";
    $flag=0;
}
else
 if(!$_POST['card_number'])
    {
        echo"inside card validation";
    $card_numbererr= "Please enter Valid card number";
    $flag=0;
    } 
echo "flag";
echo $flag;
echo $date;
echo "user";
echo $userid;
echo "connection";
echo $last_id;
echo "bankname";
echo $bank_name;
echo "cardtype";
echo $card_type;
echo "cardno";
echo $card_number;
echo"amount";
echo $amount;
if($flag==1){
$sql="insert into payment(user_id,connection_id,bank_name,card_type,date,card_number,amount) values
('$userid','$last_id','$bank_name','$card_type','$date','$card_number','$amount')";
    $result= mysqli_query($data,$sql);
    $connid=mysqli_insert_id($data);
    $_SESSION['payid']=$connid;
$sql="update connection set payment_status = true where connection_id='".$last_id."'";
$result= mysqli_query($data,$sql);

header("location:paymentbill.php");
}
}
?>