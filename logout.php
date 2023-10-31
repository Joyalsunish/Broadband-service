<?php
session_start();
include("connection.php");
$_SESSION = array();
session_destroy();
header('Location: index.html');
exit();
?>