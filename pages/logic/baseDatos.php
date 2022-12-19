<?php
class baseDEdatos{
  private $host;
  private $usuario;
  private $pass;
  private $db;
  private $conexion;

  function __construct($host,$usuario,$pass,$db){
    $this->host = $host;
    $this->usuario = $usuario;
    $this->pass = $pass;
    $this->db = $db;
  }

  function conectar(){
    $this->conexion = mysqli_connect($this->host,$this->usuario,$this->pass,$this->db);
    $this->conexion->set_charset("utf8");
    if(mysqli_connect_errno()){
      echo "Error al conectarse a la base de datos";
    }
  }

  function insAsistencia($asistencia,$id,$dia){
    mysqli_query($this->conexion,"UPDATE estudiantes_1 SET $dia = ('".$asistencia."') WHERE id_est = $id");
    $error = mysqli_error($this->conexion);
    if(empty($error)){
      return true;
    }
    echo "Error al insertar cliente";
    return false;
  }

  function insTotalDia($totalP,$totalA,$dia){
    mysqli_query($this->conexion,"UPDATE estadistica_diaria SET $dia = ($totalP) WHERE id = 1");
    mysqli_query($this->conexion,"UPDATE estadistica_diaria SET $dia = ($totalA) WHERE id = 2");
    if(empty($error)){
      return true;
    }
    echo "Error al insertar cliente";
    return false;
  }

  function insTotalEstudiante($totalP,$totalA,$id){
    mysqli_query($this->conexion,"UPDATE estudiantes_1 SET totalP = ($totalP) WHERE id_est = $id");
    mysqli_query($this->conexion,"UPDATE estudiantes_1 SET totalF = ($totalA) WHERE id_est = $id");
    if(empty($error)){
      return true;
    }
    echo "Error al insertar cliente";
    return false;
  }

  function insTotal($totalT,$id){
    mysqli_query($this->conexion,"UPDATE estadistica_diaria SET Total = ($totalT) WHERE id = $id");
    if(empty($error)){
      return true;
    }
    echo "Error al insertar cliente";
    return false;
  }

  function getTabla1() {
    $result = mysqli_query($this->conexion,"SELECT * FROM estudiantes_1");
    $error = mysqli_error($this->conexion);

    if(empty($error)){
      if(mysqli_num_rows($result)>0){
        return $result;
      }
    }
    else{
      echo "Error al obtener tabla";
    }
    return null;
  }

  function getTabla2() {
    $result = mysqli_query($this->conexion,"SELECT * FROM estadistica_diaria");
    $error = mysqli_error($this->conexion);

    if(empty($error)){
      if(mysqli_num_rows($result)>0){
        return $result;
      }
    }
    else{
      echo "Error al obtener tabla";
    }
    return null;
  }

  function cerrar(){
    mysqli_close($this->conexion);
  }
}

?>