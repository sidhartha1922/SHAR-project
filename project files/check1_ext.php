<?php
$output='';
error_reporting(0);
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
session_start();
$pcode=$_SESSION["mysl"];
$pname=$_SESSION["a"];
$sdate=$_SESSION["b"];
$edate=$_SESSION["c"];
$query=mysqli_query($link,"SELECT *
FROM `add_ext` 
WHERE `Program code`='$pcode'
AND `Program name`='$pname' ");
echo '<table border="1" cellpadding="3" style="border: 1px solid black">
 <tr>
 <th>Fee status</th>
 <th>Organiser intimation</th>
 <th>Director approval</th>
 <th>Training order</th>
 </tr>';
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
$output='<tr>
               
              <td>'.$row['Fee status'].'</td> 
              <td>'.$row['Organiser intimation'].'</td> 
              <td>'.$row['Director approval'].'</td>
              <td>'.$row['Training order'].'</td>  
              </tr>';
        
echo $output;
}
echo '</table>';
mysqli_close($link);?>
<form method="GET" action="repext.php">
<button type="submit">Click to go back</button></form>
