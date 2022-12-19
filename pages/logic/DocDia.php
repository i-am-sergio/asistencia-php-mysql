<?php
require('../../libs/fpdf/fpdf.php');
include_once('../../config/db.php');

$img = $_POST['base64'];

$conexionDB = BaseDatos::crearInstancia();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dia = $_POST["boton"];
        //echo "<label id='dia' class='columna'>".$dia."</label>";
    }

    $sql = "SELECT * FROM estudiantes_1";
    $consulta = $conexionDB->prepare($sql);
    $consulta->execute();
    $listaDeEstudiantes = $consulta->fetchAll();

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

$pdf->Cell(0,0,"Tabla de asistencia",0,0,'C',0);
$pdf->SetFont('Times','',12);
$pdf->Ln(12);
$pdf->SetX(55);
$pdf->SetFillColor(14,139,246);
$pdf->Cell(8,7,"ID",1,0,'C',0);
$pdf->Cell(40,7,"Apellidos",1,0,'C',0);
$pdf->Cell(42,7,"Nombres",1,0,'C',0);
$pdf->Cell(13,7,utf8_encode($dia),1,0,'C',0);
$pdf->Ln(7);

$pdf->SetFillColor(255,255,255);//color de fondo
$pdf->SetDrawColor(51,51,51);//color de linea
foreach($listaDeEstudiantes as $estudiante){
  $pdf->setX(55);
  $pdf->Cell(8,6,utf8_decode($estudiante['id_est']),1,0,'C',0);
  $pdf->Cell(40,6,utf8_decode($estudiante['apellidos']),1,0,'C',0);
  $pdf->Cell(42,6,utf8_decode($estudiante['nombres']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_encode($estudiante[$dia]),1,0,'C',0);
  $pdf->Ln(6);
}

$sql = "SELECT * FROM estadistica_diaria";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDecondiciones = $consulta->fetchAll();

$pdf->Ln(15);
$pdf->SetFont('Times','',15);
$pdf->Cell(0,0,"Tabla de asistencia",0,0,'C',0);
$pdf->SetFont('Times','',12);
$pdf->Ln(12);
$pdf->SetX(75);
$pdf->SetFillColor(14,139,246);
$pdf->Cell(8,7,"ID",1,0,'C',0);
$pdf->Cell(40,7,"Condicion",1,0,'C',0);
$pdf->Cell(13,7,utf8_encode($dia),1,0,'C',0);
$pdf->Ln(7);

$pdf->SetFillColor(255,255,255);//color de fondo
$pdf->SetDrawColor(51,51,51);//color de linea
foreach($listaDecondiciones as $estudiante){
  $pdf->setX(75);
  $pdf->Cell(8,6,utf8_decode($estudiante['id']),1,0,'C',0);
  $pdf->Cell(40,6,utf8_decode($estudiante['condicion']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_encode($estudiante[$dia]),1,0,'C',0);
  $pdf->Ln(6);
}

$pdf->Ln(15);
$pdf->SetFont('Times','',15);
$pdf->Cell(0,0,"Cuadro Estadistica",0,0,'C',0);

$pdf->Image($img, 40 ,120, 150 , 75,'PNG');
$pdf->Output();

?>