<?php 
include_once('connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST") 
{
    $F_date=$_POST['datepicker'];
    echo"datepicker";
    $query = "SELECT * FROM feedback WHERE F_date = '".$F_date."'" ;
    $result = mysqli_query($data,$query);
    echo $F_date;
}

echo $date;
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Feedback Page</title>
    <link rel="stylesheet" href="admin dashboard.css">
</head>
<body>
<?php
    include('dash.html');
    ?>
    <div id="content">
    <h1>Feedback List</h1>
    <form action="viewfeedback.php" method='POST'><label for="datepicker">Select a Date:</label>
    <input type="date" id="datepicker" name="datepicker">
    <button type="submit">Submit </button>
    <div id="searchresult"></form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Feedback_id</th>
            <th>Feedback date</th>
            <th>Feedback</th>
            <th>Rating</th>
        </tr>
        
        <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "broadband service";
        
        $data = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($data->connect_error) {
            die("Connection failed: " . $data->connect_error);
        }
        
        // Fetch and display feedback entries
        if($result==""){
        $sql = "SELECT * FROM feedback";
        $result = $data->query($sql);
    }
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["feedback_id"] . "</td>";
                echo "<td>" . $row["F_date"] . "</td>";
                echo "<td>" . $row["feedback"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "No feedback entries found.";
        }
        
        // Close the database connection
        $data->close();
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
