<?php
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
$query1=mysqli_query($link,"SELECT DISTINCT `entity` FROM `add_ext`");?>

<html>
<head>

<style>
table, th, td {border: 1px solid black;}
th, td {padding: 5px;}
#one {float: left; margin-left:30%; margin-top:4%;overflow-x:auto;}
#two {float : right; margin-right:35%;margin-top:4%;overflow-x:auto;}
body {background-color:#F5DCE8;}
</style>

</head>
<body>
<div style="margin-top:2%">
<form method="POST" action="stp_mdp.php" id="enfrm">
<h3><u>Select one entity</u>:</h3>
<label for="entity"><b>Entity</b></label>
<select name="entity" form="enfrm">
<option value="">select</option>
<?php
while($rows=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
$id=$rows['entity'];
echo '<option value="'.$id.'">' .$id. '</option>';}
?>
</select><br/><br/>
<p><button type="submit" name="sub">Click Here</button></form></p></div><br><br>
<form method="GET" action="repext.php">
<button type="submit">Click to go back</button></form>
</body></html>


<?php
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
session_start();
if(isset($_POST['entity'])){
$entity=$_POST['entity'];
$_SESSION["entity"]=$entity;
$query=mysqli_query($link,"SELECT `Program name`,`name` FROM `add_ext` WHERE `Program name` LIKE '%STP%'  AND (`designation`LIKE '%- D%' OR `designation` LIKE '%- SD%' OR `designation`LIKE '%- E%' OR `designation`LIKE '%- SE%' OR `designation`LIKE '%- F%' OR `designation`LIKE '%- SF%' OR `designation`LIKE '%- G%' OR `designation`LIKE '%- SG%') AND `entity`='$entity' ORDER BY `name`");
$query1=mysqli_query($link,"SELECT `Program name`,`name` FROM `add_ext` WHERE `Program name` LIKE '%MDP%'  AND (`designation`LIKE '%- D%' OR `designation` LIKE '%- SD%' OR `designation`LIKE '%- E%' OR `designation`LIKE '%- SE%' OR `designation`LIKE '%- F%' OR `designation`LIKE '%- SF%' OR `designation`LIKE '%- G%' OR `designation`LIKE '%- SG%') AND `entity`='$entity' ORDER BY `name`");

echo '<div id="one">';
echo '<form method="POST" action="stp_rep.php">';
echo '<h3><u>STP Report</u></h3>';
echo  '<table border="1">
      <tr>
      <th><u>List of persons attended <b>STP</b></u></th>
	  <th><u>Program Name</u></th>
       </tr>';
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
echo '<tr><td>'.$row['name'].'</td>
          <td>'.$row['Program name'].'</td>
 </tr>';}
echo '</table>';
echo '<button type="submit" name="create">Save as PDF</button>';
echo '</form>';
echo '</div>';



echo '<div id="two">';
echo '<form method="POST" action="mdp_rep.php">';
echo '<h3><u>MDP Report</u></h3>';
echo '<table border="1">
      <tr>
      <th><u>List of persons attended <b>MDP</b></u></th>
	  <th><u>Program Name</u></th>
       </tr>';
while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
echo '<tr><td>'.$row['name'].'</td> 
          <td>'.$row['Program name'].'</td>  
</tr>';}
echo '</table>';
echo '<button type="submit" name="create">Save as PDF</button>';
echo '</form>';
echo '</div>';

}

mysqli_close($link);?>

