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
<form action="cat_ext.php" method="POST" id="catfrm">
<label for="tf1">Select start date</label>
 <input type="date" name="tf1"/><br/>
 <label for="tf2">select end date</label>
<input type="date" name="tf2"/><br/>
<label for="category">Category:</label>Admin<input type="radio" name="category" value="A"/>
                                       Technical<input type="radio" name="category" value="T"/><br/>
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

if(isset($_POST['category'])){
$cat=$_POST['category'];}

if(isset($_POST['tf1']) && isset($_POST['tf2']) && isset($_POST['category'])){
$query=mysqli_query($link,"SELECT *
FROM `add_ext` 
WHERE `start_date` >= '$tf1'
AND `end_date` <= '$tf2' AND `category` LIKE '$cat'");
echo '<br/><br/>';
echo '<table border="1" cellspacing="0" cellpadding="3" style="border: 2px solid black">
 <tr>
 <th>Staff code</th>
 <th>Name</th>
 
</tr>';

while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
$output= '<tr>
               
              
              <td>'.$row['staff code'].'</td>  
              <td>'.$row['name'].'</td> 
             
        </tr>';
echo $output;
        }
echo '</table>';
echo '<br/>';
$rows=mysqli_num_rows($query);
echo "<p> <b>Records found</b>:</p>";
echo $rows;
}

?>
<form method="GET" action="repext.php">
<button type="submit">Click to go back</button></form>

