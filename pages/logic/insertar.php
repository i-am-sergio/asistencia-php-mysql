<?php 
include("BaseDatos.php");
include("../view_asistencia.php");

$BaseDatos = new baseDEdatos("localhost","root","","sistemaasistencia");
$BaseDatos->conectar();

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $dia = $_POST["dia"];
  for ($a = 1; $a<=40; $a++){
    $asist = $_POST["asist$a"];
    $BaseDatos->insAsistencia($asist,$a,$dia);
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $totalAsistentes = $_POST["totalP"];
  $totalAusentes = $_POST["totalA"];
  $BaseDatos->insTotalDia($totalAsistentes,$totalAusentes,$dia);
}


$totalPresentes = 0;
$totalAusentes = 0;

$listaDeEstudiantes = $BaseDatos->getTabla1();
if(!is_null($listaDeEstudiantes)){
  while($estudiante = mysqli_fetch_assoc($listaDeEstudiantes)){
    for($i = 1; $i<=20; $i++){
      if($estudiante["dia_$i"]=='P'){
        $totalPresentes++;
      }
      if($estudiante["dia_$i"]=='F'){
        $totalAusentes++;
      }
    }
    $BaseDatos->insTotalEstudiante($totalPresentes,$totalAusentes,$estudiante['id_est']);
    $totalPresentes = 0;
    $totalAusentes = 0;
  }
}

$totalT = 0;
$totales = $BaseDatos->getTabla2();
if(!is_null($totales)){
  while($tot = mysqli_fetch_assoc($totales)){
    for($i = 1; $i<=20; $i++){
      if($tot["dia_$i"]!=0){
        $totalT = $totalT+$tot["dia_$i"];
      }
    }
    $BaseDatos->insTotal($totalT,$tot['id']);
    $totalT = 0;
  }
}

$BaseDatos->cerrar();
?>
