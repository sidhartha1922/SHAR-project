<?php
$output='';
$link=mysqli_connect("localhost","root","","hrdd internal");
if($link===false){
die("ERROR".mysqli_connect_error());}

if(isset($_POST['tf1'])){
$tf1=$_POST['tf1'];}

if(isset($_POST['tf2'])){
$tf2=$_POST['tf2'];}

if(isset($_POST['div'])){
$div=$_POST['div'];}

if(isset($_POST['des'])){
$des=$_POST['des'];}

if(isset($_POST['tf1']) && isset($_POST['tf2']) && isset($_POST['div']) && isset($_POST['des'])){
$query=mysqli_query($link,"SELECT *
FROM `add_int` 
WHERE `start_date` >= '$tf1'
AND `end_date` <= '$tf2' AND `entity` LIKE '$div' AND `designation` LIKE '$des'");
echo '<table border="1">
 <tr>
 <th>Program name</th>
 <th>Program code</th>
 <th>Category</th>
 <th>Staff code</th>
 <th>Name</th>
 <th>Gender</th>
 <th>Center</th>
 <th>Remarks</th>
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
<form method="GET" action="repint.php">
<button type="submit">Click to go back</button></form>
