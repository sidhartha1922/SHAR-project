<html>
<style>
body {background-color:#E0E0FF;}
</style>
</html>


<?php
session_start();
$link=mysqli_connect("localhost","root","","hrdd internal");
if($link===false){
die("ERROR".mysqli_connect_error());}

$pg=$_SESSION["pc"];

$scode=$_POST['scode'];

$sdate=$_POST['sdate'];


$edate=$_POST['edate'];


$staffcode=$_POST['scode'];

$name=$_POST['name'];

$desig=$_POST['desig'];

$entity=$_POST['entity'];

$gender=$_POST['gender'];


$query=mysqli_query($link,"UPDATE `hrdd internal`.`add_int` SET `start_date` = '$sdate',
`end_date` = '$edate',
`name` = '$name',
`designation` = '$desig',
`entity` = '$entity',
`gender` = '$gender' WHERE `add_int`.`Program code` = '$pg' AND `staff code`='$scode';

");

if($query){

echo "<b>Updated Successfully</b>";}
                             
                             
mysqli_close($link);
?>
<html>
<p><a href="modify.php"><b>Click to go back</b></a></p>
</html>
