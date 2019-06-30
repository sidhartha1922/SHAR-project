<?php
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
$res=mysqli_query($link,"SELECT DISTINCT `staff code` FROM `add_ext`");
mysqli_close($link);
?>

<!DOCTYPE HTML>
<html>
<head>
<style>

label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}
body {background-color:#F5DCE8;}
</style>

</head>

<body>
<form action="num_ext.php" method="POST" id="scodefrm">
<label for="tf1">Select start date</label>
 <input type="date" name="tf1"/><br/>
 <label for="tf2">select end date</label>
<input type="date" name="tf2"/><br/>
Staff Code:<select form="scodefrm" name="scode">
<?php
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC)){
$id=$r['staff code'];
echo '<option value="'.$id.'">' .$id. '</option>';
}
?>
</select><br/><br/>
<button type="submit"> submit </button></form>
</body>
</html>


<?php
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}

if(isset($_POST['tf1'])){
$tf1=$_POST['tf1'];}

if(isset($_POST['tf2'])){
$tf2=$_POST['tf2'];}

if(isset($_POST['scode'])){
$scode=$_POST['scode'];}


if(isset($_POST['tf1']) && isset($_POST['tf2']) && isset($_POST['scode'])){

$query=mysqli_query($link,"SELECT `Program name`
FROM `add_ext` 
WHERE `start_date` >= '$tf1'
AND `end_date` <= '$tf2' AND `staff code` LIKE '$scode'");

$row=mysqli_num_rows($query);

echo "<p> <b>Number of programs:$row</b></p>";
echo "<br/>";
echo "<p><u><b>List of programs</b></u></p>";
$i=0;
while($rows=mysqli_fetch_array($query,MYSQL_ASSOC)){
$i++;
echo $i."."." ".$rows['Program name'];
echo "<br/><br/>";}
}
?>
<form method="GET" action="repext.php">
<button type="submit">Click to go back</button></form>





