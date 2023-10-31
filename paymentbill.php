<?php
include('connection.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_id=$_SESSION['payment_id'];
    echo $payment_id;

    $bank_name = $_POST['bank_name'];
    echo $bank_name ;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Bill</title>
    <link rel="stylesheet" type="text/css" href="paymentbill.css">
</head>
<body>
    <div class="container">
        <h1>Payment Bill</h1><br><br>
        <h2>Payment Sucessfull!!</h2>
        <div class="payment-details">
            <?php
            $payid=$_SESSION['payid'];
                $today = date("Y-m-d");
                $userid=$_SESSION['userid'];
               /*  $sql = "SELECT p.*,usr.*,pln.*,con.* from payment p join
                user_reg usr on p.user_id=usr.user_id
                join connection con p.connection_id=con.connection_id
                join plan pln on con.plan_id=pln.plan_id where p.user_id='".$userid."' and con.connection_id='".$connid."'"; */
                $sql= "select pay.*,con.*,d.*  from payment pay join connection con on pay.connection_id = con.connection_id
                join plan pl on  con.plan_id = pl.plan_id
                join duration d on pl.D_id = d.D_id
                
                                                           where pay.payment_id='".$payid."'";
                $result = $data->query($sql);

                if ($result->num_rows > 0) {
                    echo "inside post";
                    $row = $result->fetch_assoc();

                    echo "<p><strong>Payment ID:</strong> " . $row["payment_id"] . "</p>";
                    echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
                    echo "<p><strong>Amount:</strong> ₹" . $row["amount"] . "</p>";
                    echo "<p><strong>Amount:</strong> ₹" . $row["D_name"] . "</p>";
                    // Add more payment details as needed
                } else {
                    echo "No payment details found.";
                }

                $data->close();
            ?>
        </div>
    </div>
</body>
</html>
