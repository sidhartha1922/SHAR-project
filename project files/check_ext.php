<?php
/*error_reporting(0);*/
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
$a=$row['Program name'];
$_SESSION["a"]=$a;
$b=$row['start_date'];
$_SESSION["b"]=$b;
$c=$row['end_date'];
$_SESSION["c"]=$c;
mysqli_close($link);
}
?>
<html>
<style>

label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}
h1 {color:blue;font-family:verdana;font-size:250%}
body {background-color:#F5DCE8;}
</style>
<body><center><h1>HRD MIS</h1></center>
      <center><h2>External</h2></center>

<form method="POST" action="check_ext.php">
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
<form method="POST" action="check1_ext.php">

<label for="pname">Program Name</label>
<input type="text" name="pname" value="<?php if(isset($_SESSION["a"])) echo $_SESSION["a"]?>" maxlength="20"/><br/>
<label for="sdate">Start Date:</label>
<input type="date" name="sdate" value="<?php if(isset($_SESSION["b"])) echo $_SESSION["b"]?>"/><br/>
<label for="edate">End Date:</label>
<input type="date" name="edate" value="<?php if(isset($_SESSION["c"])) echo $_SESSION["c"]?>"/><br/>
<button type="submit">Submit</button></body></form>
