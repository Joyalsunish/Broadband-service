<?php
include_once 'connection.php';
echo "inside";
if(isset($_GET['id'])){

$id=$_GET['id'];
    echo $id;
    $sql="delete from connection where connection_id='".$id."'";
    $result= mysqli_query($data,$sql);
}
else{
    echo "outside isset";
}
?>