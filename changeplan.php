<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Broadband Service Portal</title>
</head>
<body>
    <h1>Change Plan</h1>

    <div class="row" style="margin-top:50px;">
        <div class="col-md-4" style="margin-left:30px;">
            <h2>Current Plan:</h2>
            <?php 
            include('connection.php');
            session_start();

            $userid = $_SESSION['userid'];
            echo $userid;
            $sql = "SELECT c.*, p.*, d.* FROM connection c 
                    JOIN plan p ON c.plan_id = p.plan_id
                    JOIN duration d ON p.D_id = d.D_id
                    WHERE c.user_id = '" . $userid . "'";
            $result = mysqli_query($data, $sql);
            $count = mysqli_num_rows($result);
            echo $count;
            while ($row = mysqli_fetch_array($result)) { ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Name: <?php echo $row['plan_name'] ?></h6>
                        <p class="card-text">Duration: <?php echo $row['D_name'] ?></p>
                        <p class="card-text">Data type: <?php echo $row['data_type'] ?></p>
                        <p class="card-text">Data limit value: <?php echo $row['data_limit_value'] ?></p>
                        <p class="card-text">Plan speed: <?php echo $row['plan_speed'] ?></p>
                        <p class="card-text">Amount: <?php echo $row['amount'] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>           
        </div>
        <div class="col-md-6">
            <h2>Change Plan:</h2>
            <form action="updateplan.php" method="post">
                <label for="new_plan">Select a new plan:</label>
                select plan:
                
                <?php
                
                $sql = "SELECT * FROM plan";
                $result = mysqli_query($data, $sql);
                echo "<select name='plan' id='plan'>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['plan_id'] . "'>" . $row['plan_name'] . "</option>";
                }
                echo "</select>";
                               
                ?>
                <br><br>

               
                <div id="newplan"></div>

                <input type="submit" name="change Plan" value="Change plan">
            
            </form>
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="jquery.main.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#plan").change(function(){
                var plan_id = $(this).val();
                alert(plan_id);
                $.ajax({
                    url: "action.php",
                    method: "GET",
                    data: { PlanID: plan_id },
                    success: function(data){
                        $("#newplan").html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
