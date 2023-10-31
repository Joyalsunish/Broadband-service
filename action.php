<?php
include('connection.php');
session_start();
$planid=$_GET['PlanID'];

?>

<div id="newplan">
<?php
                
                
              
                $sql= "SELECT * FROM plan WHERE plan_id = $planid";
                  $result=mysqli_query($data,$sql);
                  $count=mysqli_num_rows($result);
                  echo $count;
                  while($row=mysqli_fetch_array($result)){?>
                    <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Name :<?php echo $row['plan_name']?></h6>
                  <p class="card-text">Duration  :<?php echo $row['D_name']?></p>
                  <p class="card-text">Data type :<?php echo $row['data_type']?></p>
                  <p class="card-text">Data limit value :<?php echo $row['data_limit_value']?></p>
                  <p class="card-text">Plan speed  :<?php echo $row['plan_speed']?></p>
                  <p class="card-text">Amount  : <?php echo $row['amount']?></p>
                  
                </div>
              </div>
                    <?php
                    }
                    ?> 
  </div>