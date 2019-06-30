<?php
session_start();
function fetch_data(){
$output='';
$link=mysqli_connect("localhost","root","","hrdd external");
if($link===false){
die("ERROR".mysqli_connect_error());}




$entity=$_SESSION["entity"];
if($entity){
$query1=mysqli_query($link,"SELECT `Program name`,`name` FROM `add_ext` WHERE `Program name` LIKE '%MDP%'  AND (`designation`LIKE '%- D%' OR `designation` LIKE '%- SD%' OR `designation`LIKE '%- E%' OR `designation`LIKE '%- SE%' OR `designation`LIKE '%- F%' OR `designation`LIKE '%- SF%' OR `designation`LIKE '%- G%' OR `designation`LIKE '%- SG%') AND `entity`='$entity' ORDER BY `name`");
while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
$output.='<tr>
               
              <td>'.$row['name'].'</td> 
              <td>'.$row['Program name'].'</td> 
             
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
 <th><b>Name</b></th>
 <th style="height:10px"><b>Program</b></th>
 </tr></thead>';
$content.=fetch_data();
$content.= '</table>';
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastpage();
$pdf->output('htmlout.pdf', 'I');}
?>