<?php
include_once 'connection.php';
echo "inside";
if(isset($_GET['id'])){

$id=$_GET['id'];
    echo $id;
    $sql="update connection set approve_status = true where connection_id='".$id."'";
    $result= mysqli_query($data,$sql);
}
else{
    echo "outside isset";
}
?>