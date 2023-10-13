<?php 
include_once('connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST") 
{
    $date=$_POST['datepicker'];
    echo"datepicker";
    $query = "SELECT * FROM payment WHERE date='".$date."'" ;
    $result = mysqli_query($data,$query);
    echo $date;
}

echo $date;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Payment View</title>
    <link rel="stylesheet" href="admin dashboard.css">
</head>
<body>
<?php
    include('dash.html');
    ?>
    <div id="content">
<h1>Payment List</h1>
<form action="viewpayment.php" method='POST'><label for="datepicker">Select a Date:</label>
    <input type="date" id="datepicker" name="datepicker">
    <button type="submit">Submit </button>
    <div id="searchresult"></form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Payment ID</th>
            <th>Connection ID</th>
            <th>Bank Name</th>
            <th>Card Type</th>
            <th>Date</th>
            <th>Amount</th>
        </tr>
        <?php
        // Connect to the database
        
        include_once('connection.php');
        if($date=""){
        $query = "SELECT * FROM payment";
        $result = mysqli_query($data,$query);
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["payment_id"] . "</td>";
                echo "<td>" . $row["connection_id"] . "</td>";
                echo "<td>" . $row["bank_name"] . "</td>";
                echo "<td>" . $row["card_type"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No payment found.</td></tr>";
        }

    
    
        ?>
    </table>
    
    </div>
    <script>
        // JavaScript code to handle the selected date
        const datePicker = document.getElementById('datepicker');

        datePicker.addEventListener('change', function () {
            const selectedDate = datePicker.value;
            console.log(`Selected Date: ${selectedDate}`);
        });
    </script>
</body>
</html>
