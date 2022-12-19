<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location: ../index.php');
}
include('../libs/fpdf/fpdf.php');
include_once("controller_notas.php");

$nombreCurso = $_POST["nombreCurso"];
$idCurso = $_POST["idCurso"];
$img_1 = $_POST["base64_1"];
$img_2 = $_POST["base64_2"];
$img_3 = $_POST["base64_3"];
$img_4 = $_POST["base64_4"];
$img_5 = $_POST["base64_5"];
$img_6 = $_POST["base64_6"];
$img_7 = $_POST["base64_7"];

$conexionBD = new Conexion();
$estudiantes = $conexionBD->getEstudiantes($idCurso);
$totalEst = $conexionBD->getTotalEstudiantes($idCurso);

$numAprC1 = $conexionBD->numAprobados($idCurso,"continua_1");
$numDesaprC1 = $conexionBD->numDesaprobados($idCurso,"continua_1");
$numAprP1 = $conexionBD->numAprobados($idCurso,"parcial_1");
$numDesaprP1 = $conexionBD->numDesaprobados($idCurso,"parcial_1");
$numAprC2 = $conexionBD->numAprobados($idCurso,"continua_2");
$numDesaprC2 = $conexionBD->numDesaprobados($idCurso,"continua_2");
$numAprP2 = $conexionBD->numAprobados($idCurso,"parcial_2");
$numDesaprP2 = $conexionBD->numDesaprobados($idCurso,"parcial_2");
$numAprC3 = $conexionBD->numAprobados($idCurso,"continua_3");
$numDesaprC3 = $conexionBD->numDesaprobados($idCurso,"continua_3");
$numAprP3 = $conexionBD->numAprobados($idCurso,"parcial_3");
$numDesaprP3 = $conexionBD->numDesaprobados($idCurso,"parcial_3");

$numAprNotaFinal = $conexionBD->numAprobados($idCurso,"nota_final");
$numDesprNotaFinal = $conexionBD->numDesaprobados($idCurso,"nota_final");
$porcentApr = ($numAprNotaFinal/$totalEst)*100;
$porcentDesap = ($numDesprNotaFinal/$totalEst)*100;
$numAprc1 = $conexionBD->numAprobados($idCurso,"continua_1");
$numDesaprc1 = $conexionBD->numDesaprobados($idCurso,"continua_1");
//print_r($numAprc1."-"); print_r($numDesaprc1."-");
$promedioAula_notaContinua1 = $conexionBD->getPromedioNota($idCurso,"continua_1");
$promedioAula_notaParcial1 = $conexionBD->getPromedioNota($idCurso,"parcial_1");
$promedioAula_notaContinua2 = $conexionBD->getPromedioNota($idCurso,"continua_2");
$promedioAula_notaParcial2 = $conexionBD->getPromedioNota($idCurso,"parcial_2");
$promedioAula_notaContinua3 = $conexionBD->getPromedioNota($idCurso,"continua_3");
$promedioAula_notaParcial3 = $conexionBD->getPromedioNota($idCurso,"parcial_3");
$promedioAula_notaFinal = $conexionBD->getPromedioNota($idCurso,"nota_final");
$maxima_nota_c1 = $conexionBD->getMaximaNota($idCurso,"continua_1");
$minima_nota_c1 = $conexionBD->getMinimaNota($idCurso,"continua_1");
$maxima_nota_p1 = $conexionBD->getMaximaNota($idCurso,"parcial_1");
$minima_nota_p1 = $conexionBD->getMinimaNota($idCurso,"parcial_1");
$maxima_nota_c2 = $conexionBD->getMaximaNota($idCurso,"continua_2");
$minima_nota_c2 = $conexionBD->getMinimaNota($idCurso,"continua_2");
$maxima_nota_p2 = $conexionBD->getMaximaNota($idCurso,"parcial_2");
$minima_nota_p2 = $conexionBD->getMinimaNota($idCurso,"parcial_2");
$maxima_nota_c3 = $conexionBD->getMaximaNota($idCurso,"continua_3");
$minima_nota_c3 = $conexionBD->getMinimaNota($idCurso,"continua_3");
$maxima_nota_p3 = $conexionBD->getMaximaNota($idCurso,"parcial_3");
$minima_nota_p3 = $conexionBD->getMinimaNota($idCurso,"parcial_3");
$maxima_nota_info = $conexionBD->getMaximaNota($idCurso,"nota_final");
$min_nota_info = $conexionBD->getMinimaNota($idCurso,"nota_final");
$peligro = $conexionBD->getEstudiantesEnPeligro($idCurso);

