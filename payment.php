<?php
session_start();

include_once 'connection.php';
$last_id;
if(isset($_POST['plan_id'])){
    $pid=$_POST['plan_id'];
    $userid=$_SESSION['userid'];
    echo $userid;
    echo $pid;
    $date=date("d/m/y");
    $sql="insert into connection(user_id,plan_id,payment_status,approve_status,approve_date,request_date) values('$userid','$pid',false,false,'$date','$date')";
    $result=mysqli_query($data,$sql);
    $last_id = mysqli_insert_id($data);
    $_SESSION['connectionid']=$last_id;
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broadband Payment</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <div class="container">
        <h1>Payment for Broadband Connection</h1>
        <form action="finalpayment.php" method="post">
            <div class="form-group">
                <label for="bank"> Bank:</label>
     
                <select id="bank" name="bank_name" style="width:400px; height:40px;">
                    <option value="State Bank of India (SBI)">State Bank of India (SBI)</option>
                    <option value="HDFC Bank">HDFC Bank</option>
                    <option value="ICICI Bank">ICICI Bank</option>
                    <option value="Punjab National Bank (PNB)">Punjab National Bank (PNB)</option>
                    <option value="Axis Bank">Axis Bank</option>
                    <option value="Kotak Mahindra Bank">Kotak Mahindra Bank</option>
                    <option value="Canara Bank">Canara Bank</option>
                    <option value="Union Bank of India">Union Bank of India</option>
                    <option value="Bank of Baroda">Bank of Baroda</option>
                    <option value="IDBI Bank">IDBI Bank</option>
                    <option value="Indian Bank">Indian Bank</option>
                    <option value="Central Bank of India">Central Bank of India</option>
                    <option value="Bank of India">Bank of India</option>
                    <option value="Yes Bank">Yes Bank</option>
                    <option value="IndusInd Bank">IndusInd Bank</option>
                    <option value="Federal Bank">Federal Bank</option>
                    <option value="RBL Bank">RBL Bank</option>
                    <option value="Karur Vysya Bank">Karur Vysya Bank</option>
                    <option value="South Indian Bank">South Indian Bank</option>
                    <option value="IDFC FIRST Bank">IDFC FIRST Bank</option>
                </select>
            </div>

            
            <div class="form-group">  
            <fieldset>
                <label for="bank" > Card Type</label>
                <div class="some-class">
                  <input type="radio" class="radio" name="card_type" value="visa" id="visa" />
                  <label for="visa">Visa</label>
                  <input type="radio" class="radio" name="card_type" value="mastercard" id="mastercard" />
                  <label for="mastercard"> MasterCard</label>
                  <input type="radio" class="radio" name="card_type" value="amex" id="amex" />
                  <label for="amex"> American Express</label>
                </div>
              </fieldset>
            </div>
            <div class="form-group">
                <label for="card number">Card No.</label>
                <input type="number" id="card number" name="card_number"  required value="<?php echo $card_number;?>">
                <span class="error"><?php echo $card_numbererr?></span>
            </div>
            
            <div class="form-group">
            <label for="amount">Payment Amount </label>
                <?php 
                $sql= "SELECT * FROM plan WHERE plan_id = $pid";
                $result= mysqli_query($data,$sql);
                 while($row=mysqli_fetch_array($result))
                 {
                 ?>
                <input type="number" id="amount" name="amount" value="<?php echo $row['amount'] ?>"required>
                <?php
                 }
// SQL query to fetch data from the table
$sql = "SELECT * FROM payment";
$result = $data->query($sql);

if ($result->num_rows > 0) {
    // Fetch the data and store it in a variable
    $row = $result->fetch_assoc();
} else {
    echo "No records found";
}

// Close the database connection
$data->close();
?>

            </div>
            <button type="submit">Submit Payment</button>
        </form>
    </div>
</body>
</html>
