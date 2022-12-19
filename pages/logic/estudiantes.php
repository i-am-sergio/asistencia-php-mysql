<?php
include_once '../config/db.php';

$conexionDB = BaseDatos::crearInstancia();
$listaDeEstudiantes = myquery($conexionDB,"SELECT id_est,nombres,apellidos FROM estudiantes_1");

?>