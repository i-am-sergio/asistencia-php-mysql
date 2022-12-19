<?php
/*
require('../../libs/fpdf/fpdf.php');
include_once '../../config/db.php';

$conexionDB = BaseDatos::crearInstancia();
$listaCursos = myquery($conexionDB,"SELECT id_curso,nombre_curso FROM cursos");

$listaDeEstudiantes = myquery($conexionDB,"SELECT * FROM estudiantes");
$listaDecondiciones = myquery($conexionDB,"SELECT * FROM estadistica_diaria");

$apellidos_nombres_TrabInter = myquery($conexionDB,"SELECT apellidos,nombres FROM estudiantes");
$notas_TrabInter = myquery($conexionDB,"SELECT * FROM notas");

// ---------------- Numero de Aprobados (nota Continua 1) -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE continua_1>=10.5");
$numAprc1 = $cantApr[0]['CantAprobados'];
$porcentApr_c1 = ($numAprc1/40)*100;
// ---------------- Numero de desaprobados (nota Continua 1)----------------------
$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE continua_1<10.5");
$numDesapc1 = $cantDesap[0]['CantDesaprobados'];
$porcentDesap_c1 = ($numDesapc1/40)*100;
// ---------------- Numero de Aprobados (nota Parcial 1) -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE parcial_1>=10.5");
$numAprp1 = $cantApr[0]['CantAprobados'];
$porcentApr_p1 = ($numAprp1/40)*100;
// ---------------- Numero de desaprobados (nota Parcial 1)----------------------
$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE parcial_1<10.5");
$numDesapp1 = $cantDesap[0]['CantDesaprobados'];
$porcentDesap_p1 = ($numDesapp1/40)*100;
// ---------------- Numero de Aprobados (nota Continua 2) -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE continua_2>=10.5");
$numAprc2 = $cantApr[0]['CantAprobados'];
$porcentApr_c2 = ($numAprc2/40)*100;
// ---------------- Numero de desaprobados (nota Continua 2)----------------------
$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE continua_2<10.5");
$numDesapc2 = $cantDesap[0]['CantDesaprobados'];
$porcentDesap_c2 = ($numDesapc2/40)*100;
// ---------------- Numero de Aprobados (nota Parcial 2) -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE parcial_2>=10.5");
$numAprp2 = $cantApr[0]['CantAprobados'];
$porcentApr_p2 = ($numAprp2/40)*100;
// ---------------- Numero de desaprobados (nota Parcial 2)----------------------
$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE parcial_2<10.5");
$numDesapp2 = $cantDesap[0]['CantDesaprobados'];
$porcentDesap_p2 = ($numDesapp2/40)*100;
// ---------------- Numero de Aprobados (nota Continua 3) -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE continua_3>=10.5");
$numAprc3 = $cantApr[0]['CantAprobados'];
$porcentApr_c3 = ($numAprc3/40)*100;
// ---------------- Numero de desaprobados (nota Continua 3)----------------------
$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE continua_3<10.5");
$numDesapc3 = $cantDesap[0]['CantDesaprobados'];
$porcentDesap_c3 = ($numDesapc3/40)*100;
// ---------------- Numero de Aprobados (nota Parcial 3) -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE parcial_3>=10.5");
$numAprp3 = $cantApr[0]['CantAprobados'];
$porcentApr_p3 = ($numAprp3/40)*100;
// ---------------- Numero de desaprobados (nota Parcial 3)----------------------
$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE parcial_3<10.5");
$numDesapp3 = $cantDesap[0]['CantDesaprobados'];
$porcentDesap_p3 = ($numDesapp3/40)*100;

$arrayTitulosNotas = array(
  1 => "Nota Parcial 1",
  2 => "Nota Continua 1",
  3 => "Nota Parcial 2",
  4 => "Nota Continua 2",
  5 => "Nota Parcial 3",
  6 => "Nota Continua 3",
  7 => "Nota Final"
);

// ---------------- Numero de Aprobados (nota Final) -------------------------
$cantApr = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantAprobados' FROM notas WHERE nota_final>=10.5");
$numApr = $cantApr[0]['CantAprobados'];
$porcentApr = ($numApr/40)*100;
// ---------------- Numero de desaprobados (nota Final)----------------------
$cantDesap = myquery($conexionDB,"SELECT COUNT(id_est) as 'CantDesaprobados' FROM notas WHERE nota_final<10.5");
$numDesap = $cantDesap[0]['CantDesaprobados'];
$porcentDesap = ($numDesap/40)*100;

$maxima_nota_c1 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.continua_1 as "maxim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.continua_1=(SELECT MAX(notas.continua_1) FROM notas) AND estudiantes.id_est=notas.id_est
');
$minima_nota_c1 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.continua_1 as "minim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.continua_1=(SELECT MIN(notas.continua_1) FROM notas) AND estudiantes.id_est=notas.id_est
');
$maxima_nota_p1 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.parcial_1 as "maxim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.parcial_1=(SELECT MAX(notas.parcial_1) FROM notas) AND estudiantes.id_est=notas.id_est
');
$minima_nota_p1 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.parcial_1 as "minim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.parcial_1=(SELECT MIN(notas.parcial_1) FROM notas) AND estudiantes.id_est=notas.id_est
');
$maxima_nota_c2 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.continua_2 as "maxim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.continua_2=(SELECT MAX(notas.continua_2) FROM notas) AND estudiantes.id_est=notas.id_est
');
$minima_nota_c2 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.continua_2 as "minim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.continua_2=(SELECT MIN(notas.continua_2) FROM notas) AND estudiantes.id_est=notas.id_est
');
$maxima_nota_p2 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.parcial_2 as "maxim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.parcial_2=(SELECT MAX(notas.parcial_2) FROM notas) AND estudiantes.id_est=notas.id_est
');
$minima_nota_p2 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.parcial_2 as "minim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.parcial_2=(SELECT MIN(notas.parcial_2) FROM notas) AND estudiantes.id_est=notas.id_est
');
$maxima_nota_c3 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.continua_3 as "maxim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.continua_3=(SELECT MAX(notas.continua_3) FROM notas) AND estudiantes.id_est=notas.id_est
');
$minima_nota_c3 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.continua_3 as "minim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.continua_3=(SELECT MIN(notas.continua_3) FROM notas) AND estudiantes.id_est=notas.id_est
');
$maxima_nota_p3 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.parcial_3 as "maxim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.parcial_3=(SELECT MAX(notas.parcial_3) FROM notas) AND estudiantes.id_est=notas.id_est
');
$minima_nota_p3 = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.parcial_3 as "minim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.parcial_3=(SELECT MIN(notas.parcial_3) FROM notas) AND estudiantes.id_est=notas.id_est
');
$maxima_nota_info = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.nota_final as "maxim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.nota_final=(SELECT MAX(notas.nota_final) FROM notas) AND estudiantes.id_est=notas.id_est
');

$min_nota_info = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.nota_final as "minim" 
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.nota_final=(SELECT MIN(notas.nota_final) FROM notas) AND estudiantes.id_est=notas.id_est
');


$maxima_nota_info = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.nota_final as "maxim"
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.nota_final=(SELECT MAX(notas.nota_final) FROM notas) AND estudiantes.id_est=notas.id_est
');

$min_nota_info = myquery($conexionDB,'SELECT notas.id_est, estudiantes.nombres, estudiantes.apellidos, notas.nota_final as "minim" 
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.nota_final=(SELECT MIN(notas.nota_final) FROM notas) AND estudiantes.id_est=notas.id_est
');

$promedioAula_notaContinua1 = myquery($conexionDB,"SELECT AVG(continua_1) as 'nota' FROM notas");
$promedioAula_notaParcial1 = myquery($conexionDB,"SELECT AVG(parcial_1) as 'nota' FROM notas");
$promedioAula_notaContinua2 = myquery($conexionDB,"SELECT AVG(continua_2) as 'nota' FROM notas");
$promedioAula_notaParcial2 = myquery($conexionDB,"SELECT AVG(parcial_2) as 'nota' FROM notas");
$promedioAula_notaContinua3 = myquery($conexionDB,"SELECT AVG(continua_3) as 'nota' FROM notas");
$promedioAula_notaParcial3 = myquery($conexionDB,"SELECT AVG(parcial_3) as 'nota' FROM notas");

$promedioAula_notaFinal = myquery($conexionDB,"SELECT AVG(nota_final) as 'nota' FROM notas");

$peligro = myquery($conexionDB, "SELECT notas.id_est, estudiantes.apellidos, estudiantes.nombres, notas.continua_1, notas.parcial_1, notas.continua_2, notas.parcial_2, notas.med_peligro as 'peligro'
                  FROM notas
                  INNER JOIN estudiantes
                  ON notas.id_est -- Mientras el id_est exista
                  WHERE notas.med_peligro='M' AND estudiantes.id_est=notas.id_est;");

$peligroActualizar = myquery($conexionDB, "UPDATE notas
INNER JOIN cursos
ON notas.id_est
SET notas.med_peligro='M' -- MALO
WHERE notas.id_est=1 AND cursos.id_curso=1 AND ((notas.continua_1*cursos.porcentaje_c1)+(notas.continua_2*cursos.porcentaje_c2)+(notas.parcial_1*cursos.porcentaje_p1)+(notas.parcial_2*cursos.porcentaje_p2))<4.8"); 

// ------------------------- PDF -------------------------------------
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../src/logo.png',160,10,35);
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

foreach($notas_TrabInter as $nota){
  $pdf->setX(12);
  $pdf->Cell(10,6,utf8_decode($nota['id_est']),1,0,'C',0);
  $pdf->Cell(90,6,utf8_decode($apellidos_nombres_TrabInter[$i]['apellidos'].$apellidos_nombres_TrabInter[$i]['nombres']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($nota['continua_1'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($nota['parcial_1'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($nota['continua_2'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($nota['parcial_2'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($nota['continua_3'])),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($nota['parcial_3'])),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode(round($nota['nota_final'])),1,1,'C',0);
  $i++;
}

$pdf->Ln(20);
$pdf->Cell(0,0,"Datos Generales del curso",0,0,'C',0);
$pdf->Ln(12);
$pdf->setX(50);
$pdf->Cell(90,6,utf8_decode("Estudiantes que Aprobaron el Curso"),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode($numApr),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode($porcentApr. "%"),1,1,'C',0);
$pdf->setX(50);
$pdf->Cell(90,6,utf8_decode("Estudiantes que Desaprobaron el curso"),1,0,'C',0);
$pdf->Cell(12,6,utf8_decode($numDesap),1,0,'C',0);
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
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaContinua1[0]['nota'],2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Parcial 1)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaParcial1[0]['nota'],2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Continua 2)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaContinua2[0]['nota'],2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Parcial 2)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaParcial2[0]['nota'],2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Continua 3)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaContinua3[0]['nota'],2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Parcial 3)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaParcial3[0]['nota'],2)),1,1,'C',0);
$pdf->setX(60);
$pdf->Cell(70,6,utf8_decode("Promedio del Aula (Nota Final)"),1,0,'C',0);
$pdf->Cell(28,6,utf8_decode(round($promedioAula_notaFinal[0]['nota'],2)),1,1,'C',0);

$pdf->Ln(140);
$pdf->setX(10);
$pdf->SetFont('Times','',15);
$pdf->Cell(0,0,"Estadisticas Primera Fase",0,0,'C',0);
$pdf->Ln(8);
$pdf->Cell(0,0,"Grafico segun Nota Continua 1",0,5,'C',0);
$pdf->Image('../../resources/myChart1.png' , 30 ,150, 150 , 75,'PNG');
$pdf->Ln(100);
$pdf->Cell(0,0,"Grafico segun Nota Parcial 1",0,0,'C',0);
$pdf->Image('../../resources/myChart2.png' , 30 ,40, 150 , 75,'PNG');

$pdf->Ln(200);

$pdf->Cell(0,0,"Estadisticas Segunda Fase",0,0,'C',0);
$pdf->Ln(10);
$pdf->Cell(0,0,"Grafico segun Nota Continua 2",0,5,'C',0);
$pdf->Image('../../resources/myChart3.png' , 30 ,150, 150 , 75,'PNG');
$pdf->Ln(100);
$pdf->Cell(0,0,"Grafico segun Nota Parcial 2",0,0,'C',0);
$pdf->Image('../../resources/myChart4.png' , 30 ,40, 150 , 75,'PNG');

$pdf->Ln(200);

$pdf->Cell(0,0,"Estadisticas Tercera Fase",0,0,'C',0);
$pdf->Ln(10);
$pdf->Cell(0,0,"Grafico segun Nota Continua 3",0,5,'C',0);
$pdf->Image('../../resources/myChart5.png' , 30 ,150, 150 , 75,'PNG');
$pdf->Ln(100);
$pdf->Cell(0,0,"Grafico segun Nota Parcial 3",0,0,'C',0);
$pdf->Image('../../resources/myChart6.png' , 30 ,40, 150 , 75,'PNG');

$pdf->Ln(150);
$pdf->Cell(0,0,"Grafico segun Nota Final",0,0,'C',0);
$pdf->setY(30);
$pdf->Image('../../resources/myChart7.png' , 30 ,38, 150 , 75,'PNG');

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
  $pdf->Cell(90,6,utf8_decode($estudiante['apellidos'].$estudiante['nombres']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['continua_1'],2)),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['parcial_1'],2)),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['continua_2'],2)),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode(round($estudiante['parcial_2'],2)),1,1,'C',0);
}

$pdf->Output();
*/
?>