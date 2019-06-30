
<!DOCTYPE HTML>
<html>
<head>
<style>

label { float: left;width: 150px;}
input [type=text] { float:left;width: 250px;}
h1 {color:blue;font-family:verdana;font-size:250%}
body {background-color:#F5DCE8;}
</style>

</head>
<body><center><h1>HRD MIS</h1></center>
      <center><h2>Reports(external)</h2></center>
<h3><u>Please select one among the following</u></h3><br/>

<p>Click to generate Place wise records</p>
<form method="GET" action="place_ext.php">
<button type="submit">Place</button></form><br/>

<p>Click to generate category wise records</p>
<form method="GET" action="cat_ext.php">
<button type="submit">category</button></form><br/>

<p>Report for Checklist</p>
<form method="GET" action="check_ext.php">
<button type="submit">Checklist</button></form><br/>

<p>Click to generate Gender wise records</p>
<form method="GET" action="gender_ext.php">
<button type="submit">Gender</button></form><br/>

<p>Click to generate Division & Designation wise records</p>
<form method="GET" action="div_ext.php">
<button type="submit">Division & Designation</button></form><br/>

<form method="GET" action="num_ext.php">
<p> Click to view number of programs attended by a particular person: </p>
<button type="submit">Click me</button></form><br/>

<form method="GET" action="stp_mdp.php">
<p> Click to view persons who attended <b>STP&MDP</b> Programs(Designations in "D,E,F,G" only): </p>
<button type="submit">Click me</button></form><br/><br/>
<form method="GET" action="home.php"><button type="submit">Back to Home Page</button></form>






