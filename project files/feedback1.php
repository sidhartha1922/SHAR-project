<?php
session_start();
$res="";
error_reporting(0);
$link=mysqli_connect("localhost","root","","hrdd internal");
if($link===false){
die("ERROR".mysqli_connect_error());}
$nperr=$enerr=$scerr="";
$output="";
$pname="";

/* Details to be entered by the ADMIN */

$pname="Java Training";
$date="2013-01-05";
$faculty="anna dorai";
$s1=array("1.hello world","2.hiiiiii","3.byeeee");

/* ENDS HERE */


if(isset($_POST['btn'])){
if(empty($_POST['np'])){
$nperr="*";}
else{
$np=$_POST['np'];}

if(empty($_POST['en'])){
$enerr="*";}
else{
$en=$_POST['en'];}

if(empty($_POST['sc'])){
$scerr="*";}
else{
$sc=$_POST['sc'];}

$cc=$_POST['cc'];
$tm=$_POST['tm'];
$int=$_POST['int'];
$use=$_POST['use'];
$ain=$_POST['ain'];
$i=0;
if($nperr=="" && $enerr=="" && $scerr==""){
foreach($s1 as $key){
$query=$query=mysqli_query($link,"INSERT INTO `hrdd internal`.`feedback`(`name`,`staff code`,`entity`,`program name`,`date`,`session`,`faculty`,`course content`,`teaching methods`,`interaction`,`usefulness`,`applicability`) VALUES ('$np','$sc','$en','$pname','$date','$s1[$i]','$faculty','$cc[$i]','$tm[$i]','$int[$i]','$use[$i]','$ain[$i]')");
$i++;
}
if($query){
$res="<b>Thank You</b>";}}
$_SESSION["res"]=$res;
}
?>




<html><head>
<style>
.error { color: #FF0000;}
body {background-color:#E0E0FF;}
</style>

</head>
<body>
<center><h3><u>FEEDBACK FORM</u></h3></center><br><br><br>
<form method="POST" action="feedback1.php" id="myfrm">
<label for="np">Name of Participant</label>
<input type="text" name="np"/><span class="error"><?php echo $nperr;?></span>
<label for="en">Entity</label>
<input type="text" name="en"/><span class="error"><?php echo $enerr;?></span>
<label for="sc">Staff code</label>
<input type="text" name="sc"/><span class="error"><?php echo $scerr;?></span><br/><br/>
<table cellpadding="2" border="1">
<tr>
 <th>Sessions</th>
 <th>course content</th>
 <th>Teaching Methods</th>
<th>Interaction</th>
<th>Usefulness</th>
<th>Applicability</th>
</tr>
<?php 
foreach($s1 as $it){

 $output='<tr>
               
              <td><textarea name=\"ses\"  value="'.$it.'" rows="5" cols="18" readonly>' .$it. '</textarea></td>
              <td><select name=\'cc[]\' form="myfrm">
<option value="">select</option>
<option value="unsatisfactory">1.Unsatisfactory</option>
<option value="satisfactory">2.Satisfactory</option>
<option value="good">3.Good</option>
<option value="very good">4.Very Good</option>
<option value="excellent">5.Excellent</option>
</select><br/>
</td> 
              <td><select name=\'tm[]\' form="myfrm">
<option value="">select</option>
<option value="unsatisfactory">1.Unsatisfactory</option>
<option value="satisfactory">2.Satisfactory</option>
<option value="good">3.Good</option>
<option value="very good">4.Very Good</option>
<option value="excellent">5.Excellent</option>
</select><br/>
</td> 
<td><select name=\'int[]\' form="myfrm">
<option value="">select</option>
<option value="unsatisfactory">1.Unsatisfactory</option>
<option value="satisfactory">2.Satisfactory</option>
<option value="good">3.Good</option>
<option value="very good">4.Very Good</option>
<option value="excellent">5.Excellent</option>
</select><br/>
</td> 
<td><select name=\'use[]\' form="myfrm">
<option value="">select</option>
<option value="unsatisfactory">1.Unsatisfactory</option>
<option value="satisfactory">2.Satisfactory</option>
<option value="good">3.Good</option>
<option value="very good">4.Very Good</option>
<option value="excellent">5.Excellent</option>
</select><br/>
</td> 
<td><select name=\'ain[]\' form="myfrm">
<option value="">select</option>
<option value="unsatisfactory">1.Unsatisfactory</option>
<option value="satisfactory">2.Satisfactory</option>
<option value="good">3.Good</option>
<option value="very good">4.Very Good</option>
<option value="excellent">5.Excellent</option>
</select><br/>
</td> 
           </tr>';
echo $output;
}?>

</table><br>
<button type="submit" name="btn">Submit</button>
</form>
</html><br><br>
<?php echo $_SESSION["res"];?>




