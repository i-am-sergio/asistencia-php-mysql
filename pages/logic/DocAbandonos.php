<?php
require('../../libs/fpdf/fpdf.php');
include_once('../../config/db.php');

$conexionDB = BaseDatos::crearInstancia();

$img = $_POST['base64'];

$sql1="SELECT * FROM `estudiantes_1` WHERE totalP=0";
    $sql2="SELECT * FROM `estudiantes_1` WHERE totalF=0";

    $consulta = $conexionDB->prepare($sql1);
    $consulta->execute();
    $abandonos = $consulta->fetchAll();

    $consulta2 = $conexionDB->prepare($sql2);
    $consulta2->execute();
    $presentes = $consulta2->fetchAll();

    $totalAsistentes = 0;
    $totalAbandonos = 0;
    $mixto = 0;

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
$pdf->Cell(40,7,"Apellidos",1,0,'C',0);
$pdf->Cell(42,7,"Nombres",1,0,'C',0);
$pdf->Cell(20,7,"T. Asist.",1,0,'C',0);
$pdf->Cell(20,7,"T. Faltas",1,1,'C',0);
$pdf->SetFillColor(255,255,255);//color de fondo
$pdf->SetDrawColor(51,51,51);//color de linea
foreach($presentes as $estudiante){
  $pdf->setX(45);
  $pdf->Cell(8,6,utf8_decode($estudiante['id_est']),1,0,'C',0);
  $pdf->Cell(40,6,utf8_decode($estudiante['apellidos']),1,0,'C',0);
  $pdf->Cell(42,6,utf8_decode($estudiante['nombres']),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode($estudiante['totalP']),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode($estudiante['totalF']),1,1,'C',0);
}


$pdf->Ln(15);
$pdf->SetFont('Times','',15);
$pdf->Cell(0,0,"Abandonos",0,0,'C',0);
$pdf->SetFont('Times','',12);
$pdf->Ln(12);
$pdf->SetX(45);
$pdf->SetFillColor(14,139,246);
$pdf->Cell(8,7,"ID",1,0,'C',0);
$pdf->Cell(40,7,"Apellidos",1,0,'C',0);
$pdf->Cell(42,7,"Nombres",1,0,'C',0);
$pdf->Cell(20,7,"T. Asist.",1,0,'C',0);
$pdf->Cell(20,7,"T. Faltas",1,1,'C',0);
$pdf->SetFillColor(255,255,255);//color de fondo
$pdf->SetDrawColor(51,51,51);//color de linea
foreach($abandonos as $estudiante){
  $pdf->setX(45);
  $pdf->Cell(8,6,utf8_decode($estudiante['id_est']),1,0,'C',0);
  $pdf->Cell(40,6,utf8_decode($estudiante['apellidos']),1,0,'C',0);
  $pdf->Cell(42,6,utf8_decode($estudiante['nombres']),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode($estudiante['totalP']),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode($estudiante['totalF']),1,1,'C',0);
}
$pdf->Ln(25);
$pdf->SetFont('Times','',15);
$pdf->Cell(0,0,"Cuadro Estadistico",0,0,'C',0);

$pdf->Image($img, 35 ,180, 150 , 75,'PNG');
$pdf->Output();


?>