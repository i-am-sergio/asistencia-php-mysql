<?php
include_once '../config/db.php';

$conexionDB = BaseDatos::crearInstancia();

$listaCursos = myquery($conexionDB,"SELECT id_curso,nombre_curso FROM cursos");
$listaDecondiciones = myquery($conexionDB,"SELECT * FROM estadistica_diaria");



/*
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
*/
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
                    WHERE notas.id_est=1 
                    AND cursos.id_curso=1 
                    AND ((notas.continua_1*cursos.porcentaje_c1)+(notas.continua_2*cursos.porcentaje_c2)+(notas.parcial_1*cursos.porcentaje_p1)+(notas.parcial_2*cursos.porcentaje_p2))<4.8"); 

$cursoElegido = isset($_POST['botonCurso'])?$_POST['botonCurso']:'';

?>