<?php

include_once("../config/db.php");
date_default_timezone_set('America/Lima');
$conexionDB = BaseDatos::crearInstancia();
$res = myquery($conexionDB,"SELECT COUNT(id_epcc) as 'cantidadEst' FROM estudiantes_epcc");
$numEstudiantes = $res[0]['cantidadEst'];
$res = myquery($conexionDB,"SELECT COUNT(id_curso) as 'cantidadCursos' FROM cursos");
$numCursos = $res[0]['cantidadCursos'];
$res = myquery($conexionDB,"SELECT COUNT(usuario) as 'cantidadUsua' FROM usuarios");
$numUsuarios = $res[0]['cantidadUsua'];
$fecha = date('l jS \of F Y h:i:s A');

?>