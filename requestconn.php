<?php 
include_once('connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST") 
{
    $date=$_POST['datepicker'];
    echo"datepicker";
    $query = "SELECT * FROM connection WHERE approve_status = 0 and request_date='".$request_date."'" ;
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
<table border="1">
        <tr>
            <th>Connection ID</th>
            <th>User ID</th>
            <th>Plan ID</th>
            <th>Approve Status</th>
            <th>Payment Status</th>
            <th>Approve Date</th>
            <th>Request Date</th>
        </tr>
        
        <?php
        
        
        include_once('connection.php');
        $query = "SELECT * FROM connection 
         where approve_status = 0";
        $result = mysqli_query($data,$query);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["connection_id"] . "</td>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["plan_id"] . "</td>";
                echo "<td>" . $row["approve_status"] . "</td>";
                echo "<td>" . $row["payment_status"] . "</td>";
                echo "<td>" . $row["approve_date"] . "</td>";
                echo "<td>" . $row["request_date"] . "</td>";?>
                <td><a href="approveconn.php?id=<?php echo $row['connection_id'];?>" class="approve-button" name="approve">Approve</a></td>
                <!-- <td><input type="submit" class="approve-button" name="approve" value="Approve Connection"></td>"; -->
               <?php echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No connection found.</td></tr>";
        }

    
    
        ?>
        
    </table>
    </body>
</html>