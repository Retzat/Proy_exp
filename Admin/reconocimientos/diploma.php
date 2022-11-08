<?php  

require('pdf/fpdf.php'); 
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
$pdf->Image("generados/dc1667877645_GORM113588SDS.jpg", 20, 0, 800); 
// Print the certificate logo  
$pdf->Image("firma.png", 350, 470, 150); 

$pdf->Output(); 
?> 
