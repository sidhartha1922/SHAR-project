<?php

$link=mysqli_connect("localhost","root","","hrdd internal");
if($link===false){
die("ERROR".mysqli_connect_error());}
$pg=$_SESSION["pc"];
$scode=$_POST['scode'];
$query=mysqli_query($link,"SELECT * 
FROM `add_int` 
WHERE `Program code` LIKE '$pg'
AND `staff code` LIKE '$scode'");

$row=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>








<!DOCTYPE HTML>
<html>
<head>
<style>

label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}
h1 {color:blue;font-family:verdana;font-size:250%}
body {background-color:#E0E0FF;}
</style>
</head>
<body><center><h1>HRD MIS</h1></center>

<form method="POST" action="modify2.php" id="addint">
<!--<input type="hidden" name="pcode" value="<?php echo $_POST['pcode']; ?>">-->
<input type="hidden" name="scode" value="<?php echo $_POST['scode']; ?>">
<label for="sdate">Start Date:</label>
<input type="date" name="sdate" value="<?php echo $row['start_date']?>"/><br/>
<label for="edate">End Date:</label>
<input type="date" name="edate" value="<?php echo $row['end_date']?>"/><br/>
<label for="scode">Staff Code</label>
<input type="text" name="scode" value="<?php echo $row['staff code']?>" maxlength="20"/><br/>
<label for="name">Name</label>
<input type="text" name="name" value="<?php echo $row['name']?>"/><br/>
<label for="desig">Designation</label>
<input type="text" name="desig" value="<?php echo $row['designation']?>"/><br/>
<label>Entity</label>
<select form="addint" name="entity">
<option value="CMG" <?php if($row['entity']=="CMG") echo 'selected="selected"';?>>CMG</option>
 <option value="LSSF" <?php if($row['entity']=="LSSF") echo 'selected="selected"';?>>LSSF</option>
 <option value="MOTR" <?php if($row['entity']=="MOTR") echo 'selected="selected"';?>>MOTR</option>
 <option value="MSA" <?php if($row['entity']=="MSA") echo 'selected="selected"';?>>MSA</option>
 <option value="RO" <?php if($row['entity']=="RO") echo 'selected="selected"';?>>RO</option>
 <option value="SCEND&ASG" <?php if($row['entity']=="SCEND&ASG") echo 'selected="selected"';?>>SCEND&ASG</option>
 <option value="SCSD" <?php if($row['entity']=="SCSD") echo 'selected="selected"';?>>SCSD</option>
 <option value="SMP&ETF" <?php if($row['entity']=="SMP&ETF") echo 'selected="selected"';?>>SMP&ETF</option>
 <option value="SPP" <?php if($row['entity']=="SPP") echo 'selected="selected"';?>>SPP</option>
 <option value="SPROB" <?php if($row['entity']=="SPROB") echo 'selected="selected"';?>>SPROB</option>
 <option value="SR" <?php if($row['entity']=="SR") echo 'selected="selected"';?>>SR</option>
 <option value="VALF" <?php if($row['entity']=="VALF") echo 'selected="selected"';?>>VALF</option>
 <option value="EF&HD" <?php if($row['entity']=="EF&HD") echo 'selected="selected"';?>>EF&HD</option>
 <option value="TOMD" <?php if($row['entity']=="TOMD") echo 'selected="selected"';?>>TOMD</option>
 <option value="M&PH" <?php if($row['entity']=="M&PH") echo 'selected="selected"';?>>M&PH</option>
 <option value="F&AD(C)" <?php if($row['entity']=="F&AD(C)") echo 'selected="selected"';?>>F&AD(C)</option>
 <option value="F&AD(P)" <?php if($row['entity']=="F&AD(P)") echo 'selected="selected"';?>>F&AD(P)</option>
 <option value="P&S" <?php if($row['entity']=="P&S") echo 'selected="selected"';?>>P&S</option>
 <option value="PGA-I" <?php if($row['entity']=="PGA-I") echo 'selected="selected"';?>>PGA-I</option>
 <option value="PGA-II" <?php if($row['entity']=="PGA-II") echo 'selected="selected"';?>>PGA-II</option>
 <option value="SCS" <?php if($row['entity']=="SCS") echo 'selected="selected"';?>>SCS</option>
 <option value="SCF" <?php if($row['entity']=="SCF") echo 'selected="selected"';?>>SCF</option>
<option value="VAST" <?php if($row['entity']=="VAST") echo 'selected="selected"';?>>VAST</option>
<option value="SFS" <?php if($row['entity']=="SFS") echo 'selected="selected"';?>>SFS</option>
 <option value="CISF" <?php if($row['entity']=="CISF") echo 'selected="selected"';?>>CISF</option> </select><br/><br/>

<label for="gender">Gender:</label> Male <input type="radio" name="gender" value="M" <?php if($row['gender']=="M") echo 'checked="checked"';?>/>
                                    Female <input  type="radio" name="gender" value="F" <?php if($row['gender']=="F") echo 'checked="checked"';?>/><br/>
<label for="btn"><p><button name="btn" type="submit"> Update </button></p></label>
</form>
</body>
