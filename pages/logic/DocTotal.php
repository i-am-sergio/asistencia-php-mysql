<?php
require('../../libs/fpdf/fpdf.php');
include_once('../../config/db.php');

$img = $_POST['base64'];

$conexionDB = BaseDatos::crearInstancia();

$sql = "SELECT * FROM estadistica_diaria";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$columnas = $consulta->fetchAll();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../src/logo.png',150,10,40);
    $this->SetX(20);
    $this->SetY(30);
}

// Pie de página
function Footer()
{
    // // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // // Arial italic 8
    $this->SetFont('Arial','I',8);
    // // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada

//$pdf = new PDF('L', 'mm', 'A3');
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',15);

$pdf->Cell(0,0,"Estadistica del semestre",0,0,'C',0);
$pdf->SetFont('Times','',12);
$pdf->Ln(12);
$pdf->SetX(45);
$pdf->SetFillColor(14,139,246);
$pdf->Cell(8,7,"ID",1,0,'C',0);
$pdf->Cell(80,7,"Condicion",1,0,'C',0);
$pdf->Cell(20,7,"Total",1,0,'C',0);
$pdf->SetFillColor(255,255,255);//color de fondo
$pdf->SetDrawColor(51,51,51);//color de linea
  $pdf->Ln(7);
foreach($columnas as $columna){
  $pdf->setX(45);
  $pdf->Cell(8,6,utf8_decode($columna['id']),1,0,'C',0);
  $pdf->Cell(80,6,utf8_decode($columna['condicion']),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode($columna['Total']),1,0,'C',0);
  $pdf->Ln(6);
}

$pdf->Ln(15);
$pdf->SetFont('Times','',15);
$pdf->Cell(0,0,"Cuadro Estadistica",0,0,'C',0);

$pdf->Image($img, 35 ,90, 150 , 75,'PNG');
$pdf->Output();

?>