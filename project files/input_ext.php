<html>
<head>
<style>


body {background-color:#F5DCE8;}

</style>
</head>
</html>

<?php
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
if(isset($_POST['pname'])){
$pname=$_POST['pname'];}


$pcode=$_POST['pcode'];



$sdate=$_POST['sdate'];


$edate=$_POST['edate'];

$category=$_POST['category'];

$staffcode=$_POST['scode'];

$name=$_POST['name'];

$desig=$_POST['desig'];

$entity=$_POST['entity'];

$gender=$_POST['gender'];

$center=$_POST['center'];

$organiser=$_POST['organiser'];

$fee=$_POST['fee'];

$type=$_POST['type'];

$remarks=$_POST['remarks'];

$chk=mysqli_query($link,"SELECT * FROM `hrdd external`.`add_ext` WHERE `Program code`= '$pcode' AND `start_date`='$sdate' AND `end_date`='$edate' AND `staff code`='$staffcode'");
$chkrow=mysqli_num_rows($chk);
if($chkrow>0){
echo "Record already exists";
}
else{
$query=mysqli_query($link,"INSERT INTO `hrdd external`.`add_ext` (`Program name`, `Program code`, `start_date`, `end_date`, `category`, `staff code`, `name`, `designation`, `entity`, `gender`, `center`, `organiser`, `fee`, `type`, `remarks`) VALUES ('$pname','$pcode','$sdate','$edate','$category','$staffcode','$name','$desig','$entity','$gender','$center','$organiser','$fee','$type','$remarks')");
if($query){
echo "Record inserted";}}

mysqli_close($link);
?>
<p><a href="ADDext.php">click to go back</a></p>