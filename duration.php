<?php
include_once'connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST") 
{

    $D_name=$_POST['cname'];
echo $D_name;
    $sql="insert into duration(D_name) values('$D_name')";
    $result=mysqli_query($data,$sql);
    
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            DURATION
        </title>
        <link rel="stylesheet" href="admin dashboard.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <link rel="stylesheet" href="duration.css">
    </head>
    <body>
        <?php
    include('dash.html');
    ?>
    <div id="content">
    <div id="content">
    <form id="add_duration" action="duration.php" method="POST">
    <h2><b>Duration</b></h2>
    <font class="f1"><b>Add Duration</b></font>
     <input type="text" name="cname" id="cname"><br><br>
       
    <input type="submit" class="btn btn-primary"></button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>