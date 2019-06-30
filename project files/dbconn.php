<?php


$link=mysqli_connect("localhost","root","");
if($link===false){
die("ERROR".mysqli_connect_error());}
echo "connected successfully".mysqli_get_host_info($link);
?>
