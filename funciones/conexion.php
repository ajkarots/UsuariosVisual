<?php
$servername = "metro.proxy.rlwy.net:37002";
$username = "root";
$password = "TgLfsXmJIImdpGcCfzZUGQEqqOPBNVAJ";
$dbname = "railway";
$con= new mysqli($servername,$username,$password, $dbname);
if($con->connect_error){
die("Fallo en la conexión: " . $con->connect_error);
}

mysql://TgLfsXmJIImdpGcCfzZUGQEqqOPBNVAJ@metro.proxy.rlwy.net:37002/railway    
?>