$arrayTitulosNotas = array(
  1 => "Nota Parcial 1",
  2 => "Nota Continua 1",
  3 => "Nota Parcial 2",
  4 => "Nota Continua 2",
  5 => "Nota Parcial 3",
  6 => "Nota Continua 3",
  7 => "Nota Final"
);

// ------------------------- PDF -------------------------------------
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../src/logo.png',160,10,35);
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
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Cell(0,0,"Registro de Notas del curso",0,0,'C',0);
$pdf->Ln(12);
$pdf->SetX(12);
$pdf->SetFillColor(14,139,246);
$pdf->Cell(10,7,"ID",1,0,'C',0);
$pdf->Cell(90,7,"Estudiante",1,0,'C',0);
$pdf->Cell(11,7,"C1",1,0,'C',0);
$pdf->Cell(11,7,"P1",1,0,'C',0);
$pdf->Cell(11,7,"C2",1,0,'C',0);
$pdf->Cell(11,7,"P2",1,0,'C',0);
$pdf->Cell(11,7,"C3",1,0,'C',0);
$pdf->Cell(11,7,"P3",1,0,'C',0);
$pdf->Cell(20,7,"Nota Final",1,1,'C',0);
$pdf->SetFillColor(255,255,255);//color de fondo
$pdf->SetDrawColor(51,51,51);//color de linea
$i=0;

