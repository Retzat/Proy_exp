<?php
    session_start();
    session_destroy();
    header("location: index.php")

?>


<?php
require('./fpdf.php');
 
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
?>

<?php
// include class
require('fpdf/fpdf.php');

// create document
$pdf = new FPDF();
$pdf->AddPage();

// config document
$pdf->SetTitle('Generar archivos PDF con PHP');
$pdf->SetAuthor('Kodetop');
$pdf->SetCreator('FPDF Maker');

// add title
$pdf->SetFont('Arial', 'B', 24);
$pdf->Cell(0, 10, 'Generar archivos PDF con PHP', 0, 1);
$pdf->Ln();

// add text
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 7, utf8_decode('Los archivos PDF se utilizan ampliamente en documentos y reportes que necesitan mantener el diseño y contenido (imágenes, tipos de letra, colores, etc), por ello vamos a aprender a crear archivos PDF utilizando PHP.'), 0, 1);
$pdf->Ln();
$pdf->MultiCell(0, 7, utf8_decode('FPDF es una clase PHP que permite la generación de archivos PDF de forma sencilla y sin necesidad de instalar librerías adicionales, cuenta con métodos bien documentados que facilitan su uso.'), 0, 1);
$pdf->Ln();
$pdf->MultiCell(0, 7, utf8_decode('Antes de comenzar lo primero es descargar FPDF e incluir los archivos necesarios en nuestro proyecto.'), 0, 1);
$pdf->Ln();

// add image
$pdf->Image('assets/fpdf-code.png', null, null, 180);

// output file
$pdf->Output('', 'fpdf-complete.pdf');