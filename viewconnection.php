<?php 
include_once('connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST") 
{
    $date=$_POST['datepicker'];
    echo"datepicker";
    $query = "SELECT * FROM connection WHERE approve_status = 1 and request_date='".$request_date."'" ;
    $result = mysqli_query($data,$query);
    echo $request_date;
}

echo $date;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin connection View</title>
    <link rel="stylesheet" href="admin dashboard.css">
    <style>
          .approve-button {
            background-color: #4CAF50; 
            color: white;
            border: none;
            padding: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
    include('dash.html');
    ?>
    <div id="content">
<h1>Connection List</h1>
<form action="viewconnection.php" method='POST'><label for="datepicker">Select a Date:</label>
    <input type="date" id="datepicker" name="datepicker">
    <button type="submit">Submit </button>
    <div id="searchresult"></form>
    <table border="1">
        <tr>
            <th>Connection ID</th>
            <th>Username</th>
            <th>Plan name</th>
            <th>Duration</th>
            <th>Approve Status</th>
            <th>Payment Status</th>
            <th>Approve Date</th>
            <th>Request Date</th>
        </tr>
        
        <?php
        
        
        include_once('connection.php');
        $query = "SELECT c.*,cs.*,p.*,d.* FROM connection c join user_reg cs on c.user_id = cs.user_id 
                                                    join plan p on c.plan_id =p.plan_id
                                                    join duration d on p.D_id =d.D_id                                
         where approve_status = 1";
        $result = mysqli_query($data,$query);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["connection_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["plan_name"] . "</td>";
                echo "<td>" . $row["D_name"] . "</td>";
                echo "<td>" . $row["approve_status"] . "</td>";
                echo "<td>" . $row["payment_status"] . "</td>";
                echo "<td>" . $row["approve_date"] . "</td>";
                echo "<td>" . $row["request_date"] . "</td>";?>
               
               <?php echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No connection found.</td></tr>";
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