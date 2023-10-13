<!DOCTYPE html>
<html>
<head>
    <title>Admin - View Customers</title>
    <link rel="stylesheet" href="admin dashboard.css">
</head>
<body>
    <?php
    include('dash.html');
    ?>
    <div id="content">
    <h1>Customer List</h1>
    <label for="datepicker">Select a Date:</label>
    <input type="date" id="datepicker">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Place</th>
            <th>Aadhar no.</th>
            <th>House name</th>
            <th>Pincode</th>
        </tr>
        <?php
        // Connect to the database
        
        include_once('connection.php');
        $query = "SELECT * FROM user_reg";
        $result = mysqli_query($data,$query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["ph_no"] . "</td>";
                echo "<td>" . $row["place"] . "</td>";
                echo "<td>" . $row["aadhar_no"] . "</td>";
                echo "<td>" . $row["house_name"] . "</td>";
                echo "<td>" . $row["pincode"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No customers found.</td></tr>";
        }

    
    
        ?>
    </table>
</body>
</html>
