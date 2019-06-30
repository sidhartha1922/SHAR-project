<?php

$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}

session_start();

$res=mysqli_query($link,"SELECT DISTINCT `Program code` FROM `add_ext`");

if(isset($_POST['mysl'])){
$mysl=$_POST['mysl'];
$_SESSION["mysl"]=$mysl;
$resl=mysqli_query($link,"SELECT `Program name`,`start_date`,`end_date` FROM `add_ext` WHERE `add_ext`.`Program code`='$mysl'");
$row=mysqli_fetch_array($resl,MYSQLI_ASSOC);
$x=$row['Program name'];
$_SESSION["x"]=$x;
$y=$row['start_date'];
$_SESSION["y"]=$y;
$z=$row['end_date'];
$_SESSION["z"]=$z;
}
$pnameerr=$sdateerr=$edateerr="";
if(isset($_POST['sub'])){

if(empty($_POST['pname'])){
$pnameerr="*";}
else{
$pname=$_POST['pname'];
}


if(empty($_POST['sdate'])){
$sdateerr="*";}
else{
$sdate=$_POST['sdate'];
}

if(empty($_POST['edate'])){
$edateerr="*";}
else{
$edate=$_POST['edate'];
}
if($pnameerr=="" && $sdateerr=="" && $edateerr==""){
header('Location: checklist1.php');
}}?>

<html>
<style>

label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}
h1 {color:blue;font-family:verdana;font-size:250%}
body {background-color:#CCFFFF;}
.error {color: #FF0000;}
</style>
<body><center><h1>HRD MIS</h1></center>
      <center><h2>External</h2></center>
<p><span class="error">* required field</span></p>
<form method="POST" action="checklist.php">
<label for="mysl">Program code</label>
<select name="mysl" onchange="this.form.submit();">
<option>select</option>
<?php
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC)){
$id=$r['Program code'];
echo '<option value="'.$id.'">' .$id. '</option>';
}
?>
</select></form>




<form method="POST" action="checklist.php">
<label for="pname">Program Name</label>
<textarea name="pname" rows="6" cols="18" readonly><?php if(isset($_SESSION["x"])) echo $_SESSION["x"]?></textarea><span class="error"><?php echo $pnameerr;?></span><br/><br/>
<label for="sdate">Start Date:</label>
<input type="date" name="sdate" value="<?php if(isset($_SESSION["y"])) echo $_SESSION["y"]?>"/><span class="error"><?php echo $sdateerr;?></span><br/><br/>
<label for="edate">End Date:</label>
<input type="date" name="edate" value="<?php if(isset($_SESSION["z"])) echo $_SESSION["z"]?>"/><span class="error"><?php echo $sdateerr;?></span><br/><br/>
<button type="submit" name="sub">Submit</button></body></form>