foreach($estudiantes as $estudiante){
  $pdf->setX(12);
  $pdf->Cell(10,6,utf8_decode($estudiante['id_est']),1,0,'C',0);
  $pdf->Cell(90,6,utf8_decode($estudiante['apellidos']." ".$estudiante['nombres']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['continua_1'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['parcial_1'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['continua_2'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['parcial_2'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['continua_3'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['parcial_3'])),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode(round($estudiante['nota_final'])),1,1,'C',0);
  $i++;
}
$pdf->AddPage();

$pdf->Ln(20);
$pdf->Cell(0,0,"Datos Generales del curso",0,0,'C',0);
$pdf->Ln(12);
$pdf->setX(50);
$pdf->Cell(90,6,utf8_decode("Estudiantes que Aprobaron el Curso"),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode($numAprNotaFinal),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode($porcentApr. "%"),1,1,'C',0);
$pdf->setX(50);
$pdf->Cell(90,6,utf8_decode("Estudiantes que Desaprobaron el curso"),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode($numDesprNotaFinal),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode($porcentDesap. "%"),1,1,'C',0);
$pdf->Ln(8);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Criterios"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode("Estudiantes"),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode("Nota"),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Mayor Nota Aprobatoria (Continua 1)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($maxima_nota_c1[0]["apellidos"].$maxima_nota_c1[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($maxima_nota_c1[0]["maxim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Menor Nota Aprobatoria (Continua 1)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($minima_nota_c1[0]["apellidos"].$minima_nota_c1[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($minima_nota_c1[0]["minim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Mayor Nota Aprobatoria (Parcial 1)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($maxima_nota_p1[0]["apellidos"].$maxima_nota_p1[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($maxima_nota_p1[0]["maxim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Menor Nota Aprobatoria (Parcial1)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($minima_nota_p1[0]["apellidos"].$minima_nota_p1[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($minima_nota_p1[0]["minim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Mayor Nota Aprobatoria (Continua 2)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($maxima_nota_c2[0]["apellidos"].$maxima_nota_c2[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($maxima_nota_c2[0]["maxim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Menor Nota Aprobatoria (Continua 2)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($minima_nota_c2[0]["apellidos"].$minima_nota_c2[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($minima_nota_c2[0]["minim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Mayor Nota Aprobatoria (Parcial 2)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($maxima_nota_p2[0]["apellidos"].$maxima_nota_p2[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($maxima_nota_p2[0]["maxim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Menor Nota Aprobatoria (Parcial2)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($minima_nota_p2[0]["apellidos"].$minima_nota_p2[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($minima_nota_p2[0]["minim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Mayor Nota Aprobatoria (Continua 3)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($maxima_nota_c3[0]["apellidos"].$maxima_nota_c3[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($maxima_nota_c3[0]["maxim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Menor Nota Aprobatoria (Continua 3)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($minima_nota_c3[0]["apellidos"].$minima_nota_c3[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($minima_nota_c3[0]["minim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Mayor Nota Aprobatoria (Parcial 3)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($maxima_nota_p3[0]["apellidos"].$maxima_nota_p3[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($maxima_nota_p3[0]["maxim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Menor Nota Aprobatoria (Parcial 3)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($minima_nota_p3[0]["apellidos"].$minima_nota_p3[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($minima_nota_p3[0]["minim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Mayor Nota Aprobatoria (Nota Final)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($maxima_nota_info[0]["apellidos"].$maxima_nota_info[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($maxima_nota_info[0]["maxim"])),1,1,'C',0);
$pdf->setX(25);
$pdf->Cell(75,6,utf8_decode("Menor Nota Aprobatoria (Nota Final)"),1,0,'C',0);
$pdf->Cell(80,6,utf8_decode($min_nota_info[0]["apellidos"].$min_nota_info[0]['nombres']),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode(round($min_nota_info[0]["minim"])),1,1,'C',0);

$pdf->Ln(10);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Tipo de promedio"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode("Nota del Aula"),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Continua 1)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaContinua1,2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Parcial 1)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaParcial1,2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Continua 2)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaContinua2,2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Parcial 2)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaParcial2,2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Continua 3)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaContinua3,2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Parcial 3)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaParcial3,2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Nota Final)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaFinal,2)),1,1,'C',0);

$pdf->Ln(140);
$pdf->setX(10);
$pdf->SetFont('Times','',15);
$pdf->Cell(0,0,"Estadisticas Primera Fase",0,0,'C',0);
$pdf->Ln(8);
$pdf->Cell(0,0,"Grafico segun Nota Continua 1",0,5,'C',0);
$pdf->Image( $img_1 , 30 ,150, 150 , 75,'PNG');
$pdf->Ln(100);
$pdf->Cell(0,0,"Grafico segun Nota Parcial 1",0,0,'C',0);
$pdf->Image( $img_2 , 30 ,40, 150 , 75,'PNG');

$pdf->Ln(200);

$pdf->Cell(0,0,"Estadisticas Segunda Fase",0,0,'C',0);
$pdf->Ln(10);
$pdf->Cell(0,0,"Grafico segun Nota Continua 2",0,5,'C',0);
$pdf->Image($img_3 , 30 ,150, 150 , 75,'PNG');
$pdf->Ln(100);
$pdf->Cell(0,0,"Grafico segun Nota Parcial 2",0,0,'C',0);
$pdf->Image($img_4 , 30 ,40, 150 , 75,'PNG');

$pdf->Ln(200);

$pdf->Cell(0,0,"Estadisticas Tercera Fase",0,0,'C',0);
$pdf->Ln(10);
$pdf->Cell(0,0,"Grafico segun Nota Continua 3",0,5,'C',0);
$pdf->Image($img_5 , 30 ,150, 150 , 75,'PNG');
$pdf->Ln(100);
$pdf->Cell(0,0,"Grafico segun Nota Parcial 3",0,0,'C',0);
$pdf->Image($img_6 , 30 ,40, 150 , 75,'PNG');

$pdf->Ln(150);
$pdf->Cell(0,0,"Grafico segun Nota Final",0,0,'C',0);
$pdf->setY(30);
$pdf->Image($img_7 , 30 ,38, 150 , 75,'PNG');

$pdf->Ln(95);
$pdf->setX(30);
$pdf->Cell(0,0,"Estudiantes en peligro de desaprobar el curso ",0,0,'C',0);
$pdf->SetFont('Times','',12);
$pdf->setY(140);
$pdf->setX(35);
$pdf->Cell(10,6,utf8_decode("ID"),1,0,'C',0);
$pdf->Cell(90,6,utf8_decode("Apellidos y Nombres"),1,0,'C',0);
$pdf->Cell(11,6,utf8_decode("C1"),1,0,'C',0);
$pdf->Cell(11,6,utf8_decode("P1"),1,0,'C',0);
$pdf->Cell(11,6,utf8_decode("C2"),1,0,'C',0);
$pdf->Cell(11,6,utf8_decode("P2"),1,1,'C',0);

foreach($peligro as $estudiante){
  $pdf->setX(35);
  $pdf->Cell(10,6,utf8_decode($estudiante['id_est']),1,0,'C',0);
  $pdf->Cell(90,6,utf8_decode($estudiante['apellidos']." ".$estudiante['nombres']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['continua_1'],2)),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['parcial_1'],2)),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['continua_2'],2)),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['parcial_2'],2)),1,1,'C',0);
}


$pdf->Output();
?>