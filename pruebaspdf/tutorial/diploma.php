<?php  
require('../fpdf.php'); 
         $name="leo";
         $id="12";
         $fullname="Leobardo";
         class PDF extends FPDF

{ 

function Footer() 
{ 

$this->SetY(-27); 
$this->SetFont('Arial','I',8); 

$this->Cell(0,10,'This certificate has been ©  © produced by thetutor',0,0,'R'); 
} 
} 

$pdf = new FPDF('L','pt','A4'); 

//Loading data 
$pdf->SetTopMargin(20); $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20); 

$pdf->AddPage(); 
//  Print the edge of
$pdf->Image("Constancia.jpg", 0, 0, 800); 
// Print the certificate logo  
$pdf->Image("firma.png", 140, 180, 240); 
// Print the title of the certificate  
$pdf->SetFont('times','B',80); 
$pdf->Cell(720+10,200,"CERTIFICATE",0,0,'C'); 


$pdf->SetFont('Arial','I',34); 
$pdf->SetXY(370,220); 

$pdf->Cell(350,25,$fullname,"B",0,'C',0); 


$pdf->SetFont('Arial','I',14); 
$pdf->SetXY(370,280); 
$message = "ON COMPLETION OF"; 
$pdf->MultiCell(350,14,$message,0,'C',0); 


$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(370,470); 
$signataire = "TheTUTOR"; 
$pdf->Cell(350,19,$signataire,"T",0,'C'); 

$pdf->Output(); 
?> 
3