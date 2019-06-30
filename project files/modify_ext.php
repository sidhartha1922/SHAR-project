<?php
session_start();
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
$res=mysqli_query($link,"SELECT DISTINCT `Program code` FROM `hrdd external`.`add_ext`");
if(isset($_POST['mysl'])){
$pc=$_POST['mysl'];
$_SESSION["pc"]=$pc;
$pg=$_SESSION["pc"];}
$scodeerr="";
$err="";
if($_SERVER["REQUEST_METHOD"]=="POST")	{

if(empty($_POST['scode']))
{
$scodeerr="*";}
else{
$scode=$_POST['scode'];
$_SESSION["scode"]=$scode;
$sc=$_SESSION["scode"];
$res1=mysqli_query($link,"SELECT * FROM `hrdd external`.`add_ext` WHERE `Program code`='$pg' AND `staff code`='$scode'");
$chkrow=mysqli_num_rows($res1);
if($chkrow==0){
$err="<em>please enter valid Staff code!</em>";
}
}
if($scodeerr=="" && $chkrow>0){
include 'modify1_ext.php';
exit();}}
?>

<!DOCTYPE HTML>
<html>
<head>
<style>

label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}
p {padding-right:30px;}
.error { color: #FF0000;}
em {color: #FF0000;}
h1 {color:blue;font-family:verdana;font-size:250%}
body {background-color:#F5DCE8;}
</style>
</head>
<body><center><h1>HRD MIS</h1></center>
<p>Please enter the following details to update</p>
<p><span class="error">* required field</span></p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="mysl">Program code</label>
<select name="mysl">
<option>select</option>
<?php
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC)){
$id=$r['Program code'];
 
echo '<option value="'.$id.'">' .$id. '</option>';
}
?>
</select><br/>
<label for="scode">Staff Code</label>
<input type="text" name="scode" value="" maxlength="20"/><span class="error"><?php echo $scodeerr;?></span><br/>
<button type="submit">Submit</button><br/>
<span><?php if($err){echo $err;}?></span><br/>
</form><br>
<form method="GET" action="home.php"><button type="submit">Back to Home Page</button></form>
</body></html>