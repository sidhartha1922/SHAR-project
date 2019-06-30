<?php
$pnameerr=$pcodeerr=$sdateerr=$edateerr=$scodeerr=$nameerr=$desigerr=$centererr=$organisererr=$feeerr=$categoryerr=$gendererr=$typeerr="";
if($_SERVER["REQUEST_METHOD"]=="POST")	{
$error=array();
if(empty($_POST['pname'])){
$pnameerr="*";}
else{
$pname=$_POST['pname'];
}

if(empty($_POST['pcode'])){
$pcodeerr="*";}
else{
$pcode=$_POST['pcode'];
}

if(empty($_POST['sdate'])){
$sdateerr="*";}
else{
$sdate=$_POST['sdate'];
}

if(empty($_POST['edate'])){
$edateerr="*";}
else{
$edate=$_POST['edate'];
}

if(isset($_POST['category'])){
$category=$_POST['category'];}
else{
$categoryerr="*";}



if(empty($_POST['scode'])){
$scodeerr="*";}
else{
$scode=$_POST['scode'];
}

if(empty($_POST['name'])){
$nameerr="*";}
else{
$namee=$_POST['name'];
}

if(empty($_POST['desig'])){
$desigerr="*";}
else{
$desig=$_POST['desig'];
}


if(isset($_POST['gender'])){
$gender=$_POST['gender'];}
else{
$gendererr="*";}


if(empty($_POST['center'])){
$centererr="*";}
else{
$center=$_POST['center'];
}

if(empty($_POST['organiser'])){
$organisererr="*";}
else{
$organiser=$_POST['organiser'];
}

if(empty($_POST['fee'])){
$feeerr="*";}
else{
$fee=$_POST['fee'];
}

if(isset($_POST['type'])){
$type=$_POST['type'];}
else{
$typeerr="*";}


if($pnameerr=="" && $pcodeerr=="" && $sdateerr=="" && $edateerr=="" && $scodeerr=="" && $nameerr=="" && $desigerr=="" && $centererr=="" && $organisererr=="" && $feeerr=="" && $categoryerr=="" && $gendererr=="" && $typeerr==""){
/*input($_POST['pname'],$_POST['pcode'],$_POST['sdate'],$_POST['edate'],$_POST['scode'],$_POST['name'],$_POST['desig'],$_POST['center'] );*/
include 'input_ext.php';
exit();
}}?>











<!DOCTYPE HTML>
<html>
<head>
<style>

label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}
.error {color: #FF0000;}
body {background-color:#F5DCE8;}

</style>
</head>
<body><center><h1>HRD MIS</h1></center>
<p><span class="error">* required field</span></p>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="addext">
<label for="pname">Program Name</label>
<input type="text" name="pname" value="" maxlength="20"/><span class="error"><?php echo $pnameerr;?></span><br/>
<label for="pcode">Program code</label>
<input type="text" name="pcode" value="" maxlength="20"/><span class="error"><?php echo $pcodeerr;?></span><br/>
<label for="sdate">Start Date(YYYY-MM-DD):</label>
<input type="date" name="sdate" value=""/><span class="error"><?php echo $sdateerr;?></span><br/><br/>
<label for="edate">End Date(YYYY-MM-DD):</label>
<input type="date" name="edate" value=""/><span class="error"><?php echo $edateerr;?></span><br/><br/>
<label for="category">Category:</label>Admin<input type="radio" name="category" value="A"/>
                               Technical<input type="radio" name="category" value="T"/><span class="error"><?php echo $categoryerr;?></span><br/><br/>
<label for="scode">Staff Code</label>
<input type="text" name="scode" value="" maxlength="20"/><span class="error"><?php echo $scodeerr;?></span><br/>
<label for="name">Name</label>
<input type="text" name="name" value=""/><span class="error"><?php echo $nameerr;?></span><br/>
<label for="desig">Designation</label>
<input type="text" name="desig" value=""/><span class="error"><?php echo $desigerr;?></span><br/>
<label>Entity</label>
<select form="addext" name="entity">
<option  value="CMG">CMG</option>
 <option value="LSSF">LSSF</option>
 <option value="MOTR">MOTR</option>
 <option value="MSA">MSA</option>
 <option value="RO">RO</option>
 <option value="SCEND&ASG">SCEND&ASG</option>
 <option value="SCSD">SCSD</option>
 <option value="SMP&ETF">SMP&ETF</option>
 <option value="SPP">SPP</option>
 <option value="SPROB">SPROB</option>
 <option value="SR">SR</option>
 <option value="VALF">VALF</option>
 <option value="EF&HD">EF&HD</option>
 <option value="TOMD">TOMD</option>
 <option value="M&PH">M&PH</option>
 <option value="F&AD(C)">F&AD(C)</option>
 <option value="F&AD(P)">F&AD(P)</option>
 <option value="P&S">P&S</option>
 <option value="PGA-I">PGA-I</option>
 <option value="PGA-II">PGA-II</option>
 <option value="SCS">SCS</option>
 <option value="SCF">SCF</option>
 <option value="CISF">CISF</option></select><br/><br/>
<label for="gender">Gender:</label>  Female<input type="radio" name="gender" value="F"/>
                                     Male<input type="radio" name="gender" value="M"/><span class="error"><?php echo $gendererr;?></span><br/><br/>
<label for="center">Center</label>
<input type="text" name="center" value=""/><span class="error"><?php echo $centererr;?></span><br/>
<label for="organiser">Name of Oraganiser</label>
<input type="text" name="organiser" value=""/><span class="error"><?php echo $organisererr;?></span><br/>
<label for="fee">Fee</label>
<input type="number" name="fee"/><span class="error"><?php echo $feeerr;?></span><br/>
<label for="type">Type of Programme</label>  Conference<input type="radio" name="type" value="conference"/>
                                             Training<input type="radio" name="type" value="training"/>
					     Workshop<input type="radio" name="type" value="workshop"/>
                                             Seminar<input type="radio" name="type" value="seminar"/><span class="error"><?php echo $typeerr;?></span><br/><br/>


Remarks
<textarea rows="5" cols="30" name="remarks"></textarea><br/><br/>
<button type="submit"> submit </button>
</form>
<form method="GET" action="home.php"><button type="submit">Back to Home Page</button></form>
</body>


 





