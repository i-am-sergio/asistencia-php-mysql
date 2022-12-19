<?php
require('../../libs/fpdf/fpdf.php');
include_once('../../config/db.php');

$img = $_POST['base64'];

$conexionDB = BaseDatos::crearInstancia();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["boton"];
    //echo "<label id='id' class='columna'> ID del alumno: ".$id."</label>";
}

$sql = "SELECT * FROM estudiantes_1 WHERE id_est=$id";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDeEstudiantes = $consulta->fetchAll();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../src/logo.png',350,10,40);
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
$pdf = new PDF('L', 'mm', 'A3');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',20);

$pdf->Cell(0,0,"Tabla de asistencia",0,0,'C',0);
$pdf->SetFont('Times','',12);
$pdf->Ln(12);
$pdf->SetX(12);
$pdf->SetFillColor(14,139,246);
$pdf->Cell(8,7,"ID",1,0,'C',0);
$pdf->Cell(40,7,"Apellidos",1,0,'C',0);
$pdf->Cell(42,7,"Nombres",1,0,'C',0);
$pdf->Cell(13,7,"Dia 1",1,0,'C',0);
$pdf->Cell(13,7,"Dia 2",1,0,'C',0);
$pdf->Cell(13,7,"Dia 3",1,0,'C',0);
$pdf->Cell(13,7,"Dia 4",1,0,'C',0);
$pdf->Cell(13,7,"Dia 5",1,0,'C',0);
$pdf->Cell(13,7,"Dia 6",1,0,'C',0);
$pdf->Cell(13,7,"Dia 7",1,0,'C',0);
$pdf->Cell(13,7,"Dia 8",1,0,'C',0);
$pdf->Cell(13,7,"Dia 9",1,0,'C',0);
$pdf->Cell(13,7,"Dia 10",1,0,'C',0);
$pdf->Cell(13,7,"Dia 11",1,0,'C',0);
$pdf->Cell(13,7,"Dia 12",1,0,'C',0);
$pdf->Cell(13,7,"Dia 13",1,0,'C',0);
$pdf->Cell(13,7,"Dia 14",1,0,'C',0);
$pdf->Cell(13,7,"Dia 15",1,0,'C',0);
$pdf->Cell(13,7,"Dia 16",1,0,'C',0);
$pdf->Cell(13,7,"Dia 17",1,0,'C',0);
$pdf->Cell(13,7,"Dia 18",1,0,'C',0);
$pdf->Cell(13,7,"Dia 19",1,0,'C',0);
$pdf->Cell(13,7,"Dia 20",1,0,'C',0);
$pdf->Cell(20,7,"T. Asist.",1,0,'C',0);
$pdf->Cell(20,7,"T. Faltas",1,1,'C',0);
$pdf->SetFillColor(255,255,255);//color de fondo
$pdf->SetDrawColor(51,51,51);//color de linea
foreach($listaDeEstudiantes as $estudiante){
  $pdf->setX(12);
  $pdf->Cell(8,6,utf8_decode($estudiante['id_est']),1,0,'C',0);
  $pdf->Cell(40,6,utf8_decode($estudiante['apellidos']),1,0,'C',0);
  $pdf->Cell(42,6,utf8_decode($estudiante['nombres']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_1']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_2']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_3']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_4']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_5']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_6']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_7']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_8']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_9']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_10']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_11']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_12']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_13']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_14']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_15']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_16']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_17']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_18']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_19']),1,0,'C',0);
  $pdf->Cell(13,6,utf8_decode($estudiante['dia_20']),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode($estudiante['totalP']),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode($estudiante['totalF']),1,1,'C',0);
}

$pdf->Ln(15);
$pdf->SetFont('Times','',15);
$pdf->Cell(0,0,"Cuadro Estadistica",0,0,'C',0);

$pdf->Image($img, 150 ,90, 150 , 75,'PNG');
$pdf->Output();

?>