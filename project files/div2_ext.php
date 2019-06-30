<?php
function fetch_data(){
$output='';
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}
session_start();



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
FROM `add_ext` 
WHERE `start_date` >= '$tf1'
AND `end_date` <= '$tf2' AND `entity` LIKE '$div' AND `designation` LIKE '$des'");
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
$output.='<tr>
               
              <td>'.$row['Program name'].'</td> 
              <td>'.$row['Program code'].'</td> 
              <td>'.$row['category'].'</td>
              <td>'.$row['staff code'].'</td>  
              <td>'.$row['name'].'</td> 
              <td>'.$row['gender'].'</td>
              <td>'.$row['center'].'</td>
              <td>'.$row['remarks'].'</td>
        </tr>';
        }
return $output;}}

if(isset($_POST['create'])){

require_once('tcpdf/tcpdf.php');
$pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('helvetica', '',9);
$pdf->AddPage();
$content='';
$content= '<table border="1" cellspacing="0" cellpadding="3">
 <thead><tr style="height:10%">
 <th><b>Program name</b></th>
 <th style="height:10px"><b>Program code</b></th>
 <th style="height:10px"><b>Category</b></th>
 <th style="height:10px"><b>Staff code</b></th>
 <th style="height:10px"><b>Name</b></th>
 <th style="height:10px"><b>Gender</b></th>
 <th style="height:10px"><b>Center</b></th>
 <th style="height:10px"><b>Remarks</b></th>
 </tr></thead>';
$content.=fetch_data();
$content.= '</table>';
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastpage();
$pdf->output('htmlout.pdf', 'I');}
?>