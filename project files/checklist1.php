<?php

$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
session_start();
$out="";
$pcode=$_SESSION["mysl"];
$pname=$_SESSION["x"];
$sdate=$_SESSION["y"];
$edate=$_SESSION["z"];


if(isset($_POST['fee'])){
$fs=$_POST['fee'];

$query=mysqli_query($link,"UPDATE `add_ext` SET `Fee status` = '$fs'
 WHERE (`Program code` = '$pcode' AND `Program name`='$pname') ");
}

if(isset($_POST['oi'])){
$oi=$_POST['oi'];

$query=mysqli_query($link,"UPDATE `add_ext` SET `Organiser intimation` = '$oi'
 WHERE (`Program code` = '$pcode' AND `Program name`='$pname') ");
}

if(isset($_POST['da'])){
$da=$_POST['da'];

$query=mysqli_query($link,"UPDATE `add_ext` SET `Director approval` = '$da'
 WHERE (`Program code` = '$pcode' AND `Program name`='$pname') ");
}

if(isset($_POST['to'])){
$to=$_POST['to'];

$query=mysqli_query($link,"UPDATE `add_ext` SET `Training order` = '$to' 
WHERE (`Program code` = '$pcode' AND `Program name`='$pname') ");}

if(isset($_POST['fee']) || isset($_POST['oi']) || isset($_POST['da']) || isset($_POST['to'])){
$out="<em>Updated</em>";}

?>


<!DOCTYPE HTML>
<html>
<head>
<style>

label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}
em { background-color: lightyellow; color: maroon; font-weight: bold;}
p { position: absolute; bottom: 0;}

</style>
</head>
<body><center><h1>HRD MIS</h1></center>
      <center><h2>External</h2></center>
<form method="POST" action="checklist1.php">
<!--<input type="hidden" name="pcode" value="<?php echo $_POST['pcode']; ?>">
<input type="hidden" name="pname" value="<?php echo $_POST['pname']; ?>">
<input type="hidden" name="sdate" value="<?php echo $_POST['sdate']; ?>">
<input type="hidden" name="edate" value="<?php echo $_POST['edate']; ?>">-->
<label for="fee">Fee status</label>
Sent to accounts<input type="radio" name="fee" value="Sent to accounts"/>
Pending<input type="radio" name="fee" value="Pending"/>
Paid<input type="radio" name="fee" value="Paid"/>
<br/><br/>
<label for="oi">Organiser Intimation</label>
Sent<input type="radio" name="oi" value="Sent"/>
Not sent<input type="radio" name="oi" value="Not sent"/>
<br/><br/>
<label for="da">Director Approval</label>
Sent for Approval<input type="radio" name="da" value="Sent for Approval"/>
Pending<input type="radio" name="da" value="Pending"/>
Approved<input type="radio" name="da" value="Approved"/>
<br/><br/>
<label for="to">Training Order</label>
Sent for signature<input type="radio" name="to" value="Sent for signature"/>
Released<input type="radio" name="to" value="Released"/>
<br/><br/>
<button type="submit">Update</button>
</form>
</body>
</html><br>
<?php echo $out;?>



<p align="bottom"><a href="external.php">Click here to go back</a></p>


