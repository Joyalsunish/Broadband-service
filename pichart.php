<?php
include_once('connection.php');

if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

//$sql = "SELECT plan, quantity FROM connection";

$sql = "SELECT p.plan_name, COUNT(c.connection_id) AS connections_count
        FROM plan p
        LEFT JOIN connection c ON p.plan_id = c.plan_id
        GROUP BY p.plan_id";
//$result = $conn->query($sql);


$result = $data->query($sql);

$data1 = array();
if ($result->num_rows > 0) {
    echo "hhhhhhhhhhhhhhhhhhhh";
    while ($row = $result->fetch_assoc()) {
        echo $row['plan_name'];
        echo $row['connections_count'];
        $data1[] = [$row['plan_name'], (int)$row['connections_count']];
    }
}


?>


<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    
<div style="width: 400px; height: 400px;">
<canvas id="myChart"></canvas>
    </div>
    
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var labels = <?php echo json_encode(array_column($data1, 'plan_name')); ?>;
var data1 = <?php echo json_encode(array_column($data1, 'connections_count')); ?>;

    
    var ctx = document.getElementById('myChart').getContext('2d');

var chartData = {
    labels: labels,
    datasets: [{
        data: data1,
        backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)'
            // Add more colors as needed
        ],
    }],
};

var options = {
    responsive: true,
    maintainAspectRatio: false,
};

var myChart = new Chart(ctx, {
    type: 'pie',
    data: chartData,
    options: options
});


    var options = {
        responsive: true,
        maintainAspectRatio: false,
    };

    var myChart = new Chart(ctx, {
        type: 'pie',
        data: chartData,
        options: options
    });
</script>

</body>
</html>