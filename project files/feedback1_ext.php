<?php
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
 
 /* Details to be filled by the Admin */
$pgrmname="Java Training";
$date="2018-08-15";
/* Ends Here*/

$nperr=$enerr=$scerr=$out="";
if(isset($_POST['sub'])){
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
if(isset($_POST['np'])){
$np=$_POST['np'];}

if(isset($_POST['en'])){
$en=$_POST['en'];}

if(isset($_POST['sc'])){
$sc=$_POST['sc'];}

if(isset($_POST['cc'])){
$cc=$_POST['cc'];}

if(isset($_POST['tm'])){
$tm=$_POST['tm'];}

if(isset($_POST['int'])){
$int=$_POST['int'];}

if(isset($_POST['use'])){
$use=$_POST['use'];}

if(isset($_POST['career'])){
$car=$_POST['career'];}

if(isset($_POST['sug'])){
$sug=$_POST['sug'];}

if(isset($_POST['or'])){
$or=$_POST['or'];}
if($nperr=="" && $enerr=="" && $scerr==""){
	if(isset($_POST['np']) && isset($_POST['en']) && isset($_POST['sc']) && isset($_POST['cc']) && isset($_POST['tm']) && isset($_POST['int']) && isset($_POST['use']) && isset($_POST['career']) && isset($_POST['sug']) && isset($_POST['or'])){
$query=mysqli_query($link,"INSERT INTO `feedback_ext` (`name` , `staff code` , `entity`,`program name`,`date`,`usefulness`,`informative` , `timing`, `course content`, `career`, `improvement` , `overall rating`) VALUES ('$np','$sc','$en' ,'$pgrmname', '$date' ,'$cc' ,'$tm' ,'$int', '$use', '$car', '$sug', '$or' )");
if($query){
$out= "<h3><em><u>Thank you for your Feedback!!</u></em></h3>";
mysqli_close($link);
}
}}}
?>


<html>
<head>
<style>

body {background-color:#F5DCE8;}
.error {color: #FF0000;}

</style>
</head>
<body>
<form method="POST" action="feedback1_ext.php" id="myfeed">
<center><h3><u>FEEDBACK FORM</u></h3></center>
<label for="name">Name of the Training Programme</label>
<input type="text" name="name" value="<?php echo $pgrmname;?>"/>&ensp;
<label for="date">Date</label>
<input type="text" name="date" value="<?php echo $date;?>"/>&ensp;
<label for="np">Name of Participant</label>
<input type="text" name="np"/>&ensp;<span class="error"><?php echo $nperr;?></span>
<label for="en">Entity/Division</label>
<input type="text" name="en"/>&ensp;<span class="error"><?php echo $enerr;?></span>
<label for="sc">Staff code</label>
<input type="text" name="sc"/><span class="error"><?php echo $scerr;?></span><br/><br/>
<p>Please check the following options to receive your valuable Feedback</p>
<label for="cc"><p><b>Is this course useful?</b></p></label>
<select name="cc" form="myfeed">
<option>select</option>
<option value="yes">YES</option>
<option value="no">NO</option>
</select><br/>

<label for="tm"><p><b>Is it informative?</b></p></label>
<select name="tm" form="myfeed">
<option>select</option>
<option value="very much">Very much</option>
<option value="much">Much</option>
<option value="Not informative">Not informative</option>
</select><br/>

<label for="int"><p><b>Timings given for each subjects</b></p></label>
<select name="int" form="myfeed">
<option>select</option>
<option value="unsatisfactory">Unsatisfactory</option>
<option value="satisfactory">Satisfactory</option>
</select><br/>

<label for="use"><p><b>Tell about the course content & structure</b></p></label>
<textarea rows="4" cols="20" name="use">
</textarea>

<label for="career"><p><b>How does the training help your career growth?</b></p></label>
<textarea rows="4" cols="20" name="career">
</textarea>

<label for="sug"><p><b>Suggestions for improvements</b></p></label>
<textarea rows="4" cols="20" name="sug">
</textarea>
<label for="or"><p><b>Overall rating</b></p></label>
<select name="or" form="myfeed">
<option>select</option>
<option value="unsatisfactory">Unsatisfactory</option>
<option value="satisfactory">Satisfactory</option>
<option value="good">Good</option>
<option value="very good">Very Good</option>
<option value="excellent">Excellent</option>
</select><br/>

<button type="submit" name="sub">Submit</button>&ensp;&ensp;&ensp;<span><?php echo $out;?></span>
</form>
</body>
</html>
