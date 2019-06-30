<html>
<head>
<style>


body {background-color:#F5DCE8;}

</style>
</head>
</html>



<?php
session_start();
$link=mysqli_connect("localhost","root","","hrdd external");
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

$organiser=$_POST['organiser'];

$fee=$_POST['fee'];

$type=$_POST['type'];

$query=mysqli_query($link,"UPDATE `hrdd external`.`add_ext` SET `start_date` = '$sdate',
`end_date` = '$edate',
`name` = '$name',
`designation` = '$desig',
`entity` = '$entity',
`gender` = '$gender' ,`organiser`='$organiser' ,`fee`='$fee',`type`='$type' WHERE `add_ext`.`Program code` = '$pg' AND `staff code`='$scode';

");

if($query){

echo "Updated Successfully";}
                             
                             
mysqli_close($link);
?>
<html>
<p><a href="modify_ext.php"><b>Click to go back</b></a></p>
</html>
