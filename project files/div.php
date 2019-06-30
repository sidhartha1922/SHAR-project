<?php

$link=mysqli_connect("localhost","root","","hrdd internal");
if($link===false){
die("ERROR".mysqli_connect_error());}
$res=mysqli_query($link,"SELECT DISTINCT `entity` FROM `add_int`");
$resl=mysqli_query($link,"SELECT DISTINCT `designation` FROM `add_int`");
$pnameerr=$pcodeerr=$sdateerr=$edateerr=$scodeerr=$nameerr=$desigerr=$centererr=$categoryerr=$gendererr="";
if($_SERVER["REQUEST_METHOD"]=="POST")	{
$error=array();

if(empty($_POST['tf1'])){
$sdateerr="*";}
else{
$sdate=$_POST['tf1'];
}

if(empty($_POST['tf2'])){
$edateerr="*";}
else{
$edate=$_POST['tf2'];
}

if($sdateerr=="" && $edateerr==""){
/*input($_POST['pname'],$_POST['pcode'],$_POST['sdate'],$_POST['edate'],$_POST['scode'],$_POST['name'],$_POST['desig'],$_POST['center'] );*/
include 'div1.php';
exit();
}}?>

<html>
<head>
<style>

 label { float: left;width: 150px;}
 input [type=text] { float:left;width: 250px;}
h1 {color:blue;font-family:verdana;font-size:250%}
.error { color: #FF0000;}
body {background-color:#E0E0FF;}
</style>
</head>
<body>
<p><span class="error">* required field</span></p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="div">
 <label for="tf1">Select start date</label>
 <input type="date" name="tf1"/><span class="error"><?php echo $sdateerr;?></span><br/><br/>
 <label for="tf2">select end date</label>
 <input type="date" name="tf2"/><span class="error"><?php echo $edateerr;?></span><br/><br/>
 <label>Division</label>
 <select form="div" name="div">
<?php
while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
$id=$row['entity'];
echo '<option value="'.$id.'">' .$id. '</option>';
}
?>
</select><br/><br/>

 <label>Designation</label>
 <select form="div" name="des">
<?php
while($rows=mysqli_fetch_array($resl,MYSQLI_ASSOC)){
$id=$rows['designation'];
echo '<option value="'.$id.'">' .$id. '</option>';
}
?>

   </select><br/><br/>
  <button type="submit"> submit </button></form>
  </body>
  </html>

