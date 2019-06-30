<html>
<style>
body {background-color:#E0E0FF;}
</style>
</html>

<?php
$link=mysqli_connect("localhost","root","","hrdd internal");
if($link===false){
die("ERROR".mysqli_connect_error());}
if(isset($_POST['pname'])){
$pname=$_POST['pname'];}

if(isset($_POST['pcode'])){
$pcode=$_POST['pcode'];}


if(isset($_POST['sdate'])){
$sdate=$_POST['sdate'];}

if(isset($_POST['edate'])){
$edate=$_POST['edate'];}

$category=$_POST['category'];

if(isset($_POST['scode'])){
$staffcode=$_POST['scode'];}

if(isset($_POST['name'])){
$name=$_POST['name'];}

if(isset($_POST['desig'])){
$desig=$_POST['desig'];}

if(isset($_POST['entity'])){
$entity=$_POST['entity'];}

if(isset($_POST['gender'])){
$gender=$_POST['gender'];}

if(isset($_POST['center'])){
$center=$_POST['center'];
}

if(isset($_POST['desig'])){
$remarks=$_POST['remarks'];}


$chk=mysqli_query($link,"SELECT * FROM `hrdd internal`.`add_int` WHERE `Program code`= '$pcode' AND `start_date`='$sdate' AND `end_date`='$edate' AND `staff code`='$staffcode'");
$chkrow=mysqli_num_rows($chk);
if($chkrow>0){
echo "Record already exists";
}
else{
$query=mysqli_query($link,"INSERT INTO `hrdd internal`.`add_int` (`Program name`, `Program code`, `start_date`, `end_date`,`category`,`staff code`,`name`,`designation`,`entity`,`gender`,`center`,`remarks`) VALUES ('$pname','$pcode','$sdate','$edate','$category','$staffcode','$name','$desig','$entity','$gender','$center','$remarks')");
if($query){
echo "<b>Record inserted</b>";}}

mysqli_close($link);
?>
<p><a href="ADDint.php">click to go back</a></p>
