<?php
session_start();
?>

<html>
<head>
<style>
label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}</style>
</head>

<form method="POST" action="feedback.php">
<label for="name">Name of the Programme</label>
<input type="text" name="name"/><br/><br/>
<label for="fname">Name of the Faculty</label>
<input type="text" name="fname"/><br/>
<label for="date"> Start Date</label>
<input  type="date" name="date"><br/>
<button type="submit" name="sub">submit</button></form></html>

<?php
error_reporting(0);
if(isset($_POST['sub']) || isset($_POST['add'])){
if(isset($_POST['name'])){
$name=$_POST['name'];
$_SESSION["name"]=$name;
}
if(isset($_POST['fname'])){
$fname=$_POST['fname'];
$_SESSION["fname"]=$fname;
}
if(isset($_POST['date'])){
$date=$_POST['date'];
$_SESSION["date"]=$date;
}
if(isset($_POST['add'])){
$ses=$_POST['ses'];
$_SESSION["ses"]=$ses;
$arrlength=count($ses);}
/*for($x=0;$x<$arrlength;$x++){
echo $ses[$x];
echo "<br>";}}*/

if((isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['date'])) || (isset($_POST['add']))){
echo "<form method=\"POST\" action=\"feedback.php\">";
      $arrlength1=count($ses);
      for($x=0;$x<$arrlength1;$x++){
      echo "<input type=\"hidden\" name='ses[]' value='$ses[$x]'/>";}

echo  "enter title of the session:<input type=\"text\" name=\"ses[]\"/>";
echo   "<button type=\"submit\" name=\"add\">ADD</button>";
echo "</form>"; }}?>

<p><a href="feedback1.php">click here</a></p>



