<?php
session_start();
$output='';
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}

if(isset($_POST['tf1'])){
$tf1=$_POST['tf1'];
$_SESSION["tf1"]=$tf1;}

if(isset($_POST['tf2'])){
$tf2=$_POST['tf2'];
$_SESSION["tf2"]=$tf2;}

if(isset($_POST['div'])){
$div=$_POST['div'];
$_SESSION["div"]=$div;}

if(isset($_POST['des'])){
$des=$_POST['des'];
$_SESSION["des"]=$des;}

if(isset($_POST['tf1']) && isset($_POST['tf2']) && isset($_POST['div']) && isset($_POST['des'])){
$query=mysqli_query($link,"SELECT *
FROM `add_ext` 
WHERE `start_date` >= '$tf1'
AND `end_date` <= '$tf2' AND `entity` LIKE '$div' AND `designation` LIKE '$des'");

echo '<table border="1" cellspacing="0" cellpadding="3">
 <tr>
 <th width="15%">Program name</th>
 <th width="5%">Program code</th>
 <th width="3%">Category</th>
 <th width="5%">Staff code</th>
 <th width="20%">Name</th>
 <th width="3%">Gender</th>
 <th width="10%">Center</th>
 <th width="25%">Remarks</th>
 </tr>';
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
$output='<tr>
               
              <td>'.$row['Program name'].'</td> 
              <td>'.$row['Program code'].'</td> 
              <td>'.$row['category'].'</td>
              <td>'.$row['staff code'].'</td>  
              <td>'.$row['name'].'</td> 
              <td>'.$row['gender'].'</td>
              <td>'.$row['center'].'</td>
              <td>'.$row['remarks'].'</td>
        </tr>';
        
echo $output;
}
echo '</table>';
}
?>
<html>
<head>
<style>
table,td {border: 1px solid black;}
th { height: 20px;}
body {background-color:#F5DCE8;}
</style>
</head>
<body>
<form method="POST" action="div2_ext.php">
<input type="hidden" name="tf1" value="<?php echo $_POST['tf1']; ?>"/>
<input type="hidden" name="tf2" value="<?php echo $_POST['tf2']; ?>"/>
<input type="hidden" name="div" value="<?php echo $_POST['div']; ?>"/>
<input type="hidden" name="des" value="<?php echo $_POST['des']; ?>"/>
<button type="submit" name="create">Save as PDF</button></form><br><br><br>
<form method="GET" action="repext.php">
<button type="submit">Click to go back</button></form>
</body></html>

