

<!DOCTYPE html>
<html>
<head>
    <title>view Broadband Plan - Admin</title>
    <link rel="stylesheet" href="admin dashboard.css">
</head>
<body>
<?php
    include('dash.html');
    ?>
    <div id="content">
<h1>View/Edit Plan</h1>
    <table border="1">
        <tr>
            <th>Plan ID</th>
            <th>Duration ID</th>
            <th>Plan Name</th>
            <th>Data Type</th>
            <th>Data Limit Value</th>
            <th>Plan Speed</th>
            <th>Amount</th>
            <th>Description</th>
        </tr>
    
        <?php
        // Connect to the database
        
        include_once('connection.php');
        $query = "SELECT * FROM plan";
        $result = mysqli_query($data,$query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["plan_id"] . "</td>";
                echo "<td>" . $row["D_id"] . "</td>";
                echo "<td>" . $row["plan_name"] . "</td>";
                echo "<td>" . $row["data_type"] . "</td>";
                echo "<td>" . $row["data_limit_value"] . "</td>";
                echo "<td>" . $row["plan_speed"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";?>
                <td>
         <a href="editplan.php?plan_id=<?php echo $row['plan_id'];?>" class="buttonatag"> EditPlan </a>
                </td>
                <?php echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No plan found.</td></tr>";
        }

    
    
        ?>
    </table>

  
</body>
</html>
