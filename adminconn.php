<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "broadband service";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

// Retrieve transaction data from the database
$sql = "SELECT * FROM transaction_info";
$result = $data->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel - Transaction Information</h1>
    <table border="1">
        <tr>
            <th>Approve Status</th>
            <th>Payment Status</th>
            <th>Approve Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["approve status"] . "</td>";
                echo "<td>" . $row["payment status"] . "</td>";
                echo "<td>" . $row["approve date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No transactions found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$data->close();
?>
